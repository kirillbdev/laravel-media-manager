<?php

namespace kirillbdev\MediaManager\Core;

use kirillbdev\MediaManager\Exceptions\ScannerException;

class Scanner
{
    /**
     * @param string $dir
     *
     * @return FileInfo[]
     */
    public function scanDir(string $dir)
    {
        if ( ! file_exists($dir)) {
            throw new ScannerException("Can't open directory $dir.");
        }

        if ( ! is_dir($dir)) {
            throw new ScannerException("$dir is not directory.");
        }

        $files = scandir($dir);

        if (false === $files) {
            throw new ScannerException("Can't read from $dir.");
        }

        $result = array_map(function ($path) use ($dir) {
            return new FileInfo(realpath($dir) . DIRECTORY_SEPARATOR . $path);
        }, array_filter($files, function ($file) {
            return $file !== '.' && $file !== '..';
        }));

        return array_values($result);
    }

    /**
     * @param string $path
     *
     * @return string
     */
    private function getRelativePath($path)
    {
        $relativePath = str_replace(
            [ $this->rootPath, '\\'],
            [ '', '/' ],
            realpath($path)
        );

        return trim($relativePath, '/');
    }
}
