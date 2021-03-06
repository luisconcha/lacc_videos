<?php

namespace LACC\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Dingo\Api\Event\ResponseWasMorphed::class => [
            \LACC\Listeners\AddTokenToHeaderListener::class,
        ],

        \LACC\Events\PaypalPaymentApproved::class => [
            \LACC\Listeners\CreatedOrderListener::class
        ],

        \Prettus\Repository\Events\RepositoryEntityCreated::class => [
            \LACC\Listeners\CreatedSubscriptionListener::class,
            \LACC\Listeners\CreatedPaypalWebProfileListener::class
        ],

        \Prettus\Repository\Events\RepositoryEntityUpdated::class => [
            \LACC\Listeners\UpdatedPaypalWebProfileListener::class
        ],

        \Prettus\Repository\Events\RepositoryEntityDeleted::class => [
            \LACC\Listeners\DeletetePaypalWebProfileListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
