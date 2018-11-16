<?php
class BeforeClassAndAfterClassTest extends PHPUnit_Framework_TestCase
{
    public static $Vo5jv0xkdbjg = 0;
    public static $V5fw1ldihnvw  = 0;

    public static function resetProperties()
    {
        self::$Vo5jv0xkdbjg = 0;
        self::$V5fw1ldihnvw  = 0;
    }

    
    public static function initialClassSetup()
    {
        self::$Vo5jv0xkdbjg++;
    }

    
    public static function finalClassTeardown()
    {
        self::$V5fw1ldihnvw++;
    }

    public function test1()
    {
    }
    public function test2()
    {
    }
}
