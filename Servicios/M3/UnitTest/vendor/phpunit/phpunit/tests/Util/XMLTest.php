<?php



class Util_XMLTest extends PHPUnit_Framework_TestCase
{
    public function testAssertValidKeysValidKeys()
    {
        $V4a4guv4okog   = array('testA' => 1, 'testB' => 2, 'testC' => 3);
        $Vwktyfaiy3w3     = array('testA', 'testB', 'testC');
        $Vwcb1oykhumm  = array('testA' => 1, 'testB' => 2, 'testC' => 3);
        $Vwktyfaiy3w3ated = PHPUnit_Util_XML::assertValidKeys($V4a4guv4okog, $Vwktyfaiy3w3);

        $this->assertEquals($Vwcb1oykhumm, $Vwktyfaiy3w3ated);
    }

    public function testAssertValidKeysValidKeysEmpty()
    {
        $V4a4guv4okog   = array('testA' => 1, 'testB' => 2);
        $Vwktyfaiy3w3     = array('testA', 'testB', 'testC');
        $Vwcb1oykhumm  = array('testA' => 1, 'testB' => 2, 'testC' => null);
        $Vwktyfaiy3w3ated = PHPUnit_Util_XML::assertValidKeys($V4a4guv4okog, $Vwktyfaiy3w3);

        $this->assertEquals($Vwcb1oykhumm, $Vwktyfaiy3w3ated);
    }

    public function testAssertValidKeysDefaultValuesA()
    {
        $V4a4guv4okog   = array('testA' => 1, 'testB' => 2);
        $Vwktyfaiy3w3     = array('testA' => 23, 'testB' => 24, 'testC' => 25);
        $Vwcb1oykhumm  = array('testA' => 1, 'testB' => 2, 'testC' => 25);
        $Vwktyfaiy3w3ated = PHPUnit_Util_XML::assertValidKeys($V4a4guv4okog, $Vwktyfaiy3w3);

        $this->assertEquals($Vwcb1oykhumm, $Vwktyfaiy3w3ated);
    }

    public function testAssertValidKeysDefaultValuesB()
    {
        $V4a4guv4okog   = array();
        $Vwktyfaiy3w3     = array('testA' => 23, 'testB' => 24, 'testC' => 25);
        $Vwcb1oykhumm  = array('testA' => 23, 'testB' => 24, 'testC' => 25);
        $Vwktyfaiy3w3ated = PHPUnit_Util_XML::assertValidKeys($V4a4guv4okog, $Vwktyfaiy3w3);

        $this->assertEquals($Vwcb1oykhumm, $Vwktyfaiy3w3ated);
    }

    public function testAssertValidKeysInvalidKey()
    {
        $V4a4guv4okog = array('testA' => 1, 'testB' => 2, 'testD' => 3);
        $Vwktyfaiy3w3   = array('testA', 'testB', 'testC');

        try {
            $Vwktyfaiy3w3ated = PHPUnit_Util_XML::assertValidKeys($V4a4guv4okog, $Vwktyfaiy3w3);
            $this->fail();
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->assertEquals('Unknown key(s): testD', $Vpt32vvhspnv->getMessage());
        }
    }

    public function testAssertValidKeysInvalidKeys()
    {
        $V4a4guv4okog = array('testA' => 1, 'testD' => 2, 'testE' => 3);
        $Vwktyfaiy3w3   = array('testA', 'testB', 'testC');

        try {
            $Vwktyfaiy3w3ated = PHPUnit_Util_XML::assertValidKeys($V4a4guv4okog, $Vwktyfaiy3w3);
            $this->fail();
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->assertEquals('Unknown key(s): testD, testE', $Vpt32vvhspnv->getMessage());
        }
    }

