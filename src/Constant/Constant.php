<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Constant;

use Exception;
use ReflectionClass;

abstract class Constant
{
    /**
     * @return array all constants in the current class
     */
    public static function getAll()
    {
        try {
            $class = new ReflectionClass(get_called_class());
            return $class->getConstants();
        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * @param string $name the name to look for
     *
     * @return bool whether the constant with the given name is available
     */
    public static function has($name)
    {
        $constants = self::getAll();
        return in_array($name, $constants);
    }

    /**
     * Use the self#has method to check whether the constant with the name exists.
     *
     * @param string $name the name to look for
     *
     * @return mixed the value of the constant or the value of $name
     */
    public static function get($name)
    {
        $constants = self::getAll();
        return @$constants[strtoupper($name)] ?: $name;
    }
}
