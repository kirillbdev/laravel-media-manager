<?php

namespace kirillbdev\MediaManager\Services;

use Illuminate\Support\Facades\DB;
use kirillbdev\MediaManager\Core\FileInfo;
use kirillbdev\MediaManager\Model\Attachment;
use kirillbdev\MediaManager\Utils;

class FileSyncService
{
    /**
     * @param FileInfo[] $files
     * @return Attachment[]
     */
    public function syncFiles($files)
    {
        $result = [];

        foreach ($files as $file) {
            $attachment = new Attachment([
                'parent_id' => 0,
                'name' => $file->getBasename(),
                'extension' => $file->getExtension(),
                'path' => $file->getRelativePath()
            ]);

            $attachment->save();
            $result[] = $attachment;
        }

        return $result;
    }

    public function needSync($dir)
    {
        return DB::table('attachments')
            ->where('path', Utils::getRelativePath($dir))
            ->count('id') === 0;
    }
}
