<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class QueryLoggingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // DB::listen(function($query) {
        //     Log::info(
        //         $query->sql,
        //         $query->bindings,
        //         $query->time
        //     );
        // });

        DB::listen(function ($query) {
            $logFile = storage_path('logs/query-logging-'.date("Y-m-d").'.log');
            $stream = new Logger('log');
            $stream->pushHandler(new StreamHandler($logFile));
            $bindings = $query->bindings;
            $time = $query->time;
            $stream->info($query->sql, compact('bindings', 'time'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
