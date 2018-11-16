<?php



class Framework_TestFailureTest extends PHPUnit_Framework_TestCase
{
    
    public function testToString()
    {
        $Vpswbntjg3pr      = new self(__FUNCTION__);
        $Vzzme31ixifp = new PHPUnit_Framework_Exception('message');
        $Vg5dv0qwgauj   = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vzzme31ixifp);

        $this->assertEquals(__METHOD__ . ': message', $Vg5dv0qwgauj->toString());
    }
}
