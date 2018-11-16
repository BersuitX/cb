<?php


namespace SebastianBergmann\Comparator;


class ResourceComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new ResourceComparator;
    }

    public function acceptsSucceedsProvider()
    {
        $V3m2acqbisuf = tmpfile();
        $V3jf12ussz3m = tmpfile();

        return array(
          array($V3m2acqbisuf, $V3m2acqbisuf),
          array($V3jf12ussz3m, $V3jf12ussz3m),
          array($V3m2acqbisuf, $V3jf12ussz3m)
        );
    }

    public function acceptsFailsProvider()
    {
        $V3m2acqbisuf = tmpfile();

        return array(
          array($V3m2acqbisuf, null),
          array(null, $V3m2acqbisuf),
          array(null, null)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        $V3m2acqbisuf = tmpfile();
        $V3jf12ussz3m = tmpfile();

        return array(
          array($V3m2acqbisuf, $V3m2acqbisuf),
          array($V3jf12ussz3m, $V3jf12ussz3m)
        );
    }

    public function assertEqualsFailsProvider()
    {
        $V3m2acqbisuf = tmpfile();
        $V3jf12ussz3m = tmpfile();

        return array(
          array($V3m2acqbisuf, $V3jf12ussz3m),
          array($V3jf12ussz3m, $V3m2acqbisuf)
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
        $this->setExpectedException('SebastianBergmann\\Comparator\\ComparisonFailure');
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam);
    }
}
