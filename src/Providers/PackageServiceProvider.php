<?php

namespace kirillbdev\MediaManager\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'kirillbdev-media-manager');
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');

        $this->publishes([
            __DIR__ . '/../../public/assets' => public_path('vendor/kirillbdev/media-manager'),
            __DIR__ . '/../../public/config/media-manager.php' => config_path('media-manager.php')
        ], 'kirillbdev-media-manager');
    }
}