<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility;

class PathUtility
{
    /**
     * @param string ...$parts
     * @return string
     */
    public static function join(...$parts): string
    {
        return join(DIRECTORY_SEPARATOR, $parts);
    }

    /**
     * @param string $path
     * @return string
     */
    public static function addTrailingSlash(string $path): string
    {
        return $path . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $path
     * @return string
     */
    public static function addLeadingSlash(string $path): string
    {
        return DIRECTORY_SEPARATOR . $path;
    }

    /**
     * @param string $path
     * @param int $mode
     * @param bool $recursive
     * @return bool
     */
    public static function ensurePath(string $path, int $mode = 0777, bool $recursive = true): bool
    {
        if (!is_dir($path)) {
            return mkdir($path, $mode, $recursive);
        }

        return true;
    }

    /**
     * @param string $file
     * @return bool|string
     */
    public static function getPathFromFile(string $file): bool|string
    {
        return pathinfo($file, PATHINFO_DIRNAME);
    }
}
