<?php

namespace kirillbdev\MediaManager\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'kirillbdev-media-manager');

        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/kirillbdev/media-manager'),
        ], 'public');
    }
}