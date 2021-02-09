<?php

namespace kirillbdev\MediaManager\Foundation;

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
    public function __construct($rootPath)
    {
        $this->rootPath = $rootPath;
    }

    /**
     * @param string $dir
     *
     * @return \SplFileInfo[]
     */
    public function scanDir($dir)
    {
        $files = glob("$dir/*");

        return array_map(function ($file) {
            $info = new \SplFileInfo($file);
            $path = $this->getRelativePath($info->getPath());

            return [
                'hash' => md5($path . '/' . $info->getFilename()),
                'name' => $info->getFilename(),
                'path' => $path
            ];
        }, $files);
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