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
    //Auth::routes();
});

