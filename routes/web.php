<?php

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

    Route::get('login/{social}', ["as" => "social.login", "uses" => 'Auth\AuthController@redirectToProvider']);
    Route::get('login/{social}/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('/about-us', ['as' => 'aboutUs', 'uses' => 'Frontend\AboutUsController@index']);
    Route::get('/instructions', ['as' => 'instructions', 'uses' => 'Frontend\InstructionsController@index']);

    Route::post('customer/login', ["as" => "customer.postLogin", "uses" => "Frontend\CustomerLoginController@postCustomerLogin"]);
    Route::get('customer/logout', ["as" => "customer.logout", "uses" => "Frontend\CustomerLoginController@logout"]);

    Route::get('/', ["as" => "index", "uses" => "Frontend\IndexController@index"]);
    Route::get('/category/{id}', ['as' => "category", 'uses' => 'Frontend\IndexController@showProductByCategory']);
    Route::post('/product/vote', ['as' => 'product.vote', 'uses' => 'Frontend\IndexController@postVote']);
    Route::get('/search', ['as' => 'search.product', 'uses' => 'Frontend\IndexController@search']);

    Route::get('/productCompare', ['as' => 'productCompare.index', 'uses' => 'Frontend\CompareListController@index']);
    Route::delete('/productCompare/{productCompare}', ['as' => 'productCompare.destroy', 'uses' => 'Frontend\CompareListController@destroy']);
    Route::match(['put', 'patch'], '/productCompare/{productCompare}', ['as' => 'productCompare.update', 'uses' => 'Frontend\CompareListController@update']);

    Route::get('/wishlist', ['as' => 'wishlist.index', 'uses' => 'Frontend\WishListController@index']);
    Route::post('/wishlist', ['as' => 'wishlist.store', 'uses' => 'Frontend\WishListController@store']);
    Route::delete('/wishlist/{wishlist}', ['as' => 'wishlist.destroy', 'uses' => 'Frontend\WishListController@destroy']);

    Route::get('/product', ['as' => 'product.index', 'uses' => 'Frontend\IndexController@index']);
    Route::get('/product-list/{category?}', ['as' => 'product.list', 'uses' => 'Frontend\IndexController@getProductList']);
    Route::get('/product/{product}', ['as' => 'product.show', 'uses' => 'Frontend\IndexController@show']);

    Route::get('/post', ['as' => 'post.index', 'uses' => 'Frontend\PostController@index']);
    Route::get('/post-list/{category?}', ['as' => 'post.list', 'uses' => 'Frontend\PostController@getList']);
    Route::get('/post/{id}', ['as' => 'post.show', 'uses' => 'Frontend\PostController@show']);

    Route::get('/cart', ['as' => 'cart.index', 'uses' => 'Frontend\CartController@index']);
    Route::post('/cart', ['as' => 'cart.store', 'uses' => 'Frontend\CartController@store']);
    Route::get('/cart_destroy/{cart}', ['as' => 'cart.destroy', 'uses' => 'Frontend\CartController@destroy']);
    Route::post('/cart_update', ['as' => 'cart.update', 'uses' => 'Frontend\CartController@update']);

    Route::get('/checkout', ['as' => 'cart.checkout', 'uses' => 'Frontend\CartController@getCheckout']);
    Route::get('/contact', ['as' => 'contact', 'uses' => 'Frontend\IndexController@getContact']);
    Route::post('/contact', ['as' => 'contact', 'uses' => 'Frontend\IndexController@postContact']);
    Route::post('/checkout', ['as' => 'cart.checkout', 'uses' => 'Frontend\CartController@postCheckout']);
    route::group(["prefix" => "my-account"], function () {
        Route::match(['put', 'patch'], '/{id}/EditPassword', ['as' => 'myaccount.edit.password', 'uses' => 'Frontend\MyAccountController@update_password']);
        Route::get('/{id}/EditPassword', ['as' => 'myaccount.edit.password', 'uses' => 'Frontend\MyAccountController@edit_password']);
        Route::get('/', ['as' => 'myaccount.index', 'uses' => 'Frontend\MyAccountController@index']);
        Route::post('/', ['as' => 'myaccount.store', 'uses' => 'Frontend\MyAccountController@store']);
        Route::get('/create', ['as' => 'myaccount.create', 'uses' => 'Frontend\MyAccountController@create']);
        Route::get('edit/{myaccount?}', ['as' => 'myaccount.edit', 'uses' => 'Frontend\MyAccountController@edit']);
        Route::get('/order', ['as' => 'myaccount.old.orders', 'uses' => 'Frontend\MyAccountController@old_orders']);
        Route::get('/order/{order}', ['as' => 'myaccount.order.show', 'uses' => 'Frontend\MyAccountController@show_order']);
        Route::post('/update', ['as' => 'myaccount.update', 'uses' => 'Frontend\MyAccountController@update']);
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

    Route::post('/category/update/{id}', [
        'as' => 'admin.category-management.update',
        'uses' => 'CategoryController@update'
    ]);

    Route::post('/category/add', [
        'as' => 'admin.category-management.add',
        'uses' => 'CategoryController@store'
    ]);
    Route::post('/category/delete/{id}', [
        'as' => 'admin.category-management.delete',
        'uses' => 'CategoryController@destroy'
    ]);

    Route::get('/post-category/{id?}', [
        'as' => 'admin.post-category-management',
        'uses' => 'PostCategoryController@index'
    ]);

    Route::post('//post-category/update/{id}', [
        'as' => 'admin.post-category-management.update',
        'uses' => 'PostCategoryController@update'
    ]);

    Route::post('//post-category/add', [
        'as' => 'admin.post-category-management.add',
        'uses' => 'PostCategoryController@store'
    ]);
    Route::post('//post-category/delete/{id}', [
        'as' => 'admin.post-category-management.delete',
        'uses' => 'PostCategoryController@destroy'
    ]);

    Route::get('/posts/{id?}', [
        'as' => 'admin.post-management',
        'uses' => 'PostController@index'
    ]);

    Route::post('/posts/update/{id}', [
        'as' => 'admin.posts-management.update',
        'uses' => 'PostController@update'
    ]);

    Route::post('/posts/add', [
        'as' => 'admin.posts-management.add',
        'uses' => 'PostController@store'
    ]);
    Route::post('/posts/delete/{id}', [
        'as' => 'admin.posts-management.delete',
        'uses' => 'PostController@destroy'
    ]);

    Route::get('/', ['as' => 'adminIndex', 'uses' => 'ProductColorController@index']);
    Route::get('/product/color/{id?}', [
        'as' => 'admin.product.color-management',
        'uses' => 'ProductColorController@index'
    ]);

    Route::post('/product/color/update/{id}', [
        'as' => 'admin.product.color.update',
        'uses' => 'ProductColorController@update'
    ]);

    Route::post('/product/color/add', [
        'as' => 'admin.product.color.add',
        'uses' => 'ProductColorController@store'
    ]);
    Route::post('/product/color/delete/{id}', [
        'as' => 'admin.product.color.delete',
        'uses' => 'ProductColorController@destroy'
    ]);

    Route::get('/', ['as' => 'adminIndex', 'uses' => 'ProductSizeController@index']);
    Route::get('/product/size/{id?}', [
        'as' => 'admin.product.size-management',
        'uses' => 'ProductSizeController@index'
    ]);

    Route::post('/product/size/update/{id}', [
        'as' => 'admin.product.size.update',
        'uses' => 'ProductSizeController@update'
    ]);

    Route::post('/product/size/add', [
        'as' => 'admin.product.size.add',
        'uses' => 'ProductSizeController@store'
    ]);
    Route::post('/product/size/delete/{id}', [
        'as' => 'admin.product.size.delete',
        'uses' => 'ProductSizeController@destroy'
    ]);

    Route::get('/configuration/{id?}', [
        'as' => 'admin.configuration-management',
        'uses' => 'ConfigurationController@index'
    ]);

    Route::post('/configuration/update/{id}', [
        'as' => 'admin.configuration-management.update',
        'uses' => 'ConfigurationController@update'
    ]);

    Route::post('/configuration/add', [
        'as' => 'admin.configuration-management.add',
        'uses' => 'ConfigurationController@store'
    ]);
    Route::post('/configuration/delete/{id}', [
        'as' => 'admin.configuration-management.delete',
        'uses' => 'ConfigurationController@destroy'
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