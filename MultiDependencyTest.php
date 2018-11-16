<?php
class MultiDependencyTest extends PHPUnit_Framework_TestCase
{
    public function testOne()
    {
        return 'foo';
    }

    public function testTwo()
    {
        return 'bar';
    }

    
    public function testThree($Vmbzc5xgwrgo, $Vglk1nbl1t2o)
    {
        $this->assertEquals('foo', $Vmbzc5xgwrgo);
        $this->assertEquals('bar', $Vglk1nbl1t2o);
    }
}
