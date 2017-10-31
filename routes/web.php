<?php

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('track-order', 'PagesController@trackorder');
Route::get('contact-us', 'PagesController@contactus');

//Route::get('shipping/{id}', 'PagesController@shipping');
Route::get('shipping/{id}/{rowId}', 'ShippingController@singpost');

//Route::get('/', function () {
//    return redirect('shop');
//});

Route::get('checkout', 'CheckoutController@index');
Route::post('checkout', 'CheckoutController@store');

Route::get('purchase', 'PurchasesController@index');
Route::post('purchase', 'PurchasesController@store');

Route::get('eye-masks/collagen-eye-gold', function(){ 
    return Redirect::to('eye-masks/crystal-collagen-gold-eye', 301); 
});


Route::resource('shop', 'ProductController', ['only' => ['index', 'show']]);

Route::resource('face-masks', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('eye-masks', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('lip-masks', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('neck-masks', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('chest-masks', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('diet', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('cleanser', 'ProductController', ['only' => ['index', 'show']]);



Route::resource('cart', 'CartController');
Route::post('cart/shipping', 'CartController@shipping');
//Route::resource('cart', 'CartController@shippingReg');

Route::delete('emptyCart', 'CartController@emptyCart');
Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');

Route::resource('wishlist', 'WishlistController');
Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
Route::post('switchToCart/{id}', 'WishlistController@switchToCart');
