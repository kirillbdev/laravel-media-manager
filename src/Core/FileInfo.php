<?php

namespace kirillbdev\MediaManager\Core;

/**
 * Class FileInfo
 * @package kirillbdev\MediaManager\Core
 * @method getFilename
 * @method isDir
 */
class FileInfo implements \JsonSerializable
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

    public function jsonSerialize()
    {
        return [
            'name' => $this->splFileInfo->getFilename(),
            'base_name' => $this->getBasename(),
            'extension' => $this->splFileInfo->getExtension(),
            'is_dir' => $this->splFileInfo->isDir()
        ];
    }
}
