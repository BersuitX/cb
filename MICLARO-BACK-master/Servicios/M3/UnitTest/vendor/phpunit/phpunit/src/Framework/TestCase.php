<?php


use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\GlobalState\Restorer;
use SebastianBergmann\GlobalState\Blacklist;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Exporter\Exporter;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophet;


abstract class PHPUnit_Framework_TestCase extends PHPUnit_Framework_Assert implements PHPUnit_Framework_Test, PHPUnit_Framework_SelfDescribing
{
    
    protected $Vaf3jfgkfpgj = null;

    
    protected $Vaf3jfgkfpgjBlacklist = array();

    
    protected $V1ji0ss4bexn = null;

    
    protected $V1ji0ss4bexnBlacklist = array();

    
    protected $Vqgwnt0xmvnd = null;

    
    protected $Vp1jxu3mlxbh = true;

    
    private $Vl425ui1thjy = false;

    
    private $Vqhzkfsafzrc = array();

    
    private $VqhzkfsafzrcName = '';

    
    private $Vpilod0srpsw = null;

    
    private $Vaotvv1iuhjl = null;

    
    private $Vaotvv1iuhjlMessage = '';

    
    private $Vaotvv1iuhjlMessageRegExp = '';

    
    private $Vaotvv1iuhjlCode;

    
    private $Vgpjmw221p0b = null;

    
    private $Vdym0g0ze30a = array();

    
    private $Vnuolsqyewfx = array();

    
    private $Vkvhbademoiu = array();

    
    private $Vbzxpjv3aqae = array();

    
    private $Vkme0ppynlnk = array();

    
    private $V4bv52zwut0y = null;

    
    private $Vmtvkqxvklrv;

    
    private $VmtvkqxvklrvMessage = '';

    
    private $Vxp05be3um3h = 0;

    
    private $Vv0hyvhlkjqr;

    
    private $Vc4pv4vb5gu4;

    
    private $Vvaiuwffullu = '';

    
    private $VvaiuwffulluExpectedRegex = null;

    
    private $VvaiuwffulluExpectedString = null;

    
    private $VvaiuwffulluCallback = false;

    
    private $VvaiuwffulluBufferingActive = false;

    
    private $VvaiuwffulluBufferingLevel;

    
    private $V5idjdtohxgf;

    
    private $Vtmqbbauby5a;

    
    private $Vks0edyzahxn = false;

    
    public function __construct($Vgpjmw221p0b = null, array $Vqhzkfsafzrc = array(), $VqhzkfsafzrcName = '')
    {
        if ($Vgpjmw221p0b !== null) {
            $this->setName($Vgpjmw221p0b);
        }

        $this->data                = $Vqhzkfsafzrc;
        $this->dataName            = $VqhzkfsafzrcName;
    }

    
    public function toString()
    {
        $Vqmu1sajhgfn = new ReflectionClass($this);

        $Vd3322ljwbqh = sprintf(
            '%s::%s',
            $Vqmu1sajhgfn->name,
            $this->getName(false)
        );

        return $Vd3322ljwbqh . $this->getDataSetAsString();
    }

    
    public function count()
    {
        return 1;
    }

    
    public function getAnnotations()
    {
        return PHPUnit_Util_Test::parseTestMethodAnnotations(
            get_class($this),
            $this->name
        );
    }

    
    public function getName($Vk3mp3c0pa1a = true)
    {
        if ($Vk3mp3c0pa1a) {
            return $this->name . $this->getDataSetAsString(false);
        } else {
            return $this->name;
        }
    }

    
    public function getSize()
    {
        return PHPUnit_Util_Test::getSize(
            get_class($this),
            $this->getName(false)
        );
    }

    
    public function getActualOutput()
    {
        if (!$this->outputBufferingActive) {
            return $this->output;
        } else {
            return ob_get_contents();
        }
    }

    
    public function hasOutput()
    {
        if (strlen($this->output) === 0) {
            return false;
        }

        if ($this->hasExpectationOnOutput()) {
            return false;
        }

        return true;
    }

    
    public function expectOutputRegex($Vljkuqveyox0)
    {
        if ($this->outputExpectedString !== null) {
            throw new PHPUnit_Framework_Exception;
        }

        if (is_string($Vljkuqveyox0) || is_null($Vljkuqveyox0)) {
            $this->outputExpectedRegex = $Vljkuqveyox0;
        }
    }

    
    public function expectOutputString($V0dhbsgbugyc)
    {
        if ($this->outputExpectedRegex !== null) {
            throw new PHPUnit_Framework_Exception;
        }

        if (is_string($V0dhbsgbugyc) || is_null($V0dhbsgbugyc)) {
            $this->outputExpectedString = $V0dhbsgbugyc;
        }
    }

    
    public function hasPerformedExpectationsOnOutput()
    {
        return $this->hasExpectationOnOutput();
    }

    
    public function hasExpectationOnOutput()
    {
        return is_string($this->outputExpectedString) || is_string($this->outputExpectedRegex);
    }

    
    public function getExpectedException()
    {
        return $this->expectedException;
    }

    
    public function setExpectedException($Vhoss2klkor4, $V41pdegllkbg = '', $Vccpuiwumcur = null)
    {
        $this->expectedException        = $Vhoss2klkor4;
        $this->expectedExceptionMessage = $V41pdegllkbg;
        $this->expectedExceptionCode    = $Vccpuiwumcur;
    }

    
    public function setExpectedExceptionRegExp($Vhoss2klkor4, $V41pdegllkbgRegExp = '', $Vccpuiwumcur = null)
    {
        $this->expectedException              = $Vhoss2klkor4;
        $this->expectedExceptionMessageRegExp = $V41pdegllkbgRegExp;
        $this->expectedExceptionCode          = $Vccpuiwumcur;
    }

    
    protected function setExpectedExceptionFromAnnotation()
    {
        try {
            $Vaotvv1iuhjl = PHPUnit_Util_Test::getExpectedException(
                get_class($this),
                $this->name
            );

            if ($Vaotvv1iuhjl !== false) {
                $this->setExpectedException(
                    $Vaotvv1iuhjl['class'],
                    $Vaotvv1iuhjl['message'],
                    $Vaotvv1iuhjl['code']
                );

                if (!empty($Vaotvv1iuhjl['message_regex'])) {
                    $this->setExpectedExceptionRegExp(
                        $Vaotvv1iuhjl['class'],
                        $Vaotvv1iuhjl['message_regex'],
                        $Vaotvv1iuhjl['code']
                    );
                }
            }
        } catch (ReflectionException $Vpt32vvhspnv) {
        }
    }

    
    public function setUseErrorHandler($Vpilod0srpsw)
    {
        $this->useErrorHandler = $Vpilod0srpsw;
    }

    
    protected function setUseErrorHandlerFromAnnotation()
    {
        try {
            $Vpilod0srpsw = PHPUnit_Util_Test::getErrorHandlerSettings(
                get_class($this),
                $this->name
            );

            if ($Vpilod0srpsw !== null) {
                $this->setUseErrorHandler($Vpilod0srpsw);
            }
        } catch (ReflectionException $Vpt32vvhspnv) {
        }
    }

    
    protected function checkRequirements()
    {
        if (!$this->name || !method_exists($this, $this->name)) {
            return;
        }

        $Vfvcmrkfq5ui = PHPUnit_Util_Test::getMissingRequirements(
            get_class($this),
            $this->name
        );

        if (!empty($Vfvcmrkfq5ui)) {
            $this->markTestSkipped(implode(PHP_EOL, $Vfvcmrkfq5ui));
        }
    }

    
    public function getStatus()
    {
        return $this->status;
    }

    
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    
    public function hasFailed()
    {
        $Vmtvkqxvklrv = $this->getStatus();

        return $Vmtvkqxvklrv == PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE ||
               $Vmtvkqxvklrv == PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
    }

    
    public function run(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr = null)
    {
        if ($Vv0hyvhlkjqr === null) {
            $Vv0hyvhlkjqr = $this->createResult();
        }

        if (!$this instanceof PHPUnit_Framework_Warning) {
            $this->setTestResultObject($Vv0hyvhlkjqr);
            $this->setUseErrorHandlerFromAnnotation();
        }

        if ($this->useErrorHandler !== null) {
            $Vho40cgs1tvc = $Vv0hyvhlkjqr->getConvertErrorsToExceptions();
            $Vv0hyvhlkjqr->convertErrorsToExceptions($this->useErrorHandler);
        }

        if (!$this instanceof PHPUnit_Framework_Warning && !$this->handleDependencies()) {
            return;
        }

        if ($this->runTestInSeparateProcess === true &&
            $this->inIsolation !== true &&
            !$this instanceof PHPUnit_Extensions_SeleniumTestCase &&
            !$this instanceof PHPUnit_Extensions_PhptTestCase) {
            $Vqmu1sajhgfn = new ReflectionClass($this);

            $Vlqygqxkgo25 = new Text_Template(
                __DIR__ . '/../Util/PHP/Template/TestCaseMethod.tpl'
            );

            if ($this->preserveGlobalState) {
                $Vcabzt4suk2c     = PHPUnit_Util_GlobalState::getConstantsAsString();
                $Vnw3wqqs23y1       = PHPUnit_Util_GlobalState::getGlobalsAsString();
                $Vzlgrojmlgeo = PHPUnit_Util_GlobalState::getIncludedFilesAsString();
                $Vkvhbademoiu   = PHPUnit_Util_GlobalState::getIniSettingsAsString();
            } else {
                $Vcabzt4suk2c     = '';
                if (!empty($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
                    $Vnw3wqqs23y1     = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . var_export($GLOBALS['__PHPUNIT_BOOTSTRAP'], true) . ";\n";
                } else {
                    $Vnw3wqqs23y1     = '';
                }
                $Vzlgrojmlgeo = '';
                $Vkvhbademoiu   = '';
            }

            $Vbt1bqdir3su                                = $Vv0hyvhlkjqr->getCollectCodeCoverageInformation()       ? 'true' : 'false';
            $V1ufu5fmm1yy = $Vv0hyvhlkjqr->isStrictAboutTestsThatDoNotTestAnything() ? 'true' : 'false';
            $Vvvmkomof5ap          = $Vv0hyvhlkjqr->isStrictAboutOutputDuringTests()          ? 'true' : 'false';
            $Vynsgcjc3gdh                   = $Vv0hyvhlkjqr->isStrictAboutTestSize()                   ? 'true' : 'false';
            $Vqsocwl33tp0         = $Vv0hyvhlkjqr->isStrictAboutTodoAnnotatedTests()         ? 'true' : 'false';

            if (defined('PHPUNIT_COMPOSER_INSTALL')) {
                $V3czlcv3btwn = var_export(PHPUNIT_COMPOSER_INSTALL, true);
            } else {
                $V3czlcv3btwn = '\'\'';
            }

            if (defined('__PHPUNIT_PHAR__')) {
                $Vjgulhhikaiq = var_export(__PHPUNIT_PHAR__, true);
            } else {
                $Vjgulhhikaiq = '\'\'';
            }

            if ($Vv0hyvhlkjqr->getCodeCoverage()) {
                $Vgzwqalsw0v2 = $Vv0hyvhlkjqr->getCodeCoverage()->filter();
            } else {
                $Vgzwqalsw0v2 = null;
            }

            $Vqhzkfsafzrc               = var_export(serialize($this->data), true);
            $VqhzkfsafzrcName           = var_export($this->dataName, true);
            $Vnuolsqyewfx    = var_export(serialize($this->dependencyInput), true);
            $Vdvo2o2gi4j1        = var_export(get_include_path(), true);
            $Vgzwqalsw0v2 = var_export(serialize($Vgzwqalsw0v2), true);
            
            
            $Vqhzkfsafzrc               = "'." . $Vqhzkfsafzrc . ".'";
            $VqhzkfsafzrcName           = "'.(" . $VqhzkfsafzrcName . ").'";
            $Vnuolsqyewfx    = "'." . $Vnuolsqyewfx . ".'";
            $Vdvo2o2gi4j1        = "'." . $Vdvo2o2gi4j1 . ".'";
            $Vgzwqalsw0v2 = "'." . $Vgzwqalsw0v2 . ".'";

            $Vexr3aje5fqs = (isset($GLOBALS['__PHPUNIT_CONFIGURATION_FILE']) ? $GLOBALS['__PHPUNIT_CONFIGURATION_FILE'] : '');

            $Vlqygqxkgo25->setVar(
                array(
                    'composerAutoload'                        => $V3czlcv3btwn,
                    'phar'                                    => $Vjgulhhikaiq,
                    'filename'                                => $Vqmu1sajhgfn->getFileName(),
                    'className'                               => $Vqmu1sajhgfn->getName(),
                    'methodName'                              => $this->name,
                    'collectCodeCoverageInformation'          => $Vbt1bqdir3su,
                    'data'                                    => $Vqhzkfsafzrc,
                    'dataName'                                => $VqhzkfsafzrcName,
                    'dependencyInput'                         => $Vnuolsqyewfx,
                    'constants'                               => $Vcabzt4suk2c,
                    'globals'                                 => $Vnw3wqqs23y1,
                    'include_path'                            => $Vdvo2o2gi4j1,
                    'included_files'                          => $Vzlgrojmlgeo,
                    'iniSettings'                             => $Vkvhbademoiu,
                    'isStrictAboutTestsThatDoNotTestAnything' => $V1ufu5fmm1yy,
                    'isStrictAboutOutputDuringTests'          => $Vvvmkomof5ap,
                    'isStrictAboutTestSize'                   => $Vynsgcjc3gdh,
                    'isStrictAboutTodoAnnotatedTests'         => $Vqsocwl33tp0,
                    'codeCoverageFilter'                      => $Vgzwqalsw0v2,
                    'configurationFilePath'                   => $Vexr3aje5fqs
                )
            );

            $this->prepareTemplate($Vlqygqxkgo25);

            $Vkyiqtoxqbdy = PHPUnit_Util_PHP::factory();
            $Vkyiqtoxqbdy->runTestJob($Vlqygqxkgo25->render(), $this, $Vv0hyvhlkjqr);
        } else {
            $Vv0hyvhlkjqr->run($this);
        }

        if ($this->useErrorHandler !== null) {
            $Vv0hyvhlkjqr->convertErrorsToExceptions($Vho40cgs1tvc);
        }

        $this->result = null;

        return $Vv0hyvhlkjqr;
    }

    
    public function runBare()
    {
        $this->numAssertions = 0;

        $this->snapshotGlobalState();
        $this->startOutputBuffering();
        clearstatcache();
        $Vw3avae4eul5 = getcwd();

        $Vvq52l1ahlwn = PHPUnit_Util_Test::getHookMethods(get_class($this));

        try {
            $Vpdajmqkihgi = false;
            $this->checkRequirements();
            $Vpdajmqkihgi = true;

            if ($this->inIsolation) {
                foreach ($Vvq52l1ahlwn['beforeClass'] as $Vtlfvdwskdge) {
                    $this->$Vtlfvdwskdge();
                }
            }

            $this->setExpectedExceptionFromAnnotation();

            foreach ($Vvq52l1ahlwn['before'] as $Vtlfvdwskdge) {
                $this->$Vtlfvdwskdge();
            }

            $this->assertPreConditions();
            $this->testResult = $this->runTest();
            $this->verifyMockObjects();
            $this->assertPostConditions();

            $this->status = PHPUnit_Runner_BaseTestRunner::STATUS_PASSED;
        } catch (PHPUnit_Framework_IncompleteTest $Vpt32vvhspnv) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_INCOMPLETE;
            $this->statusMessage = $Vpt32vvhspnv->getMessage();
        } catch (PHPUnit_Framework_SkippedTest $Vpt32vvhspnv) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_SKIPPED;
            $this->statusMessage = $Vpt32vvhspnv->getMessage();
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $Vpt32vvhspnv->getMessage();
        } catch (PredictionException $Vpt32vvhspnv) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $Vpt32vvhspnv->getMessage();
        } catch (Throwable $Vovnlkckyvio) {
            $Vpt32vvhspnv = $Vovnlkckyvio;
        } catch (Exception $Vovnlkckyvio) {
            $Vpt32vvhspnv = $Vovnlkckyvio;
        }

        if (isset($Vovnlkckyvio)) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $Vovnlkckyvio->getMessage();
        }

        
        $this->mockObjects = array();
        $this->prophet     = null;

        
        
        try {
            if ($Vpdajmqkihgi) {
                foreach ($Vvq52l1ahlwn['after'] as $Vtlfvdwskdge) {
                    $this->$Vtlfvdwskdge();
                }

                if ($this->inIsolation) {
                    foreach ($Vvq52l1ahlwn['afterClass'] as $Vtlfvdwskdge) {
                        $this->$Vtlfvdwskdge();
                    }
                }
            }
        } catch (Throwable $Vovnlkckyvio) {
            if (!isset($Vpt32vvhspnv)) {
                $Vpt32vvhspnv = $Vovnlkckyvio;
            }
        } catch (Exception $Vovnlkckyvio) {
            if (!isset($Vpt32vvhspnv)) {
                $Vpt32vvhspnv = $Vovnlkckyvio;
            }
        }

        try {
            $this->stopOutputBuffering();
        } catch (PHPUnit_Framework_RiskyTestError $Vovnlkckyvio) {
            if (!isset($Vpt32vvhspnv)) {
                $Vpt32vvhspnv = $Vovnlkckyvio;
            }
        }

        clearstatcache();

        if ($Vw3avae4eul5 != getcwd()) {
            chdir($Vw3avae4eul5);
        }

        $this->restoreGlobalState();

        
        foreach ($this->iniSettings as $Vlg2r5tyiaz1 => $Vubq2i1ugjd5) {
            ini_set($Vlg2r5tyiaz1, $Vubq2i1ugjd5);
        }

        $this->iniSettings = array();

        
        foreach ($this->locale as $Vya5mg3c0osr => $Vbzxpjv3aqae) {
            setlocale($Vya5mg3c0osr, $Vbzxpjv3aqae);
        }

        
        if (!isset($Vpt32vvhspnv)) {
            try {
                if ($this->outputExpectedRegex !== null) {
                    $this->assertRegExp($this->outputExpectedRegex, $this->output);
                } elseif ($this->outputExpectedString !== null) {
                    $this->assertEquals($this->outputExpectedString, $this->output);
                }
            } catch (Throwable $Vovnlkckyvio) {
                $Vpt32vvhspnv = $Vovnlkckyvio;
            } catch (Exception $Vovnlkckyvio) {
                $Vpt32vvhspnv = $Vovnlkckyvio;
            }
        }

        
        if (isset($Vpt32vvhspnv)) {
            if ($Vpt32vvhspnv instanceof PredictionException) {
                $Vpt32vvhspnv = new PHPUnit_Framework_AssertionFailedError($Vpt32vvhspnv->getMessage());
            }

            if (!$Vpt32vvhspnv instanceof Exception) {
                
                throw $Vpt32vvhspnv;
            }

            $this->onNotSuccessfulTest($Vpt32vvhspnv);
        }
    }

    
    protected function runTest()
    {
        if ($this->name === null) {
            throw new PHPUnit_Framework_Exception(
                'PHPUnit_Framework_TestCase::$Vgpjmw221p0b must not be null.'
            );
        }

        try {
            $Vqmu1sajhgfn  = new ReflectionClass($this);
            $Vtlfvdwskdge = $Vqmu1sajhgfn->getMethod($this->name);
        } catch (ReflectionException $Vpt32vvhspnv) {
            $this->fail($Vpt32vvhspnv->getMessage());
        }

        try {
            $Vc4pv4vb5gu4 = $Vtlfvdwskdge->invokeArgs(
                $this,
                array_merge($this->data, $this->dependencyInput)
            );
        } catch (Throwable $Vovnlkckyvio) {
            $Vpt32vvhspnv = $Vovnlkckyvio;
        } catch (Exception $Vovnlkckyvio) {
            $Vpt32vvhspnv = $Vovnlkckyvio;
        }

        if (isset($Vpt32vvhspnv)) {
            $Vicbaa2sj0sl = false;

            if (!($Vpt32vvhspnv instanceof PHPUnit_Framework_SkippedTestError) && is_string($this->expectedException)) {
                $Vicbaa2sj0sl = true;

                if ($Vpt32vvhspnv instanceof PHPUnit_Framework_Exception) {
                    $Vicbaa2sj0sl = false;
                }

                $Vf4nbpoij40n = new ReflectionClass($this->expectedException);

                if ($this->expectedException === 'PHPUnit_Framework_Exception' ||
                    $this->expectedException === '\PHPUnit_Framework_Exception' ||
                    $Vf4nbpoij40n->isSubclassOf('PHPUnit_Framework_Exception')) {
                    $Vicbaa2sj0sl = true;
                }
            }

            if ($Vicbaa2sj0sl) {
                $this->assertThat(
                    $Vpt32vvhspnv,
                    new PHPUnit_Framework_Constraint_Exception(
                        $this->expectedException
                    )
                );

                if (is_string($this->expectedExceptionMessage) &&
                    !empty($this->expectedExceptionMessage)) {
                    $this->assertThat(
                        $Vpt32vvhspnv,
                        new PHPUnit_Framework_Constraint_ExceptionMessage(
                            $this->expectedExceptionMessage
                        )
                    );
                }

                if (is_string($this->expectedExceptionMessageRegExp) &&
                    !empty($this->expectedExceptionMessageRegExp)) {
                    $this->assertThat(
                        $Vpt32vvhspnv,
                        new PHPUnit_Framework_Constraint_ExceptionMessageRegExp(
                            $this->expectedExceptionMessageRegExp
                        )
                    );
                }

                if ($this->expectedExceptionCode !== null) {
                    $this->assertThat(
                        $Vpt32vvhspnv,
                        new PHPUnit_Framework_Constraint_ExceptionCode(
                            $this->expectedExceptionCode
                        )
                    );
                }

                return;
            } else {
                throw $Vpt32vvhspnv;
            }
        }

        if ($this->expectedException !== null) {
            $this->assertThat(
                null,
                new PHPUnit_Framework_Constraint_Exception(
                    $this->expectedException
                )
            );
        }

        return $Vc4pv4vb5gu4;
    }

    
    protected function verifyMockObjects()
    {
        foreach ($this->mockObjects as $V1vy3f5ewwx1) {
            if ($V1vy3f5ewwx1->__phpunit_hasMatchers()) {
                $this->numAssertions++;
            }

            $V1vy3f5ewwx1->__phpunit_verify();
        }

        if ($this->prophet !== null) {
            try {
                $this->prophet->checkPredictions();
            } catch (Throwable $Vpt32vvhspnv) {
                
            } catch (Exception $Vpt32vvhspnv) {
                
            }

            foreach ($this->prophet->getProphecies() as $Vh0fkyzc0qaw) {
                foreach ($Vh0fkyzc0qaw->getMethodProphecies() as $VtlfvdwskdgeProphecies) {
                    foreach ($VtlfvdwskdgeProphecies as $VtlfvdwskdgeProphecy) {
                        $this->numAssertions += count($VtlfvdwskdgeProphecy->getCheckedPredictions());
                    }
                }
            }

            if (isset($Vpt32vvhspnv)) {
                throw $Vpt32vvhspnv;
            }
        }
    }

    
    public function setName($Vgpjmw221p0b)
    {
        $this->name = $Vgpjmw221p0b;
    }

    
    public function setDependencies(array $Vdym0g0ze30a)
    {
        $this->dependencies = $Vdym0g0ze30a;
    }

    
    public function hasDependencies()
    {
        return count($this->dependencies) > 0;
    }

    
    public function setDependencyInput(array $Vnuolsqyewfx)
    {
        $this->dependencyInput = $Vnuolsqyewfx;
    }

    
    public function setDisallowChangesToGlobalState($Vks0edyzahxn)
    {
        $this->disallowChangesToGlobalState = $Vks0edyzahxn;
    }

    
    public function setBackupGlobals($Vaf3jfgkfpgj)
    {
        if (is_null($this->backupGlobals) && is_bool($Vaf3jfgkfpgj)) {
            $this->backupGlobals = $Vaf3jfgkfpgj;
        }
    }

    
    public function setBackupStaticAttributes($V1ji0ss4bexn)
    {
        if (is_null($this->backupStaticAttributes) &&
            is_bool($V1ji0ss4bexn)) {
            $this->backupStaticAttributes = $V1ji0ss4bexn;
        }
    }

    
    public function setRunTestInSeparateProcess($Vqgwnt0xmvnd)
    {
        if (is_bool($Vqgwnt0xmvnd)) {
            if ($this->runTestInSeparateProcess === null) {
                $this->runTestInSeparateProcess = $Vqgwnt0xmvnd;
            }
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    
    public function setPreserveGlobalState($Vp1jxu3mlxbh)
    {
        if (is_bool($Vp1jxu3mlxbh)) {
            $this->preserveGlobalState = $Vp1jxu3mlxbh;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    
    public function setInIsolation($Vl425ui1thjy)
    {
        if (is_bool($Vl425ui1thjy)) {
            $this->inIsolation = $Vl425ui1thjy;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    
    public function isInIsolation()
    {
        return $this->inIsolation;
    }

    
    public function getResult()
    {
        return $this->testResult;
    }

    
    public function setResult($Vv0hyvhlkjqr)
    {
        $this->testResult = $Vv0hyvhlkjqr;
    }

    
    public function setOutputCallback($Vbbxwjhhenxj)
    {
        if (!is_callable($Vbbxwjhhenxj)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'callback');
        }

        $this->outputCallback = $Vbbxwjhhenxj;
    }

    
    public function getTestResultObject()
    {
        return $this->result;
    }

    
    public function setTestResultObject(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $this->result = $Vv0hyvhlkjqr;
    }

    
    protected function iniSet($Vlg2r5tyiaz1, $Vts3vcu5qyvh)
    {
        if (!is_string($Vlg2r5tyiaz1)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $V4k2y4awwb2c = ini_set($Vlg2r5tyiaz1, $Vts3vcu5qyvh);

        if ($V4k2y4awwb2c !== false) {
            $this->iniSettings[$Vlg2r5tyiaz1] = $V4k2y4awwb2c;
        } else {
            throw new PHPUnit_Framework_Exception(
                sprintf(
                    'INI setting "%s" could not be set to "%s".',
                    $Vlg2r5tyiaz1,
                    $Vts3vcu5qyvh
                )
            );
        }
    }

    
    protected function setLocale()
    {
        $Veox3iprl5oz = func_get_args();

        if (count($Veox3iprl5oz) < 2) {
            throw new PHPUnit_Framework_Exception;
        }

        $Vya5mg3c0osr = $Veox3iprl5oz[0];
        $Vbzxpjv3aqae   = $Veox3iprl5oz[1];

        $Vmpexdst1uu2 = array(
            LC_ALL, LC_COLLATE, LC_CTYPE, LC_MONETARY, LC_NUMERIC, LC_TIME
        );

        if (defined('LC_MESSAGES')) {
            $Vmpexdst1uu2[] = LC_MESSAGES;
        }

        if (!in_array($Vya5mg3c0osr, $Vmpexdst1uu2)) {
            throw new PHPUnit_Framework_Exception;
        }

        if (!is_array($Vbzxpjv3aqae) && !is_string($Vbzxpjv3aqae)) {
            throw new PHPUnit_Framework_Exception;
        }

        $this->locale[$Vya5mg3c0osr] = setlocale($Vya5mg3c0osr, null);

        $Vv0hyvhlkjqr = call_user_func_array('setlocale', $Veox3iprl5oz);

        if ($Vv0hyvhlkjqr === false) {
            throw new PHPUnit_Framework_Exception(
                'The locale functionality is not implemented on your platform, ' .
                'the specified locale does not exist or the category name is ' .
                'invalid.'
            );
        }
    }

    
    public function getMock($Vyvlub3tsdnu, $Vtlfvdwskdges = array(), array $Vj23lbel2xn0 = array(), $Vc3zs2kevdk4 = '', $Vzphkx44dq2t = true, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $V3h3xe1o2lav = false, $Vzbcxnhqeuh5 = false, $Vp0lqmwkx3ds = null)
    {
        $V1vy3f5ewwx1 = $this->getMockObjectGenerator()->getMock(
            $Vyvlub3tsdnu,
            $Vtlfvdwskdges,
            $Vj23lbel2xn0,
            $Vc3zs2kevdk4,
            $Vzphkx44dq2t,
            $V44zsh1gr23n,
            $Vv0pgf0zb1b3,
            $V3h3xe1o2lav,
            $Vzbcxnhqeuh5,
            $Vp0lqmwkx3ds
        );

        $this->mockObjects[] = $V1vy3f5ewwx1;

        return $V1vy3f5ewwx1;
    }

    
    public function getMockBuilder($Vqmu1sajhgfnName)
    {
        return new PHPUnit_Framework_MockObject_MockBuilder($this, $Vqmu1sajhgfnName);
    }

    
    protected function getMockClass($Vyvlub3tsdnu, $Vtlfvdwskdges = array(), array $Vj23lbel2xn0 = array(), $Vc3zs2kevdk4 = '', $Vzphkx44dq2t = false, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $V3h3xe1o2lav = false)
    {
        $Va4elnpuniwh = $this->getMock(
            $Vyvlub3tsdnu,
            $Vtlfvdwskdges,
            $Vj23lbel2xn0,
            $Vc3zs2kevdk4,
            $Vzphkx44dq2t,
            $V44zsh1gr23n,
            $Vv0pgf0zb1b3,
            $V3h3xe1o2lav
        );

        return get_class($Va4elnpuniwh);
    }

    
    public function getMockForAbstractClass($Vyvlub3tsdnu, array $Vj23lbel2xn0 = array(), $Vc3zs2kevdk4 = '', $Vzphkx44dq2t = true, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $Va4elnpuniwhedMethods = array(), $V3h3xe1o2lav = false)
    {
        $V1vy3f5ewwx1 = $this->getMockObjectGenerator()->getMockForAbstractClass(
            $Vyvlub3tsdnu,
            $Vj23lbel2xn0,
            $Vc3zs2kevdk4,
            $Vzphkx44dq2t,
            $V44zsh1gr23n,
            $Vv0pgf0zb1b3,
            $Va4elnpuniwhedMethods,
            $V3h3xe1o2lav
        );

        $this->mockObjects[] = $V1vy3f5ewwx1;

        return $V1vy3f5ewwx1;
    }

    
    protected function getMockFromWsdl($Vghoqgxwvz33, $Vyvlub3tsdnu = '', $Vc3zs2kevdk4 = '', array $Vtlfvdwskdges = array(), $Vzphkx44dq2t = true, array $V4a4guv4okog = array())
    {
        if ($Vyvlub3tsdnu === '') {
            $Vyvlub3tsdnu = str_replace('.wsdl', '', basename($Vghoqgxwvz33));
        }

        if (!class_exists($Vyvlub3tsdnu)) {
            eval(
            $this->getMockObjectGenerator()->generateClassFromWsdl(
                $Vghoqgxwvz33,
                $Vyvlub3tsdnu,
                $Vtlfvdwskdges,
                $V4a4guv4okog
            )
            );
        }

        return $this->getMock(
            $Vyvlub3tsdnu,
            $Vtlfvdwskdges,
            array('', $V4a4guv4okog),
            $Vc3zs2kevdk4,
            $Vzphkx44dq2t,
            false,
            false
        );
    }

    
    public function getMockForTrait($V2anblfzdukl, array $Vj23lbel2xn0 = array(), $Vc3zs2kevdk4 = '', $Vzphkx44dq2t = true, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $Va4elnpuniwhedMethods = array(), $V3h3xe1o2lav = false)
    {
        $V1vy3f5ewwx1 = $this->getMockObjectGenerator()->getMockForTrait(
            $V2anblfzdukl,
            $Vj23lbel2xn0,
            $Vc3zs2kevdk4,
            $Vzphkx44dq2t,
            $V44zsh1gr23n,
            $Vv0pgf0zb1b3,
            $Va4elnpuniwhedMethods,
            $V3h3xe1o2lav
        );

        $this->mockObjects[] = $V1vy3f5ewwx1;

        return $V1vy3f5ewwx1;
    }

    
    protected function getObjectForTrait($V2anblfzdukl, array $Vj23lbel2xn0 = array(), $Vxn4rwifjdkf = '', $Vzphkx44dq2t = true, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $V3h3xe1o2lav = false)
    {
        return $this->getMockObjectGenerator()->getObjectForTrait(
            $V2anblfzdukl,
            $Vj23lbel2xn0,
            $Vxn4rwifjdkf,
            $Vzphkx44dq2t,
            $V44zsh1gr23n,
            $Vv0pgf0zb1b3,
            $V3h3xe1o2lav
        );
    }

    
    protected function prophesize($Vqmu1sajhgfnOrInterface = null)
    {
        return $this->getProphet()->prophesize($Vqmu1sajhgfnOrInterface);
    }

    
    public function addToAssertionCount($Vdbkece3gnp5)
    {
        $this->numAssertions += $Vdbkece3gnp5;
    }

    
    public function getNumAssertions()
    {
        return $this->numAssertions;
    }

    
    public static function any()
    {
        return new PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount;
    }

    
    public static function never()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount(0);
    }

    
    public static function atLeast($V3in34tzmwwm)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastCount(
            $V3in34tzmwwm
        );
    }

    
    public static function atLeastOnce()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce;
    }

    
    public static function once()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount(1);
    }

    
    public static function exactly($Vdbkece3gnp5)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount($Vdbkece3gnp5);
    }

    
    public static function atMost($Vqtnfa0rd45f)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtMostCount(
            $Vqtnfa0rd45f
        );
    }

    
    public static function at($Vojnsu0ourck)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex($Vojnsu0ourck);
    }

    
    public static function returnValue($Vcptarsq5qe4)
    {
        return new PHPUnit_Framework_MockObject_Stub_Return($Vcptarsq5qe4);
    }

    
    public static function returnValueMap(array $Vcptarsq5qe4Map)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnValueMap($Vcptarsq5qe4Map);
    }

    
    public static function returnArgument($Vez5gbw2si3p)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnArgument(
            $Vez5gbw2si3p
        );
    }

    
    public static function returnCallback($Vbbxwjhhenxj)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnCallback($Vbbxwjhhenxj);
    }

    
    public static function returnSelf()
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnSelf();
    }

    
    public static function throwException(Exception $Vpt32vvhspnvxception)
    {
        return new PHPUnit_Framework_MockObject_Stub_Exception($Vpt32vvhspnvxception);
    }

    
    public static function onConsecutiveCalls()
    {
        $Veox3iprl5oz = func_get_args();

        return new PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls($Veox3iprl5oz);
    }

    
    protected function getDataSetAsString($Vclfpqpankwz = true)
    {
        $Vd3322ljwbqh = '';

        if (!empty($this->data)) {
            if (is_int($this->dataName)) {
                $Vd3322ljwbqh .= sprintf(' with data set #%d', $this->dataName);
            } else {
                $Vd3322ljwbqh .= sprintf(' with data set "%s"', $this->dataName);
            }

            $Vpt32vvhspnvxporter = new Exporter;

            if ($Vclfpqpankwz) {
                $Vd3322ljwbqh .= sprintf(' (%s)', $Vpt32vvhspnvxporter->shortenedRecursiveExport($this->data));
            }
        }

        return $Vd3322ljwbqh;
    }

    
    protected function createResult()
    {
        return new PHPUnit_Framework_TestResult;
    }

    
    protected function handleDependencies()
    {
        if (!empty($this->dependencies) && !$this->inIsolation) {
            $Vqmu1sajhgfnName  = get_class($this);
            $Vxbm21ke5311     = $this->result->passed();
            $Vxbm21ke5311Keys = array_keys($Vxbm21ke5311);
            $Vsq2lub1lxaz    = count($Vxbm21ke5311Keys);

            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vsq2lub1lxaz; $Vxja1abp34yq++) {
                $Vc5b0ouiyxjh = strpos($Vxbm21ke5311Keys[$Vxja1abp34yq], ' with data set');

                if ($Vc5b0ouiyxjh !== false) {
                    $Vxbm21ke5311Keys[$Vxja1abp34yq] = substr($Vxbm21ke5311Keys[$Vxja1abp34yq], 0, $Vc5b0ouiyxjh);
                }
            }

            $Vxbm21ke5311Keys = array_flip(array_unique($Vxbm21ke5311Keys));

            foreach ($this->dependencies as $Vaifadclk2hk) {
                if (strpos($Vaifadclk2hk, '::') === false) {
                    $Vaifadclk2hk = $Vqmu1sajhgfnName . '::' . $Vaifadclk2hk;
                }

                if (!isset($Vxbm21ke5311Keys[$Vaifadclk2hk])) {
                    $this->result->addError(
                        $this,
                        new PHPUnit_Framework_SkippedTestError(
                            sprintf(
                                'This test depends on "%s" to pass.',
                                $Vaifadclk2hk
                            )
                        ),
                        0
                    );

                    return false;
                }

                if (isset($Vxbm21ke5311[$Vaifadclk2hk])) {
                    if ($Vxbm21ke5311[$Vaifadclk2hk]['size'] != PHPUnit_Util_Test::UNKNOWN &&
                        $this->getSize() != PHPUnit_Util_Test::UNKNOWN &&
                        $Vxbm21ke5311[$Vaifadclk2hk]['size'] > $this->getSize()) {
                        $this->result->addError(
                            $this,
                            new PHPUnit_Framework_SkippedTestError(
                                'This test depends on a test that is larger than itself.'
                            ),
                            0
                        );

                        return false;
                    }

                    $this->dependencyInput[$Vaifadclk2hk] = $Vxbm21ke5311[$Vaifadclk2hk]['result'];
                } else {
                    $this->dependencyInput[$Vaifadclk2hk] = null;
                }
            }
        }

        return true;
    }

    
    public static function setUpBeforeClass()
    {
    }

    
    protected function setUp()
    {
    }

    
    protected function assertPreConditions()
    {
    }

    
    protected function assertPostConditions()
    {
    }

    
    protected function tearDown()
    {
    }

    
    public static function tearDownAfterClass()
    {
    }

    
    protected function onNotSuccessfulTest(Exception $Vpt32vvhspnv)
    {
        throw $Vpt32vvhspnv;
    }

    
    protected function prepareTemplate(Text_Template $Vlqygqxkgo25)
    {
    }

    
    protected function getMockObjectGenerator()
    {
        if (null === $this->mockObjectGenerator) {
            $this->mockObjectGenerator = new PHPUnit_Framework_MockObject_Generator;
        }

        return $this->mockObjectGenerator;
    }

    
    private function startOutputBuffering()
    {
        while (!defined('PHPUNIT_TESTSUITE') && ob_get_level() > 0) {
            ob_end_clean();
        }

        ob_start();

        $this->outputBufferingActive = true;
        $this->outputBufferingLevel  = ob_get_level();
    }

    
    private function stopOutputBuffering()
    {
        if (ob_get_level() != $this->outputBufferingLevel) {
            while (ob_get_level() > 0) {
                ob_end_clean();
            }

            throw new PHPUnit_Framework_RiskyTestError(
                'Test code or tested code did not (only) close its own output buffers'
            );
        }

        $Vvaiuwffullu = ob_get_contents();

        if ($this->outputCallback === false) {
            $this->output = $Vvaiuwffullu;
        } else {
            $this->output = call_user_func_array(
                $this->outputCallback,
                array($Vvaiuwffullu)
            );
        }

        ob_end_clean();

        $this->outputBufferingActive = false;
        $this->outputBufferingLevel  = ob_get_level();
    }

    private function snapshotGlobalState()
    {
        $Vaf3jfgkfpgj = $this->backupGlobals === null || $this->backupGlobals === true;

        if ($this->runTestInSeparateProcess || $this->inIsolation ||
            (!$Vaf3jfgkfpgj && !$this->backupStaticAttributes)) {
            return;
        }

        $this->snapshot = $this->createGlobalStateSnapshot($Vaf3jfgkfpgj);
    }

    private function restoreGlobalState()
    {
        if (!$this->snapshot instanceof Snapshot) {
            return;
        }

        $Vaf3jfgkfpgj = $this->backupGlobals === null || $this->backupGlobals === true;

        if ($this->disallowChangesToGlobalState) {
            try {
                $this->compareGlobalStateSnapshots(
                    $this->snapshot,
                    $this->createGlobalStateSnapshot($Vaf3jfgkfpgj)
                );
            } catch (PHPUnit_Framework_RiskyTestError $Vsigdcnq2ivq) {
                
            }
        }

        $Vgg4udb2zqti = new Restorer;

        if ($Vaf3jfgkfpgj) {
            $Vgg4udb2zqti->restoreGlobalVariables($this->snapshot);
        }

        if ($this->backupStaticAttributes) {
            $Vgg4udb2zqti->restoreStaticAttributes($this->snapshot);
        }

        $this->snapshot = null;

        if (isset($Vsigdcnq2ivq)) {
            throw $Vsigdcnq2ivq;
        }
    }

    
    private function createGlobalStateSnapshot($Vaf3jfgkfpgj)
    {
        $Vn54eydon0cr = new Blacklist;

        foreach ($this->backupGlobalsBlacklist as $V0cypdewh3ea) {
            $Vn54eydon0cr->addGlobalVariable($V0cypdewh3ea);
        }

        if (!defined('PHPUNIT_TESTSUITE')) {
            $Vn54eydon0cr->addClassNamePrefix('PHPUnit');
            $Vn54eydon0cr->addClassNamePrefix('File_Iterator');
            $Vn54eydon0cr->addClassNamePrefix('PHP_CodeCoverage');
            $Vn54eydon0cr->addClassNamePrefix('PHP_Invoker');
            $Vn54eydon0cr->addClassNamePrefix('PHP_Timer');
            $Vn54eydon0cr->addClassNamePrefix('PHP_Token');
            $Vn54eydon0cr->addClassNamePrefix('Symfony');
            $Vn54eydon0cr->addClassNamePrefix('Text_Template');
            $Vn54eydon0cr->addClassNamePrefix('Doctrine\Instantiator');

            foreach ($this->backupStaticAttributesBlacklist as $Vqmu1sajhgfn => $Vfwhzdv2bggu) {
                foreach ($Vfwhzdv2bggu as $Vxw4jdz2m4w0) {
                    $Vn54eydon0cr->addStaticAttribute($Vqmu1sajhgfn, $Vxw4jdz2m4w0);
                }
            }
        }

        return new Snapshot(
            $Vn54eydon0cr,
            $Vaf3jfgkfpgj,
            $this->backupStaticAttributes,
            false,
            false,
            false,
            false,
            false,
            false,
            false
        );
    }

    
    private function compareGlobalStateSnapshots(Snapshot $Vnze3vm4lcbt, Snapshot $Vqfasrrudrfz)
    {
        $Vaf3jfgkfpgj = $this->backupGlobals === null || $this->backupGlobals === true;

        if ($Vaf3jfgkfpgj) {
            $this->compareGlobalStateSnapshotPart(
                $Vnze3vm4lcbt->globalVariables(),
                $Vqfasrrudrfz->globalVariables(),
                "--- Global variables before the test\n+++ Global variables after the test\n"
            );

            $this->compareGlobalStateSnapshotPart(
                $Vnze3vm4lcbt->superGlobalVariables(),
                $Vqfasrrudrfz->superGlobalVariables(),
                "--- Super-global variables before the test\n+++ Super-global variables after the test\n"
            );
        }

        if ($this->backupStaticAttributes) {
            $this->compareGlobalStateSnapshotPart(
                $Vnze3vm4lcbt->staticAttributes(),
                $Vqfasrrudrfz->staticAttributes(),
                "--- Static attributes before the test\n+++ Static attributes after the test\n"
            );
        }
    }

    
    private function compareGlobalStateSnapshotPart(array $Vnze3vm4lcbt, array $Vqfasrrudrfz, $Vy5yyyefdntg)
    {
        if ($Vnze3vm4lcbt != $Vqfasrrudrfz) {
            $Vyxeqxkac2bx   = new Differ($Vy5yyyefdntg);
            $Vpt32vvhspnvxporter = new Exporter;

            $Vlycelrz2ye5 = $Vyxeqxkac2bx->diff(
                $Vpt32vvhspnvxporter->export($Vnze3vm4lcbt),
                $Vpt32vvhspnvxporter->export($Vqfasrrudrfz)
            );

            throw new PHPUnit_Framework_RiskyTestError(
                $Vlycelrz2ye5
            );
        }
    }

    
    private function getProphet()
    {
        if ($this->prophet === null) {
            $this->prophet = new Prophet;
        }

        return $this->prophet;
    }
}
