<?php



class PHPUnit_Util_Log_JUnit extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
{
    
    protected $Vn3u2xbvygpr;

    
    protected $Vixd4iv51rfm;

    
    protected $Vb2aq5mm5da1 = false;

    
    protected $Voozakwq4baj = true;

    
    protected $V1n2y2nxkawh = array();

    
    protected $Vwdbpu1negpt = array(0);

    
    protected $Vh1cqe0crhsq = array(0);

    
    protected $Vtiblynwxwir = array(0);

    
    protected $Vy2wziau22f0 = array(0);

    
    protected $Vdqzlyidqcfj = array(0);

    
    protected $Vdjfqv15g14y = 0;

    
    protected $Vrd2qyjml4fb = null;

    
    protected $Vkbvrv3yaccc = true;

    
    public function __construct($Ve0j5uj4lgwz = null, $Vb2aq5mm5da1 = false)
    {
        $this->document               = new DOMDocument('1.0', 'UTF-8');
        $this->document->formatOutput = true;

        $this->root = $this->document->createElement('testsuites');
        $this->document->appendChild($this->root);

        parent::__construct($Ve0j5uj4lgwz);

        $this->logIncompleteSkipped = $Vb2aq5mm5da1;
    }

    
    public function flush()
    {
        if ($this->writeDocument === true) {
            $this->write($this->getXML());
        }

        parent::flush();
    }

    
    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_SelfDescribing) {
            $Vd3322ljwbqh = $Vpswbntjg3pr->toString() . PHP_EOL;
        } else {
            $Vd3322ljwbqh = '';
        }

        if ($Vpt32vvhspnv instanceof PHPUnit_Framework_ExceptionWrapper) {
            $V31qrja1w0r2    = $Vpt32vvhspnv->getClassname();
            $Vd3322ljwbqh .= (string) $Vpt32vvhspnv;
        } else {
            $V31qrja1w0r2    = get_class($Vpt32vvhspnv);
            $Vd3322ljwbqh .= PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv) . PHP_EOL .
                       PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv);
        }

        $Vpt32vvhspnvrror = $this->document->createElement(
            'error',
            PHPUnit_Util_XML::prepareString($Vd3322ljwbqh)
        );

        $Vpt32vvhspnvrror->setAttribute('type', $V31qrja1w0r2);

        $this->currentTestCase->appendChild($Vpt32vvhspnvrror);

        $this->testSuiteErrors[$this->testSuiteLevel]++;
    }

    
    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_SelfDescribing) {
            $Vd3322ljwbqh = $Vpswbntjg3pr->toString() . "\n";
        } else {
            $Vd3322ljwbqh = '';
        }

        $Vd3322ljwbqh .= PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv) .
                   "\n" .
                   PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv);

        $Vg5dv0qwgauj = $this->document->createElement(
            'failure',
            PHPUnit_Util_XML::prepareString($Vd3322ljwbqh)
        );

        $Vg5dv0qwgauj->setAttribute('type', get_class($Vpt32vvhspnv));

        $this->currentTestCase->appendChild($Vg5dv0qwgauj);

        $this->testSuiteFailures[$this->testSuiteLevel]++;
    }

    
    public function addIncompleteTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $Vpt32vvhspnvrror = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Incomplete Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv)
                )
            );

            $Vpt32vvhspnvrror->setAttribute('type', get_class($Vpt32vvhspnv));

            $this->currentTestCase->appendChild($Vpt32vvhspnvrror);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
    }

    
    public function addRiskyTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $Vpt32vvhspnvrror = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Risky Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv)
                )
            );

            $Vpt32vvhspnvrror->setAttribute('type', get_class($Vpt32vvhspnv));

            $this->currentTestCase->appendChild($Vpt32vvhspnvrror);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
    }

    
    public function addSkippedTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $Vpt32vvhspnvrror = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Skipped Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($Vpt32vvhspnv)
                )
            );

            $Vpt32vvhspnvrror->setAttribute('type', get_class($Vpt32vvhspnv));

            $this->currentTestCase->appendChild($Vpt32vvhspnvrror);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
    }

    
    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        $Vpswbntjg3prSuite = $this->document->createElement('testsuite');
        $Vpswbntjg3prSuite->setAttribute('name', $Vrrxtoyyy15e->getName());

        if (class_exists($Vrrxtoyyy15e->getName(), false)) {
            try {
                $Vqmu1sajhgfn = new ReflectionClass($Vrrxtoyyy15e->getName());

                $Vpswbntjg3prSuite->setAttribute('file', $Vqmu1sajhgfn->getFileName());
            } catch (ReflectionException $Vpt32vvhspnv) {
            }
        }

        if ($this->testSuiteLevel > 0) {
            $this->testSuites[$this->testSuiteLevel]->appendChild($Vpswbntjg3prSuite);
        } else {
            $this->root->appendChild($Vpswbntjg3prSuite);
        }

        $this->testSuiteLevel++;
        $this->testSuites[$this->testSuiteLevel]          = $Vpswbntjg3prSuite;
        $this->testSuiteTests[$this->testSuiteLevel]      = 0;
        $this->testSuiteAssertions[$this->testSuiteLevel] = 0;
        $this->testSuiteErrors[$this->testSuiteLevel]     = 0;
        $this->testSuiteFailures[$this->testSuiteLevel]   = 0;
        $this->testSuiteTimes[$this->testSuiteLevel]      = 0;
    }

    
    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'tests',
            $this->testSuiteTests[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'assertions',
            $this->testSuiteAssertions[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'failures',
            $this->testSuiteFailures[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'errors',
            $this->testSuiteErrors[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'time',
            sprintf('%F', $this->testSuiteTimes[$this->testSuiteLevel])
        );

        if ($this->testSuiteLevel > 1) {
            $this->testSuiteTests[$this->testSuiteLevel - 1]      += $this->testSuiteTests[$this->testSuiteLevel];
            $this->testSuiteAssertions[$this->testSuiteLevel - 1] += $this->testSuiteAssertions[$this->testSuiteLevel];
            $this->testSuiteErrors[$this->testSuiteLevel - 1]     += $this->testSuiteErrors[$this->testSuiteLevel];
            $this->testSuiteFailures[$this->testSuiteLevel - 1]   += $this->testSuiteFailures[$this->testSuiteLevel];
            $this->testSuiteTimes[$this->testSuiteLevel - 1]      += $this->testSuiteTimes[$this->testSuiteLevel];
        }

        $this->testSuiteLevel--;
    }

    
    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        $Vpswbntjg3prCase = $this->document->createElement('testcase');
        $Vpswbntjg3prCase->setAttribute('name', $Vpswbntjg3pr->getName());

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
            $Vqmu1sajhgfn      = new ReflectionClass($Vpswbntjg3pr);
            $Vc1exo5hbki5 = $Vpswbntjg3pr->getName();

            if ($Vqmu1sajhgfn->hasMethod($Vc1exo5hbki5)) {
                $Vtlfvdwskdge = $Vqmu1sajhgfn->getMethod($Vpswbntjg3pr->getName());

                $Vpswbntjg3prCase->setAttribute('class', $Vqmu1sajhgfn->getName());
                $Vpswbntjg3prCase->setAttribute('file', $Vqmu1sajhgfn->getFileName());
                $Vpswbntjg3prCase->setAttribute('line', $Vtlfvdwskdge->getStartLine());
            }
        }

        $this->currentTestCase = $Vpswbntjg3prCase;
    }

    
    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav)
    {
        if ($this->attachCurrentTestCase) {
            if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
                $Vxp05be3um3h = $Vpswbntjg3pr->getNumAssertions();
                $this->testSuiteAssertions[$this->testSuiteLevel] += $Vxp05be3um3h;

                $this->currentTestCase->setAttribute(
                    'assertions',
                    $Vxp05be3um3h
                );
            }

            $this->currentTestCase->setAttribute(
                'time',
                sprintf('%F', $Vlbwbnl10iav)
            );

            $this->testSuites[$this->testSuiteLevel]->appendChild(
                $this->currentTestCase
            );

            $this->testSuiteTests[$this->testSuiteLevel]++;
            $this->testSuiteTimes[$this->testSuiteLevel] += $Vlbwbnl10iav;

            if (method_exists($Vpswbntjg3pr, 'hasOutput') && $Vpswbntjg3pr->hasOutput()) {
                $Vypmxrk3a1av = $this->document->createElement('system-out');
                $Vypmxrk3a1av->appendChild(
                    $this->document->createTextNode($Vpswbntjg3pr->getActualOutput())
                );
                $this->currentTestCase->appendChild($Vypmxrk3a1av);
            }
        }

        $this->attachCurrentTestCase = true;
        $this->currentTestCase       = null;
    }

    
    public function getXML()
    {
        return $this->document->saveXML();
    }

    
    public function setWriteDocument($Vxda0t54j0xz)
    {
        if (is_bool($Vxda0t54j0xz)) {
            $this->writeDocument = $Vxda0t54j0xz;
        }
    }
}
