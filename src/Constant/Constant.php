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
     * @param mixed $value the value to look for
     * @return bool whether the constant with the given value is available
     */
    public static function containsValue(mixed $value): bool
    {
        $constants = self::getAll();
        return in_array($value, $constants);
    }

    /**
     * @param mixed $constantName the name to look for
     * @return bool whether the constant with the given name is available
     */
    public static function containsConstant(mixed $constantName): bool
    {
        $constants = self::getAll();
        return array_key_exists($constantName, $constants);
    }

    /**
     * @param string|null $name the name to look for
     * @return mixed the value of the constant; may be null
     */
    public static function getValueForConstant(?string $name): mixed
    {
        $constants = self::getAll();
        $name = strtoupper($name);

        return array_key_exists($name, $constants) ? $constants[$name] : null;
    }
}
