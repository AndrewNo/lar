<?php

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', 'AdminController@index')->middleware('auth');
    Route::put('update/{id}', 'AdminController@update')->middleware('auth');

    Route::get('login', 'AdminController@getLogin');
    Route::post('login', 'AdminController@postLogin');
    Route::post('logout', 'AdminController@postLogout');

    Route::get('blog', 'BlogController@blogShow')->middleware('auth');
    Route::get('post-add', 'BlogController@postAdd')->middleware('auth');
    Route::post('post-store', 'BlogController@postStore')->middleware('auth');
    Route::get('post-edit/{id}', 'BlogController@postEdit')->middleware('auth');
    Route::put('post-update/{id}', 'BlogController@postUpdate')->middleware('auth');
    Route::delete('post-delete/{id}', 'BlogController@postDelete')->middleware('auth');
    Route::get('post/drafts', 'BlogController@postDrafts')->middleware('auth');

    Route::get('categories', 'CategoryController@catShow')->middleware('auth');
    Route::get('category-add', 'CategoryController@catAdd')->middleware('auth');
    Route::post('category-store', 'CategoryController@catStore')->middleware('auth');
    Route::get('category-edit/{id}', 'CategoryController@catEdit')->middleware('auth');
    Route::put('category-update/{id}', 'CategoryController@catUpdate')->middleware('auth');
    Route::delete('category-delete/{id}', 'CategoryController@catDelete')->middleware('auth');

    Route::get('shop', 'ProductController@prodShow')->middleware('auth');
    Route::get('product-add', 'ProductController@prodAdd')->middleware('auth');
    Route::post('product-store', 'ProductController@prodStore')->middleware('auth');
    Route::get('product-edit/{id}', 'ProductController@prodEdit')->middleware('auth');
    Route::put('product-update/{id}', 'ProductController@prodUpdate')->middleware('auth');
    Route::delete('product-delete/{id}', 'ProductController@prodDelete')->middleware('auth');
    Route::get('product/store', 'ProductController@prodInStore');

    Route::get('gallery', 'GalleryController@galShow')->middleware('auth');
    Route::get('image-add', 'GalleryController@galAdd')->middleware('auth');
    Route::post('image-store', 'GalleryController@galStore')->middleware('auth');
    Route::delete('image-delete/{id}', 'GalleryController@galDelete')->middleware('auth');

    Route::get('orders', 'OrderController@orderShow')->middleware('auth');
    Route::put('order-done/{id}', 'OrderController@orderDone')->middleware('auth');
    Route::get('order/arch', 'OrderController@archiveShow')->middleware('auth');

    Route::get('contacts', 'ContactController@contactShow')->middleware('auth');

    Route::delete('img-delete/{id}', 'FileController@deleteImg')->middleware('auth');

    Route::get('settings', 'AdminController@showSettings')->middleware('auth');
    Route::put('settings-update/{id}', 'AdminController@updateSettings')->middleware('auth');

});

Route::get('/', 'PageController@index');

Route::get('blog', 'BlogController@indexShow');
Route::get('blog/{id}', 'BlogController@indexPostShow');

Route::get('about', 'PageController@about');

Route::get('contacts', 'ContactController@indexShow');
Route::post('contact/store', 'ContactController@indexContactStore');

Route::get('shop', 'ProductController@indexShow');
Route::get('shop/category/{alias}', 'ProductController@byCategoryShow');
Route::get('shop/{id}', 'ProductController@indexProductShow');
Route::post('shop/order-store', 'OrderController@indexOrderStore');

Route::get('gallery', 'GalleryController@indexShow');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
