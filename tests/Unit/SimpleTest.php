<?php

namespace kirillbdev\MediaManager\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use kirillbdev\MediaManager\Providers\PackageServiceProvider;
use Orchestra\Testbench\TestCase;

class SimpleTest extends TestCase
{
    use RefreshDatabase;

    public function testEquals()
    {
        echo DB::table('migrations')
            ->count('id');

        $this->assertEquals(0, 0);
    }

    protected function getPackageProviders($app)
    {
        return [
            PackageServiceProvider::class,
        ];
    }
}