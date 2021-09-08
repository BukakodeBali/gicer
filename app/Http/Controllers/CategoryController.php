<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryResources;
use App\Http\Resources\CategoryWithSubCategoryResources;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    use ImageUploadTrait;
    protected $dimensions = [100, 200, 500];
    protected $module = 'kategori';

    /**
     * Display a listing of the resource.
     * @param Request $request
     */
    public function index(Request $request)
    {
        if (auth()->user()->cannot('show categories')) {
            return $this->unAuthorized();
        }

        $keyword = $request->keyword ?? '';
        $perPage = $request->per_page ?? 10;

        $categories = Category::query()
            ->with('parent')
            ->when($keyword <> '', function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            })
            ->orderByDesc('id');
        $categories = $perPage === 'all' ? $categories->get() : $categories->paginate($perPage);
        return CategoryResources::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryStoreRequest $request
     * @return JsonResponse
     */
    public function store(CategoryStoreRequest $request):JsonResponse
    {
        return DB::transaction( function ()  use ($request) {
            try {
                $user = auth()->user();
                $category = Category::make($request->only(['name', 'description']));
                $category->setCreatedBy($user);
                $category->setUpdatedBy($user);
                transform($request->getParent(), fn(Category $parent) => $category->parent()->associate($parent));
                $category->save();

                //META & LINK
                $category->link()->create([
                    'link' => $request->getCategoryLink(),
                    'meta_description' => $request->getMetaDescription()
                ]);

                if ($request->hasFile('image')) {
                    $categoryImage  = $request->image;
                    $categoryImage = $this->doUploadImage('categories', $categoryImage, $this->dimensions);
                    $category->image()->create([
                        'path' => 'categories',
                        'name' => $categoryImage
                    ]);
                }

                return $this->storeTrue($this->module);
            } catch (\Throwable $e) {
                Log::critical($e->getMessage());
                return $this->storeFalse($this->module);
            }
        });
    }

    public function edit($id)
    {
        if (auth()->user()->cannot('edit category')) {
            return $this->unAuthorized();
        }

        $category = Category::find($id);
        if (!$category) {
            return $this->dataNotFound($this->module);
        }

        return new CategoryResources($category->load('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(CategoryUpdateRequest $request, $id):JsonResponse
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->dataNotFound($this->module);
        }

        return DB::transaction( function () use ($request, $category) {
            try {
                $category->fill($request->only(['name', 'description']));
                $category->setUpdatedBy(Auth::user());
                transform(
                    $request->getParent(),
                    fn(Category $parent) => $category->parent()->associate($parent),
                    $category->parent_id = 0);

                $link = [
                    'link' => $request->getCategoryLink(),
                    'meta_description' => $request->getMetaDescription()
                ];

                if ($category->link) {
                    $category->link()->update($link);
                } else {
                    $category->link()->create($link);
                }

                if ($request->hasFile('image')) {
                    $categoryImage  = $request->image;
                    $categoryImage = $this->doUploadImage('categories', $categoryImage, $this->dimensions);
                    $updatedData = [
                        'path' => 'categories',
                        'name' => $categoryImage
                    ];

                    if ($category->image) {
                        $category->image()->update($updatedData);
                    } else {
                        $category->image()->create($updatedData);
                    }
                }

                $category->save();
                return $this->updateTrue($this->module);
            } catch (\Throwable $e) {
                Log::critical($e->getMessage());
                return $this->updateFalse($this->module);
            }
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id):JsonResponse
    {
        if (auth()->user()->cannot('delete category')) {
            return $this->unAuthorized();
        }

        $category = Category::find($id);
        if (!$category) {
            return $this->dataNotFound($this->module);
        }

        $category->setUpdatedBy(Auth::user());
        $category->save();

        return $category->delete() ? $this->destroyTrue($this->module) : $this->destroyFalse($this->module);
    }

    public function list(Request $request)
    {
        if (auth()->user()->cannot('list category')) {
            return $this->unauthorized();
        }

        $parent = $request->has('parent') ? $request->parent : 1;
        $categories = Category::query()
            ->when($parent, function ($q) {
                $q->where('parent_id', '=', 0);
            })
            ->select('id', 'name')->orderByDesc('id')
            ->get();
        return response()->json($categories, 200);
    }

    public function listWithSubcategory()
    {
        $categories = Category::with('subcategory')->where('parent_id', '=', 0)->get();
        return CategoryWithSubCategoryResources::collection($categories);
    }
}
