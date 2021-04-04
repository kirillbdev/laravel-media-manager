<?php

namespace kirillbdev\MediaManager\Tests\Unit;

use bovigo\vfs\vfsStream;
use bovigo\vfs\vfsStreamDirectory;
use kirillbdev\MediaManager\Exceptions\ScannerException;
use kirillbdev\MediaManager\Foundation\Scanner;
use kirillbdev\MediaManager\Tests\TestCase;

class ScannerTest extends TestCase
{
    /**
     * @var  vfsStreamDirectory
     */
    private $fs;

    /**
     * @var Scanner
     */
    private $scanner;

    protected function setUp() : void
    {
        $this->fs = vfsStream::setup('image', null, [
            'uploads' => [
                'water.jpg' => ''
            ]
        ]);

        $this->scanner = new Scanner('image/uploads');

        parent::setUp();
    }

    public function testScanValidDir()
    {
        $files = $this->scanner->scanDir(vfsStream::url('image/uploads'));

        $this->assertNotEmpty($files);
        $this->assertEquals([
            'water.jpg'
        ], $files);
    }

    public function testThrownExceptionIfCantScanDir()
    {
        $this->expectException(ScannerException::class);

        $files = $this->scanner->scanDir(vfsStream::url('image/invalid'));
    }
}
