<?php

namespace kirillbdev\MediaManager\Tests;

use kirillbdev\MediaManager\Providers\PackageServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [
            PackageServiceProvider::class,
        ];
    }
}