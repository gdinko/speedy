<?php

namespace Gdinko\Speedy;

use Gdinko\Speedy\Commands\GetCarrierSpeedyApiStatus;
use Gdinko\Speedy\Commands\GetCarrierSpeedyPayments;
use Gdinko\Speedy\Commands\SyncCarrierSpeedyCountries;
use Gdinko\Speedy\Commands\SyncCarrierSpeedyOffices;
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
            ], 'speedy-config');

            $this->publishes([
                __DIR__ . '/../database/migrations/' => database_path('migrations'),
            ], 'speedy-migrations');

            $this->publishes([
                __DIR__ . '/Models/' => app_path('Models'),
            ], 'speedy-models');

            $this->publishes([
                __DIR__ . '/Commands/' => app_path('Console/Commands'),
            ], 'speedy-commands');

            // Registering package commands.
            $this->commands([
                GetCarrierSpeedyPayments::class,
                GetCarrierSpeedyApiStatus::class,
                SyncCarrierSpeedyCountries::class,
                SyncCarrierSpeedyOffices::class,
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
