<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility;

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\Php;

class UrlUtility
{
    /**
     * @param string $url
     * @return string
     */
    public static function ensureTrailingSlash(string $url): string
    {
        $url = self::removeTrailingSlash($url);
        return $url . Php::URL_DELIMITER;
    }

    /**
     * @param string $url
     * @return string
     */
    public static function removeTrailingSlash(string $url): string
    {
        return rtrim($url, Php::URL_DELIMITER);
    }

    /**
     * @param string $url
     * @return string
     */
    public static function ensureLeadingSlash(string $url): string
    {
        $url = self::removeLeadingSlash($url);
        return Php::URL_DELIMITER . $url;
    }

    /**
     * @param string $url
     * @return string
     */
    public static function removeLeadingSlash(string $url): string
    {
        return ltrim($url, Php::URL_DELIMITER);
    }

    /**
     * @param string $url
     * @return string
     */
    public static function getEndpointFromUrl(string $url): string
    {
        $parts = self::getPartsFromUrl($url);
        return end($parts) ?: "";
    }

    /**
     * @param string $url
     * @return string[]
     */
    public static function getPartsFromUrl(string $url): array
    {
        return explode(Php::URL_DELIMITER, self::getUrlWithoutQueryString($url));
    }

    /**
     * @param string $url
     * @return string
     */
    public static function getUrlWithoutQueryString(string $url): string
    {
        $parts = explode(Php::URL_DELIMITER_QUERY_STRING_START, $url);
        return reset($parts) ?: "";
    }

    /**
     * @param string ...$parts all parts to join
     * @return string
     */
    public static function join(...$parts): string
    {
        return join(Php::URL_DELIMITER, $parts);
    }

    /**
     * @param string $url
     * @param string $value
     * @param string $delimiter
     * @return string
     */
    public static function appendToUrl(string $url, string $value, string $delimiter = Php::URL_DELIMITER_QUERY_STRING_START): string
    {
        return "{$url}{$delimiter}{$value}";
    }
}
