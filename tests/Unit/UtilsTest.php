<?php

namespace kirillbdev\MediaManager\Tests\Unit;

use kirillbdev\MediaManager\Tests\TestCase;
use kirillbdev\MediaManager\Utils;

class UtilsTest extends TestCase
{
    public function testRelativePath()
    {
        $this->assertEquals('/', Utils::getRelativePath(public_path('image/uploads')));
        $this->assertEquals('folder/inner', Utils::getRelativePath(public_path('image/uploads/folder/inner')));
    }

    public function testNormalizePath()
    {
        $this->assertEquals('/', Utils::normalizePath(''));
        $this->assertEquals('/', Utils::normalizePath('/'));
        $this->assertEquals('/', Utils::normalizePath('\\'));
        $this->assertEquals('public/image/uploads', Utils::normalizePath('\\public\\image/uploads'));
    }
}
