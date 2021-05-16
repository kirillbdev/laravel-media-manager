<?php

namespace kirillbdev\MediaManager\Tests\Unit;

use bovigo\vfs\vfsStream;
use Illuminate\Support\Facades\DB;
use kirillbdev\MediaManager\Core\FileInfo;
use kirillbdev\MediaManager\Services\FileSyncService;
use kirillbdev\MediaManager\Tests\TestCase;

class FileSyncServiceTest extends TestCase
{
    private $fileSyncService;

    protected function setUp() : void
    {
        $this->fs = vfsStream::setup('image', null, [
            'uploads' => [
                'water.jpg' => ''
            ]
        ]);

        $this->fileSyncService = new FileSyncService();

        parent::setUp();
    }

    public function testAddFileToDB()
    {
        $fileInfo = new FileInfo(vfsStream::url('image/uploads/water.jpg'));

        $this->fileSyncService->syncFiles([ $fileInfo ]);

        $result = DB::table('attachments')
            ->first([
                'parent_id',
                'name',
                'extension',
                'path'
            ]);

        $this->assertNotNull($result);
        $this->assertEquals([
            'parent_id' => 0,
            'name' => $fileInfo->getBasename(),
            'extension' => $fileInfo->getExtension(),
            'path' => '/'
        ], (array)$result);
    }
}
