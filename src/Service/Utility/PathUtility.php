<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility;

class PathUtility
{
    /**
     * @param string ...$parts
     * @return string
     */
    public static function join(...$parts)
    {
        return join(DIRECTORY_SEPARATOR, $parts);
    }

    /**
     * @param string $path
     * @return string
     */
    public static function addTrailingSlash(string $path)
    {
        return $path . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $path
     * @return string
     */
    public static function addLeadingSlash(string $path)
    {
        return DIRECTORY_SEPARATOR . $path;
    }

    /**
     * @param string $path
     * @param int $mode
     * @param bool $recursive
     * @return bool
     */
    public static function ensurePath(string $path, int $mode = 0777, bool $recursive = true)
    {
        if (!is_dir($path)) {
            return mkdir($path, $mode, $recursive);
        }

        return true;
    }

    /**
     * @param string $file
     * @return false|string
     */
    public static function getPathFromFile(string $file)
    {
        return StringUtility::removeFromEnd(DIRECTORY_SEPARATOR, $file, true);
    }
}
