<?php
namespace Passioneight\Bundle\PhpUtilitiesBundle\Tests\Service;

use Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility\MethodUtility;

class MethodUtilityTest extends \Codeception\Test\Unit
{
    public function testCreateGetter()
    {
        $this->assertEquals("getTest", MethodUtility::createGetter("Test"));
        $this->assertEquals("getTest", MethodUtility::createGetter("test"));
        $this->assertEquals("getTest", MethodUtility::createGetter(" test"));
    }

    public function testCreateSetter()
    {
        $this->assertEquals("setTest", MethodUtility::createSetter("Test"));
        $this->assertEquals("setTest", MethodUtility::createSetter("test"));
        $this->assertEquals("setTest", MethodUtility::createSetter(" test"));
    }

    public function testCreateHasser()
    {
        $this->assertEquals("hasTest", MethodUtility::createHasser("Test"));
        $this->assertEquals("hasTest", MethodUtility::createHasser("test"));
        $this->assertEquals("hasTest", MethodUtility::createHasser(" test"));
    }

    public function testCreateIsser()
    {
        $this->assertEquals("isTest", MethodUtility::createIsser("Test"));
        $this->assertEquals("isTest", MethodUtility::createIsser("test"));
        $this->assertEquals("isTest", MethodUtility::createIsser(" test"));
    }

    public function testIsGetter()
    {
        $this->assertTrue(MethodUtility::isGetter(MethodUtility::createGetter("Test")));
    }

    public function testIsSetter()
    {
        $this->assertTrue(MethodUtility::isSetter(MethodUtility::createSetter("Test")));
    }

    public function testIsHasser()
    {
        $this->assertTrue(MethodUtility::isHasser(MethodUtility::createHasser("Test")));
    }

    public function testIsIsser()
    {
        $this->assertTrue(MethodUtility::isIsser(MethodUtility::createIsser("Test")));
    }
}
