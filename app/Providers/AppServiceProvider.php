<?php

namespace LACC\Providers;

use Dingo\Api\Exception\Handler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\ServiceProvider;
use LACC\Models\Video;
use Laravel\Dusk\DuskServiceProvider;

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
    }
}
