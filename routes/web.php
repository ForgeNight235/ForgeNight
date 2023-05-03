<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['controller' => \App\Http\Controllers\IndexController::class,
    'as' => 'page.'],
function () {
    Route::get('/', 'home')->name('home');
    Route::get('/pre-catalog', 'preCatalog')->name('pre-catalog');
    Route::get('/catalog', 'catalog')->name('catalog');
    Route::get('/single', 'single')->name('single');
    Route::get('/register', 'register')->name('register');
    Route::get('/login', 'login')->name('login');
});

//Контроллеры для авторизации, регистрации и выхода из аккаунта
Route::group(['controller' => \App\Http\Controllers\AuthController::class,
    'as' => 'auth.',
    'prefix' => '/auth'
    ], function () {
    Route::post('/create', 'createUser')->name('createUser');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::get('/logoutUser', 'logoutUser')->name('logoutUser');
});
