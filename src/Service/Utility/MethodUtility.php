<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Utility;

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\MethodType;

class MethodUtility
{
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
