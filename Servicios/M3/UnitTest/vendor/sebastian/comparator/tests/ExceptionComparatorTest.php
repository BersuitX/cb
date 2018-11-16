<?php


namespace SebastianBergmann\Comparator;

use \Exception;
use \RuntimeException;


class ExceptionComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new ExceptionComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsSucceedsProvider()
    {
        return array(
          array(new Exception, new Exception),
          array(new RuntimeException, new RuntimeException),
          array(new Exception, new RuntimeException)
        );
    }

    public function acceptsFailsProvider()
    {
        return array(
          array(new Exception, null),
          array(null, new Exception),
          array(null, null)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        $Vyyqqatkzyrk = new Exception;
        $Vl5dikokgv2s = new Exception;

        $V2z5yrmp1jhy = new RunTimeException('Error', 100);
        $Vzehauybdkwz = new RunTimeException('Error', 100);

        return array(
          array($Vyyqqatkzyrk, $Vyyqqatkzyrk),
          array($Vyyqqatkzyrk, $Vl5dikokgv2s),
          array($V2z5yrmp1jhy, $V2z5yrmp1jhy),
          array($V2z5yrmp1jhy, $Vzehauybdkwz)
        );
    }

    public function assertEqualsFailsProvider()
    {
        $Vxili3qh1drq = 'not instance of expected class';
        $Vdkf041txquw = 'Failed asserting that two objects are equal.';

        $Vyyqqatkzyrk = new Exception('Error', 100);
        $Vl5dikokgv2s = new Exception('Error', 101);
        $V2z5yrmp1jhy = new Exception('Errors', 101);

        $Vzehauybdkwz = new RunTimeException('Error', 100);
        $Vcy3yzxohfv2 = new RunTimeException('Error', 101);

        return array(
          array($Vyyqqatkzyrk, $Vl5dikokgv2s, $Vdkf041txquw),
          array($Vyyqqatkzyrk, $V2z5yrmp1jhy, $Vdkf041txquw),
          array($Vyyqqatkzyrk, $Vzehauybdkwz, $Vxili3qh1drq),
          array($Vl5dikokgv2s, $V2z5yrmp1jhy, $Vdkf041txquw),
          array($Vzehauybdkwz, $Vcy3yzxohfv2, $Vdkf041txquw)
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

    
    public function testAssertEqualsFails($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y)
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', $Vbl4yrmdan1y
        );
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam);
    }
}
