<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Utility;

class PathUtility
{
    /**
     * @param string[] ...$parts all parts to join
     * @return string the joined path.
     */
    public static function join(...$parts)
    {
        return join(DIRECTORY_SEPARATOR, $parts);
    }
}
