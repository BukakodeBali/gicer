<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Resources\ArticleResources;
use App\Models\Article;
use App\Traits\ImageUploadTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    use ImageUploadTrait;
    protected $dimensions = [400, 600, 800];
    protected $module = 'artikel';

    public function index(Request $request)
    {
        if (auth()->user()->cannot('show articles')) {
            return $this->unAuthorized();
        }

        $keyword = $request->keyword ?? '';
        $perPage = $request->per_page ?? 10;

        $articles = Article::with(['categories', 'tags', 'image'])
            ->when($keyword <> '', function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%");
            })
            ->orderByDesc('id');
        $articles = $perPage === 'all' ? $articles->get() : $articles->paginate($perPage);
        return ArticleResources::collection($articles);
    }

    public function store(ArticleStoreRequest $request)
    {
        $article = Article::make($request->only([
            'title',
            'content',
            'status'
        ]));

        $article->setCreatedBy(Auth::user());
        $article->setUpdatedBy(Auth::user());
        $categories = $request->categories ?? [];
        $tags = $request->getTags() ?? [];

        if ($request->status === 'published') {
            $article->published_at = Carbon::now();
        }

        DB::beginTransaction();
        try {
            $article->save();
            $article->categories()->attach($categories);
            $article->tags()->attach($tags);
            $article->link()->create([
                'meta_description' => $request->getMetaDescription(),
                'link' => $request->getArticleLink()
            ]);

            if ($request->hasFile('image')) {
                $image = $request->image;
                $imagePath = 'articles';
                $imageName = $this->doUploadImage($imagePath, $image, $this->dimensions);
                $article->image()->create([
                    'path' => $imagePath,
                    'name' => $imageName
                ]);
            }

            DB::commit();
            return $this->storeTrue($this->module);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return $this->storeFalse($this->module);
        }
    }

    public function edit($id)
    {
        if (auth()->user()->cannot('Edit Article')) {
            return $this->unAuthorized();
        }

        $article = Article::find($id);
        if (!$article) {
            return $this->dataNotFound($this->module);
        }

        return new ArticleResources($article->load(['image', 'link', 'categories', 'tag']));
    }

    public function update(ArticleStoreRequest $request, $id)
    {
        if (auth()->user()->cannot('Update Article')) {
            return $this->unAuthorized();
        }

        $article = Article::find($id);
        if (!$article) {
            return $this->dataNotFound($this->module);
        }

        $article->fill($request->only([
            'title',
            'content',
            'status'
        ]));

        $article->setUpdatedBy(Auth::user());

        if ($request->status === 'published' && $article->published_at === null) {
            $article->published_at = Carbon::now();
        }

        $categories = $request->categories ?? [];
        $tags = $request->getTags() ?? [];

        DB::beginTransaction();
        try {
            $article->save();
            $article->categories()->sync($categories);
            $article->tags()->sync($tags);

            $link = [
                'link' => $request->getArticleLink(),
                'meta_description' => $request->getMetaDescription()
            ];

            if ($article->link) {
                $article->link()->update($link);
            } else {
                $article->link()->create($link);
            }

            if ($request->hasFile('image')) {
                $image = $request->image;
                $imagePath = 'articles';
                $imageName = $this->doUploadImage($imagePath, $image, $this->dimensions);
                $updatedData = [
                    'path' => $imagePath,
                    'name' => $imageName
                ];

                if ($article->image) {
                    $article->image()->update($updatedData);
                } else {
                    $article->image()->create($updatedData);
                }
            }

            DB::commit();
            return $this->storeTrue($this->module);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->updateFalse($this->module);
        }
    }

    public function destroy($id)
    {
        if (auth()->user()->cannot('Delete Article')) {
            return $this->unAuthorized();
        }

        $article = Article::find($id);
        if (!$article) {
            return $this->dataNotFound($this->module);
        }

        $article->setUpdatedBy(Auth::user());
        $article->save();

        return $article->delete() ? $this->destroyTrue($this->module) : $this->destroyFalse($this->module);
    }
}
