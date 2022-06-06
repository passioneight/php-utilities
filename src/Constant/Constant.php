<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Constant;

use Exception;
use ReflectionClass;

abstract class Constant
{
    /**
     * @return array all constants in the current class
     */
    public static function getAll(): array
    {
        try {
            $class = new ReflectionClass(get_called_class());
            return $class->getConstants();
        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * @param mixed $name the name to look for
     *
     * @return bool whether the constant with the given name is available
     */
    public static function has(mixed $name): bool
    {
        $constants = self::getAll();
        return in_array($name, $constants);
    }

    /**
     * Use the self#has method to check whether the constant with the name exists.
     *
     * @param string|null $name the name to look for
     *
     * @return mixed the value of the constant or the value of $name
     */
    public static function get(?string $name): mixed
    {
        $constants = self::getAll();
        return @$constants[strtoupper($name)] ?: $name;
    }
}
