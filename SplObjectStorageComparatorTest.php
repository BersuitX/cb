<?php


namespace SebastianBergmann\Comparator;

use SplObjectStorage;
use stdClass;


class SplObjectStorageComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new SplObjectStorageComparator;
    }

    public function acceptsFailsProvider()
    {
        return array(
          array(new SplObjectStorage, new stdClass),
          array(new stdClass, new SplObjectStorage),
          array(new stdClass, new stdClass)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        $Vypt3xbndpiy = new stdClass();
        $Vmpqnchrhzxy = new stdClass();

        $V1oyf3k5iuiw = new SplObjectStorage();
        $Vzo32zv0tioc = new SplObjectStorage();

        $Vlq00hm4gsps = new SplObjectStorage();
        $Vlq00hm4gsps->attach($Vypt3xbndpiy);
        $Vlq00hm4gsps->attach($Vmpqnchrhzxy);

        $Vuexdfisi2s4 = new SplObjectStorage();
        $Vuexdfisi2s4->attach($Vmpqnchrhzxy);
        $Vuexdfisi2s4->attach($Vypt3xbndpiy);

        return array(
          array($V1oyf3k5iuiw, $V1oyf3k5iuiw),
          array($V1oyf3k5iuiw, $Vzo32zv0tioc),
          array($Vlq00hm4gsps, $Vlq00hm4gsps),
          array($Vlq00hm4gsps, $Vuexdfisi2s4)
        );
    }

    public function assertEqualsFailsProvider()
    {
        $Vypt3xbndpiy = new stdClass;
        $Vmpqnchrhzxy = new stdClass;

        $V1oyf3k5iuiw = new SplObjectStorage;

        $Vzo32zv0tioc = new SplObjectStorage;
        $Vzo32zv0tioc->attach($Vypt3xbndpiy);

        $Vlq00hm4gsps = new SplObjectStorage;
        $Vlq00hm4gsps->attach($Vmpqnchrhzxy);
        $Vlq00hm4gsps->attach($Vypt3xbndpiy);

        return array(
          array($V1oyf3k5iuiw, $Vzo32zv0tioc),
          array($V1oyf3k5iuiw, $Vlq00hm4gsps),
          array($Vzo32zv0tioc, $Vlq00hm4gsps),
        );
    }

    
    public function testAcceptsSucceeds()
    {
        $this->assertTrue(
          $this->comparator->accepts(
            new SplObjectStorage,
            new SplObjectStorage
          )
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
          'Failed asserting that two objects are equal.'
        );
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam);
    }
}
