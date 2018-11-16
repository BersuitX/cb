<?php
class DataProviderIncompleteTest extends PHPUnit_Framework_TestCase
{
    
    public function testIncomplete($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru)
    {
        $this->assertTrue(true);
    }

    
    public function testAdd($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru)
    {
        $this->assertEquals($Vibefsvmlpru, $Vmbzc5xgwrgo + $Vglk1nbl1t2o);
    }

    public function incompleteTestProviderMethod()
    {
        $this->markTestIncomplete('incomplete');

        return array(
          array(0, 0, 0),
          array(0, 1, 1),
        );
    }

    public static function providerMethod()
    {
        return array(
          array(0, 0, 0),
          array(0, 1, 1),
        );
    }
}
