<?php

namespace LACC\Providers;

use Illuminate\Support\ServiceProvider;
use LACC\Models\Video;

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
        }
    }
}
