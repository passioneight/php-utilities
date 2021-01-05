<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility;

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\MethodType;

class MethodUtility
{
    /**
     * @param string $name
     * @param int $offset
     * @return bool
     */
    public static function isGetter(string $name, int $offset = 0)
    {
        return self::is($name,MethodType::GET, $offset);
    }

    /**
     * @param string $name
     * @param int $offset
     * @return bool
     */
    public static function isSetter(string $name, int $offset = 0)
    {
        return self::is($name,MethodType::SET, $offset);
    }

    /**
     * @param string $name
     * @param int $offset
     * @return bool
     */
    public static function isIsser(string $name, int $offset = 0)
    {
        return self::is($name,MethodType::IS, $offset);
    }

    /**
     * @param string $name
     * @param int $offset
     * @return bool
     */
    public static function isHasser(string $name, int $offset = 0)
    {
        return self::is($name,MethodType::HAS, $offset);
    }

    /**
     * @param string $name
     * @param string $type
     * @param int $offset
     * @return bool
     */
    public static function is(string $name, string $type, int $offset = 0)
    {
        return substr($name, $offset, strlen($type)) === $type;
    }

    /**
     * @param string $name
     * @return string
     */
    public static function createGetter(string $name)
    {
        return self::create($name, MethodType::GET);
    }

    /**
     * @param string $name
     * @return string
     */
    public static function createSetter(string $name)
    {
        return self::create($name, MethodType::SET);
    }

    /**
     * @param string $name
     * @return string
     */
    public static function createIsser(string $name)
    {
        return self::create($name, MethodType::IS);
    }

    /**
     * @param string $name
     * @return string
     */
    public static function createHasser(string $name)
    {
        return self::create($name, MethodType::HAS);
    }

    /**
     * @param string $name
     * @param string $methodType
     * @return string
     */
    public static function create(string $name, string $methodType)
    {
        return $methodType . ucfirst(StringUtility::toCamelCase($name));
    }
}
