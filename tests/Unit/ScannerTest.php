<?php

namespace kirillbdev\MediaManager\Tests\Unit;

use kirillbdev\MediaManager\Foundation\Scanner;
use kirillbdev\MediaManager\Tests\TestCase;

class ScannerTest extends TestCase
{
    public function testScanDir()
    {
        $scanner = new Scanner(realpath(__DIR__ . '/../images'));
        $files = $scanner->scanDir(__DIR__ . '/../images');

        $this->assertEquals(2, count($files));
    }
}