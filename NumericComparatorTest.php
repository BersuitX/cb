<?php


namespace SebastianBergmann\Comparator;


class NumericComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new NumericComparator;
    }

    public function acceptsSucceedsProvider()
    {
        return array(
          array(5, 10),
          array(8, '0'),
          array('10', 0),
          array(0x74c3b00c, 42),
          array(0755, 0777)
        );
    }

    public function acceptsFailsProvider()
    {
        return array(
          array('5', '10'),
          array(8, 5.0),
          array(5.0, 8),
          array(10, null),
          array(false, 12)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        return array(
          array(1337, 1337),
          array('1337', 1337),
          array(0x539, 1337),
          array(02471, 1337),
          array(1337, 1338, 1),
          array('1337', 1340, 5),
        );
    }

    public function assertEqualsFailsProvider()
    {
        return array(
          array(1337, 1338),
          array('1338', 1337),
          array(0x539, 1338),
          array(1337, 1339, 1),
          array('1337', 1340, 2),
        );
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

    
    public function testAssertEqualsSucceeds($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0)
    {
        $Vzzme31ixifp = null;

        try {
            $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m);
        }

        catch (ComparisonFailure $Vzzme31ixifp) {
        }

        $this->assertNull($Vzzme31ixifp, 'Unexpected ComparisonFailure');
    }

    
    public function testAssertEqualsFails($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0)
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', 'matches expected'
        );
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m);
    }
}
