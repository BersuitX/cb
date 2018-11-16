<?php



class Framework_TestImplementorTest extends PHPUnit_Framework_TestCase
{
    
    public function testSuccessfulRun()
    {
        $Vv0hyvhlkjqr = new PHPUnit_Framework_TestResult;

        $Vpswbntjg3pr = new DoubleTestCase(new Success);
        $Vpswbntjg3pr->run($Vv0hyvhlkjqr);

        $this->assertEquals(count($Vpswbntjg3pr), count($Vv0hyvhlkjqr));
        $this->assertEquals(0, $Vv0hyvhlkjqr->errorCount());
        $this->assertEquals(0, $Vv0hyvhlkjqr->failureCount());
    }
}
