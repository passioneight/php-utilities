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
}
