<?php


namespace SebastianBergmann\Comparator;


class ScalarComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new ScalarComparator;
    }

    public function acceptsSucceedsProvider()
    {
        return array(
          array("string", "string"),
          array(new ClassWithToString, "string"),
          array("string", new ClassWithToString),
          array("string", null),
          array(false, "string"),
          array(false, true),
          array(null, false),
          array(null, null),
          array("10", 10),
          array("", false),
          array("1", true),
          array(1, true),
          array(0, false),
          array(0.1, "0.1")
        );
    }

    public function acceptsFailsProvider()
    {
        return array(
          array(array(), array()),
          array("string", array()),
          array(new ClassWithToString, new ClassWithToString),
          array(false, new ClassWithToString),
          array(tmpfile(), tmpfile())
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        return array(
          array("string", "string"),
          array(new ClassWithToString, new ClassWithToString),
          array("string representation", new ClassWithToString),
          array(new ClassWithToString, "string representation"),
          array("string", "STRING", true),
          array("STRING", "string", true),
          array("String Representation", new ClassWithToString, true),
          array(new ClassWithToString, "String Representation", true),
          array("10", 10),
          array("", false),
          array("1", true),
          array(1, true),
          array(0, false),
          array(0.1, "0.1"),
          array(false, null),
          array(false, false),
          array(true, true),
          array(null, null)
        );
    }

    public function assertEqualsFailsProvider()
    {
        $Vpuuass2dude = 'Failed asserting that two strings are equal.';
        $Vfznnyvzmkv3 = 'matches expected';

        return array(
          array("string", "other string", $Vpuuass2dude),
          array("string", "STRING", $Vpuuass2dude),
          array("STRING", "string", $Vpuuass2dude),
          array("string", "other string", $Vpuuass2dude),
          
          array('9E6666666','9E7777777', $Vpuuass2dude),
          array(new ClassWithToString, "does not match", $Vfznnyvzmkv3),
          array("does not match", new ClassWithToString, $Vfznnyvzmkv3),
          array(0, 'Foobar', $Vfznnyvzmkv3),
          array('Foobar', 0, $Vfznnyvzmkv3),
          array("10", 25, $Vfznnyvzmkv3),
          array("1", false, $Vfznnyvzmkv3),
          array("", true, $Vfznnyvzmkv3),
          array(false, true, $Vfznnyvzmkv3),
          array(true, false, $Vfznnyvzmkv3),
          array(null, true, $Vfznnyvzmkv3),
          array(0, true, $Vfznnyvzmkv3)
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

    
    public function testAssertEqualsSucceeds($Vwcb1oykhumm, $Vs4nw03sqcam, $V2tcbx0tpkh3 = false)
    {
        $Vzzme31ixifp = null;

        try {
            $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, 0.0, false, $V2tcbx0tpkh3);
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
