<?php

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

    Route::get('login/{social}', ["as" => "social.login", "uses" => 'Auth\AuthController@redirectToProvider']);
    Route::get('login/{social}/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('/', ["as" => "index", "uses" => "Frontend\IndexController@index"]);
    Route::get('/category/{id}', ['as' => "category", 'uses' => 'Frontend\IndexController@showProductByCategory']);
    Route::post('/auth/login', ['as' => 'authLogin', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('/auth/logout', ['as' => 'authLogout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::get('/auth/login', ['as' => 'authLogin', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('/product/vote', ['as' => 'product.vote', 'uses' => 'Frontend\IndexController@postVote']);
    Route::get('/search', ['as' => 'search.product', 'uses' => 'Frontend\IndexController@search']);

    Route::get('/productCompare', ['as' => 'productCompare.index', 'uses' => 'Frontend\CompareListController@index']);
    Route::delete('/productCompare/{productCompare}', ['as' => 'productCompare.destroy', 'uses' => 'Frontend\CompareListController@destroy']);
    Route::match(['put', 'patch'], '/productCompare/{productCompare}', ['as' => 'productCompare.update', 'uses' => 'Frontend\CompareListController@update']);

    Route::get('/wishlist', ['as' => 'wishlist.index', 'uses' => 'Frontend\WishListController@index']);
    Route::post('/wishlist', ['as' => 'wishlist.store', 'uses' => 'Frontend\WishListController@store']);
    Route::delete('/wishlist/{wishlist}', ['as' => 'wishlist.destroy', 'uses' => 'Frontend\WishListController@destroy']);

    Route::get('/product', ['as' => 'product.index', 'uses' => 'Frontend\IndexController@index']);
    Route::get('/product/{product}', ['as' => 'product.show', 'uses' => 'Frontend\IndexController@show']);

    Route::get('/cart', ['as' => 'cart.index', 'uses' => 'Frontend\CartController@index']);
    Route::post('/cart', ['as' => 'cart.store', 'uses' => 'Frontend\CartController@store']);
    Route::delete('/cart/{cart}', ['as' => 'cart.destroy', 'uses' => 'Frontend\CartController@destroy']);
    Route::match(['put', 'patch'], '/cart/{cart}', ['as' => 'cart.update', 'uses' => 'Frontend\CartController@update']);

    Route::get('/checkout', ['as' => 'cart.checkout', 'uses' => 'Frontend\CartController@getCheckout']);
    Route::get('/contact', ['as' => 'contact', 'uses' => 'Frontend\IndexController@getContact']);
    Route::post('/contact', ['as' => 'contact', 'uses' => 'Frontend\IndexController@postContact']);
    Route::post('/checkout', ['as' => 'cart.checkout', 'uses' => 'Frontend\CartController@postCheckout']);
    route::group(["prefix" => "myaccount"], function () {
        Route::match(['put', 'patch'], '/{id}/EditPassword', ['as' => 'myaccount.edit.password', 'uses' => 'Frontend\MyAccountController@update_password']);
        Route::get('/{id}/EditPassword', ['as' => 'myaccount.edit.password', 'uses' => 'Frontend\MyAccountController@edit_password']);
        Route::get('/', ['as' => 'myaccount.index', 'uses' => 'Frontend\MyAccountController@index']);
        Route::post('/', ['as' => 'myaccount.store', 'uses' => 'Frontend\MyAccountController@store']);
        Route::get('/create', ['as' => 'myaccount.create', 'uses' => 'Frontend\MyAccountController@create']);
        Route::get('/{myaccount}/edit', ['as' => 'myaccount.edit', 'uses' => 'Frontend\MyAccountController@edit']);
        Route::get('/order', ['as' => 'myaccount.old.orders', 'uses' => 'Frontend\MyAccountController@old_orders']);
        Route::get('/order/{order}', ['as' => 'myaccount.order.show', 'uses' => 'Frontend\MyAccountController@show_order']);
        Route::match(['put', 'patch'], '/{myaccount}', ['as' => 'myaccount.update', 'uses' => 'Frontend\MyAccountController@update']);
        // Password reset link request routes...
        Route::get('password/email', ['as' => 'myaccount.password.email', 'uses' => 'Frontend\MyAccountController@getEmail']);
        Route::post('password/email', ['as' => 'myaccount.password.email', 'uses' => 'Frontend\MyAccountController@postEmail']);
        // Password reset routes...
        Route::get('password/reset/{token}', ['as' => 'myaccount.password.reset', 'uses' => 'Frontend\MyAccountController@getReset']);
        Route::post('password/reset', ['as' => 'myaccount.password.reset', 'uses' => 'Frontend\MyAccountController@postReset']);
    });
});

Route::group(["prefix" => "admin", "namespace" => "Admin", "middleware" => "auth"], function () {

    Route::get('/', ['as' => 'adminIndex', 'uses' => 'ProductController@index']);
    Route::get('/category/{id?}', [
        'as' => 'admin.category-management',
        'uses' => 'CategoryController@index'
    ]);
    Route::post('/category/add', [
        'as' => 'admin.category-management.add',
        'uses' => 'CategoryController@store'
    ]);
    Route::post('/category/delete/{id}', [
        'as' => 'admin.category-management.delete',
        'uses' => 'CategoryController@destroy'
    ]);
    //Route::resource("categories", "CategoryController");
    Route::resource("products", "ProductController");
    Route::post('/product/excel', ['as' => 'product.import.excel', 'uses' => 'ProductController@importProductFromExcelFile']);

    Route::get('/vote', ['as' => 'admin.vote.index', 'uses' => 'VoteController@index']);
    Route::delete('/vote/{vote}', ['as' => 'admin.vote.destroy', 'uses' => 'VoteController@destroy']);

    Route::get('/order', ['as' => 'admin.order.index', 'uses' => 'OrderController@index']);
    Route::get('/order/{order}/edit', ['as' => 'admin.order.edit', 'uses' => 'OrderController@edit']);
    Route::post('/order', ['as' => 'admin.order.store', 'uses' => 'OrderController@store']);
    Route::delete('/order/{order}', ['as' => 'admin.order.destroy', 'uses' => 'OrderController@destroy']);
    Route::get('/order/create', ['as' => 'admin.order.create', 'uses' => 'OrderController@create']);
    Route::get('/order/{order}', ['as' => 'admin.order.show', 'uses' => 'OrderController@show']);
    Route::match(['put', 'patch'], '/order/{order}', ['as' => 'admin.order.update', 'uses' => 'OrderController@update']);

    Route::get('/customer', ['as' => 'admin.customer.index', 'uses' => 'CustomerController@index']);
    Route::get('/customer/{customer}/edit', ['as' => 'admin.customer.edit', 'uses' => 'CustomerController@edit']);
    Route::post('/customer', ['as' => 'admin.customer.store', 'uses' => 'CustomerController@store']);
    Route::delete('/customer/{customer}', ['as' => 'admin.customer.destroy', 'uses' => 'CustomerController@destroy']);
    Route::get('/customer/create', ['as' => 'admin.customer.create', 'uses' => 'CustomerController@create']);
    Route::match(['put', 'patch'], '/customer/{customer}', ['as' => 'admin.customer.update', 'uses' => 'CustomerController@update']);

    Route::get('/user', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
    Route::get('/user/{user}/edit', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
    Route::post('/user/store', ['as' => 'admin.user.store', 'uses' => 'UserController@store']);
    Route::delete('/user/{user}', ['as' => 'admin.user.destroy', 'uses' => 'UserController@destroy']);
    Route::get('/user/create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);
    Route::match(['put', 'patch'], '/user/{user}', ['as' => 'admin.user.update', 'uses' => 'UserController@update']);
    Route::get('product/search', ['as' => 'admin.product.search', 'uses' => 'ProductController@searchProduct']);
});
/*
|--------------------------------------------------------------------------
| Login/ Logout/ Password
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*
|--------------------------------------------------------------------------
| Registration & Activation
|--------------------------------------------------------------------------
*/
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('activate/token/{token}', 'Auth\ActivateController@activate');
Route::group(['middleware' => ['auth']], function () {
    Route::get('activate', 'Auth\ActivateController@showActivate');
    Route::get('activate/send-token', 'Auth\ActivateController@sendToken');
});