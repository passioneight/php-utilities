<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Utility;

class StringUtility
{
    /**
     * @param string $value
     * @param string ...$ignoredChars any arguments that are to be ignored when creating the camel case string
     * @return string
     */
    public static function toCamelCase(string $value, string ...$ignoredChars)
    {
        $ignoredChars = implode("", $ignoredChars);
        $value = preg_replace("/[^\w$ignoredChars]+", ' ', $value);
        $value = trim($value);
        $value = ucwords($value);
        $value = str_replace(" ", "", $value);
        return lcfirst($value);
    }
}
