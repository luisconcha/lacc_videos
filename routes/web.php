<?php

Route::get( '/', function() {
    return view( 'welcome' );
} );

//Auth::routes();

Route::get( '/home', 'HomeController@index' );

// Password Reset Routes...
Route::get( 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm' )->name( 'password.request' );
Route::post( 'password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail' )->name( 'password.email' );
Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@showResetForm' )->name( 'password.reset' );
Route::post( 'password/reset', 'Auth\ResetPasswordController@reset' );

Route::get( 'email-verification/error', 'EmailVerificationController@getVerificationError' )
     ->name( 'email-verification.error' );
Route::get( 'email-verification/check/{token}', 'EmailVerificationController@getVerification' )
     ->name( 'email-verification.check' );

Route::group( [ 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin\\' ], function() {

    //Route to login
    Route::name( 'login' )->get( 'login', 'Auth\LoginController@showLoginForm' );
    Route::post( 'login', 'Auth\LoginController@login' );

    //Protected routes
    Route::group( [ 'middleware' => [ 'isVerified', 'can:admin' ] ], function() {

        Route::name( 'logout' )->post( 'logout', 'Auth\LoginController@logout' );

        //Route to Panel
        Route::get( '/', [ 'as' => 'index', 'uses' => 'IndexController@index' ] );
        Route::get( '/dashboard', [ 'as' => 'dashboard', 'uses' => 'IndexController@dashboard' ] );

        //Route to Users
        Route::get( 'users/{user}/thumb_asset', ['as'=> 'users.thumb_asset', 'uses' => 'UserController@thumbAssets'] );
        Route::get( 'users/{user}/thumb_small_asset', ['as'=> 'users.thumb_small_asset', 'uses' => 'UserController@thumbSmallAssets'] );
        Route::get( '/password-change', [ 'as' => 'form.password.change', 'uses' => 'UserController@passwordForm' ] );
        Route::post( '/password-change', [ 'as' => 'users.password', 'uses' => 'UserController@passwordStore' ] );
        Route::resource( 'users', 'UserController' );

        //Route to Categories
        Route::resource( 'categories', 'CategoryController' );

        //Route to Videos
        Route::group( [ 'prefix' => 'videos', 'as' => 'videos.' ], function() {
            Route::get( '{video}/relations', [ 'as' => 'relations.create', 'uses' => 'VideosController@createRelations' ] );
            Route::post( '{video}/relations', [ 'as' => 'relations.store', 'uses' => 'VideosController@storeRelations' ] );

            Route::put( '{video}/video-series-categories', [ 'as' => 'video-series-categories', 'uses' => 'VideosController@createSeriesAndCategories' ] );
            //Route::post( '{video}/video-thumbnail', [ 'as' => 'video-thumbnail.create', 'uses' => 'VideosController@createVideoAndThumbnail' ] );

//            Route::get( '{video}/video-upload', [ 'as' => 'video-upload.create', 'uses' => 'VideosUploadsController@create' ] );
//            Route::post( '{video}/video-upload', [ 'as' => 'video-upload.store', 'uses' => 'VideosUploadsController@store' ] );
        } );
        Route::resource( 'videos', 'VideosController' );

        //Route to Series
        Route::get( 'series/{serie}/thumb_asset', ['as'=> 'series.thumb_asset', 'uses' => 'SeriesController@thumbAssets'] );
        Route::get( 'series/{serie}/thumb_small_asset', ['as'=> 'series.thumb_small_asset', 'uses' => 'SeriesController@thumbSmallAssets'] );
        Route::resource( 'series', 'SeriesController' );
    } );


} );