<?php



class Framework_TestListenerTest extends PHPUnit_Framework_TestCase implements PHPUnit_Framework_TestListener
{
    protected $V2shw5lus2sl;
    protected $Vw4adp0k21wf;
    protected $Vvy50mqmbg5d;
    protected $Vwke0rvzw5b5;
    protected $Vgvdvn10wbme;
    protected $Vhgzyiod4fnn;
    protected $Vv0hyvhlkjqr;
    protected $Vyek0zj2vprp;

    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->errorCount++;
    }

    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->failureCount++;
    }

    public function addIncompleteTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->notImplementedCount++;
    }

    public function addRiskyTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->riskyCount++;
    }

    public function addSkippedTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->skippedCount++;
    }

    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
    }

    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
    }

    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        $this->startCount++;
    }

    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav)
    {
        $this->endCount++;
    }

    protected function setUp()
    {
        $this->result = new PHPUnit_Framework_TestResult;
        $this->result->addListener($this);

        $this->endCount            = 0;
        $this->failureCount        = 0;
        $this->notImplementedCount = 0;
        $this->riskyCount          = 0;
        $this->skippedCount        = 0;
        $this->startCount          = 0;
    }

    public function testError()
    {
        $Vpswbntjg3pr = new TestError;
        $Vpswbntjg3pr->run($this->result);

        $this->assertEquals(1, $this->errorCount);
        $this->assertEquals(1, $this->endCount);
    }

    public function testFailure()
    {
        $Vpswbntjg3pr = new Failure;
        $Vpswbntjg3pr->run($this->result);

        $this->assertEquals(1, $this->failureCount);
        $this->assertEquals(1, $this->endCount);
    }

    public function testStartStop()
    {
        $Vpswbntjg3pr = new Success;
        $Vpswbntjg3pr->run($this->result);

        $this->assertEquals(1, $this->startCount);
        $this->assertEquals(1, $this->endCount);
    }
}
