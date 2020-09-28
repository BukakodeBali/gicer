<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResources;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index(Request $request)
    {
        if ($this->user->can('show products')):
            $keyword = $request->keyword;
            $perPage = $request->per_page;

            $products = Product::when($keyword <> '', function ($q) use ($keyword) {
                $q->where('code', 'like', "%{$keyword}%")
                    ->orWhere('number', 'like', "%{$keyword}%")
                    ->orWhere('name', 'like', "%{$keyword}%");
            })->orderBy('id', 'desc');

            $products = $perPage == 'all' ? $products->get() : $products->paginate($perPage);

            return ProductResources::collection($products);
        else:
            return $this->unAuthorized();
        endif;
    }

    public function store(ProductStoreRequest $request)
    {
        if ($this->user->can('create product')):
            $data = $request->all();

            $product = Product::create($data);

            return $product ? $this->storeTrue('produk') : $this->storeFalse('produk');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function edit($id)
    {
        if ($this->user->can('edit product')):
            $product = Product::find($id);

            if ($product) {
                return new ProductResources($product);
            }

            return $this->dataNotFound('produk');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        if ($this->user->can('update product')):
            $product = Product::find($id);

            if ($product) {
                $data = $request->all();
                return $product->update($data) ? $this->updateTrue('produk') : $this->updateFalse('produk');
            }

            return $this->dataNotFound('produk');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function destroy($id)
    {
        if ($this->user->can('delete product')):
            $product = Product::find($id);

            if ($product) {
                return $product->delete() ? $this->destroyTrue('produk') : $this->destroyFalse('produk');
            }

            return $this->dataNotFound('produk');
        else:
            return $this->unAuthorized();
        endif;
    }
}
