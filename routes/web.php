<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('home');

    Route::get('category', 'AdminController@category')->name('category');
    Route::get('categoryadd', 'AdminController@categoryadd')->name('categoryadd');
    Route::get('product', 'AdminController@product')->name('product');

    Route::get('productadd', 'AdminController@productadd')->name('productadd');
    Route::post('cataddpost', 'AdminController@cataddpost')->name('categoryadd.post');
    Route::post('proaddpost', 'AdminController@proaddpost')->name('productadd.post');

    Route::get('brand', 'AdminController@brand')->name('brand');
    Route::get('brandadd', 'AdminController@brandadd')->name('brandadd');
    Route::post('braaddpost', 'AdminController@braaddpost')->name('brandadd.post');
});

Route::get('/shopping-cart-add', function () {
    Cart::add(1, 'Macbook Pro', 2900, 1, array());

    foreach (Cart::getContent() as $product) {
        echo "Id: $product->id</br>";
        echo "Name: $product->name</br>";
        echo "Price $product->price</br>";
        echo "Quantity $product->quantity</br>";
    }
});

Route::get('/shopping-cart-update/{quantity}', function ($quantity) {
    Cart::add(1, 'Macbook Pro', 2900, 1, array());

    Cart::update(1, [
        'quantity' => $quantity
    ]);

    foreach (Cart::getContent() as $product) {
        echo "Id: $product->id</br>";
        echo "Name: $product->name</br>";
        echo "Price: $product->price</br>";
        echo "Quantity: $product->quantity</br>";
    }
});


Route::get('/', 'HomeController@index')->name('home');

Route::get('/test', 'CartController@iyzicoTest');
Route::get('/test2', 'CartController@iyzicoTest1');


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');
Route::get('/brands/{url}', 'HomeController@brands')->name('brands');
Route::get('/categories/{url}', 'HomeController@categories')->name('categories');

Auth::routes();
