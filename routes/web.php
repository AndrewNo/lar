<?php

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', 'AdminController@index');

    Route::get('login', 'AdminController@getLogin');
    Route::post('login', 'AdminController@postLogin');
    Route::post('logout', 'AdminController@postLogout');

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
    //Auth::routes();
});

