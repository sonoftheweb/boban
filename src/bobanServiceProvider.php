<?php

namespace sonoftheweb\boban;

use Illuminate\Support\ServiceProvider;

class bobanServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //dd(' We are loading something');
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sonoftheweb');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'sonoftheweb');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/boban.php' => config_path('boban.php'),
            ], 'boban.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/sonoftheweb'),
            ], 'boban.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/sonoftheweb'),
            ], 'boban.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/sonoftheweb'),
            ], 'boban.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/boban.php', 'boban');

        // Register the service the package provides.
        $this->app->singleton('boban', function ($app) {
            return new boban;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['boban'];
    }
}
