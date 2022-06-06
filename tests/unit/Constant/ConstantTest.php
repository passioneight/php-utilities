<?php

namespace Passioneight\Bundle\PhpUtilities\Tests\Constant;

use Passioneight\Bundle\PhpUtilitiesBundle\Tests\Mockup\ProductTypeMockup;

class ConstantTest extends \Codeception\Test\Unit
{
    public function testGetAll()
    {
        $this->assertIsArray(ProductTypeMockup::getAll(), "Return value must be an array.");
    }

    public function testContainsConstant()
    {
        $constants = ProductTypeMockup::getAll();

        foreach ($constants as $name => $value) {
            $this->assertTrue(ProductTypeMockup::containsConstant($name), "The constant '$name' is not available.");
        }

        $this->assertFalse(ProductTypeMockup::containsConstant("NON_EXISTING"), "The constant 'NON_EXISTING' is not available.");
    }

    public function testContainsValue()
    {
        $constants = ProductTypeMockup::getAll();

        foreach ($constants as $value) {
            $this->assertTrue(ProductTypeMockup::containsValue($value), "The value '$value' is not available.");
        }

        $this->assertFalse(ProductTypeMockup::containsValue("non-existing"), "The value 'non-existing' is not available.");
    }

    public function testGetValueFor()
    {
        $constants = ProductTypeMockup::getAll();

        foreach ($constants as $name => $value) {
            $this->assertEquals($value, ProductTypeMockup::getValueForConstant($name), "The constant '$name' did not return '$value'.");
        }

        $this->assertNull(ProductTypeMockup::getValueForConstant('NON_EXISTING'), "The constant 'NON_EXISTING' did not return 'null'.");
    }
}
