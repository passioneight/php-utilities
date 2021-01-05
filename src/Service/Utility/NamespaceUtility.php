<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility;

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\Php;

class NamespaceUtility
{
    /**
     * @param mixed $object may not be null
     * @return string|bool either the class name or FALSE in case of an error.
     */
    public static function getClassNameFromObject($object)
    {
        $namespace = get_class($object);
        return self::getClassNameFromNamespace($namespace);
    }

    /**
     * @param string $namespace
     * @return string|bool either the class name or FALSE in case of an error.
     */
    public static function getClassNameFromNamespace(string $namespace)
    {
        $parts = self::getPartsFromNamespace($namespace);
        return end($parts);
    }

    /**
     * @param string $namespace
     * @return string
     */
    public static function getNamespaceForClass(string $namespace)
    {
        $parts = self::getPartsFromNamespace($namespace);
        array_pop($parts);
        return self::join(...$parts);
    }

    /**
     * @param string $namespace
     * @return string[] containing all parts
     */
    public static function getPartsFromNamespace(string $namespace)
    {
        return explode(Php::NAMESPACE_DELIMITER, $namespace);
    }

    /**
     * @param string ...$parts all parts to join
     * @return string the joined namespace.
     */
    public static function join(...$parts)
    {
        return join(Php::NAMESPACE_DELIMITER, $parts);
    }
}
