<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function index(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.admin');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function create(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $collections = Collection::all();

        return view('admin.product.create', compact('collections'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showAllProducts(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
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
    public function updateProduct(Product $product): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $collectionId = $product->collection_id;

        $collections = Collection::all();

        return \view('admin.product.update', compact('product', 'collections', 'collectionId'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function deleteProduct(Request $request, $id): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::where('id', $id)->firstOrFail();

        $product->delete();

        $products = Product::query();

        $products = $products->paginate(9)->withQueryString();

        return \view('admin.product.showAllProducts', compact('products'))->with('success', 'Продукт успешно удален');
    }


    /**
     * @param Request $request
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function collectionPage(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $collection = Collection::paginate(10);

        return \view('admin.collection', compact('collection'));
    }

    /**
     * @param Request $request
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function allOrders(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Order::paginate(10);

        return \view('admin.order.showAllOrders', compact('orders'));
    }
}
