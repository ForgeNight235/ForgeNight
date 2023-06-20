<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function home(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $collections = Collection::all();
        $newProducts = Product::query()
            ->where('is_published', '=', true)
            ->orderBy('created_at', 'desc')
            // Сортировка по дате создания (последние добавленные)
        ->limit(20) // Ограничение количества записей до 20
        ->get();


        return view('pages.home', compact('newProducts', 'collections'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function preCatalog(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('pages.pre-catalog');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|View|Factory|Application
     */
    public function catalog(Request $request): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $collections = Collection::all();

        $products = Product::query()->where('is_published', '=', true);

        $collection = null;
        if ($request->has('collection')) {
            $collectionId = $request->get('collection');
            $collection = Collection::findOrFail($collectionId);

            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        if ($request->has('searchRequest')) {
            $searchKeyword = $request->get('searchRequest');
            $products = $products->where('name', 'like', "%{$searchKeyword}%");
        }

        $bestSellingProducts = Product::query()
            ->join('order_products', 'products.id', '=', 'order_products.product_id')
            ->select('products.*', DB::raw('SUM(order_products.quantity) as total_quantity'))
            ->where('products.is_published', true)
            ->having('quantity', '>', 0)
            ->groupBy('products.id')
            ->orderByDesc('total_quantity')
            ->limit(20)
            ->get();

        $products = $products->paginate(9)->withQueryString();

        return view('pages.catalog', compact('collections', 'products', 'collection', 'bestSellingProducts'));
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function register(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('pages.auth.register');
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function login(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('pages.auth.login');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function cart()
    {
        $bestSellingProducts = Product::query()->join('order_products', 'products.id', '=', 'order_products.product_id')->select('products.*', DB::raw('SUM(order_products.quantity) as total_quantity'))->groupBy('products.id')->orderByDesc('total_quantity')->limit(20)->get();

        return \view('page.cart', compact('bestSellingProducts'));
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function personalOrder(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return \view('pages.personalOrder');
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function faq(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return \view('pages.faq');
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function contacts(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return \view('pages.contacts');
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function payment(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return \view('pages.payment');
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function delivery(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return \view('pages.delivery');
    }
}
