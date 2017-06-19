<?php

use Illuminate\Http\Request;


//Route::middleware( 'auth:api' )->get( '/user', function( Request $request ) {
//    return $request->user();
//} );

//PHP ARTISAN API:ROUTE

ApiRoute::version( 'v1', function() {

    ApiRoute::group( [ 'namespace' => 'LACC\Http\Controllers\Api', 'as' => 'api' ], function() {

        ApiRoute::post( '/access_token', [
            'uses'       => 'AuthController@accessToken',
            'middleware' => 'api.throttle',
            'limit'      => 10,
            'expires'    => 1
        ] )->name( '.access_token' );

        ApiRoute::post( '/refresh_token', [
            'uses'       => 'AuthController@refreshToken',
            'middleware' => 'api.throttle',
            'limit'      => 10,
            'expires'    => 1
        ] )->name( '.refresh_token' );

        //login with Socialite
        ApiRoute::post( 'register', 'RegisterUsersController@store' );

        //GROUP OF PROTECTED ROUTES
        ApiRoute::group( [
            'middleware' => [ 'api.throttle', 'api.auth' ],
            'limit'      => 100,
            'expires'    => 3
        ], function() {

            ApiRoute::post( '/logout', 'AuthController@logout' );
            

            ApiRoute::get( '/user', function() {
                return \Auth::guard( 'api' )->user();
            } );

            /************ CATEGORY ROUTES ***************/
            ApiRoute::group( [ 'namespace' => 'Categories' ], function() {
                ApiRoute::resource( '/categories', 'CategoriesController' );
            } );




            /************ TEST ROUTES ***************/
            //ApiRoute::get( '/test', function() {
            //    return 'Olá marujo, vc esta autenticado!';
            //} );

            //ApiRoute::get( '/user-test', function() {
                // 1) return authenticated user
                //return $request->user( 'api' ); //add com parametro quando esta logado =>  Request $request 

                // 2) return authenticated user
                //app( \Dingo\Api\Auth\Auth::class )->user();

                // 3) return authenticated user
                //return \Auth::guard( 'api' )->user();
            //} );

            /********** END TEST ROUTES **********/

        } );
    } );
} );

