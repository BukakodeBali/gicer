<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    use ImageUploadTrait;
    protected $dimensions = [400, 600, 800];

    public function store(ArticleStoreRequest $request)
    {
        $article = Article::make($request->only([
            'title',
            'content'
        ]));

        $article->setCreatedBy(Auth::user());
        $article->setUpdatedBy(Auth::user());
        $categories = $request->categories ?? [];
        $tags = $request->getTags() ?? [];

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
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return $this->storeFalse('artikel');
        }
    }
}
