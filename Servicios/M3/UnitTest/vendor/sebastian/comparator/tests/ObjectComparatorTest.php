<?php


namespace SebastianBergmann\Comparator;

use stdClass;


class ObjectComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new ObjectComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsSucceedsProvider()
    {
        return array(
          array(new TestClass, new TestClass),
          array(new stdClass, new stdClass),
          array(new stdClass, new TestClass)
        );
    }

    public function acceptsFailsProvider()
    {
        return array(
          array(new stdClass, null),
          array(null, new stdClass),
          array(null, null)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        
        $Vyxebjx5z2wz = new Book;
        $Vyxebjx5z2wz->author = new Author('Terry Pratchett');
        $Vyxebjx5z2wz->author->books[] = $Vyxebjx5z2wz;
        $V1hzvsd5jqbv = new Book;
        $V1hzvsd5jqbv->author = new Author('Terry Pratchett');
        $V1hzvsd5jqbv->author->books[] = $V1hzvsd5jqbv;

        $Vypt3xbndpiy = new SampleClass(4, 8, 15);
        $Vmpqnchrhzxy = new SampleClass(4, 8, 15);

        return array(
          array($Vypt3xbndpiy, $Vypt3xbndpiy),
          array($Vypt3xbndpiy, $Vmpqnchrhzxy),
          array($Vyxebjx5z2wz, $Vyxebjx5z2wz),
          array($Vyxebjx5z2wz, $V1hzvsd5jqbv),
          array(new Struct(2.3), new Struct(2.5), 0.5)
        );
    }

    public function assertEqualsFailsProvider()
    {
        $Vxili3qh1drq = 'is not instance of expected class';
        $Vdkf041txquw = 'Failed asserting that two objects are equal.';

        
        $Vyxebjx5z2wz = new Book;
        $Vyxebjx5z2wz->author = new Author('Terry Pratchett');
        $Vyxebjx5z2wz->author->books[] = $Vyxebjx5z2wz;
        $V1hzvsd5jqbv = new Book;
        $V1hzvsd5jqbv->author = new Author('Terry Pratch');
        $V1hzvsd5jqbv->author->books[] = $V1hzvsd5jqbv;

        $Vvjg5iuyh1gm = new Book;
        $Vvjg5iuyh1gm->author = 'Terry Pratchett';
        $Vmwss2hfqjzr = new stdClass;
        $Vmwss2hfqjzr->author = 'Terry Pratchett';

        $Vypt3xbndpiy = new SampleClass( 4,  8, 15);
        $Vmpqnchrhzxy = new SampleClass(16, 23, 42);

        return array(
          array(new SampleClass(4, 8, 15), new SampleClass(16, 23, 42), $Vdkf041txquw),
          array($Vypt3xbndpiy, $Vmpqnchrhzxy, $Vdkf041txquw),
          array($Vyxebjx5z2wz, $V1hzvsd5jqbv, $Vdkf041txquw),
          array($Vvjg5iuyh1gm, $Vmwss2hfqjzr, $Vxili3qh1drq),
          array(new Struct(2.3), new Struct(4.2), $Vdkf041txquw, 0.5)
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
