<?php


namespace SebastianBergmann\Comparator;


class ArrayComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new ArrayComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsFailsProvider()
    {
        return array(
          array(array(), null),
          array(null, array()),
          array(null, null)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        return array(
          array(
            array('a' => 1, 'b' => 2),
            array('b' => 2, 'a' => 1)
          ),
          array(
            array(1),
            array('1')
          ),
          array(
            array(3, 2, 1),
            array(2, 3, 1),
            0,
            true
          ),
          array(
            array(2.3),
            array(2.5),
            0.5
          ),
          array(
            array(array(2.3)),
            array(array(2.5)),
            0.5
          ),
          array(
            array(new Struct(2.3)),
            array(new Struct(2.5)),
            0.5
          ),
        );
    }

    public function assertEqualsFailsProvider()
    {
        return array(
          array(
            array(),
            array(0 => 1)
          ),
          array(
            array(0 => 1),
            array()
          ),
          array(
            array(0 => null),
            array()
          ),
          array(
            array(0 => 1, 1 => 2),
            array(0 => 1, 1 => 3)
          ),
          array(
            array('a', 'b' => array(1, 2)),
            array('a', 'b' => array(2, 1))
          ),
          array(
            array(2.3),
            array(4.2),
            0.5
          ),
          array(
            array(array(2.3)),
            array(array(4.2)),
            0.5
          ),
          array(
            array(new Struct(2.3)),
            array(new Struct(4.2)),
            0.5
          )
        );
    }

    
    public function testAcceptsSucceeds()
    {
        $this->assertTrue(
          $this->comparator->accepts(array(), array())
        );
    }

    
    public function testAcceptsFails($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        $this->assertFalse(
          $this->comparator->accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
        );
    }

    
    public function testAssertEqualsSucceeds($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false)
    {
        $Vzzme31ixifp = null;

        try {
            $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m, $Vgxxhufhstfx);
        }

        catch (ComparisonFailure $Vzzme31ixifp) {
        }

        $this->assertNull($Vzzme31ixifp, 'Unexpected ComparisonFailure');
    }

    
    public function testAssertEqualsFails($Vwcb1oykhumm, $Vs4nw03sqcam,$Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false)
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure',
          'Failed asserting that two arrays are equal'
        );
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m, $Vgxxhufhstfx);
    }
}
