<?php


class Extensions_PhptTestCaseTest extends \PHPUnit_Framework_TestCase
{
    public function testParseIniSection()
    {
        $V12wchs4borj = new PhpTestCaseProxy(__FILE__);
        $Vgzibbh1fx1x     = $V12wchs4borj->parseIniSection("foo=1\nbar = 2\rbaz = 3\r\nempty=\nignore");

        $Vwcb1oykhumm = array(
            'foo=1',
            'bar = 2',
            'baz = 3',
            'empty=',
            'ignore',
        );

        $this->assertEquals($Vwcb1oykhumm, $Vgzibbh1fx1x);
    }
}

class PhpTestCaseProxy extends PHPUnit_Extensions_PhptTestCase
{
    public function parseIniSection($Vjdkyvjsoqdn)
    {
        return parent::parseIniSection($Vjdkyvjsoqdn);
    }
}
