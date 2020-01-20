<?php

namespace Bavix\Settings;

use Bavix\Settings\Services\ReadableService;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        if (function_exists('config_path')) {
            $this->publishes([
                dirname(__DIR__) . '/config/config.php' => config_path('bavix-settings.php'),
            ], 'laravel-settings-config');
        }

        $this->publishes([
            dirname(__DIR__) . '/database/' => database_path('migrations'),
        ], 'laravel-settings-migrations');

        $this->loadMigrationsFrom([__DIR__ . '/../database']);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/config.php',
            'bavix-settings'
        );

        $this->app->singleton(ReadableService::class, config('settings.services.readable'));
    }

}
