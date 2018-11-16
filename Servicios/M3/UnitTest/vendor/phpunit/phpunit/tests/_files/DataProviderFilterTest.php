<?php
class DataProviderFilterTest extends PHPUnit_Framework_TestCase
{
    
    public function testTrue($Vmfscuvwz4uh)
    {
        $this->assertTrue($Vmfscuvwz4uh);
    }

    public static function truthProvider()
    {
        return array(
           array(true),
           array(true),
           array(true),
           array(true)
        );
    }

    
    public function testFalse($Vhun3izlydlh)
    {
        $this->assertFalse($Vhun3izlydlh);
    }

    public static function falseProvider()
    {
        return array(
          'false test'       => array(false),
          'false test 2'     => array(false),
          'other false test' => array(false),
          'other false test2'=> array(false)
        );
    }
}
