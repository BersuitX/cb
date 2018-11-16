<?php



class PHPUnit_Framework_TestResult implements Countable
{
    
    protected $Vxbm21ke5311 = array();

    
    protected $Vp5zivvcwyzv = array();

    
    protected $Ve2u2ohzoqze = array();

    
    protected $V0kz5ja2socz = array();

    
    protected $Vipu2105vwki = array();

    
    protected $V05tdp5a3iig = array();

    
    protected $Vp0ckltfwaym = array();

    
    protected $Vsverzad01av = 0;

    
    protected $Vlbwbnl10iav = 0;

    
    protected $Vrgd5r3552xi = null;

    
    protected $Vbnhjjh5ueuw;

    
    protected $Vwyiaruxoah0 = true;

    
    protected $Vbrre0i0j4ja = false;

    
    protected $Vbrre0i0j4jaOnError = false;

    
    protected $Vbrre0i0j4jaOnFailure = false;

    
    protected $Votefkdrb2li = false;

    
    protected $Vv4kn2jhkvqt = false;

    
    protected $Vojsnrkxn1q2 = false;

    
    protected $Vpgpvwqwc4xq = false;

    
    protected $Vbrre0i0j4jaOnRisky = false;

    
    protected $Vbrre0i0j4jaOnIncomplete = false;

    
    protected $Vbrre0i0j4jaOnSkipped = false;

    
    protected $Vm1zj2flnzfo = false;

    
    protected $Vlbwbnl10iavoutForSmallTests = 1;

    
    protected $Vlbwbnl10iavoutForMediumTests = 10;

    
    protected $Vlbwbnl10iavoutForLargeTests = 60;

    
    public function addListener(PHPUnit_Framework_TestListener $V13lyfwn4lxw)
    {
        $this->listeners[] = $V13lyfwn4lxw;
    }

    
    public function removeListener(PHPUnit_Framework_TestListener $V13lyfwn4lxw)
    {
        foreach ($this->listeners as $Vlpbz5aloxqt => $V5h22vpq1igl) {
            if ($V13lyfwn4lxw === $V5h22vpq1igl) {
                unset($this->listeners[$Vlpbz5aloxqt]);
            }
        }
    }

    
    public function flushListeners()
    {
        foreach ($this->listeners as $V13lyfwn4lxw) {
            if ($V13lyfwn4lxw instanceof PHPUnit_Util_Printer) {
                $V13lyfwn4lxw->flush();
            }
        }
    }

    
    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if ($Vpt32vvhspnv instanceof PHPUnit_Framework_RiskyTest) {
            $this->risky[] = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vpt32vvhspnv);
            $Vl15lrbokckh  = 'addRiskyTest';

