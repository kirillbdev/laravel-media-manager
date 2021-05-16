<?php

namespace kirillbdev\MediaManager\Services;

use kirillbdev\MediaManager\Core\Scanner;
use kirillbdev\MediaManager\Model\Attachment;
use kirillbdev\MediaManager\Utils;

class MediaManagerService
{
    private $scanner;
    private $fileSyncService;

    public function __construct(Scanner $scanner, FileSyncService $fileSyncService)
    {
        $this->scanner = $scanner;
        $this->fileSyncService = $fileSyncService;
    }

    public function getFiles($dir)
    {
        if ($this->fileSyncService->needSync($dir)) {
            return $this->fileSyncService->syncFiles($this->scanner->scanDir($dir));
        }

        return Attachment::where('path', Utils::getRelativePath($dir))->get();
    }
}
