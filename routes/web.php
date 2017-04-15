<?php

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin\\'], function () {

    //Route to login
    Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');

    //Protected routes
    Route::group(['middleware' => 'can:admin'], function () {

        Route::name('logout')->post('logout', 'Auth\LoginController@logout');

        //Route to Panel
        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
        Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'IndexController@dashboard']);

        //Route to Users
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/list', ['as' => 'lists', 'uses' => 'UserController@index']);
            Route::get('/new', ['as' => 'new', 'uses' => 'UserController@add']);
            Route::post('/store', ['as' => 'store', 'uses' => 'UserController@store']);
        });
    });


});