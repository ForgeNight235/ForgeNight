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
    Route::get('/password', 'accountPassword')->name('accountPassword');
    Route::get('/orders', 'accountOrders')->name('accountOrders');
    Route::get('/orderSuccessCreated', 'orderSuccessCreated')->name('orderSuccessCreated');


    Route::group([
        'controller' => IndexController::class,
    ], function () {
        Route::get('/catalog', 'catalog')->name('catalog');
    });

    Route::group([
        'controller' => AuthController::class
    ], function () {
        Route::post('/update', 'updateUser')->name('updateUser');
        Route::post('/updateAddress', 'updateUserAddress')->name('updateUserAddress');
        Route::post('/updatePassword', 'updatePassword')->name('updatePassword');
    });

});

//Route::post('/orders/{orderId}/update', 'OrderController@update')->name('orders.update');
//Route::post('/orders/{orderId}/update', 'OrderController@update')->name('update');

//Всё для админ панели
Route::group([
    'controller' => AdminController::class,
    'as' => 'admin.',
    'middleware' => ['auth', AdminMiddleware::class],

], function () {
    Route::get('/adminPanel', 'index')->name('index');
    Route::get('/addProduct', 'create')->name('createProduct');
    Route::get('/showAllProducts', 'showAllProducts')->name('showAllProducts');
    Route::get('/edit/{product:name}', 'updateProduct')->name('updateProduct');
    Route::get('/collection', 'collectionPage')->name('collectionPage');
    Route::get('/allOrders', 'allOrders')->name('allOrders');
    Route::delete('/delete/{product:name}', 'deleteProduct')->name('deleteProduct');
    Route::get('/test', 'showReplaceProductForm')->name('showReplaceProductForm');

    Route::group([
        'controller' => \App\Http\Controllers\Api\OrderController::class,
        'as' => 'order.',
        'prefix' => '/orders',
    ], function () {
        Route::post('/{orderId}/updateQuantity', 'updateProductQuantity')->name('updateProductQuantity');
        Route::post('/updateOrderStatus/{orderId}', 'updateOrderStatus')->name('updateOrderStatus');
        Route::post('/order/{orderId}/product/{productId}/delete', 'deleteOrderProduct')->name('deleteOrderProduct');
        Route::post('/order/{orderId}/product/{productId}/replace', 'showReplaceProductForm')->name('showReplaceProductForm');
        Route::post('/replaceProduct/{orderId}/{productId}', 'replaceProduct')->name('replaceProduct');

    });

    Route::group([
        'controller' => \App\Http\Controllers\CollectionController::class,
        'as' => 'collection.',
        'prefix' => '/collection'
    ], function () {
        Route::post('/collection', 'store')->name('store');
        Route::put('/update/{collection}', 'update')->name('update');
        Route::delete('/delete/{collection}', 'destroy')->name('destroy');

    });

    Route::group([
        'controller' => \App\Http\Controllers\ProductController::class,
        'as' => 'product.',
        'prefix' => '/product'
    ], function ()
    {
        Route::post('/create', 'createProduct')->name('createProduct');
        Route::post('/update/{product:id}', 'updateProduct')->name('updateProduct');
    });
});

Route::group([
    'controller' => \App\Http\Controllers\ProductController::class,
    'as' => 'product.',
    'prefix' => '/product'
], function () {

    Route::get('/{id}/addToCart', 'addToCart')->name('addToCart')
        ->where('id', '[0-9]*');
    Route::post('/{id}/addToCart', 'addToCart')->name('addToCart');
    Route::get('/{id}/addToCartCatalog', 'addToCartCatalog')->name('addToCartCatalog');

//    Route::get('/{product:id}', 'show')->name('show')->where('id', '[0-9]*');
//    Выводим в адр. строке имя продукта, а не id
    Route::get('/{product:name}', 'show')->name('show');
});

Route::group([
    'controller' => \App\Http\Controllers\CartController::class,
    'as' => 'cart.',
    'prefix' => '/cart'
], function () {
    Route::get('/', 'show')->name('show');
    Route::get('/{product:id}/remove', 'remove')->name('remove');
    Route::post('/updateQuantity/{id}', 'updateProductQuantity')->name('updateProductQuantity');
    Route::get('/deleteAll', 'clear')->name('clear');

    Route::post('/cart/update-quantity', 'updateQuantity')->name('updateQuantity');
    Route::post('/cart/update-quantity', 'updateQuantityCartPage')->name('updateQuantityCartPage');


    Route::group([
        'controller' => \App\Http\Controllers\ProductController::class,
        'as' => 'product.',
        'prefix' => '/product'
    ], function () {
        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]*');
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
});
