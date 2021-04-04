<?php

namespace kirillbdev\MediaManager\Foundation;

use kirillbdev\MediaManager\Exceptions\ScannerException;

class Scanner
{
    /**
     * @var string
     */
    private $rootPath;

    /**
     * Scanner constructor.
     *
     * @param string $rootPath
     */
    public function __construct(string $rootPath)
    {
        $this->rootPath = $rootPath;
    }

    /**
     * @param string $dir
     *
     * @return \SplFileInfo[]
     */
    public function scanDir(string $dir)
    {
        if (false === file_exists($dir)) {
            throw new ScannerException("Can't open directory $dir");
        }

        $files = scandir($dir);

        return array_values(array_filter($files, function ($file) {
            return $file !== '.' && $file !== '..';
        }));
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
