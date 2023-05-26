<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
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

Route::group(['controller' => IndexController::class,
    'as' => 'page.'],
    function () {
        Route::get('/', 'home')->name('home');
        Route::get('/pre-catalog', 'preCatalog')->name('pre-catalog');
        Route::get('/catalog', 'catalog')->name('catalog');
        Route::get('/single', 'single')->name('single');
        Route::get('/register', 'register')->name('register');
        Route::get('/login', 'login')->name('login');
        Route::get('/cart', 'cart')->name('cart');
    });

//Контроллеры для авторизации, регистрации и выхода из аккаунта
Route::group(['controller' => AuthController::class,
    'as' => 'auth.',
    'prefix' => '/auth'
], function () {
    Route::post('/create', 'createUser')->name('createUser');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::get('/logoutUser', 'logoutUser')->name('logoutUser');
});

//Контроллер открытия страницы личного кабинета для авторизованного пользователя.
// Если пользователь не авторизован, то переходим на страницу авторизации
Route::group([
    'controller' => Authenticate::class,
    'middleware' => ['auth'],
    'as' => 'account.',
    'prefix' => 'account/'
], function () {
    Route::get('/account', 'account')->name('account');
    Route::get('/address', 'accountAddresses')->name('accountAddresses');
    Route::get('/orders', 'accountOrders')->name('accountOrders');

    Route::group([
        'controller' => AuthController::class
    ], function () {
        Route::post('/update', 'updateUser')->name('updateUser');
        Route::post('/updateAddress', 'updateUserAddress')->name('updateUserAddress');
    });

});

//Всё для админ панели
Route::group([
    'controller' => AdminController::class,
    'as' => 'admin.',
    'prefix' => '/admin',
    'middleware' => ['auth', AdminMiddleware::class],

], function () {
    Route::get('/adminPanel', 'index')->name('index');
    Route::get('/addProduct', 'create')->name('createProduct');

    Route::group([
        'controller' => \App\Http\Controllers\ProductController::class,
        'as' => 'product.'
    ], function ()
    {
        Route::post('/create', 'createProduct')->name('createProduct');
    });
});

Route::group([
    'controller' => \App\Http\Controllers\ProductController::class,
    'as' => 'product.',
    'prefix' => '/product'
], function () {

    Route::get('/{id}/addToCart', 'addToCart')->name('addToCart')
        ->where('id', '[0-9]*');

    Route::get('/{product:id}', 'show')->name('show')->where('id', '[0-9]*');
});

Route::group([
    'controller' => \App\Http\Controllers\CartController::class,
    'as' => 'cart.',
    'prefix' => '/cart'
], function () {
    Route::get('/', 'show')->name('show');
    Route::get('/{product:id}/remove', 'remove')->name('remove');
    Route::get('/deleteAll', 'clear')->name('clear');

    Route::group([
        'controller' => \App\Http\Controllers\ProductController::class,
        'as' => 'product.',
        'prefix' => '/product'
    ], function () {
        Route::get('/{product:id}', 'show')->name('show')->where('id', '[0-9]*');
    });

    Route::group([
        'controller' => IndexController::class,
        'as' => 'catalog.',
    ], function ()
    {
        Route::get('/catalog', 'catalog')->name('catalog');
    });

    Route::get('/ordering', 'orderIndex')->middleware('auth')->name('orderIndex');
    Route::get('/create', 'createOrder')->middleware('auth')->name('createOrder');
    Route::post('/create/ordering', 'store')->middleware('auth')->name('store');


    Route::group([
        'controller' => AuthController::class,
        'as' => 'checkout.'
    ], function (){
        Route::post('/updateAddresses', 'updateUserAddress')->name('updateUserAddress');
        Route::post('/updateContacts', 'updateUser')->name('updateUserContacts');
    });
//     app/Http/Middleware/Authenticate.php меняем тут путь
//    Route::get('/create', 'createOrder')->middleware('auth')->name('createOrder');
//    Route::post('/create/order', 'store')->middleware('auth')->name('store');

//    Route::get('/{product:id}/remove', 'remove')->name('remove');
});
