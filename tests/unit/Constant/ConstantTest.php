<?php
namespace Passioneight\Bundle\PhpUtilities\Tests\Constant;

use Passioneight\Bundle\PhpUtilitiesBundle\Tests\Mockup\ProductTypeMockup;

class ConstantTest extends \Codeception\Test\Unit
{
    public function testConstant()
    {
        $constants = ProductTypeMockup::getAll();

        $this->assertTrue(is_array($constants), "Return value must be an array.");

        foreach ($constants as $name => $value) {
            $this->assertTrue(ProductTypeMockup::has($value), "The value '$value' is not available.");
            $this->assertEquals($value, ProductTypeMockup::get($name), "Fetching the value based on the constants name failed.");
        }
    }
}
