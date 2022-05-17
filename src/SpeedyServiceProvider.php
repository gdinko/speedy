<?php

namespace Gdinko\Speedy;

use Gdinko\Speedy\Commands\GetCarrierSpeedyApiStatus;
use Gdinko\Speedy\Commands\GetCarrierSpeedyPayments;
use Gdinko\Speedy\Commands\SyncCarrierSpeedyCountries;
use Illuminate\Support\ServiceProvider;

class SpeedyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/speedy.php' => config_path('speedy.php'),
            ], 'config');

            // Registering package commands.
            $this->commands([
                GetCarrierSpeedyPayments::class,
                GetCarrierSpeedyApiStatus::class,
                SyncCarrierSpeedyCountries::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/speedy.php', 'speedy');

        // Register the main class to use with the facade
        $this->app->singleton('speedy', function () {
            return new Speedy();
        });
    }
}
