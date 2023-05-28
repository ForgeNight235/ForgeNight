<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function home(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('pages.home');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function preCatalog(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('pages.pre-catalog');
    }

    /**
     * All products in page
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function catalog(Request $request)
    {
        $collections = Collection::all();

        $products = Product::query()->where('is_published', '=', true);

        $collection = null;
        if ($request->has('collection')) {
            $collectionId = $request->get('collection');
            $collection = Collection::findOrFail($collectionId);

            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        $products = $products->paginate(5)->withQueryString();



        return view('pages.catalog', compact('collections', 'products', 'collection'));
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function register(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('pages.auth.register');
    }

    public function login(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('pages.auth.login');
    }

    public function cart()
    {
        return \view('pages.cart');
    }
}
