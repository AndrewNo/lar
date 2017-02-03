<?php

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', 'AdminController@index');
    Route::put('update/{id}', 'AdminController@update');

    Route::get('login', 'AdminController@getLogin');
    Route::post('login', 'AdminController@postLogin');
    Route::post('logout', 'AdminController@postLogout');

    Route::get('blog', 'BlogController@blogShow');
    Route::get('post-add', 'BlogController@postAdd');
    Route::post('post-store', 'BlogController@postStore');
    Route::get('post-edit/{id}', 'BlogController@postEdit');
    Route::put('post-update/{id}', 'BlogController@postUpdate');
    Route::delete('post-delete/{id}', 'BlogController@postDelete');

    Route::get('categories', 'CategoryController@catShow');
    Route::get('category-add', 'CategoryController@catAdd');
    Route::post('category-store', 'CategoryController@catStore');
    Route::get('category-edit/{id}', 'CategoryController@catEdit');
    Route::put('category-update/{id}', 'CategoryController@catUpdate');
    Route::delete('category-delete/{id}', 'CategoryController@catDelete');

    Route::get('shop', 'ProductController@prodShow');
    Route::get('product-add', 'ProductController@prodAdd');
    Route::post('product-store', 'ProductController@prodStore');
    Route::get('product-edit/{id}', 'ProductController@prodEdit');
    Route::put('product-update/{id}', 'ProductController@prodUpdate');
    Route::delete('product-delete/{id}', 'ProductController@prodDelete');

    Route::get('gallery', 'GalleryController@galShow');
    Route::get('image-add', 'GalleryController@galAdd');
    Route::post('image-store', 'GalleryController@galStore');
    Route::delete('image-delete/{id}', 'GalleryController@galDelete');

    Route::get('orders', 'OrderController@orderShow');
    Route::put('order-done/{id}', 'OrderController@orderDone');

    Route::get('contacts', 'ContactController@contactShow');
    //Auth::routes();
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

