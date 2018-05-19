<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * =============== REPOSITORY ===============
         * */

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

        /*
         * =============== VALIDATION ===============
         * */

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

        /*
         * =============== SERVICE ===============
         * */

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
