<?php



abstract class PHPUnit_Util_TestDox_ResultPrinter extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
{
    
    protected $Vr1aix331ko3;

    
    protected $Vawfkxxex1u2 = '';

    
    protected $Vxygmb1h0brw = false;

    
    protected $Vo50qpjpkko3 = array();

    
    protected $Vb1qb0i3cxk3 = 0;

    
    protected $Vu0mplggaacu = 0;

    
    protected $Vipu2105vwki = 0;

    
    protected $V05tdp5a3iig = 0;

    
    protected $V4ckjtxkcd2a = 0;

    
    protected $Vpuun5leaafi;

    
    protected $Vaeyipsu5rdp;

    
    public function __construct($Ve0j5uj4lgwz = null)
    {
        parent::__construct($Ve0j5uj4lgwz);

        $this->prettifier = new PHPUnit_Util_TestDox_NamePrettifier;
        $this->startRun();
    }

    
    public function flush()
    {
        $this->doEndClass();
        $this->endRun();

        parent::flush();
    }

    
    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if (!$this->isOfInterest($Vpswbntjg3pr)) {
            return;
        }

        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
        $this->failed++;
    }

    
    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if (!$this->isOfInterest($Vpswbntjg3pr)) {
            return;
        }

        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
        $this->failed++;
    }

    
    public function addIncompleteTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if (!$this->isOfInterest($Vpswbntjg3pr)) {
            return;
        }

        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_INCOMPLETE;
        $this->incomplete++;
    }

    
    public function addRiskyTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if (!$this->isOfInterest($Vpswbntjg3pr)) {
            return;
        }

        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_RISKY;
        $this->risky++;
    }

    
    public function addSkippedTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if (!$this->isOfInterest($Vpswbntjg3pr)) {
            return;
        }

        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_SKIPPED;
        $this->skipped++;
    }

    
    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
    }

    
    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
    }

    
    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        if (!$this->isOfInterest($Vpswbntjg3pr)) {
            return;
        }

        $Vqmu1sajhgfn = get_class($Vpswbntjg3pr);

        if ($this->testClass != $Vqmu1sajhgfn) {
            if ($this->testClass != '') {
                $this->doEndClass();
            }

            $this->currentTestClassPrettified = $this->prettifier->prettifyTestClass($Vqmu1sajhgfn);
            $this->startClass($Vqmu1sajhgfn);

            $this->testClass = $Vqmu1sajhgfn;
            $this->tests     = array();
        }

        $Vhe3u0r4243e = false;

        $Vqececac1ouq = $Vpswbntjg3pr->getAnnotations();

        if (isset($Vqececac1ouq['method']['testdox'][0])) {
            $this->currentTestMethodPrettified = $Vqececac1ouq['method']['testdox'][0];
            $Vhe3u0r4243e                        = true;
        }

        if (!$Vhe3u0r4243e) {
            $this->currentTestMethodPrettified = $this->prettifier->prettifyTestMethod($Vpswbntjg3pr->getName(false));
        }

        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_PASSED;
    }

    
    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav)
    {
        if (!$this->isOfInterest($Vpswbntjg3pr)) {
            return;
        }

        if (!isset($this->tests[$this->currentTestMethodPrettified])) {
            if ($this->testStatus == PHPUnit_Runner_BaseTestRunner::STATUS_PASSED) {
                $this->tests[$this->currentTestMethodPrettified]['success'] = 1;
                $this->tests[$this->currentTestMethodPrettified]['failure'] = 0;
            } else {
                $this->tests[$this->currentTestMethodPrettified]['success'] = 0;
                $this->tests[$this->currentTestMethodPrettified]['failure'] = 1;
            }
        } else {
            if ($this->testStatus == PHPUnit_Runner_BaseTestRunner::STATUS_PASSED) {
                $this->tests[$this->currentTestMethodPrettified]['success']++;
            } else {
                $this->tests[$this->currentTestMethodPrettified]['failure']++;
            }
        }

        $this->currentTestClassPrettified  = null;
        $this->currentTestMethodPrettified = null;
    }

    
    protected function doEndClass()
    {
        foreach ($this->tests as $Vgpjmw221p0b => $Vqhzkfsafzrc) {
            $this->onTest($Vgpjmw221p0b, $Vqhzkfsafzrc['failure'] == 0);
        }

        $this->endClass($this->testClass);
    }

    
    protected function startRun()
    {
    }

    
    protected function startClass($Vgpjmw221p0b)
    {
    }

    
    protected function onTest($Vgpjmw221p0b, $V1haejvd0urz = true)
    {
    }

    
    protected function endClass($Vgpjmw221p0b)
    {
    }

    
    protected function endRun()
    {
    }

    private function isOfInterest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        return $Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase && get_class($Vpswbntjg3pr) != 'PHPUnit_Framework_Warning';
    }
}
