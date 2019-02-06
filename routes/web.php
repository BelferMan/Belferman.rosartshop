<?php

//PAGES
Route::get('/', 'PagesController@home');
//Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');
Route::get('/blog', 'PagesController@blog');

//SHOP
Route::prefix('/shop')->group(function () {
    Route::get('/clear-cart', 'ShopController@clearCart');
    Route::post('/order', 'ShopController@postOrder');
    Route::get('/checkout', 'ShopController@checkout');
    Route::get('/remove-item', 'ShopController@removeItem');
    Route::get('/add-to-shopping-cart', 'ShopController@addToShopingCart');
    Route::get('/shopping-cart', 'ShopController@shoppingCart');
    Route::get('/check-out', 'ShopController@checkOut');
    Route::get('/{curl}', 'ShopController@categories');

});

//LOGIN + REGISTER
Route::prefix('/user')->group(function () {
    Route::post('/sign-in', 'UserController@postSignIn');
    Route::post('/register', 'UserController@register');
    Route::get('/signout', 'UserController@signOut');

});

//CMS
Route::middleware(['cmsGuard'])->group(function () {
    Route::prefix('/cms')->group(function () {
        Route::get('/dashboard', 'CmsController@dashboard');
        Route::resource('about', 'AboutController');
        Route::resource('categories', 'CategoriesController');
        Route::resource('products', 'ProductsController');
        Route::resource('blog', 'BlogsController');
        Route::get('/orders', 'CmsController@orders');
    });
});