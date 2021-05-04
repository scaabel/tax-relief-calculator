<?php

namespace Kenyalang\TaxReliefCalculator;

use Illuminate\Support\ServiceProvider;

class TaxReliefCalculatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tax-relief-calculator');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tax-relief-calculator');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
//            $this->publishes([
//                __DIR__.'/../config/config.php' => config_path('tax-relief-calculator.php'),
//            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/tax-relief-calculator'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/tax-relief-calculator'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/tax-relief-calculator'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'tax-relief-calculator');

        // Register the main class to use with the facade
        $this->app->singleton('tax-relief-calculator', function () {
            return new TaxReliefCalculator;
        });
    }
}