            if ($this->stopOnRisky) {
                $this->stop();
            }
        } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_IncompleteTest) {
            $this->notImplemented[] = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vpt32vvhspnv);
            $Vl15lrbokckh           = 'addIncompleteTest';

            if ($this->stopOnIncomplete) {
                $this->stop();
            }
        } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_SkippedTest) {
            $this->skipped[] = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vpt32vvhspnv);
            $Vl15lrbokckh    = 'addSkippedTest';

            if ($this->stopOnSkipped) {
                $this->stop();
            }
        } else {
            $this->errors[] = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vpt32vvhspnv);
            $Vl15lrbokckh   = 'addError';

            if ($this->stopOnError || $this->stopOnFailure) {
                $this->stop();
            }
        }

        foreach ($this->listeners as $V13lyfwn4lxw) {
            $V13lyfwn4lxw->$Vl15lrbokckh($Vpswbntjg3pr, $Vpt32vvhspnv, $Vlbwbnl10iav);
        }

        $this->lastTestFailed = true;
        $this->time          += $Vlbwbnl10iav;
    }

    
    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        if ($Vpt32vvhspnv instanceof PHPUnit_Framework_RiskyTest ||
            $Vpt32vvhspnv instanceof PHPUnit_Framework_OutputError) {
            $this->risky[] = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vpt32vvhspnv);
            $Vl15lrbokckh  = 'addRiskyTest';

            if ($this->stopOnRisky) {
                $this->stop();
            }
        } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_IncompleteTest) {
            $this->notImplemented[] = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vpt32vvhspnv);
            $Vl15lrbokckh           = 'addIncompleteTest';

            if ($this->stopOnIncomplete) {
                $this->stop();
            }
        } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_SkippedTest) {
            $this->skipped[] = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vpt32vvhspnv);
            $Vl15lrbokckh    = 'addSkippedTest';

            if ($this->stopOnSkipped) {
                $this->stop();
            }
        } else {
            $this->failures[] = new PHPUnit_Framework_TestFailure($Vpswbntjg3pr, $Vpt32vvhspnv);
            $Vl15lrbokckh     = 'addFailure';

            if ($this->stopOnFailure) {
                $this->stop();
            }
        }

        foreach ($this->listeners as $V13lyfwn4lxw) {
            $V13lyfwn4lxw->$Vl15lrbokckh($Vpswbntjg3pr, $Vpt32vvhspnv, $Vlbwbnl10iav);
        }

        $this->lastTestFailed = true;
        $this->time          += $Vlbwbnl10iav;
    }

    
    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        if ($this->topTestSuite === null) {
            $this->topTestSuite = $Vrrxtoyyy15e;
        }

        foreach ($this->listeners as $V13lyfwn4lxw) {
            $V13lyfwn4lxw->startTestSuite($Vrrxtoyyy15e);
        }
    }

    
    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        foreach ($this->listeners as $V13lyfwn4lxw) {
            $V13lyfwn4lxw->endTestSuite($Vrrxtoyyy15e);
        }
    }

    
    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        $this->lastTestFailed = false;
        $this->runTests      += count($Vpswbntjg3pr);

        foreach ($this->listeners as $V13lyfwn4lxw) {
            $V13lyfwn4lxw->startTest($Vpswbntjg3pr);
        }
    }

    
    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav)
    {
        foreach ($this->listeners as $V13lyfwn4lxw) {
            $V13lyfwn4lxw->endTest($Vpswbntjg3pr, $Vlbwbnl10iav);
        }

        if (!$this->lastTestFailed && $Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
            $Vqmu1sajhgfn  = get_class($Vpswbntjg3pr);
            $Vlpbz5aloxqt    = $Vqmu1sajhgfn . '::' . $Vpswbntjg3pr->getName();

            $this->passed[$Vlpbz5aloxqt] = array(
                'result' => $Vpswbntjg3pr->getResult(),
                'size'   => PHPUnit_Util_Test::getSize(
                    $Vqmu1sajhgfn,
                    $Vpswbntjg3pr->getName(false)
                )
            );

            $this->time += $Vlbwbnl10iav;
        }
    }

    
    public function allHarmless()
    {
        return $this->riskyCount() == 0;
    }

    
    public function riskyCount()
    {
        return count($this->risky);
    }

    
    public function allCompletelyImplemented()
    {
        return $this->notImplementedCount() == 0;
    }

    
    public function notImplementedCount()
    {
        return count($this->notImplemented);
    }

    
    public function risky()
    {
        return $this->risky;
    }

    
    public function notImplemented()
    {
        return $this->notImplemented;
    }

    
    public function noneSkipped()
    {
        return $this->skippedCount() == 0;
    }

    
    public function skippedCount()
    {
        return count($this->skipped);
    }

    
    public function skipped()
    {
        return $this->skipped;
    }

    
    public function errorCount()
    {
        return count($this->errors);
    }

    
    public function errors()
    {
        return $this->errors;
    }

    
    public function failureCount()
    {
        return count($this->failures);
    }

    
    public function failures()
    {
        return $this->failures;
    }

    
    public function passed()
    {
        return $this->passed;
    }

    
    public function topTestSuite()
    {
        return $this->topTestSuite;
    }

    
    public function getCollectCodeCoverageInformation()
    {
        return $this->codeCoverage !== null;
    }

    
    public function run(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        PHPUnit_Framework_Assert::resetCount();

        $Vpt32vvhspnvrror      = false;
        $Vg5dv0qwgauj    = false;
        $V4ckjtxkcd2a = false;
        $Vipu2105vwki      = false;
        $V05tdp5a3iig    = false;

        $this->startTest($Vpswbntjg3pr);

        $Vpt32vvhspnvrrorHandlerSet = false;

        if ($this->convertErrorsToExceptions) {
            $Vseauswhoh33 = set_error_handler(
                array('PHPUnit_Util_ErrorHandler', 'handleError'),
                E_ALL | E_STRICT
            );

            if ($Vseauswhoh33 === null) {
                $Vpt32vvhspnvrrorHandlerSet = true;
            } else {
                restore_error_handler();
            }
        }

        $Vkxe2fui2wqv = $this->codeCoverage !== null &&
                               !$Vpswbntjg3pr instanceof PHPUnit_Extensions_SeleniumTestCase &&
                               !$Vpswbntjg3pr instanceof PHPUnit_Framework_Warning;

        if ($Vkxe2fui2wqv) {
            
            if (!$this->codeCoverage->filter()->hasWhitelist()) {
                $Vqmu1sajhgfnes = $this->getHierarchy(get_class($Vpswbntjg3pr), true);

                foreach ($Vqmu1sajhgfnes as $Vqmu1sajhgfn) {
                    $this->codeCoverage->filter()->addFileToBlacklist(
                        $Vqmu1sajhgfn->getFileName()
                    );
                }
            }

            $this->codeCoverage->start($Vpswbntjg3pr);
        }

        PHP_Timer::start();

        try {
            if (!$Vpswbntjg3pr instanceof PHPUnit_Framework_Warning &&
                $Vpswbntjg3pr->getSize() != PHPUnit_Util_Test::UNKNOWN &&
                $this->beStrictAboutTestSize &&
                extension_loaded('pcntl') && class_exists('PHP_Invoker')) {
                switch ($Vpswbntjg3pr->getSize()) {
                    case PHPUnit_Util_Test::SMALL:
                        $V2inhvbsleao = $this->timeoutForSmallTests;
                        break;

                    case PHPUnit_Util_Test::MEDIUM:
                        $V2inhvbsleao = $this->timeoutForMediumTests;
                        break;

                    case PHPUnit_Util_Test::LARGE:
                        $V2inhvbsleao = $this->timeoutForLargeTests;
                        break;
                }

                $Vw1ardt4umwg = new PHP_Invoker;
                $Vw1ardt4umwg->invoke(array($Vpswbntjg3pr, 'runBare'), array(), $V2inhvbsleao);
            } else {
                $Vpswbntjg3pr->runBare();
            }
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            $Vg5dv0qwgauj = true;

            if ($Vpt32vvhspnv instanceof PHPUnit_Framework_RiskyTestError) {
                $Vipu2105vwki = true;
            } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_IncompleteTestError) {
                $V4ckjtxkcd2a = true;
            } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_SkippedTestError) {
                $V05tdp5a3iig = true;
            }
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $Vpt32vvhspnvrror = true;
        } catch (Throwable $Vpt32vvhspnv) {
            $Vpt32vvhspnv     = new PHPUnit_Framework_ExceptionWrapper($Vpt32vvhspnv);
            $Vpt32vvhspnvrror = true;
        } catch (Exception $Vpt32vvhspnv) {
            $Vpt32vvhspnv     = new PHPUnit_Framework_ExceptionWrapper($Vpt32vvhspnv);
            $Vpt32vvhspnvrror = true;
        }

        $Vlbwbnl10iav = PHP_Timer::stop();
        $Vpswbntjg3pr->addToAssertionCount(PHPUnit_Framework_Assert::getCount());

        if ($this->beStrictAboutTestsThatDoNotTestAnything &&
            $Vpswbntjg3pr->getNumAssertions() == 0) {
            $Vipu2105vwki = true;
        }

        if ($Vkxe2fui2wqv) {
            $Vjznpzrwkw3n           = !$Vipu2105vwki && !$V4ckjtxkcd2a && !$V05tdp5a3iig;
            $V34rdprczie1 = array();
            $Vws0vthwrneb    = array();

            if ($Vjznpzrwkw3n && $Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
                $V34rdprczie1 = PHPUnit_Util_Test::getLinesToBeCovered(
                    get_class($Vpswbntjg3pr),
                    $Vpswbntjg3pr->getName(false)
                );

                $Vws0vthwrneb = PHPUnit_Util_Test::getLinesToBeUsed(
                    get_class($Vpswbntjg3pr),
                    $Vpswbntjg3pr->getName(false)
                );
            }

            try {
                $this->codeCoverage->stop(
                    $Vjznpzrwkw3n,
                    $V34rdprczie1,
                    $Vws0vthwrneb
                );
            } catch (PHP_CodeCoverage_Exception_UnintentionallyCoveredCode $Viphi1nc2cmp) {
                $this->addFailure(
                    $Vpswbntjg3pr,
                    new PHPUnit_Framework_UnintentionallyCoveredCodeError(
                        'This test executed code that is not listed as code to be covered or used:' .
                        PHP_EOL . $Viphi1nc2cmp->getMessage()
                    ),
                    $Vlbwbnl10iav
                );
            } catch (PHPUnit_Framework_InvalidCoversTargetException $Viphi1nc2cmp) {
                $this->addFailure(
                    $Vpswbntjg3pr,
                    new PHPUnit_Framework_InvalidCoversTargetError(
                        $Viphi1nc2cmp->getMessage()
                    ),
                    $Vlbwbnl10iav
                );
            } catch (PHP_CodeCoverage_Exception $Viphi1nc2cmp) {
                $Vpt32vvhspnvrror = true;

                if (!isset($Vpt32vvhspnv)) {
                    $Vpt32vvhspnv = $Viphi1nc2cmp;
                }
            }
        }

        if ($Vpt32vvhspnvrrorHandlerSet === true) {
            restore_error_handler();
        }

        if ($Vpt32vvhspnvrror === true) {
            $this->addError($Vpswbntjg3pr, $Vpt32vvhspnv, $Vlbwbnl10iav);
        } elseif ($Vg5dv0qwgauj === true) {
            $this->addFailure($Vpswbntjg3pr, $Vpt32vvhspnv, $Vlbwbnl10iav);
        } elseif ($this->beStrictAboutTestsThatDoNotTestAnything &&
                 $Vpswbntjg3pr->getNumAssertions() == 0) {
            $this->addFailure(
                $Vpswbntjg3pr,
                new PHPUnit_Framework_RiskyTestError(
                    'This test did not perform any assertions'
                ),
                $Vlbwbnl10iav
            );
        } elseif ($this->beStrictAboutOutputDuringTests && $Vpswbntjg3pr->hasOutput()) {
            $this->addFailure(
                $Vpswbntjg3pr,
                new PHPUnit_Framework_OutputError(
                    sprintf(
                        'This test printed output: %s',
                        $Vpswbntjg3pr->getActualOutput()
                    )
                ),
                $Vlbwbnl10iav
            );
        } elseif ($this->beStrictAboutTodoAnnotatedTests && $Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
            $Vqececac1ouq = $Vpswbntjg3pr->getAnnotations();

            if (isset($Vqececac1ouq['method']['todo'])) {
                $this->addFailure(
                    $Vpswbntjg3pr,
                    new PHPUnit_Framework_RiskyTestError(
                        'Test method is annotated with @todo'
                    ),
                    $Vlbwbnl10iav
                );
            }
        }

        $this->endTest($Vpswbntjg3pr, $Vlbwbnl10iav);
    }

    
    public function count()
    {
        return $this->runTests;
    }

    
    public function shouldStop()
    {
        return $this->stop;
    }

    
    public function stop()
    {
        $this->stop = true;
    }

    
    public function getCodeCoverage()
    {
        return $this->codeCoverage;
    }

    
    public function setCodeCoverage(PHP_CodeCoverage $Vbnhjjh5ueuw)
    {
        $this->codeCoverage = $Vbnhjjh5ueuw;
    }

    
    public function convertErrorsToExceptions($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->convertErrorsToExceptions = $Vxda0t54j0xz;
    }

    
    public function getConvertErrorsToExceptions()
    {
        return $this->convertErrorsToExceptions;
    }

    
    public function stopOnError($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->stopOnError = $Vxda0t54j0xz;
    }

    
    public function stopOnFailure($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->stopOnFailure = $Vxda0t54j0xz;
    }

    
    public function beStrictAboutTestsThatDoNotTestAnything($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutTestsThatDoNotTestAnything = $Vxda0t54j0xz;
    }

    
    public function isStrictAboutTestsThatDoNotTestAnything()
    {
        return $this->beStrictAboutTestsThatDoNotTestAnything;
    }

    
    public function beStrictAboutOutputDuringTests($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutOutputDuringTests = $Vxda0t54j0xz;
    }

    
    public function isStrictAboutOutputDuringTests()
    {
        return $this->beStrictAboutOutputDuringTests;
    }

    
    public function beStrictAboutTestSize($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutTestSize = $Vxda0t54j0xz;
    }

    
    public function isStrictAboutTestSize()
    {
        return $this->beStrictAboutTestSize;
    }

    
    public function beStrictAboutTodoAnnotatedTests($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutTodoAnnotatedTests = $Vxda0t54j0xz;
    }

    
    public function isStrictAboutTodoAnnotatedTests()
    {
        return $this->beStrictAboutTodoAnnotatedTests;
    }

    
    public function stopOnRisky($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->stopOnRisky = $Vxda0t54j0xz;
    }

    
    public function stopOnIncomplete($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->stopOnIncomplete = $Vxda0t54j0xz;
    }

    
    public function stopOnSkipped($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->stopOnSkipped = $Vxda0t54j0xz;
    }

    
    public function time()
    {
        return $this->time;
    }

    
    public function wasSuccessful()
    {
        return empty($this->errors) && empty($this->failures);
    }

    
    public function setTimeoutForSmallTests($Vlbwbnl10iavout)
    {
        if (!is_integer($Vlbwbnl10iavout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

        $this->timeoutForSmallTests = $Vlbwbnl10iavout;
    }

    
    public function setTimeoutForMediumTests($Vlbwbnl10iavout)
    {
        if (!is_integer($Vlbwbnl10iavout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

        $this->timeoutForMediumTests = $Vlbwbnl10iavout;
    }

    
    public function setTimeoutForLargeTests($Vlbwbnl10iavout)
    {
        if (!is_integer($Vlbwbnl10iavout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

        $this->timeoutForLargeTests = $Vlbwbnl10iavout;
    }

    
    protected function getHierarchy($Vqmu1sajhgfnName, $Vd3xhk0hmcjm = false)
    {
        if ($Vd3xhk0hmcjm) {
            $Vqmu1sajhgfnes = array(new ReflectionClass($Vqmu1sajhgfnName));
        } else {
            $Vqmu1sajhgfnes = array($Vqmu1sajhgfnName);
        }

        $Vqxcg43wz0yd = false;

        while (!$Vqxcg43wz0yd) {
            if ($Vd3xhk0hmcjm) {
                $Vqmu1sajhgfn = new ReflectionClass(
                    $Vqmu1sajhgfnes[count($Vqmu1sajhgfnes) - 1]->getName()
                );
            } else {
                $Vqmu1sajhgfn = new ReflectionClass($Vqmu1sajhgfnes[count($Vqmu1sajhgfnes) - 1]);
            }

            $Vz4c1zo3dvrb = $Vqmu1sajhgfn->getParentClass();

            if ($Vz4c1zo3dvrb !== false) {
                if ($Vd3xhk0hmcjm) {
                    $Vqmu1sajhgfnes[] = $Vz4c1zo3dvrb;
                } else {
                    $Vqmu1sajhgfnes[] = $Vz4c1zo3dvrb->getName();
                }
            } else {
                $Vqxcg43wz0yd = true;
            }
        }

        return $Vqmu1sajhgfnes;
    }
}
