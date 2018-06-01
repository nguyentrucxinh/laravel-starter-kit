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
        $services = [
            'Auth',
            'Product'
        ];

        foreach ($services as $service) {
            $this->app->bind("App\Services\\{$service}ServiceInterface", "App\Services\Implement\\{$service}Service");
        }
    }
}
