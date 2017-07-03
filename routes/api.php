<?php

use Illuminate\Http\Request;


//Route::middleware( 'auth:api' )->get( '/user', function( Request $request ) {
//    return $request->user();
//} );

//PHP ARTISAN API:ROUTE

ApiRoute::version( 'v1', function() {

    ApiRoute::group( [
        'namespace'  => 'LACC\Http\Controllers\Api',
        'as'         => 'api',
        'middleware' => 'bindings' ],
        function() {

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

                /************ USER ROUTES ***************/
                ApiRoute::get( '/user', function() {
                    return \Auth::guard( 'api' )->user();
                } );

                ApiRoute::patch( '/user/settings', [ 'as' => 'user.settings', 'uses' => 'UserController@updateSettings' ] );
                ApiRoute::patch( '/user/cpf', [ 'as' => 'user.add-cpf', 'uses' => 'UserController@addCpf' ] );

                /************ CATEGORY ROUTES ***************/
                ApiRoute::group( [ 'namespace' => 'Categories' ], function() {
                    ApiRoute::resource( '/categories', 'CategoriesController' );
                } );


                /************ PAYMENT ROUTES ***************/
                ApiRoute::post( '/plans/{plan}/payments', [ 'as' => 'payments.store', 'uses' => 'PaymentsController@store' ] );

                /************ PLANS ROUTES ***************/
                ApiRoute::get( 'plans', [ 'as' => 'plans.list', 'uses' => 'PlansController@index' ] );

                /************ SUBSCRIBER AREA ROUTES ***************/
                ApiRoute::group(['middleware' => 'check-subscriptions'], function(){
                    ApiRoute::get( '/test', function() {
                        return 'Olá marujo, vc é um assinante!';
                    } );
                });

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

