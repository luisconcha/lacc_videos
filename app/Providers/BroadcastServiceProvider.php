<?php

namespace LACC\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
use LACC\Models\User;

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
            return \Auth::user()->role === User::ROLE_ADMIN;
        } );
    }
}