    public function testConvertAssertSelect()
    {
        $V1hhloxwgmev  = 'div#folder.open a[href="http://www.xerox.com"][title="xerox"].selected.big > span + h1';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag'        => 'div',
                           'id'         => 'folder',
                           'class'      => 'open',
                           'descendant' => array('tag'        => 'a',
                                                 'class'      => 'selected big',
                                                 'attributes' => array('href'             => 'http://www.xerox.com',
                                                                       'title'            => 'xerox'),
                                                 'child'      => array('tag'              => 'span',
                                                                       'adjacent-sibling' => array('tag' => 'h1'))));
        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectElt()
    {
        $V1hhloxwgmev  = 'div';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertClass()
    {
        $V1hhloxwgmev  = '.foo';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('class' => 'foo');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertId()
    {
        $V1hhloxwgmev  = '#foo';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('id' => 'foo');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertAttribute()
    {
        $V1hhloxwgmev  = '[foo="bar"]';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('attributes' => array('foo' => 'bar'));

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertAttributeSpaces()
    {
        $V1hhloxwgmev  = '[foo="bar baz"] div[value="foo bar"]';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('attributes' => array('foo'        => 'bar baz'),
                           'descendant' => array('tag'        => 'div',
                                                 'attributes' => array('value' => 'foo bar')));
        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertAttributeMultipleSpaces()
    {
        $V1hhloxwgmev  = '[foo="bar baz"] div[value="foo bar baz"]';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('attributes' => array('foo'        => 'bar baz'),
                          'descendant'  => array('tag'        => 'div',
                                                'attributes'  => array('value' => 'foo bar baz')));
        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltClass()
    {
        $V1hhloxwgmev  = 'div.foo';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'class' => 'foo');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltId()
    {
        $V1hhloxwgmev  = 'div#foo';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'id' => 'foo');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltAttrEqual()
    {
        $V1hhloxwgmev  = 'div[foo="bar"]';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'attributes' => array('foo' => 'bar'));

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltMultiAttrEqual()
    {
        $V1hhloxwgmev  = 'div[foo="bar"][baz="fob"]';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'attributes' => array('foo' => 'bar', 'baz' => 'fob'));

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltAttrHasOne()
    {
        $V1hhloxwgmev  = 'div[foo~="bar"]';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'attributes' => array('foo' => 'regexp:/.*\bbar\b.*/'));

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltAttrContains()
    {
        $V1hhloxwgmev  = 'div[foo*="bar"]';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'attributes' => array('foo' => 'regexp:/.*bar.*/'));

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltChild()
    {
        $V1hhloxwgmev  = 'div > a';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'child' => array('tag' => 'a'));

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltAdjacentSibling()
    {
        $V1hhloxwgmev  = 'div + a';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'adjacent-sibling' => array('tag' => 'a'));

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectEltDescendant()
    {
        $V1hhloxwgmev  = 'div a';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev);
        $Vl2ijnnhdtam       = array('tag' => 'div', 'descendant' => array('tag' => 'a'));

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectContent()
    {
        $V1hhloxwgmev  = '#foo';
        $Vjdkyvjsoqdn   = 'div contents';
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev, $Vjdkyvjsoqdn);
        $Vl2ijnnhdtam       = array('id' => 'foo', 'content' => 'div contents');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectTrue()
    {
        $V1hhloxwgmev  = '#foo';
        $Vjdkyvjsoqdn   = true;
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev, $Vjdkyvjsoqdn);
        $Vl2ijnnhdtam       = array('id' => 'foo');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertSelectFalse()
    {
        $V1hhloxwgmev  = '#foo';
        $Vjdkyvjsoqdn   = false;
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev, $Vjdkyvjsoqdn);
        $Vl2ijnnhdtam       = array('id' => 'foo');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertNumber()
    {
        $V1hhloxwgmev  = '.foo';
        $Vjdkyvjsoqdn   = 3;
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev, $Vjdkyvjsoqdn);
        $Vl2ijnnhdtam       = array('class' => 'foo');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    public function testConvertAssertRange()
    {
        $V1hhloxwgmev  = '#foo';
        $Vjdkyvjsoqdn   = array('greater_than' => 5, 'less_than' => 10);
        $Vnveydugkapm = PHPUnit_Util_XML::convertSelectToTag($V1hhloxwgmev, $Vjdkyvjsoqdn);
        $Vl2ijnnhdtam       = array('id' => 'foo');

        $this->assertEquals($Vl2ijnnhdtam, $Vnveydugkapm);
    }

    
    public function testPrepareString($Vmmrcjsrjwsu)
    {
        $Vpt32vvhspnv = null;

        $Vpt32vvhspnvscapedString = PHPUnit_Util_XML::prepareString($Vmmrcjsrjwsu);
        $V0ytcao1avzu           = "<?xml version='1.0' encoding='UTF-8' ?><tag>$Vpt32vvhspnvscapedString</tag>";
        $Veu4emafikgi           = new DomDocument('1.0', 'UTF-8');

        try {
            $Veu4emafikgi->loadXML($V0ytcao1avzu);
        } catch (Exception $Vpt32vvhspnv) {
        }

        $this->assertNull($Vpt32vvhspnv, sprintf(
            'PHPUnit_Util_XML::prepareString("\x%02x") should not crash DomDocument',
            ord($Vmmrcjsrjwsu)
        ));
    }

    public function charProvider()
    {
        $Vqhzkfsafzrc = array();

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < 256; $Vxja1abp34yq++) {
            $Vqhzkfsafzrc[] = array(chr($Vxja1abp34yq));
        }

        return $Vqhzkfsafzrc;
    }

    
    public function testLoadEmptyString()
    {
        PHPUnit_Util_XML::load('');
    }

    
    public function testLoadArray()
    {
        PHPUnit_Util_XML::load(array(1, 2, 3));
    }

    
    public function testLoadBoolean()
    {
        PHPUnit_Util_XML::load(false);
    }

    public function testNestedXmlToVariable()
    {
        $V0ytcao1avzu = '<array><element key="a"><array><element key="b"><string>foo</string></element></array></element><element key="c"><string>bar</string></element></array>';
        $Veu4emafikgi = new DOMDocument();
        $Veu4emafikgi->loadXML($V0ytcao1avzu);

        $Vwcb1oykhumm = array(
            'a' => array(
                'b' => 'foo',
            ),
            'c' => 'bar',
        );

        $Vs4nw03sqcam = PHPUnit_Util_XML::xmlToVariable($Veu4emafikgi->documentElement);

        $this->assertSame($Vwcb1oykhumm, $Vs4nw03sqcam);
    }
}
