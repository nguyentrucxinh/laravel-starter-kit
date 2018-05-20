<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
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
        // AuthService
        $this->app->bind(
            'App\Services\AuthServiceInterface',
            'App\Services\Implement\AuthService'
        );

        // ProductService
        $this->app->bind(
            'App\Services\ProductServiceInterface',
            'App\Services\Implement\ProductService'
        );
    }
}
