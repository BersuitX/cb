<?php



class Framework_BaseTestListenerTest extends PHPUnit_Framework_TestCase
{
    
    private $Vv0hyvhlkjqr;

    
    public function testEndEventsAreCounted()
    {
        $this->result = new PHPUnit_Framework_TestResult;
        $V13lyfwn4lxw     = new BaseTestListenerSample();
        $this->result->addListener($V13lyfwn4lxw);
        $Vpswbntjg3pr = new Success;
        $Vpswbntjg3pr->run($this->result);

        $this->assertEquals(1, $V13lyfwn4lxw->endCount);
    }
}
