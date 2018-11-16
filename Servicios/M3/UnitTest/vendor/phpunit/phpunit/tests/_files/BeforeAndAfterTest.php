<?php
class BeforeAndAfterTest extends PHPUnit_Framework_TestCase
{
    public static $Vaws5oe4ref4;
    public static $Vl0mfbgkyfxv;

    public static function resetProperties()
    {
        self::$Vaws5oe4ref4 = 0;
        self::$Vl0mfbgkyfxv  = 0;
    }

    
    public function initialSetup()
    {
        self::$Vaws5oe4ref4++;
    }

    
    public function finalTeardown()
    {
        self::$Vl0mfbgkyfxv++;
    }

    public function test1()
    {
    }
    public function test2()
    {
    }
}
