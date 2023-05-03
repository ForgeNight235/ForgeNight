<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function catalog()
    {
        return view('pages.catalog');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function single()
    {
        return view('pages.single');
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
}
