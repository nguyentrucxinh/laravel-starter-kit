<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // User
        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\Eloquent\UserEloquentRepository'
        );

        // Product
        $this->app->bind(
            'App\Repositories\ProductRepositoryInterface',
            'App\Repositories\Eloquent\ProductEloquentRepository'
        );
    }
}
