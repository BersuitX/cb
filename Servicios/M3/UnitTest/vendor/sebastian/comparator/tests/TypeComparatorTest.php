<?php


namespace SebastianBergmann\Comparator;

use stdClass;


class TypeComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new TypeComparator;
    }

    public function acceptsSucceedsProvider()
    {
        return array(
          array(true, 1),
          array(false, array(1)),
          array(null, new stdClass),
          array(1.0, 5),
          array("", "")
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        return array(
          array(true, true),
          array(true, false),
          array(false, false),
          array(null, null),
          array(new stdClass, new stdClass),
          array(0, 0),
          array(1.0, 2.0),
          array("hello", "world"),
          array("", ""),
          array(array(), array(1,2,3))
        );
    }

    public function assertEqualsFailsProvider()
    {
        return array(
          array(true, null),
          array(null, false),
          array(1.0, 0),
          array(new stdClass, array()),
          array("1", 1)
        );
    }

    
    public function testAcceptsSucceeds($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        $this->assertTrue(
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
        $this->setExpectedException('SebastianBergmann\\Comparator\\ComparisonFailure', 'does not match expected type');
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam);
    }
}
