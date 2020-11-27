<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility;

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

    /**
     * @param string $needle
     * @param string $haystack
     * @return bool
     */
    public static function startsWith(string $needle, string $haystack)
    {
        $needleLength = strlen($needle);
        $haystackLength = strlen($haystack);

        return $needleLength <= $haystackLength && substr($haystack, 0, $needleLength) === $needle;
    }

    /**
     * @param string $needle
     * @param string $haystack
     * @return bool
     */
    public static function endsWith(string $needle, string $haystack)
    {
        $needleLength = strlen($needle);
        $haystackLength = strlen($haystack);

        return $needleLength <= $haystackLength && substr($haystack, $haystackLength - $needleLength, $needleLength) === $needle;
    }

    /**
     * @param string $needle
     * @param string $haystack
     * @return bool
     */
    public static function contains(string $needle, string $haystack)
    {
        return strpos($haystack, $needle) !== false;
    }
}
