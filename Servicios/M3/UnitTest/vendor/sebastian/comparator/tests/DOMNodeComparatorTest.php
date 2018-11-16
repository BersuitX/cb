<?php


namespace SebastianBergmann\Comparator;

use DOMNode;
use DOMDocument;


class DOMNodeComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new DOMNodeComparator;
    }

    public function acceptsSucceedsProvider()
    {
        $Vn3u2xbvygpr = new DOMDocument;
        $Vpbrymo1kvdk = new DOMNode;

        return array(
          array($Vn3u2xbvygpr, $Vn3u2xbvygpr),
          array($Vpbrymo1kvdk, $Vpbrymo1kvdk),
          array($Vn3u2xbvygpr, $Vpbrymo1kvdk),
          array($Vpbrymo1kvdk, $Vn3u2xbvygpr)
        );
    }

    public function acceptsFailsProvider()
    {
        $Vn3u2xbvygpr = new DOMDocument;

        return array(
          array($Vn3u2xbvygpr, null),
          array(null, $Vn3u2xbvygpr),
          array(null, null)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        return array(
          array(
            $this->createDOMDocument('<root></root>'),
            $this->createDOMDocument('<root/>')
          ),
          array(
            $this->createDOMDocument('<root attr="bar"></root>'),
            $this->createDOMDocument('<root attr="bar"/>')
          ),
          array(
            $this->createDOMDocument('<root><foo attr="bar"></foo></root>'),
            $this->createDOMDocument('<root><foo attr="bar"/></root>')
          ),
          array(
            $this->createDOMDocument("<root>\n  <child/>\n</root>"),
            $this->createDOMDocument('<root><child/></root>')
          ),
        );
    }

    public function assertEqualsFailsProvider()
    {
        return array(
          array(
            $this->createDOMDocument('<root></root>'),
            $this->createDOMDocument('<bar/>')
          ),
          array(
            $this->createDOMDocument('<foo attr1="bar"/>'),
            $this->createDOMDocument('<foo attr1="foobar"/>')
          ),
          array(
            $this->createDOMDocument('<foo> bar </foo>'),
            $this->createDOMDocument('<foo />')
          ),
          array(
            $this->createDOMDocument('<foo xmlns="urn:myns:bar"/>'),
            $this->createDOMDocument('<foo xmlns="urn:notmyns:bar"/>')
          ),
          array(
            $this->createDOMDocument('<foo> bar </foo>'),
            $this->createDOMDocument('<foo> bir </foo>')
          )
        );
    }

    private function createDOMDocument($Vjdkyvjsoqdn)
    {
        $Vn3u2xbvygpr = new DOMDocument;
        $Vn3u2xbvygpr->preserveWhiteSpace = false;
        $Vn3u2xbvygpr->loadXML($Vjdkyvjsoqdn);

        return $Vn3u2xbvygpr;
    }

    
    public function testAcceptsSucceeds($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        $this->assertTrue(
          $this->comparator->accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
        );
    }

    
    public function testAcceptsFails($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        $this->assertFalse(
          $this->comparator->accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
        );
    }

    
    public function testAssertEqualsSucceeds($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        $Vzzme31ixifp = null;

        try {
            $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam);
        }

        catch (ComparisonFailure $Vzzme31ixifp) {
        }

        $this->assertNull($Vzzme31ixifp, 'Unexpected ComparisonFailure');
    }

    
    public function testAssertEqualsFails($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure',
          'Failed asserting that two DOM'
        );
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam);
    }
}
