<?php

namespace Passioneight\Bundle\PhpUtilitiesBundle\Tests\Service;

use Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility\PathUtility;

class PathUtilityTest extends \Codeception\Test\Unit
{
    public function testAddTrailingSlash()
    {
        $this->assertEquals("path/to/test" . DIRECTORY_SEPARATOR, PathUtility::addTrailingSlash("path/to/test"));
        $this->assertEquals("path/to/test/" . DIRECTORY_SEPARATOR, PathUtility::addTrailingSlash("path/to/test/"));
    }

    public function testAddLeadingSlash()
    {
        $this->assertEquals(DIRECTORY_SEPARATOR . "path/to/test", PathUtility::addLeadingSlash("path/to/test"));
        $this->assertEquals(DIRECTORY_SEPARATOR . "/path/to/test", PathUtility::addLeadingSlash("/path/to/test"));
    }

    public function testEnsurePath()
    {
        $path = "tests" . DIRECTORY_SEPARATOR . "_temp";
        $this->assertTrue(PathUtility::ensurePath($path));

        rmdir($path);
    }

    public function testGetPathFromFile()
    {
        $this->assertEquals("path" . DIRECTORY_SEPARATOR . "to", PathUtility::getPathFromFile("path" . DIRECTORY_SEPARATOR . "to" . DIRECTORY_SEPARATOR . "File.pdf"));
    }

    public function testJoin()
    {
        $path = "Passioneight" . DIRECTORY_SEPARATOR . "Bundle" . DIRECTORY_SEPARATOR . "PhpUtilitiesBundle" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "Utility";

        $this->assertEquals($path, PathUtility::join("Passioneight", "Bundle", "PhpUtilitiesBundle", "Service", "Utility"));
        $this->assertEquals($path, PathUtility::join(...["Passioneight", "Bundle", "PhpUtilitiesBundle", "Service", "Utility"]));
    }
}
