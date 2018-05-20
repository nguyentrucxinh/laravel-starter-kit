<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
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
        // UserValidation
        $this->app->bind(
            'App\Validation\UserValidationInterface',
            'App\Validation\Implement\UserValidation'
        );

        // ProductValidation
        $this->app->bind(
            'App\Validation\ProductValidationInterface',
            'App\Validation\Implement\ProductValidation'
        );
    }
}
