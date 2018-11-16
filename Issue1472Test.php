<?php
class Issue1472Test extends PHPUnit_Framework_TestCase
{
    public function testAssertEqualXMLStructure()
    {
        $Vl2jhnr4oe5y = new DOMDocument;
        $Vl2jhnr4oe5y->loadXML('<root><label>text content</label></root>');

        $Vcbqcawr5t3a = new DOMXPath($Vl2jhnr4oe5y);

        $Vhlzbqwdptdy = $Vl2jhnr4oe5y->getElementsByTagName('label')->item(0);

        $this->assertEquals(1, $Vcbqcawr5t3a->evaluate('count(//label[text() = "text content"])'));

        $Vc1yfvpbxme4 = $Vl2jhnr4oe5y->createElement('label', 'text content');
        $this->assertEqualXMLStructure($Vc1yfvpbxme4, $Vhlzbqwdptdy);

        
        $this->assertEquals(1, $Vcbqcawr5t3a->evaluate('count(//label[text() = "text content"])'));
    }
}
