<?php
class DataProviderTest extends PHPUnit_Framework_TestCase
{
    
    public function testAdd($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru)
    {
        $this->assertEquals($Vibefsvmlpru, $Vmbzc5xgwrgo + $Vglk1nbl1t2o);
    }

    public static function providerMethod()
    {
        return array(
          array(0, 0, 0),
          array(0, 1, 1),
          array(1, 1, 3),
          array(1, 0, 1)
        );
    }
}
