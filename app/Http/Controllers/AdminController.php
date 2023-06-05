<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }

    public function create()
    {
        $collections = Collection::all();

        return view('admin.product.create', compact('collections'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showAllProducts(Request $request)
    {

        $collections = Collection::all();

        $products = Product::query();

        if ($request->has('adminSearchRequest')) {
            $adminSearchRequest = $request->get('adminSearchRequest');
            $products = $products->where('name', 'like', "%{$adminSearchRequest}%");
        }

        $products = $products->paginate(9)->withQueryString();

        return view('admin.product.showAllProducts', compact('products', 'collections'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function updateProduct(Product $product)
    {
        $collectionId = $product->collection_id;

        $collections = Collection::all();

        return \view('admin.product.update', compact('product', 'collections', 'collectionId'));
    }

    public function deleteProduct(Request $request, $id)
    {
        $product = Product::where('id', $id)->firstOrFail();

        $product->delete();

        $products = Product::query();

        $products = $products->paginate(9)->withQueryString();

        return \view('admin.product.showAllProducts', compact('products'))->with('success', 'Продукт успешно удален');
    }


}
