<?php
namespace Passioneight\Bundle\PhpUtilitiesBundle\Tests\Service;

use Passioneight\Bundle\PhpUtilitiesBundle\Constant\Php;
use Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility\UrlUtility;

class UrlUtilityTest extends \Codeception\Test\Unit
{
    public function testEnsureTrailingSlash()
    {
        $this->assertEquals("/url/to/test/", UrlUtility::ensureTrailingSlash("/url/to/test"));
        $this->assertEquals("/url/to/test/", UrlUtility::ensureTrailingSlash("/url/to/test/"));
        $this->assertEquals("/url/to/test/", UrlUtility::ensureTrailingSlash("/url/to/test//"));
    }

    public function testRemoveTrailingSlash()
    {
        $this->assertEquals("/url/to/test", UrlUtility::removeTrailingSlash("/url/to/test"));
        $this->assertEquals("/url/to/test", UrlUtility::removeTrailingSlash("/url/to/test/"));
        $this->assertEquals("/url/to/test", UrlUtility::removeTrailingSlash("/url/to/test//"));
    }

    public function testEnsureLeadingSlash()
    {
        $this->assertEquals("/url/to/test", UrlUtility::ensureLeadingSlash("url/to/test"));
        $this->assertEquals("/url/to/test", UrlUtility::ensureLeadingSlash("/url/to/test"));
        $this->assertEquals("/url/to/test", UrlUtility::ensureLeadingSlash("//url/to/test"));
    }

    public function testRemoveLeadingSlash()
    {
        $this->assertEquals("url/to/test", UrlUtility::removeLeadingSlash("url/to/test"));
        $this->assertEquals("url/to/test", UrlUtility::removeLeadingSlash("/url/to/test"));
        $this->assertEquals("url/to/test", UrlUtility::removeLeadingSlash("//url/to/test"));
    }

    public function testGetEndpointFromUrl()
    {
        $this->assertEquals("test", UrlUtility::getEndpointFromUrl("url/to/test"));
        $this->assertEquals("test", UrlUtility::getEndpointFromUrl("/url/to/test"));
        $this->assertEquals("endpoint", UrlUtility::getEndpointFromUrl("url/to/test//endpoint"));
        $this->assertEmpty( UrlUtility::getEndpointFromUrl("url/to/test/"));
        $this->assertEmpty(UrlUtility::getEndpointFromUrl("url/to/test//"));
    }

    public function testGetPartsFromUrl()
    {
        $this->assertIsArray(UrlUtility::getPartsFromUrl("url/to/test"));
        $this->assertEquals(["url", "to", "test"], UrlUtility::getPartsFromUrl("url/to/test"));
        $this->assertEquals(["", "url", "to", "test"], UrlUtility::getPartsFromUrl("/url/to/test"));
        $this->assertEquals(["url", "to", "test", ""], UrlUtility::getPartsFromUrl("url/to/test/"));
        $this->assertEquals(["", "url", "to", "test", ""], UrlUtility::getPartsFromUrl("/url/to/test/"));
        $this->assertEquals(["url", "to", "test"], UrlUtility::getPartsFromUrl("url/to/test?param=test&param2=test"));
        $this->assertEquals(["url", "to", "test", "", "endpoint"], UrlUtility::getPartsFromUrl("url/to/test//endpoint"));
    }

    public function testGetUrlWithoutQueryString()
    {
        $this->assertEquals("url/to/test", UrlUtility::getUrlWithoutQueryString("url/to/test?param=test&param2=test"));
    }

    public function testJoin()
    {
        $this->assertEquals("url/to/test", UrlUtility::join("url", "to", "test"));
        $this->assertEquals("url/to/test/", UrlUtility::join("url", "to", "test", ""));
        $this->assertEquals("/url/to/test", UrlUtility::join("", "url", "to", "test"));
        $this->assertEquals("//url/to/test", UrlUtility::join("", "", "url", "to", "test"));
        $this->assertEquals("url/to/test//", UrlUtility::join("url", "to", "test", "", ""));
        $this->assertEquals("url/to//test", UrlUtility::join("url", "to", "", "test"));
        $this->assertEquals("url/to/test", UrlUtility::join(...["url", "to", "test"]));
    }

    public function testAppendToUrl()
    {
        $this->assertEquals("url/to/test?param=test", UrlUtility::appendToUrl("url/to/test", "param=test"));
        $this->assertEquals("url/to/test?param=test&param1=test", UrlUtility::appendToUrl("url/to/test?param=test", "param1=test", Php::URL_DELIMITER_QUERY_STRING));
        $this->assertEquals("url/to/test/endpoint", UrlUtility::appendToUrl("url/to/test", "endpoint", Php::URL_DELIMITER));
    }
}
