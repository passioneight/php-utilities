<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Utility;

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\Php;

class MethodUtility
{
    /**
     * @param string $name
     * @return string
     */
    public static function createGetter(string $name)
    {
        return self::create($name, Php::METHOD_TYPE_GETTER);
    }

    /**
     * @param string $name
     * @return string
     */
    public static function createSetter(string $name)
    {
        return self::create($name, Php::METHOD_TYPE_SETTER);
    }


    /**
     * @param string $name
     * @return string
     */
    public static function createIsser(string $name)
    {
        return self::create($name, Php::METHOD_TYPE_ISSER);
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
