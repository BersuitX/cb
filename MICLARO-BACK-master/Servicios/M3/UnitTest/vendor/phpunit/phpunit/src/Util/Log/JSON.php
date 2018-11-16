<?php



class PHPUnit_Util_Log_JSON extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
{
    
    protected $Vct5uggh0b1p = '';

    
    protected $Vozgizelhzpd = '';

    
    protected $Vu152ucwxidt = true;

    
    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeCase(
            'error',
            $Vlbwbnl10iav,
            PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv, false),
            $Vpt32vvhspnv->getMessage(),
            $Vpswbntjg3pr
        );

        $this->currentTestPass = false;
    }

    
    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeCase(
            'fail',
            $Vlbwbnl10iav,
            PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv, false),
            $Vpt32vvhspnv->getMessage(),
            $Vpswbntjg3pr
        );

        $this->currentTestPass = false;
    }

    
    public function addIncompleteTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeCase(
            'error',
            $Vlbwbnl10iav,
            PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv, false),
            'Incomplete Test: ' . $Vpt32vvhspnv->getMessage(),
            $Vpswbntjg3pr
        );

        $this->currentTestPass = false;
    }

    
    public function addRiskyTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeCase(
            'error',
            $Vlbwbnl10iav,
            PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv, false),
            'Risky Test: ' . $Vpt32vvhspnv->getMessage(),
            $Vpswbntjg3pr
        );

        $this->currentTestPass = false;
    }

    
    public function addSkippedTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeCase(
            'error',
            $Vlbwbnl10iav,
            PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv, false),
            'Skipped Test: ' . $Vpt32vvhspnv->getMessage(),
            $Vpswbntjg3pr
        );

        $this->currentTestPass = false;
    }

    
    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        $this->currentTestSuiteName = $Vrrxtoyyy15e->getName();
        $this->currentTestName      = '';

        $this->write(
            array(
            'event' => 'suiteStart',
            'suite' => $this->currentTestSuiteName,
            'tests' => count($Vrrxtoyyy15e)
            )
        );
    }

    
    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        $this->currentTestSuiteName = '';
        $this->currentTestName      = '';
    }

    
    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        $this->currentTestName = PHPUnit_Util_Test::describe($Vpswbntjg3pr);
        $this->currentTestPass = true;

        $this->write(
            array(
            'event' => 'testStart',
            'suite' => $this->currentTestSuiteName,
            'test'  => $this->currentTestName
            )
        );
    }

    
    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav)
    {
        if ($this->currentTestPass) {
            $this->writeCase('pass', $Vlbwbnl10iav, array(), '', $Vpswbntjg3pr);
        }
    }

    
    protected function writeCase($Vmtvkqxvklrv, $Vlbwbnl10iav, array $V1babchxe11h = array(), $Vbl4yrmdan1y = '', $Vpswbntjg3pr = null)
    {
        $Vvaiuwffullu = '';
        
        if ($Vpswbntjg3pr !== null && method_exists($Vpswbntjg3pr, 'hasOutput') && $Vpswbntjg3pr->hasOutput()) {
            $Vvaiuwffullu = $Vpswbntjg3pr->getActualOutput();
        }
        $this->write(
            array(
            'event'   => 'test',
            'suite'   => $this->currentTestSuiteName,
            'test'    => $this->currentTestName,
            'status'  => $Vmtvkqxvklrv,
            'time'    => $Vlbwbnl10iav,
            'trace'   => $V1babchxe11h,
            'message' => PHPUnit_Util_String::convertToUtf8($Vbl4yrmdan1y),
            'output'  => $Vvaiuwffullu,
            )
        );
    }

    
    public function write($Vd3322ljwbqh)
    {
        array_walk_recursive($Vd3322ljwbqh, function (&$Vioma0xlpppc) {
            if (is_string($Vioma0xlpppc)) {
                $Vioma0xlpppc = PHPUnit_Util_String::convertToUtf8($Vioma0xlpppc);
            }
        });

        $Vrycsn2lkvcj = 0;

        if (defined('JSON_PRETTY_PRINT')) {
            $Vrycsn2lkvcj |= JSON_PRETTY_PRINT;
        }

        parent::write(json_encode($Vd3322ljwbqh, $Vrycsn2lkvcj));
    }
}
