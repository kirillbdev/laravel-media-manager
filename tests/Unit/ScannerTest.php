<?php

namespace kirillbdev\MediaManager\Tests\Unit;

use bovigo\vfs\vfsStream;
use bovigo\vfs\vfsStreamDirectory;
use kirillbdev\MediaManager\Core\FileInfo;
use kirillbdev\MediaManager\Exceptions\ScannerException;
use kirillbdev\MediaManager\Core\Scanner;
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

    /**
     * @var string
     */
    private $baseDir = 'image/uploads';

    protected function setUp() : void
    {
        $this->fs = vfsStream::setup('image', null, [
            'uploads' => [
                'water.jpg' => ''
            ]
        ]);

        $this->scanner = new Scanner();

        parent::setUp();
    }

    public function testScanValidDir()
    {
        $files = $this->scanner->scanDir(vfsStream::url($this->baseDir));

        $this->assertNotEmpty($files);

        $file = $files[0];

        $this->assertInstanceOf(FileInfo::class, $file);
        $this->assertEquals('jpg', $file->getExtension());
        $this->assertEquals('water', $file->getBasename());
    }

    public function testThrownExceptionIfCantScanDir()
    {
        $this->expectException(ScannerException::class);

        $files = $this->scanner->scanDir(vfsStream::url('image/invalid'));
    }
}
