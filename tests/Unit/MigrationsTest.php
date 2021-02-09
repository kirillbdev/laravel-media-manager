<?php

namespace kirillbdev\MediaManager\Tests\Unit;

use Illuminate\Support\Facades\Schema;
use kirillbdev\MediaManager\Tests\TestCase;

class MigrationsTest extends TestCase
{
    public function testTablesCreated()
    {
        $this->assertTrue(Schema::hasTable('attachments'));
    }
}