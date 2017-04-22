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
        $this->app->bind( \LACC\Repositories\CategoryRepository::class,
            \LACC\Repositories\CategoryRepositoryEloquent::class );
        $this->app->bind( \LACC\Repositories\UserRepository::class, \LACC\Repositories\UserRepositoryEloquent::class );
        $this->app->bind( \LACC\Repositories\SerieRepository::class, \LACC\Repositories\SerieRepositoryEloquent::class );
        //:end-bindings:
    }
}
