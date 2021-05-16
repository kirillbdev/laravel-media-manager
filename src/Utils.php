<?php

namespace kirillbdev\MediaManager;

final class Utils
{
    public static function getRelativePath($path)
    {
        $rootPathLength = strlen(config('media_manager.image_root_path'));

        return self::normalizePath(substr($path, $rootPathLength));
    }

    public static function normalizePath($path)
    {
        $normalize = trim(str_replace('\\', '/', $path), '/');

        return $normalize ?: '/';
    }
}
