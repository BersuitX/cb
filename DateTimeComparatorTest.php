<?php


namespace SebastianBergmann\Comparator;

use DateTime;
use DateTimeImmutable;
use DateTimeZone;


class DateTimeComparatorTest extends \PHPUnit_Framework_TestCase
{
    private $V23fl2cvtaex;

    protected function setUp()
    {
        $this->comparator = new DateTimeComparator;
    }

    public function acceptsFailsProvider()
    {
        $Vn25skasrq1i = new DateTime;

        return array(
          array($Vn25skasrq1i, null),
          array(null, $Vn25skasrq1i),
          array(null, null)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        return array(
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York'))
          ),
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 04:13:25', new DateTimeZone('America/New_York')),
            10
          ),
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 04:14:40', new DateTimeZone('America/New_York')),
            65
          ),
          array(
            new DateTime('2013-03-29', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29', new DateTimeZone('America/New_York'))
          ),
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 03:13:35', new DateTimeZone('America/Chicago'))
          ),
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 03:13:49', new DateTimeZone('America/Chicago')),
            15
          ),
          array(
            new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 23:00:00', new DateTimeZone('America/Chicago'))
          ),
          array(
            new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 23:01:30', new DateTimeZone('America/Chicago')),
            100
          ),
          array(
            new DateTime('@1364616000'),
            new DateTime('2013-03-29 23:00:00', new DateTimeZone('America/Chicago'))
          ),
          array(
            new DateTime('2013-03-29T05:13:35-0500'),
            new DateTime('2013-03-29T04:13:35-0600')
          )
        );
    }

    public function assertEqualsFailsProvider()
    {
        return array(
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 03:13:35', new DateTimeZone('America/New_York'))
          ),
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 03:13:35', new DateTimeZone('America/New_York')),
            3500
          ),
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 05:13:35', new DateTimeZone('America/New_York')),
            3500
          ),
          array(
            new DateTime('2013-03-29', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-30', new DateTimeZone('America/New_York'))
          ),
          array(
            new DateTime('2013-03-29', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
            43200
          ),
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/Chicago')),
          ),
          array(
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/Chicago')),
            3500
          ),
          array(
            new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
            new DateTime('2013-03-30', new DateTimeZone('America/Chicago'))
          ),
          array(
            new DateTime('2013-03-29T05:13:35-0600'),
            new DateTime('2013-03-29T04:13:35-0600')
          ),
          array(
            new DateTime('2013-03-29T05:13:35-0600'),
            new DateTime('2013-03-29T05:13:35-0500')
          ),
        );
    }

    
    public function testAcceptsSucceeds()
    {
        $this->assertTrue(
          $this->comparator->accepts(
            new DateTime,
            new DateTime
          )
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
          'SebastianBergmann\\Comparator\\ComparisonFailure',
          'Failed asserting that two DateTime objects are equal.'
        );
        $this->comparator->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m);
    }

    
    public function testAcceptsDateTimeInterface()
    {
        $this->assertTrue($this->comparator->accepts(new DateTime, new DateTimeImmutable));
    }

    
    public function testSupportsDateTimeInterface()
    {
        $this->comparator->assertEquals(
          new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
          new DateTimeImmutable('2013-03-29 04:13:35', new DateTimeZone('America/New_York'))
        );
    }
}
