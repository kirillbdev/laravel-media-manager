<?php

namespace kirillbdev\MediaManager\Services;

use Illuminate\Support\Facades\DB;
use kirillbdev\MediaManager\Core\FileInfo;
use kirillbdev\MediaManager\Model\Attachment;

class FileSyncService
{
    /**
     * @param FileInfo[] $files
     */
    public function syncFiles($files)
    {
        foreach ($files as $file) {
            $attachment = new Attachment([
                'hash' => md5($file->getRealPath()),
                'parent_id' => 0,
                'name' => $file->getBasename(),
                'extension' => $file->getExtension(),
                'path' => $file->getBasename()
            ]);

            $attachment->save();
        }
    }
}
