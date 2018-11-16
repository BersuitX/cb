<?php



class PHPUnit_Util_Log_TAP extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
{
    
    protected $Vhs1l0kknbf3 = 0;

    
    protected $Vdjfqv15g14y = 0;

    
    protected $Vdrdk54z1uuc = true;

    
    public function __construct($Ve0j5uj4lgwz = null)
    {
        parent::__construct($Ve0j5uj4lgwz);
        $this->write("TAP version 13\n");
    }

    
    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeNotOk($Vpswbntjg3pr, 'Error');
    }

    
    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeNotOk($Vpswbntjg3pr, 'Failure');

        $Vbl4yrmdan1y = explode(
            "\n",
            PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
        );

        $Vdwz2rxdqrqe = array(
          'message'  => $Vbl4yrmdan1y[0],
          'severity' => 'fail'
        );

        if ($Vpt32vvhspnv instanceof PHPUnit_Framework_ExpectationFailedException) {
            $Vw1knpsdfnai = $Vpt32vvhspnv->getComparisonFailure();

            if ($Vw1knpsdfnai !== null) {
                $Vdwz2rxdqrqe['data'] = array(
                  'got'      => $Vw1knpsdfnai->getActual(),
                  'expected' => $Vw1knpsdfnai->getExpected()
                );
            }
        }

        $Vklvvq0m52jf = new Symfony\Component\Yaml\Dumper;

        $this->write(
            sprintf(
                "  ---\n%s  ...\n",
                $Vklvvq0m52jf->dump($Vdwz2rxdqrqe, 2, 2)
            )
        );
    }

    
    public function addIncompleteTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeNotOk($Vpswbntjg3pr, '', 'TODO Incomplete Test');
    }

    
    public function addRiskyTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->write(
            sprintf(
                "ok %d - # RISKY%s\n",
                $this->testNumber,
                $Vpt32vvhspnv->getMessage() != '' ? ' ' . $Vpt32vvhspnv->getMessage() : ''
            )
        );

        $this->testSuccessful = false;
    }

    
    public function addSkippedTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->write(
            sprintf(
                "ok %d - # SKIP%s\n",
                $this->testNumber,
                $Vpt32vvhspnv->getMessage() != '' ? ' ' . $Vpt32vvhspnv->getMessage() : ''
            )
        );

        $this->testSuccessful = false;
    }

    
    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        $this->testSuiteLevel++;
    }

    
    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        $this->testSuiteLevel--;

        if ($this->testSuiteLevel == 0) {
            $this->write(sprintf("1..%d\n", $this->testNumber));
        }
    }

    
    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        $this->testNumber++;
        $this->testSuccessful = true;
    }

    
    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav)
    {
        if ($this->testSuccessful === true) {
            $this->write(
                sprintf(
                    "ok %d - %s\n",
                    $this->testNumber,
                    PHPUnit_Util_Test::describe($Vpswbntjg3pr)
                )
            );
        }

        $this->writeDiagnostics($Vpswbntjg3pr);
    }

    
    protected function writeNotOk(PHPUnit_Framework_Test $Vpswbntjg3pr, $V2hf2uebv5m0 = '', $V5hxlinxnkjp = '')
    {
        $this->write(
            sprintf(
                "not ok %d - %s%s%s\n",
                $this->testNumber,
                $V2hf2uebv5m0 != '' ? $V2hf2uebv5m0 . ': ' : '',
                PHPUnit_Util_Test::describe($Vpswbntjg3pr),
                $V5hxlinxnkjp != '' ? ' # ' . $V5hxlinxnkjp : ''
            )
        );

        $this->testSuccessful = false;
    }

    
    private function writeDiagnostics(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        if (!$Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
            return;
        }

        if (!$Vpswbntjg3pr->hasOutput()) {
            return;
        }

        foreach (explode("\n", trim($Vpswbntjg3pr->getActualOutput())) as $Vrwsmtja4f2j) {
            $this->write(
                sprintf(
                    "# %s\n",
                    $Vrwsmtja4f2j
                )
            );
        }
    }
}
