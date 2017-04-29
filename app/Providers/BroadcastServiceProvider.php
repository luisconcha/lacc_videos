<?php

namespace LACC\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

//        require base_path( 'routes/channels.php' );

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel( 'LACC.Models.User.*', function( $user ) {
            return true;
//            return (int)$user->id === (int)$userId;
        } );
    }
}
