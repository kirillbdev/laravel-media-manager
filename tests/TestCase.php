<?php

namespace kirillbdev\MediaManager\Tests;

use kirillbdev\MediaManager\Providers\PackageServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'media_manager.image_root_path' => public_path('image/uploads'),
            'media_manager.image_root_url' => 'image/uploads'
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            PackageServiceProvider::class,
        ];
    }
}
