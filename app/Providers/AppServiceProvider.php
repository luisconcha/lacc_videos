<?php

namespace LACC\Providers;

use Dingo\Api\Exception\Handler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use LACC\Models\Video;
use Laravel\Dusk\DuskServiceProvider;
use Tymon\JWTAuth\Exceptions\JWTException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Video::updated( function( $video ) {
            if( !$video->completed ) {
                if( $video->file != null && $video->thumb != null && $video->duration != null ) {
                    $video->completed = true;
                    $video->save();
                }
            }
        } );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if( $this->app->environment() !== 'production' ) {
            $this->app->register( \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class );
            $this->app->register( DuskServiceProvider::class );
        }

        //Reconfigura as mensagem de erro devoltas pelo DINGO
        $handler = app( Handler::class );
        $handler->register( function( AuthenticationException $exception ) {
            return response()->json( [ 'error' => 'Unauthenticated' ], 401 );
        } );

        $handler->register( function( JWTException $exception ) {
            return response()->json( [ 'error' => $exception->getMessage() ], 401 );
        } );
        
        $handler->register( function( ValidationException $exception ) {
            return response()->json( [
                'error'             => $exception->getMessage(),
                'validation_errors' => $exception->validator->getMessageBag()->toArray()
            ], 422 );
        } );
    }
}
