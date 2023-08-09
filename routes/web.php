<?php

Route::get('/', 'ShopController@index');
Route::get('/search', 'ShopController@search')->name('shop.search');

Route::get('/category/{slug}', 'ShopController@category')->name('shop.category');

Route::get('/product/{slug}', 'ShopController@product')->name('shop.product');
Route::get('/listProduct', 'ShopController@listProduct');

Route::get('/contact', 'ShopController@contact')->name('shop.contact');

Route::post('/sendContact', 'ShopController@postContact')->name('shop.postContact');

Route::get('/order', 'ShopController@order');

// Danh sách tin tức
Route::get('/articles' , 'ShopController@articles')->name('shop.articles');

Route::get('/AddCart/{id}','ShopController@AddCart')->name('shop.AddCart');
Route::get('/DeleteItemCart/{id}','ShopController@DeleteItemCart')->name('shop.DeleteItemCart');
Route::get('/List-Carts','ShopController@ViewListCart')->name('shop.ViewListCart');
Route::get('/DeleteItemListCart/{id}','ShopController@DeleteItemListCart')->name('shop.DeleteItemListCart');

Route::get('/detailArticle/{slug}','ShopController@detailArticle')->name('shop.detailArticle');

Route::get('/admin','ShopController@admin');
// Đăng nhập
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');

// Đăng xuất
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

// ------------ QUẢN TRỊ ----------------
Route::group(['prefix' => 'admin','as' => 'admin.'
    , 'middleware' => 'checkLogin'
], function() {
    // Trang chủ - quản trị
    Route::get('/', 'AdminController@index');

    Route::resource('banner', 'BannerController');
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('article', 'ArticleController');
    Route::resource('brand', 'BrandController');
    Route::resource('contact', 'ContactController');
});

