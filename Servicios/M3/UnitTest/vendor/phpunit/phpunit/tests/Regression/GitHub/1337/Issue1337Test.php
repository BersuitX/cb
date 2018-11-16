<?php
class Issue1337Test extends PHPUnit_Framework_TestCase
{
    
    public function testProvider($Vmbzc5xgwrgo)
    {
        $this->assertTrue($Vmbzc5xgwrgo);
    }

    public function dataProvider()
    {
        return array(
          'c:\\'=> array(true),
          0.9   => array(true)
        );
    }
}
