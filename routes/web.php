<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', ['as' => 'admin', 'uses' => 'Admin\IndexController@index']);
    Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\IndexController@dashboard']);
    
    Route::get('/list', ['as' => 'users.lists', 'uses' => 'Admin\UserController@index']);
});