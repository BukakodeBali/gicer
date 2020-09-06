<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResources;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $perPage = $request->per_page;

        $products = Product::when($keyword <> '', function ($q) use ($keyword) {
            $q->where('code', 'like', "%{$keyword}%")
                ->orWhere('number', 'like', "%{$keyword}%")
                ->orWhere('name', 'like', "%{$keyword}%");
        })->orderBy('id', 'desc');

        $products = $perPage == 'all' ? $products->get() : $products->paginate($perPage);

        return ProductResources::collection($products);
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();

        $product = Product::create($data);

        return $product ? $this->storeTrue('produk') : $this->storeFalse('produk');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if ($product) {
            return new ProductResources($product);
        }

        return $this->dataNotFound('produk');
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $data = $request->all();
            return $product->update($data) ? $this->updateTrue('produk') : $this->updateFalse('produk');
        }

        return $this->dataNotFound('produk');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            return $product->delete() ? $this->destroyTrue('produk') : $this->destroyFalse('produk');
        }

        return $this->dataNotFound('produk');
    }
}
