<?php


use PHPUnit\Framework\TestCase;

class PHP_TimerTest extends TestCase
{
    
    public function testStartStop()
    {
        $this->assertInternalType('float', PHP_Timer::stop());
    }

    
    public function testSecondsToTimeString($Ve5tcsso230g, $Vhpym4znuypn)
    {
        $this->assertEquals(
            $Ve5tcsso230g,
            PHP_Timer::secondsToTimeString($Vhpym4znuypn)
        );
    }

    
    public function testTimeSinceStartOfRequest()
    {
        $this->assertStringMatchesFormat(
            '%f %s',
            PHP_Timer::timeSinceStartOfRequest()
        );
    }


    
    public function testResourceUsage()
    {
        $this->assertStringMatchesFormat(
            'Time: %s, Memory: %fMB',
            PHP_Timer::resourceUsage()
        );
    }

    public function secondsProvider()
    {
        return array(
          array('0 ms', 0),
          array('1 ms', .001),
          array('10 ms', .01),
          array('100 ms', .1),
          array('999 ms', .999),
          array('1 second', .9999),
          array('1 second', 1),
          array('2 seconds', 2),
          array('59.9 seconds', 59.9),
          array('59.99 seconds', 59.99),
          array('59.99 seconds', 59.999),
          array('1 minute', 59.9999),
          array('59 seconds', 59.001),
          array('59.01 seconds', 59.01),
          array('1 minute', 60),
          array('1.01 minutes', 61),
          array('2 minutes', 120),
          array('2.01 minutes', 121),
          array('59.99 minutes', 3599.9),
          array('59.99 minutes', 3599.99),
          array('59.99 minutes', 3599.999),
          array('1 hour', 3599.9999),
          array('59.98 minutes', 3599.001),
          array('59.98 minutes', 3599.01),
          array('1 hour', 3600),
          array('1 hour', 3601),
          array('1 hour', 3601.9),
          array('1 hour', 3601.99),
          array('1 hour', 3601.999),
          array('1 hour', 3601.9999),
          array('1.01 hours', 3659.9999),
          array('1.01 hours', 3659.001),
          array('1.01 hours', 3659.01),
          array('2 hours', 7199.9999),
        );
    }
}
