<?php
class StackTest extends PHPUnit_Framework_TestCase
{
    public function testPush()
    {
        $V4g2wbm2eqr0 = array();
        $this->assertEquals(0, count($V4g2wbm2eqr0));

        array_push($V4g2wbm2eqr0, 'foo');
        $this->assertEquals('foo', $V4g2wbm2eqr0[count($V4g2wbm2eqr0)-1]);
        $this->assertEquals(1, count($V4g2wbm2eqr0));

        return $V4g2wbm2eqr0;
    }

    
    public function testPop(array $V4g2wbm2eqr0)
    {
        $this->assertEquals('foo', array_pop($V4g2wbm2eqr0));
        $this->assertEquals(0, count($V4g2wbm2eqr0));
    }
}
