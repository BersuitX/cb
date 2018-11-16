<?php



class PHPUnit_Framework_TestSuite implements PHPUnit_Framework_Test, PHPUnit_Framework_SelfDescribing, IteratorAggregate
{
    
    private $Vnaojlf1j2lb;

    
    protected $Vaf3jfgkfpgj = null;

    
    protected $V1ji0ss4bexn = null;

    
    private $Vks0edyzahxn = null;

    
    protected $Vqgwnt0xmvnd = false;

    
    protected $Vgpjmw221p0b = '';

    
    protected $V00tm5epe1pm = array();

    
    protected $Vo50qpjpkko3 = array();

    
    protected $Vpufahej1ssm = -1;

    
    protected $V0yzsmqqj1m3 = false;

    
    protected $Vj0gq053ahwb = array();

    
    private $Vnvba3fzj5q5 = null;

    
    public function __construct($Vq3ogoxoagws = '', $Vgpjmw221p0b = '')
    {
        $Vl5oe0fuozhc = false;

        if (is_object($Vq3ogoxoagws) &&
            $Vq3ogoxoagws instanceof ReflectionClass) {
            $Vl5oe0fuozhc = true;
        } elseif (is_string($Vq3ogoxoagws) &&
                 $Vq3ogoxoagws !== '' &&
                 class_exists($Vq3ogoxoagws, false)) {
            $Vl5oe0fuozhc = true;

            if ($Vgpjmw221p0b == '') {
                $Vgpjmw221p0b = $Vq3ogoxoagws;
            }

            $Vq3ogoxoagws = new ReflectionClass($Vq3ogoxoagws);
        } elseif (is_string($Vq3ogoxoagws)) {
            $Vuvamk1vhxxdhis->setName($Vq3ogoxoagws);

            return;
        }

        if (!$Vl5oe0fuozhc) {
            throw new PHPUnit_Framework_Exception;
        }

        if (!$Vq3ogoxoagws->isSubclassOf('PHPUnit_Framework_TestCase')) {
            throw new PHPUnit_Framework_Exception(
                'Class "' . $Vq3ogoxoagws->name . '" does not extend PHPUnit_Framework_TestCase.'
            );
        }

        if ($Vgpjmw221p0b != '') {
            $Vuvamk1vhxxdhis->setName($Vgpjmw221p0b);
        } else {
            $Vuvamk1vhxxdhis->setName($Vq3ogoxoagws->getName());
        }

        $V4yt0oahsnhs = $Vq3ogoxoagws->getConstructor();

        if ($V4yt0oahsnhs !== null &&
            !$V4yt0oahsnhs->isPublic()) {
            $Vuvamk1vhxxdhis->addTest(
                self::warning(
                    sprintf(
                        'Class "%s" has no public constructor.',
                        $Vq3ogoxoagws->getName()
                    )
                )
            );

            return;
        }

        foreach ($Vq3ogoxoagws->getMethods() as $Vtlfvdwskdge) {
            $Vuvamk1vhxxdhis->addTestMethod($Vq3ogoxoagws, $Vtlfvdwskdge);
        }

        if (empty($Vuvamk1vhxxdhis->tests)) {
            $Vuvamk1vhxxdhis->addTest(
                self::warning(
                    sprintf(
                        'No tests found in class "%s".',
                        $Vq3ogoxoagws->getName()
                    )
                )
            );
        }

        $Vuvamk1vhxxdhis->testCase = true;
    }

    
    public function toString()
    {
        return $Vuvamk1vhxxdhis->getName();
    }

    
    public function addTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $V00tm5epe1pm = array())
    {
        $Vqmu1sajhgfn = new ReflectionClass($Vpswbntjg3pr);

        if (!$Vqmu1sajhgfn->isAbstract()) {
            $Vuvamk1vhxxdhis->tests[]  = $Vpswbntjg3pr;
            $Vuvamk1vhxxdhis->numTests = -1;

            if ($Vpswbntjg3pr instanceof self &&
                empty($V00tm5epe1pm)) {
                $V00tm5epe1pm = $Vpswbntjg3pr->getGroups();
            }

            if (empty($V00tm5epe1pm)) {
                $V00tm5epe1pm = array('default');
            }

            foreach ($V00tm5epe1pm as $Vsq5adfvkj3r) {
                if (!isset($Vuvamk1vhxxdhis->groups[$Vsq5adfvkj3r])) {
                    $Vuvamk1vhxxdhis->groups[$Vsq5adfvkj3r] = array($Vpswbntjg3pr);
                } else {
                    $Vuvamk1vhxxdhis->groups[$Vsq5adfvkj3r][] = $Vpswbntjg3pr;
                }
            }
        }
    }

    
    public function addTestSuite($Vpswbntjg3prClass)
    {
        if (is_string($Vpswbntjg3prClass) && class_exists($Vpswbntjg3prClass)) {
            $Vpswbntjg3prClass = new ReflectionClass($Vpswbntjg3prClass);
        }

        if (!is_object($Vpswbntjg3prClass)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'class name or object'
            );
        }

        if ($Vpswbntjg3prClass instanceof self) {
            $Vuvamk1vhxxdhis->addTest($Vpswbntjg3prClass);
        } elseif ($Vpswbntjg3prClass instanceof ReflectionClass) {
            $Va2h1i4rf1ae = false;

            if (!$Vpswbntjg3prClass->isAbstract()) {
                if ($Vpswbntjg3prClass->hasMethod(PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME)) {
                    $Vtlfvdwskdge = $Vpswbntjg3prClass->getMethod(
                        PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME
                    );

                    if ($Vtlfvdwskdge->isStatic()) {
                        $Vuvamk1vhxxdhis->addTest(
                            $Vtlfvdwskdge->invoke(null, $Vpswbntjg3prClass->getName())
                        );

                        $Va2h1i4rf1ae = true;
                    }
                }
            }

            if (!$Va2h1i4rf1ae && !$Vpswbntjg3prClass->isAbstract()) {
                $Vuvamk1vhxxdhis->addTest(new self($Vpswbntjg3prClass));
            }
        } else {
            throw new PHPUnit_Framework_Exception;
        }
    }

    
    public function addTestFile($Va3qqb0vgkhy)
    {
        if (!is_string($Va3qqb0vgkhy)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (file_exists($Va3qqb0vgkhy) && substr($Va3qqb0vgkhy, -5) == '.phpt') {
            $Vuvamk1vhxxdhis->addTest(
                new PHPUnit_Extensions_PhptTestCase($Va3qqb0vgkhy)
            );

            return;
        }

        
        
        $Vqmu1sajhgfnes    = get_declared_classes();
        $Va3qqb0vgkhy   = PHPUnit_Util_Fileloader::checkAndLoad($Va3qqb0vgkhy);
        $Vvwjulao25mj = array_diff(get_declared_classes(), $Vqmu1sajhgfnes);

        
        
        
        
        if ($Vvwjulao25mj) {
            
            
            
            $Vuvamk1vhxxdhis->foundClasses = array_merge($Vvwjulao25mj, $Vuvamk1vhxxdhis->foundClasses);
        }

        
        
        
        
        $Vna5flmuhy0h      = basename($Va3qqb0vgkhy, '.php');
        $Vna5flmuhy0hRegEx = '/(?:^|_|\\\\)' . preg_quote($Vna5flmuhy0h, '/') . '$/';

        foreach ($Vuvamk1vhxxdhis->foundClasses as $Vxja1abp34yq => $Vqmu1sajhgfnName) {
            if (preg_match($Vna5flmuhy0hRegEx, $Vqmu1sajhgfnName)) {
                $Vqmu1sajhgfn = new ReflectionClass($Vqmu1sajhgfnName);

                if ($Vqmu1sajhgfn->getFileName() == $Va3qqb0vgkhy) {
                    $Vvwjulao25mj = array($Vqmu1sajhgfnName);
                    unset($Vuvamk1vhxxdhis->foundClasses[$Vxja1abp34yq]);
                    break;
                }
            }
        }

        foreach ($Vvwjulao25mj as $Vqmu1sajhgfnName) {
            $Vqmu1sajhgfn = new ReflectionClass($Vqmu1sajhgfnName);

            if (!$Vqmu1sajhgfn->isAbstract()) {
                if ($Vqmu1sajhgfn->hasMethod(PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME)) {
                    $Vtlfvdwskdge = $Vqmu1sajhgfn->getMethod(
                        PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME
                    );

                    if ($Vtlfvdwskdge->isStatic()) {
                        $Vuvamk1vhxxdhis->addTest($Vtlfvdwskdge->invoke(null, $Vqmu1sajhgfnName));
                    }
                } elseif ($Vqmu1sajhgfn->implementsInterface('PHPUnit_Framework_Test')) {
                    $Vuvamk1vhxxdhis->addTestSuite($Vqmu1sajhgfn);
                }
            }
        }

        $Vuvamk1vhxxdhis->numTests = -1;
    }

    
    public function addTestFiles($Va3qqb0vgkhys)
    {
        if (!(is_array($Va3qqb0vgkhys) ||
             (is_object($Va3qqb0vgkhys) && $Va3qqb0vgkhys instanceof Iterator))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'array or iterator'
            );
        }

        foreach ($Va3qqb0vgkhys as $Va3qqb0vgkhy) {
            $Vuvamk1vhxxdhis->addTestFile((string) $Va3qqb0vgkhy);
        }
    }

    
    public function count($V4hkv1lcx1ib = false)
    {
        if ($V4hkv1lcx1ib && $Vuvamk1vhxxdhis->cachedNumTests != null) {
            $Vpufahej1ssm = $Vuvamk1vhxxdhis->cachedNumTests;
        } else {
            $Vpufahej1ssm = 0;
            foreach ($Vuvamk1vhxxdhis as $Vpswbntjg3pr) {
                $Vpufahej1ssm += count($Vpswbntjg3pr);
            }
            $Vuvamk1vhxxdhis->cachedNumTests = $Vpufahej1ssm;
        }

        return $Vpufahej1ssm;
    }

    
    public static function createTest(ReflectionClass $Vq3ogoxoagws, $Vgpjmw221p0b)
    {
        $Vqmu1sajhgfnName = $Vq3ogoxoagws->getName();

        if (!$Vq3ogoxoagws->isInstantiable()) {
            return self::warning(
                sprintf('Cannot instantiate class "%s".', $Vqmu1sajhgfnName)
            );
        }

        $Vym0jdplokxl = PHPUnit_Util_Test::getBackupSettings(
            $Vqmu1sajhgfnName,
            $Vgpjmw221p0b
        );

        $Vp1jxu3mlxbh = PHPUnit_Util_Test::getPreserveGlobalStateSettings(
            $Vqmu1sajhgfnName,
            $Vgpjmw221p0b
        );

        $Vqgwnt0xmvnd = PHPUnit_Util_Test::getProcessIsolationSettings(
            $Vqmu1sajhgfnName,
            $Vgpjmw221p0b
        );

        $V4yt0oahsnhs = $Vq3ogoxoagws->getConstructor();

        if ($V4yt0oahsnhs !== null) {
            $Vsazp03zrvte = $V4yt0oahsnhs->getParameters();

            
            if (count($Vsazp03zrvte) < 2) {
                $Vpswbntjg3pr = new $Vqmu1sajhgfnName;
            } 
            else {
                try {
                    $Vqhzkfsafzrc = PHPUnit_Util_Test::getProvidedData(
                        $Vqmu1sajhgfnName,
                        $Vgpjmw221p0b
                    );
                } catch (PHPUnit_Framework_IncompleteTestError $Vpt32vvhspnv) {
                    $Vbl4yrmdan1y = sprintf(
                        'Test for %s::%s marked incomplete by data provider',
                        $Vqmu1sajhgfnName,
                        $Vgpjmw221p0b
                    );

                    $V5yweyhoq1ut = $Vpt32vvhspnv->getMessage();

                    if (!empty($V5yweyhoq1ut)) {
                        $Vbl4yrmdan1y .= "\n" . $V5yweyhoq1ut;
                    }

                    $Vqhzkfsafzrc = self::incompleteTest($Vqmu1sajhgfnName, $Vgpjmw221p0b, $Vbl4yrmdan1y);
                } catch (PHPUnit_Framework_SkippedTestError $Vpt32vvhspnv) {
                    $Vbl4yrmdan1y = sprintf(
                        'Test for %s::%s skipped by data provider',
                        $Vqmu1sajhgfnName,
                        $Vgpjmw221p0b
                    );

                    $V5yweyhoq1ut = $Vpt32vvhspnv->getMessage();

                    if (!empty($V5yweyhoq1ut)) {
                        $Vbl4yrmdan1y .= "\n" . $V5yweyhoq1ut;
                    }

                    $Vqhzkfsafzrc = self::skipTest($Vqmu1sajhgfnName, $Vgpjmw221p0b, $Vbl4yrmdan1y);
                } catch (Throwable $Vvwctjw4nh0p) {
                    $Vuvamk1vhxxd = $Vvwctjw4nh0p;
                } catch (Exception $Vvwctjw4nh0p) {
                    $Vuvamk1vhxxd = $Vvwctjw4nh0p;
                }

                if (isset($Vuvamk1vhxxd)) {
                    $Vbl4yrmdan1y = sprintf(
                        'The data provider specified for %s::%s is invalid.',
                        $Vqmu1sajhgfnName,
                        $Vgpjmw221p0b
                    );

                    $V5yweyhoq1ut = $Vuvamk1vhxxd->getMessage();

                    if (!empty($V5yweyhoq1ut)) {
                        $Vbl4yrmdan1y .= "\n" . $V5yweyhoq1ut;
                    }

                    $Vqhzkfsafzrc = self::warning($Vbl4yrmdan1y);
                }

                
                if (isset($Vqhzkfsafzrc)) {
                    $Vpswbntjg3pr = new PHPUnit_Framework_TestSuite_DataProvider(
                        $Vqmu1sajhgfnName . '::' . $Vgpjmw221p0b
                    );

                    if (empty($Vqhzkfsafzrc)) {
                        $Vqhzkfsafzrc = self::warning(
                            sprintf(
                                'No tests found in suite "%s".',
                                $Vpswbntjg3pr->getName()
                            )
                        );
                    }

                    $V00tm5epe1pm = PHPUnit_Util_Test::getGroups($Vqmu1sajhgfnName, $Vgpjmw221p0b);

                    if ($Vqhzkfsafzrc instanceof PHPUnit_Framework_Warning ||
                        $Vqhzkfsafzrc instanceof PHPUnit_Framework_SkippedTestCase ||
                        $Vqhzkfsafzrc instanceof PHPUnit_Framework_IncompleteTestCase) {
                        $Vpswbntjg3pr->addTest($Vqhzkfsafzrc, $V00tm5epe1pm);
                    } else {
                        foreach ($Vqhzkfsafzrc as $Vuhr043f0bmu => $V5l5lo3l3ri2) {
                            $Vvwctjw4nh0pest = new $Vqmu1sajhgfnName($Vgpjmw221p0b, $V5l5lo3l3ri2, $Vuhr043f0bmu);

                            if ($Vqgwnt0xmvnd) {
                                $Vvwctjw4nh0pest->setRunTestInSeparateProcess(true);

                                if ($Vp1jxu3mlxbh !== null) {
                                    $Vvwctjw4nh0pest->setPreserveGlobalState($Vp1jxu3mlxbh);
                                }
                            }

                            if ($Vym0jdplokxl['backupGlobals'] !== null) {
                                $Vvwctjw4nh0pest->setBackupGlobals(
                                    $Vym0jdplokxl['backupGlobals']
                                );
                            }

                            if ($Vym0jdplokxl['backupStaticAttributes'] !== null) {
                                $Vvwctjw4nh0pest->setBackupStaticAttributes(
                                    $Vym0jdplokxl['backupStaticAttributes']
                                );
                            }

                            $Vpswbntjg3pr->addTest($Vvwctjw4nh0pest, $V00tm5epe1pm);
                        }
                    }
                } else {
                    $Vpswbntjg3pr = new $Vqmu1sajhgfnName;
                }
            }
        }

        if (!isset($Vpswbntjg3pr)) {
            throw new PHPUnit_Framework_Exception('No valid test provided.');
        }

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
            $Vpswbntjg3pr->setName($Vgpjmw221p0b);

            if ($Vqgwnt0xmvnd) {
                $Vpswbntjg3pr->setRunTestInSeparateProcess(true);

                if ($Vp1jxu3mlxbh !== null) {
                    $Vpswbntjg3pr->setPreserveGlobalState($Vp1jxu3mlxbh);
                }
            }

            if ($Vym0jdplokxl['backupGlobals'] !== null) {
                $Vpswbntjg3pr->setBackupGlobals($Vym0jdplokxl['backupGlobals']);
            }

            if ($Vym0jdplokxl['backupStaticAttributes'] !== null) {
                $Vpswbntjg3pr->setBackupStaticAttributes(
                    $Vym0jdplokxl['backupStaticAttributes']
                );
            }
        }

        return $Vpswbntjg3pr;
    }

    
    protected function createResult()
    {
        return new PHPUnit_Framework_TestResult;
    }

    
    public function getName()
    {
        return $Vuvamk1vhxxdhis->name;
    }

    
    public function getGroups()
    {
        return array_keys($Vuvamk1vhxxdhis->groups);
    }

    public function getGroupDetails()
    {
        return $Vuvamk1vhxxdhis->groups;
    }

    
    public function setGroupDetails(array $V00tm5epe1pm)
    {
        $Vuvamk1vhxxdhis->groups = $V00tm5epe1pm;
    }

    
    public function run(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr = null)
    {
        if ($Vv0hyvhlkjqr === null) {
            $Vv0hyvhlkjqr = $Vuvamk1vhxxdhis->createResult();
        }

        if (count($Vuvamk1vhxxdhis) == 0) {
            return $Vv0hyvhlkjqr;
        }

        $Vvq52l1ahlwn = PHPUnit_Util_Test::getHookMethods($Vuvamk1vhxxdhis->name);

        $Vv0hyvhlkjqr->startTestSuite($Vuvamk1vhxxdhis);

        try {
            $Vuvamk1vhxxdhis->setUp();

            foreach ($Vvq52l1ahlwn['beforeClass'] as $Vnxrci14m1pb) {
                if ($Vuvamk1vhxxdhis->testCase === true &&
                    class_exists($Vuvamk1vhxxdhis->name, false) &&
                    method_exists($Vuvamk1vhxxdhis->name, $Vnxrci14m1pb)) {
                    if ($Vfvcmrkfq5ui = PHPUnit_Util_Test::getMissingRequirements($Vuvamk1vhxxdhis->name, $Vnxrci14m1pb)) {
                        $Vuvamk1vhxxdhis->markTestSuiteSkipped(implode(PHP_EOL, $Vfvcmrkfq5ui));
                    }

                    call_user_func(array($Vuvamk1vhxxdhis->name, $Vnxrci14m1pb));
                }
            }
        } catch (PHPUnit_Framework_SkippedTestSuiteError $Vpt32vvhspnv) {
            $Vpufahej1ssm = count($Vuvamk1vhxxdhis);

            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vpufahej1ssm; $Vxja1abp34yq++) {
                $Vv0hyvhlkjqr->startTest($Vuvamk1vhxxdhis);
                $Vv0hyvhlkjqr->addFailure($Vuvamk1vhxxdhis, $Vpt32vvhspnv, 0);
                $Vv0hyvhlkjqr->endTest($Vuvamk1vhxxdhis, 0);
            }

            $Vuvamk1vhxxdhis->tearDown();
            $Vv0hyvhlkjqr->endTestSuite($Vuvamk1vhxxdhis);

            return $Vv0hyvhlkjqr;
        } catch (Throwable $Vvwctjw4nh0p) {
            $Vuvamk1vhxxd = $Vvwctjw4nh0p;
        } catch (Exception $Vvwctjw4nh0p) {
            $Vuvamk1vhxxd = $Vvwctjw4nh0p;
        }

        if (isset($Vuvamk1vhxxd)) {
            $Vpufahej1ssm = count($Vuvamk1vhxxdhis);

            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vpufahej1ssm; $Vxja1abp34yq++) {
                $Vv0hyvhlkjqr->startTest($Vuvamk1vhxxdhis);
                $Vv0hyvhlkjqr->addError($Vuvamk1vhxxdhis, $Vuvamk1vhxxd, 0);
                $Vv0hyvhlkjqr->endTest($Vuvamk1vhxxdhis, 0);
            }

            $Vuvamk1vhxxdhis->tearDown();
            $Vv0hyvhlkjqr->endTestSuite($Vuvamk1vhxxdhis);

            return $Vv0hyvhlkjqr;
        }

        foreach ($Vuvamk1vhxxdhis as $Vpswbntjg3pr) {
            if ($Vv0hyvhlkjqr->shouldStop()) {
                break;
            }

            if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase ||
                $Vpswbntjg3pr instanceof self) {
                $Vpswbntjg3pr->setDisallowChangesToGlobalState($Vuvamk1vhxxdhis->disallowChangesToGlobalState);
                $Vpswbntjg3pr->setBackupGlobals($Vuvamk1vhxxdhis->backupGlobals);
                $Vpswbntjg3pr->setBackupStaticAttributes($Vuvamk1vhxxdhis->backupStaticAttributes);
                $Vpswbntjg3pr->setRunTestInSeparateProcess($Vuvamk1vhxxdhis->runTestInSeparateProcess);
            }

            $Vpswbntjg3pr->run($Vv0hyvhlkjqr);
        }

        foreach ($Vvq52l1ahlwn['afterClass'] as $Vwzn0reltykf) {
            if ($Vuvamk1vhxxdhis->testCase === true && class_exists($Vuvamk1vhxxdhis->name, false) && method_exists($Vuvamk1vhxxdhis->name, $Vwzn0reltykf)) {
                call_user_func(array($Vuvamk1vhxxdhis->name, $Vwzn0reltykf));
            }
        }

        $Vuvamk1vhxxdhis->tearDown();

        $Vv0hyvhlkjqr->endTestSuite($Vuvamk1vhxxdhis);

        return $Vv0hyvhlkjqr;
    }

    
    public function setRunTestInSeparateProcess($Vqgwnt0xmvnd)
    {
        if (is_bool($Vqgwnt0xmvnd)) {
            $Vuvamk1vhxxdhis->runTestInSeparateProcess = $Vqgwnt0xmvnd;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    
    public function runTest(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $Vpswbntjg3pr->run($Vv0hyvhlkjqr);
    }

    
    public function setName($Vgpjmw221p0b)
    {
        $Vuvamk1vhxxdhis->name = $Vgpjmw221p0b;
    }

    
    public function testAt($Vxja1abp34yqndex)
    {
        if (isset($Vuvamk1vhxxdhis->tests[$Vxja1abp34yqndex])) {
            return $Vuvamk1vhxxdhis->tests[$Vxja1abp34yqndex];
        } else {
            return false;
        }
    }

    
    public function tests()
    {
        return $Vuvamk1vhxxdhis->tests;
    }

    
    public function setTests(array $Vo50qpjpkko3)
    {
        $Vuvamk1vhxxdhis->tests = $Vo50qpjpkko3;
    }

    
    public function markTestSuiteSkipped($Vbl4yrmdan1y = '')
    {
        throw new PHPUnit_Framework_SkippedTestSuiteError($Vbl4yrmdan1y);
    }

    
    protected function addTestMethod(ReflectionClass $Vqmu1sajhgfn, ReflectionMethod $Vtlfvdwskdge)
    {
        if (!$Vuvamk1vhxxdhis->isTestMethod($Vtlfvdwskdge)) {
            return;
        }

        $Vgpjmw221p0b = $Vtlfvdwskdge->getName();

        if (!$Vtlfvdwskdge->isPublic()) {
            $Vuvamk1vhxxdhis->addTest(
                self::warning(
                    sprintf(
                        'Test method "%s" in test class "%s" is not public.',
                        $Vgpjmw221p0b,
                        $Vqmu1sajhgfn->getName()
                    )
                )
            );

            return;
        }

        $Vpswbntjg3pr = self::createTest($Vqmu1sajhgfn, $Vgpjmw221p0b);

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase ||
            $Vpswbntjg3pr instanceof PHPUnit_Framework_TestSuite_DataProvider) {
            $Vpswbntjg3pr->setDependencies(
                PHPUnit_Util_Test::getDependencies($Vqmu1sajhgfn->getName(), $Vgpjmw221p0b)
            );
        }

        $Vuvamk1vhxxdhis->addTest(
            $Vpswbntjg3pr,
            PHPUnit_Util_Test::getGroups($Vqmu1sajhgfn->getName(), $Vgpjmw221p0b)
        );
    }

    
    public static function isTestMethod(ReflectionMethod $Vtlfvdwskdge)
    {
        if (strpos($Vtlfvdwskdge->name, 'test') === 0) {
            return true;
        }

        
        
        $Vn20w14jlojg = $Vtlfvdwskdge->getDocComment();

        return strpos($Vn20w14jlojg, '@test')     !== false ||
               strpos($Vn20w14jlojg, '@scenario') !== false;
    }

    
    protected static function warning($Vbl4yrmdan1y)
    {
        return new PHPUnit_Framework_Warning($Vbl4yrmdan1y);
    }

    
    protected static function skipTest($Vqmu1sajhgfn, $VtlfvdwskdgeName, $Vbl4yrmdan1y)
    {
        return new PHPUnit_Framework_SkippedTestCase($Vqmu1sajhgfn, $VtlfvdwskdgeName, $Vbl4yrmdan1y);
    }

    
    protected static function incompleteTest($Vqmu1sajhgfn, $VtlfvdwskdgeName, $Vbl4yrmdan1y)
    {
        return new PHPUnit_Framework_IncompleteTestCase($Vqmu1sajhgfn, $VtlfvdwskdgeName, $Vbl4yrmdan1y);
    }

    
    public function setDisallowChangesToGlobalState($Vks0edyzahxn)
    {
        if (is_null($Vuvamk1vhxxdhis->disallowChangesToGlobalState) && is_bool($Vks0edyzahxn)) {
            $Vuvamk1vhxxdhis->disallowChangesToGlobalState = $Vks0edyzahxn;
        }
    }

    
    public function setBackupGlobals($Vaf3jfgkfpgj)
    {
        if (is_null($Vuvamk1vhxxdhis->backupGlobals) && is_bool($Vaf3jfgkfpgj)) {
            $Vuvamk1vhxxdhis->backupGlobals = $Vaf3jfgkfpgj;
        }
    }

    
    public function setBackupStaticAttributes($V1ji0ss4bexn)
    {
        if (is_null($Vuvamk1vhxxdhis->backupStaticAttributes) &&
            is_bool($V1ji0ss4bexn)) {
            $Vuvamk1vhxxdhis->backupStaticAttributes = $V1ji0ss4bexn;
        }
    }

    
    public function getIterator()
    {
        $Vxja1abp34yqterator = new PHPUnit_Util_TestSuiteIterator($Vuvamk1vhxxdhis);

        if ($Vuvamk1vhxxdhis->iteratorFilter !== null) {
            $Vxja1abp34yqterator = $Vuvamk1vhxxdhis->iteratorFilter->factory($Vxja1abp34yqterator, $Vuvamk1vhxxdhis);
        }

        return $Vxja1abp34yqterator;
    }

    public function injectFilter(PHPUnit_Runner_Filter_Factory $Vgpt4we0cx0b)
    {
        $Vuvamk1vhxxdhis->iteratorFilter = $Vgpt4we0cx0b;
        foreach ($Vuvamk1vhxxdhis as $Vpswbntjg3pr) {
            if ($Vpswbntjg3pr instanceof self) {
                $Vpswbntjg3pr->injectFilter($Vgpt4we0cx0b);
            }
        }
    }

    
    protected function setUp()
    {
    }

    
    protected function tearDown()
    {
    }
}
