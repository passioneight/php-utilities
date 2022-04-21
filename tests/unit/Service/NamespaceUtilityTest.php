<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Tests\Service;

use Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility\NamespaceUtility;
use Passioneight\Bundle\PhpUtilitiesBundle\Tests\Mockup\ProductTypeMockup;

class NamespaceUtilityTest extends \Codeception\Test\Unit
{
    public function testGetClassNameFromObject()
    {
        $this->assertEquals("ProductTypeMockup", NamespaceUtility::getClassNameFromObject(new ProductTypeMockup()));
    }

    public function testGetClassNameFromNamespace()
    {
        $this->assertEquals("ProductTypeMockup", NamespaceUtility::getClassNameFromNamespace(ProductTypeMockup::class));
        $this->assertEquals(NamespaceUtility::getClassNameFromObject(new ProductTypeMockup()), NamespaceUtility::getClassNameFromNamespace(ProductTypeMockup::class));
    }

    public function testGetNamespaceForClass()
    {
        $namespace = "Passioneight\\Bundle\\PhpUtilitiesBundle\\Service\\Utility";
        $this->assertEquals($namespace, NamespaceUtility::getNamespaceForClass(NamespaceUtility::class));
    }

    public function testGetPartsFromNamespace()
    {
        $namespace = "Passioneight\\Bundle\\PhpUtilitiesBundle\\Service\\Utility";

        $this->assertIsArray(NamespaceUtility::getPartsFromNamespace($namespace));
        $this->assertIsArray(NamespaceUtility::getPartsFromNamespace(NamespaceUtility::class));
    }

    public function testJoin()
    {
        $namespace = "Passioneight\\Bundle\\PhpUtilitiesBundle\\Service\\Utility";

        $this->assertEquals($namespace, NamespaceUtility::join("Passioneight", "Bundle", "PhpUtilitiesBundle", "Service", "Utility"));
        $this->assertEquals($namespace, NamespaceUtility::join(...["Passioneight", "Bundle", "PhpUtilitiesBundle", "Service", "Utility"]));
    }
}
