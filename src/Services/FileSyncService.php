<?php

namespace kirillbdev\MediaManager\Services;

use kirillbdev\MediaManager\Foundation\Scanner;

class FileSyncService
{
    /**
     * @var Scanner
     */
    private $scanner;

    /**
     * FileSyncService constructor.
     *
     * @param Scanner $scanner
     */
    public function __construct(Scanner $scanner)
    {
        $this->scanner = $scanner;
    }

    /**
     * @param string $dir
     */
    public function syncFiles($dir)
    {
        $files = $this->scanner->scanDir($dir);
        $result = [];

        foreach ($files as $file) {
            $result[] = [
                'hash' => md5($file->getPathname() . '/' . $file->getFilename()),
                'name' => $file->getFilename(),
                'path' => $file->getPath(),
                'pathname' => dirname($file->getRealPath())
            ];
        }

        return $result;
    }
}