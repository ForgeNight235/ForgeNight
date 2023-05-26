<?php

namespace App\Http\Controllers;

use App\Models\Collection;
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
}
