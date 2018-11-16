<?php


namespace SebastianBergmann\Comparator;


class MockObjectComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new MockObjectComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsSucceedsProvider()
    {
        $V2c23pbtyy1h = $this->getMock('SebastianBergmann\\Comparator\\TestClass');
        $Vptrfvju1rkl = $this->getMock('stdClass');

        return array(
          array($V2c23pbtyy1h, $V2c23pbtyy1h),
          array($Vptrfvju1rkl, $Vptrfvju1rkl),
          array($Vptrfvju1rkl, $V2c23pbtyy1h)
        );
    }

    public function acceptsFailsProvider()
    {
        $Vptrfvju1rkl = $this->getMock('stdClass');

        return array(
          array($Vptrfvju1rkl, null),
          array(null, $Vptrfvju1rkl),
          array(null, null)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        
        $Vyxebjx5z2wz = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $Vyxebjx5z2wz->author = $this->getMock('SebastianBergmann\\Comparator\\Author', null, array('Terry Pratchett'));
        $Vyxebjx5z2wz->author->books[] = $Vyxebjx5z2wz;
        $V1hzvsd5jqbv = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $V1hzvsd5jqbv->author = $this->getMock('SebastianBergmann\\Comparator\\Author', null, array('Terry Pratchett'));
        $V1hzvsd5jqbv->author->books[] = $V1hzvsd5jqbv;

        $Vypt3xbndpiy = $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(4, 8, 15));
        $Vmpqnchrhzxy = $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(4, 8, 15));

        return array(
          array($Vypt3xbndpiy, $Vypt3xbndpiy),
          array($Vypt3xbndpiy, $Vmpqnchrhzxy),
          array($Vyxebjx5z2wz, $Vyxebjx5z2wz),
          array($Vyxebjx5z2wz, $V1hzvsd5jqbv),
          array(
            $this->getMock('SebastianBergmann\\Comparator\\Struct', null, array(2.3)),
            $this->getMock('SebastianBergmann\\Comparator\\Struct', null, array(2.5)),
            0.5
          )
        );
    }

    public function assertEqualsFailsProvider()
    {
        $Vxili3qh1drq = 'is not instance of expected class';
        $Vdkf041txquw = 'Failed asserting that two objects are equal.';

        
        $Vyxebjx5z2wz = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $Vyxebjx5z2wz->author = $this->getMock('SebastianBergmann\\Comparator\\Author', null, array('Terry Pratchett'));
        $Vyxebjx5z2wz->author->books[] = $Vyxebjx5z2wz;
        $V1hzvsd5jqbv = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $V1hzvsd5jqbv->author = $this->getMock('SebastianBergmann\\Comparator\\Author', null, array('Terry Pratch'));
        $V1hzvsd5jqbv->author->books[] = $V1hzvsd5jqbv;

        $Vvjg5iuyh1gm = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $Vvjg5iuyh1gm->author = 'Terry Pratchett';
        $Vmwss2hfqjzr = $this->getMock('stdClass');
        $Vmwss2hfqjzr->author = 'Terry Pratchett';

        $Vypt3xbndpiy = $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(4, 8, 15));
        $Vmpqnchrhzxy = $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(16, 23, 42));

        return array(
          array(
            $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(4, 8, 15)),
            $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(16, 23, 42)),
            $Vdkf041txquw
          ),
          array($Vypt3xbndpiy, $Vmpqnchrhzxy, $Vdkf041txquw),
          array($Vyxebjx5z2wz, $V1hzvsd5jqbv, $Vdkf041txquw),
          array($Vvjg5iuyh1gm, $Vmwss2hfqjzr, $Vxili3qh1drq),
          array(
            $this->getMock('SebastianBergmann\\Comparator\\Struct', null, array(2.3)),
            $this->getMock('SebastianBergmann\\Comparator\\Struct', null, array(4.2)),
            $Vdkf041txquw,
            0.5
          )
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

    
    public function testAssertEqualsFails($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y, $Vxo5kvys4l4m = 0.0)
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', $Vbl4yrmdan1y
        );
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m);
    }
}
