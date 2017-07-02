<?php

namespace LACC\Providers;

use Illuminate\Support\ServiceProvider;

class LACCServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( \LACC\Repositories\CategoryRepository::class, \LACC\Repositories\CategoryRepositoryEloquent::class );
        $this->app->bind( \LACC\Repositories\UserRepository::class, \LACC\Repositories\UserRepositoryEloquent::class );
        $this->app->bind( \LACC\Repositories\SerieRepository::class, \LACC\Repositories\SerieRepositoryEloquent::class );
        $this->app->bind( \LACC\Repositories\VideoRepository::class, \LACC\Repositories\VideoRepositoryEloquent::class );
        $this->app->bind( \LACC\Repositories\PlanRepository::class, \LACC\Repositories\PlanRepositoryEloquent::class );
        $this->app->bind( \LACC\Repositories\OrderRepository::class, \LACC\Repositories\OrderRepositoryEloquent::class );
        $this->app->bind( \LACC\Repositories\SubscriptionRepository::class, \LACC\Repositories\SubscriptionRepositoryEloquent::class );
        //:end-bindings:
    }
}
