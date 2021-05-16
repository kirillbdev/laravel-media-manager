<?php

namespace kirillbdev\MediaManager\Core;

use kirillbdev\MediaManager\Utils;

/**
 * Class FileInfo
 * @package kirillbdev\MediaManager\Core
 * @method getFilename
 * @method isDir
 */
class FileInfo
{
    /**
     * @var \SplFileInfo
     */
    private $splFileInfo;

    public function __construct(string $path)
    {
        $this->splFileInfo = new \SplFileInfo($path);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([ $this->splFileInfo, $name ], $arguments);
    }

    /**
     * @return string
     */
    public function getBasename()
    {
        return $this->splFileInfo->getBasename('.' . $this->splFileInfo->getExtension());
    }

    public function getRelativePath()
    {
        $nameLength = strlen($this->splFileInfo->getFilename());

        return Utils::getRelativePath(substr($this->splFileInfo->getRealPath(), 0, -$nameLength));
    }
}
