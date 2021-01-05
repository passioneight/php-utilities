<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility;

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\Php;

class UrlUtility
{
    /**
     * @param string $url
     * @return string
     */
    public static function getEndpointFromUrl(string $url)
    {
        $parts = self::getPartsFromUrl($url);
        return end($parts) ?: "";
    }

    /**
     * @param string $url
     * @return string[]
     */
    public static function getPartsFromUrl(string $url)
    {
        return explode(Php::URL_DELIMITER, self::getUrlWithoutQueryString($url));
    }

    /**
     * @param string $url
     * @return string
     */
    public static function getUrlWithoutQueryString(string $url)
    {
        $parts = explode(Php::URL_DELIMITER_QUERY_STRING_START, $url);
        return reset($parts) ?: "";
    }

    /**
     * @param string ...$parts all parts to join
     * @return string
     */
    public static function join(...$parts)
    {
        return join(Php::URL_DELIMITER, $parts);
    }

    /**
     * @param string $url
     * @param string $value
     * @param string $delimiter
     * @return string
     */
    public static function appendToUrl(string $url, string $value, string $delimiter = Php::URL_DELIMITER_QUERY_STRING_START)
    {
        return "{$url}{$delimiter}{$value}";
    }
}
