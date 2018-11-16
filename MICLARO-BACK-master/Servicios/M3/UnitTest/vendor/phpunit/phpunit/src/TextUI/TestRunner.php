<?php


use SebastianBergmann\Environment\Runtime;


class PHPUnit_TextUI_TestRunner extends PHPUnit_Runner_BaseTestRunner
{
    const SUCCESS_EXIT   = 0;
    const FAILURE_EXIT   = 1;
    const EXCEPTION_EXIT = 2;

    
    protected $Vgzwqalsw0v2;

    
    protected $Vovnziqng5rv = null;

    
    protected $Vg1ovzsmuvwq = null;

    
    protected static $Vtmgbysw5i5q = false;

    
    private $Vsfasdjuweic = array();

    
    private $Vrdnxfa4exum;

    
    public function __construct(PHPUnit_Runner_TestSuiteLoader $Vovnziqng5rv = null, PHP_CodeCoverage_Filter $Vgpt4we0cx0b = null)
    {
        if ($Vgpt4we0cx0b === null) {
            $Vgpt4we0cx0b = $this->getCodeCoverageFilter();
        }

        $this->codeCoverageFilter = $Vgpt4we0cx0b;
        $this->loader             = $Vovnziqng5rv;
        $this->runtime            = new Runtime;
    }

    
    public static function run($Vpswbntjg3pr, array $Vj23lbel2xn0 = array())
    {
        if ($Vpswbntjg3pr instanceof ReflectionClass) {
            $Vpswbntjg3pr = new PHPUnit_Framework_TestSuite($Vpswbntjg3pr);
        }

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_Test) {
            $Vp3ldphfgrtw = new self;

            return $Vp3ldphfgrtw->doRun(
                $Vpswbntjg3pr,
                $Vj23lbel2xn0
            );
        } else {
            throw new PHPUnit_Framework_Exception(
                'No test case or test suite found.'
            );
        }
    }

    
    protected function createTestResult()
    {
        return new PHPUnit_Framework_TestResult;
    }

    private function processSuiteFilters(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e, array $Vj23lbel2xn0)
    {
        if (!$Vj23lbel2xn0['filter'] &&
            empty($Vj23lbel2xn0['groups']) &&
            empty($Vj23lbel2xn0['excludeGroups'])) {
            return;
        }

        $Vgpt4we0cx0bFactory = new PHPUnit_Runner_Filter_Factory();

        if (!empty($Vj23lbel2xn0['excludeGroups'])) {
            $Vgpt4we0cx0bFactory->addFilter(
                new ReflectionClass('PHPUnit_Runner_Filter_Group_Exclude'),
                $Vj23lbel2xn0['excludeGroups']
            );
        }

        if (!empty($Vj23lbel2xn0['groups'])) {
            $Vgpt4we0cx0bFactory->addFilter(
                new ReflectionClass('PHPUnit_Runner_Filter_Group_Include'),
                $Vj23lbel2xn0['groups']
            );
        }

        if ($Vj23lbel2xn0['filter']) {
            $Vgpt4we0cx0bFactory->addFilter(
                new ReflectionClass('PHPUnit_Runner_Filter_Test'),
                $Vj23lbel2xn0['filter']
            );
        }
        $Vrrxtoyyy15e->injectFilter($Vgpt4we0cx0bFactory);
    }

    
    public function doRun(PHPUnit_Framework_Test $Vrrxtoyyy15e, array $Vj23lbel2xn0 = array())
    {
        if (isset($Vj23lbel2xn0['configuration'])) {
            $GLOBALS['__PHPUNIT_CONFIGURATION_FILE'] = $Vj23lbel2xn0['configuration'];
        }

        $this->handleConfiguration($Vj23lbel2xn0);

        $this->processSuiteFilters($Vrrxtoyyy15e, $Vj23lbel2xn0);

        if (isset($Vj23lbel2xn0['bootstrap'])) {
            $GLOBALS['__PHPUNIT_BOOTSTRAP'] = $Vj23lbel2xn0['bootstrap'];
        }

        if ($Vj23lbel2xn0['backupGlobals'] === false) {
            $Vrrxtoyyy15e->setBackupGlobals(false);
        }

        if ($Vj23lbel2xn0['backupStaticAttributes'] === true) {
            $Vrrxtoyyy15e->setBackupStaticAttributes(true);
        }

        if ($Vj23lbel2xn0['disallowChangesToGlobalState'] === true) {
            $Vrrxtoyyy15e->setDisallowChangesToGlobalState(true);
        }

        if (is_integer($Vj23lbel2xn0['repeat'])) {
            $Vpswbntjg3pr = new PHPUnit_Extensions_RepeatedTest(
                $Vrrxtoyyy15e,
                $Vj23lbel2xn0['repeat'],
                $Vj23lbel2xn0['processIsolation']
            );

            $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite();
            $Vrrxtoyyy15e->addTest($Vpswbntjg3pr);
        }

        $Vv0hyvhlkjqr = $this->createTestResult();

        if (!$Vj23lbel2xn0['convertErrorsToExceptions']) {
            $Vv0hyvhlkjqr->convertErrorsToExceptions(false);
        }

        if (!$Vj23lbel2xn0['convertNoticesToExceptions']) {
            PHPUnit_Framework_Error_Notice::$V4mhqh0gr4xi = false;
        }

        if (!$Vj23lbel2xn0['convertWarningsToExceptions']) {
            PHPUnit_Framework_Error_Warning::$V4mhqh0gr4xi = false;
        }

        if ($Vj23lbel2xn0['stopOnError']) {
            $Vv0hyvhlkjqr->stopOnError(true);
        }

        if ($Vj23lbel2xn0['stopOnFailure']) {
            $Vv0hyvhlkjqr->stopOnFailure(true);
        }

        if ($Vj23lbel2xn0['stopOnIncomplete']) {
            $Vv0hyvhlkjqr->stopOnIncomplete(true);
        }

        if ($Vj23lbel2xn0['stopOnRisky']) {
            $Vv0hyvhlkjqr->stopOnRisky(true);
        }

        if ($Vj23lbel2xn0['stopOnSkipped']) {
            $Vv0hyvhlkjqr->stopOnSkipped(true);
        }

        if ($this->printer === null) {
            if (isset($Vj23lbel2xn0['printer']) &&
                $Vj23lbel2xn0['printer'] instanceof PHPUnit_Util_Printer) {
                $this->printer = $Vj23lbel2xn0['printer'];
            } else {
                $Vg1ovzsmuvwqClass = 'PHPUnit_TextUI_ResultPrinter';

                if (isset($Vj23lbel2xn0['printer']) &&
                    is_string($Vj23lbel2xn0['printer']) &&
                    class_exists($Vj23lbel2xn0['printer'], false)) {
                    $Vqmu1sajhgfn = new ReflectionClass($Vj23lbel2xn0['printer']);

                    if ($Vqmu1sajhgfn->isSubclassOf('PHPUnit_TextUI_ResultPrinter')) {
                        $Vg1ovzsmuvwqClass = $Vj23lbel2xn0['printer'];
                    }
                }

                $this->printer = new $Vg1ovzsmuvwqClass(
                  isset($Vj23lbel2xn0['stderr']) ? 'php://stderr' : null,
                  $Vj23lbel2xn0['verbose'],
                  $Vj23lbel2xn0['colors'],
                  $Vj23lbel2xn0['debug'],
                  $Vj23lbel2xn0['columns']
                );
            }
        }

        if (!$this->printer instanceof PHPUnit_Util_Log_TAP) {
            $this->printer->write(
                PHPUnit_Runner_Version::getVersionString() . "\n"
            );

            self::$Vtmgbysw5i5q = true;

            if ($Vj23lbel2xn0['verbose']) {
                $this->printer->write(
                    sprintf(
                        "\nRuntime:\t%s",
                        $this->runtime->getNameWithVersion()
                    )
                );

                if ($this->runtime->hasXdebug()) {
                    $this->printer->write(
                        sprintf(
                            ' with Xdebug %s',
                            phpversion('xdebug')
                        )
                    );
                }

                if (isset($Vj23lbel2xn0['configuration'])) {
                    $this->printer->write(
                        sprintf(
                            "\nConfiguration:\t%s",
                            $Vj23lbel2xn0['configuration']->getFilename()
                        )
                    );
                }

                $this->printer->write("\n");
            }

            if (isset($Vj23lbel2xn0['deprecatedStrictModeOption'])) {
                print "Warning:\tDeprecated option \"--strict\" used\n";
            } elseif (isset($Vj23lbel2xn0['deprecatedStrictModeSetting'])) {
                print "Warning:\tDeprecated configuration setting \"strict\" used\n";
            }

            if (isset($Vj23lbel2xn0['deprecatedSeleniumConfiguration'])) {
                print "Warning:\tDeprecated configuration setting \"selenium\" used\n";
            }
        }

        foreach ($Vj23lbel2xn0['listeners'] as $V13lyfwn4lxw) {
            $Vv0hyvhlkjqr->addListener($V13lyfwn4lxw);
        }

        $Vv0hyvhlkjqr->addListener($this->printer);

        if (isset($Vj23lbel2xn0['testdoxHTMLFile'])) {
            $Vv0hyvhlkjqr->addListener(
                new PHPUnit_Util_TestDox_ResultPrinter_HTML(
                    $Vj23lbel2xn0['testdoxHTMLFile']
                )
            );
        }

        if (isset($Vj23lbel2xn0['testdoxTextFile'])) {
            $Vv0hyvhlkjqr->addListener(
                new PHPUnit_Util_TestDox_ResultPrinter_Text(
                    $Vj23lbel2xn0['testdoxTextFile']
                )
            );
        }

        $Vgyorbjno1uj = 0;

        if (isset($Vj23lbel2xn0['coverageClover'])) {
            $Vgyorbjno1uj++;
        }

        if (isset($Vj23lbel2xn0['coverageCrap4J'])) {
            $Vgyorbjno1uj++;
        }

        if (isset($Vj23lbel2xn0['coverageHtml'])) {
            $Vgyorbjno1uj++;
        }

        if (isset($Vj23lbel2xn0['coveragePHP'])) {
            $Vgyorbjno1uj++;
        }

        if (isset($Vj23lbel2xn0['coverageText'])) {
            $Vgyorbjno1uj++;
        }

        if (isset($Vj23lbel2xn0['coverageXml'])) {
            $Vgyorbjno1uj++;
        }

        if (isset($Vj23lbel2xn0['noCoverage'])) {
            $Vgyorbjno1uj = 0;
        }

        if ($Vgyorbjno1uj > 0 && (!extension_loaded('tokenizer') || !$this->runtime->canCollectCodeCoverage())) {
            if (!extension_loaded('tokenizer')) {
                $this->showExtensionNotLoadedWarning(
                    'tokenizer',
                    'No code coverage will be generated.'
                );
            } elseif (!extension_loaded('Xdebug')) {
                $this->showExtensionNotLoadedWarning(
                    'Xdebug',
                    'No code coverage will be generated.'
                );
            }

            $Vgyorbjno1uj = 0;
        }

        if (!$this->printer instanceof PHPUnit_Util_Log_TAP) {
            if ($Vgyorbjno1uj > 0 && !$this->codeCoverageFilter->hasWhitelist()) {
                $this->printer->write("Warning:\tNo whitelist configured for code coverage\n");
            }

            $this->printer->write("\n");
        }

        if ($Vgyorbjno1uj > 0) {
            $Vbnhjjh5ueuw = new PHP_CodeCoverage(
                null,
                $this->codeCoverageFilter
            );

            $Vbnhjjh5ueuw->setAddUncoveredFilesFromWhitelist(
                $Vj23lbel2xn0['addUncoveredFilesFromWhitelist']
            );

            $Vbnhjjh5ueuw->setCheckForUnintentionallyCoveredCode(
                $Vj23lbel2xn0['strictCoverage']
            );

            $Vbnhjjh5ueuw->setProcessUncoveredFilesFromWhitelist(
                $Vj23lbel2xn0['processUncoveredFilesFromWhitelist']
            );

            if (isset($Vj23lbel2xn0['forceCoversAnnotation'])) {
                $Vbnhjjh5ueuw->setForceCoversAnnotation(
                    $Vj23lbel2xn0['forceCoversAnnotation']
                );
            }

            if (isset($Vj23lbel2xn0['mapTestClassNameToCoveredClassName'])) {
                $Vbnhjjh5ueuw->setMapTestClassNameToCoveredClassName(
                    $Vj23lbel2xn0['mapTestClassNameToCoveredClassName']
                );
            }

            $Vv0hyvhlkjqr->setCodeCoverage($Vbnhjjh5ueuw);
        }

        if ($Vgyorbjno1uj > 1) {
            if (isset($Vj23lbel2xn0['cacheTokens'])) {
                $Vbnhjjh5ueuw->setCacheTokens($Vj23lbel2xn0['cacheTokens']);
            }
        }

        if (isset($Vj23lbel2xn0['jsonLogfile'])) {
            $Vv0hyvhlkjqr->addListener(
                new PHPUnit_Util_Log_JSON($Vj23lbel2xn0['jsonLogfile'])
            );
        }

        if (isset($Vj23lbel2xn0['tapLogfile'])) {
            $Vv0hyvhlkjqr->addListener(
                new PHPUnit_Util_Log_TAP($Vj23lbel2xn0['tapLogfile'])
            );
        }

        if (isset($Vj23lbel2xn0['junitLogfile'])) {
            $Vv0hyvhlkjqr->addListener(
                new PHPUnit_Util_Log_JUnit(
                    $Vj23lbel2xn0['junitLogfile'],
                    $Vj23lbel2xn0['logIncompleteSkipped']
                )
            );
        }

        $Vv0hyvhlkjqr->beStrictAboutTestsThatDoNotTestAnything($Vj23lbel2xn0['reportUselessTests']);
        $Vv0hyvhlkjqr->beStrictAboutOutputDuringTests($Vj23lbel2xn0['disallowTestOutput']);
        $Vv0hyvhlkjqr->beStrictAboutTodoAnnotatedTests($Vj23lbel2xn0['disallowTodoAnnotatedTests']);
        $Vv0hyvhlkjqr->beStrictAboutTestSize($Vj23lbel2xn0['enforceTimeLimit']);
        $Vv0hyvhlkjqr->setTimeoutForSmallTests($Vj23lbel2xn0['timeoutForSmallTests']);
        $Vv0hyvhlkjqr->setTimeoutForMediumTests($Vj23lbel2xn0['timeoutForMediumTests']);
        $Vv0hyvhlkjqr->setTimeoutForLargeTests($Vj23lbel2xn0['timeoutForLargeTests']);

        if ($Vrrxtoyyy15e instanceof PHPUnit_Framework_TestSuite) {
            $Vrrxtoyyy15e->setRunTestInSeparateProcess($Vj23lbel2xn0['processIsolation']);
        }

        $Vrrxtoyyy15e->run($Vv0hyvhlkjqr);

        unset($Vrrxtoyyy15e);
        $Vv0hyvhlkjqr->flushListeners();

        if ($this->printer instanceof PHPUnit_TextUI_ResultPrinter) {
            $this->printer->printResult($Vv0hyvhlkjqr);
        }

        if (isset($Vbnhjjh5ueuw)) {
            if (isset($Vj23lbel2xn0['coverageClover'])) {
                $this->printer->write(
                    "\nGenerating code coverage report in Clover XML format ..."
                );

                try {
                    $Vjp01nlr1dqs = new PHP_CodeCoverage_Report_Clover;
                    $Vjp01nlr1dqs->process($Vbnhjjh5ueuw, $Vj23lbel2xn0['coverageClover']);

                    $this->printer->write(" done\n");
                    unset($Vjp01nlr1dqs);
                } catch (PHP_CodeCoverage_Exception $Vpt32vvhspnv) {
                    $this->printer->write(
                        " failed\n" . $Vpt32vvhspnv->getMessage() . "\n"
                    );
                }
            }

            if (isset($Vj23lbel2xn0['coverageCrap4J'])) {
                $this->printer->write(
                    "\nGenerating Crap4J report XML file ..."
                );

                try {
                    $Vjp01nlr1dqs = new PHP_CodeCoverage_Report_Crap4j($Vj23lbel2xn0['crap4jThreshold']);
                    $Vjp01nlr1dqs->process($Vbnhjjh5ueuw, $Vj23lbel2xn0['coverageCrap4J']);

                    $this->printer->write(" done\n");
                    unset($Vjp01nlr1dqs);
                } catch (PHP_CodeCoverage_Exception $Vpt32vvhspnv) {
                    $this->printer->write(
                        " failed\n" . $Vpt32vvhspnv->getMessage() . "\n"
                    );
                }
            }

            if (isset($Vj23lbel2xn0['coverageHtml'])) {
                $this->printer->write(
                    "\nGenerating code coverage report in HTML format ..."
                );

                try {
                    $Vjp01nlr1dqs = new PHP_CodeCoverage_Report_HTML(
                        $Vj23lbel2xn0['reportLowUpperBound'],
                        $Vj23lbel2xn0['reportHighLowerBound'],
                        sprintf(
                            ' and <a href="https://phpunit.de/">PHPUnit %s</a>',
                            PHPUnit_Runner_Version::id()
                        )
                    );

                    $Vjp01nlr1dqs->process($Vbnhjjh5ueuw, $Vj23lbel2xn0['coverageHtml']);

                    $this->printer->write(" done\n");
                    unset($Vjp01nlr1dqs);
                } catch (PHP_CodeCoverage_Exception $Vpt32vvhspnv) {
                    $this->printer->write(
                        " failed\n" . $Vpt32vvhspnv->getMessage() . "\n"
                    );
                }
            }

            if (isset($Vj23lbel2xn0['coveragePHP'])) {
                $this->printer->write(
                    "\nGenerating code coverage report in PHP format ..."
                );

                try {
                    $Vjp01nlr1dqs = new PHP_CodeCoverage_Report_PHP;
                    $Vjp01nlr1dqs->process($Vbnhjjh5ueuw, $Vj23lbel2xn0['coveragePHP']);

                    $this->printer->write(" done\n");
                    unset($Vjp01nlr1dqs);
                } catch (PHP_CodeCoverage_Exception $Vpt32vvhspnv) {
                    $this->printer->write(
                        " failed\n" . $Vpt32vvhspnv->getMessage() . "\n"
                    );
                }
            }

            if (isset($Vj23lbel2xn0['coverageText'])) {
                if ($Vj23lbel2xn0['coverageText'] == 'php://stdout') {
                    $Vnfcvdbxcgl2 = $this->printer;
                    $V2oedabekkrb       = $Vj23lbel2xn0['colors'] && $Vj23lbel2xn0['colors'] != PHPUnit_TextUI_ResultPrinter::COLOR_NEVER;
                } else {
                    $Vnfcvdbxcgl2 = new PHPUnit_Util_Printer($Vj23lbel2xn0['coverageText']);
                    $V2oedabekkrb       = false;
                }

                $Vrbpczqdvxog = new PHP_CodeCoverage_Report_Text(
                    $Vj23lbel2xn0['reportLowUpperBound'],
                    $Vj23lbel2xn0['reportHighLowerBound'],
                    $Vj23lbel2xn0['coverageTextShowUncoveredFiles'],
                    $Vj23lbel2xn0['coverageTextShowOnlySummary']
                );

                $Vnfcvdbxcgl2->write(
                    $Vrbpczqdvxog->process($Vbnhjjh5ueuw, $V2oedabekkrb)
                );
            }

            if (isset($Vj23lbel2xn0['coverageXml'])) {
                $this->printer->write(
                    "\nGenerating code coverage report in PHPUnit XML format ..."
                );

                try {
                    $Vjp01nlr1dqs = new PHP_CodeCoverage_Report_XML;
                    $Vjp01nlr1dqs->process($Vbnhjjh5ueuw, $Vj23lbel2xn0['coverageXml']);

                    $this->printer->write(" done\n");
                    unset($Vjp01nlr1dqs);
                } catch (PHP_CodeCoverage_Exception $Vpt32vvhspnv) {
                    $this->printer->write(
                        " failed\n" . $Vpt32vvhspnv->getMessage() . "\n"
                    );
                }
            }
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function setPrinter(PHPUnit_TextUI_ResultPrinter $Vv0hyvhlkjqrPrinter)
    {
        $this->printer = $Vv0hyvhlkjqrPrinter;
    }

    
    protected function runFailed($Vbl4yrmdan1y)
    {
        $this->write($Vbl4yrmdan1y . PHP_EOL);
        exit(self::FAILURE_EXIT);
    }

    
    protected function write($Vd3322ljwbqh)
    {
        if (PHP_SAPI != 'cli' && PHP_SAPI != 'phpdbg') {
            $Vd3322ljwbqh = htmlspecialchars($Vd3322ljwbqh);
        }

        if ($this->printer !== null) {
            $this->printer->write($Vd3322ljwbqh);
        } else {
            print $Vd3322ljwbqh;
        }
    }

    
    public function getLoader()
    {
        if ($this->loader === null) {
            $this->loader = new PHPUnit_Runner_StandardTestSuiteLoader;
        }

        return $this->loader;
    }

    
    protected function handleConfiguration(array &$Vj23lbel2xn0)
    {
        if (isset($Vj23lbel2xn0['configuration']) &&
            !$Vj23lbel2xn0['configuration'] instanceof PHPUnit_Util_Configuration) {
            $Vj23lbel2xn0['configuration'] = PHPUnit_Util_Configuration::getInstance(
                $Vj23lbel2xn0['configuration']
            );
        }

        $Vj23lbel2xn0['debug']     = isset($Vj23lbel2xn0['debug'])     ? $Vj23lbel2xn0['debug']     : false;
        $Vj23lbel2xn0['filter']    = isset($Vj23lbel2xn0['filter'])    ? $Vj23lbel2xn0['filter']    : false;
        $Vj23lbel2xn0['listeners'] = isset($Vj23lbel2xn0['listeners']) ? $Vj23lbel2xn0['listeners'] : array();

        if (isset($Vj23lbel2xn0['configuration'])) {
            $Vj23lbel2xn0['configuration']->handlePHPConfiguration();

            $Vysgiumuhj0t = $Vj23lbel2xn0['configuration']->getPHPUnitConfiguration();

            if (isset($Vysgiumuhj0t['deprecatedStrictModeSetting'])) {
                $Vj23lbel2xn0['deprecatedStrictModeSetting'] = true;
            }

            if (isset($Vysgiumuhj0t['backupGlobals']) &&
                !isset($Vj23lbel2xn0['backupGlobals'])) {
                $Vj23lbel2xn0['backupGlobals'] = $Vysgiumuhj0t['backupGlobals'];
            }

            if (isset($Vysgiumuhj0t['backupStaticAttributes']) &&
                !isset($Vj23lbel2xn0['backupStaticAttributes'])) {
                $Vj23lbel2xn0['backupStaticAttributes'] = $Vysgiumuhj0t['backupStaticAttributes'];
            }

            if (isset($Vysgiumuhj0t['disallowChangesToGlobalState']) &&
                !isset($Vj23lbel2xn0['disallowChangesToGlobalState'])) {
                $Vj23lbel2xn0['disallowChangesToGlobalState'] = $Vysgiumuhj0t['disallowChangesToGlobalState'];
            }

            if (isset($Vysgiumuhj0t['bootstrap']) &&
                !isset($Vj23lbel2xn0['bootstrap'])) {
                $Vj23lbel2xn0['bootstrap'] = $Vysgiumuhj0t['bootstrap'];
            }

            if (isset($Vysgiumuhj0t['cacheTokens']) &&
                !isset($Vj23lbel2xn0['cacheTokens'])) {
                $Vj23lbel2xn0['cacheTokens'] = $Vysgiumuhj0t['cacheTokens'];
            }

            if (isset($Vysgiumuhj0t['colors']) &&
                !isset($Vj23lbel2xn0['colors'])) {
                $Vj23lbel2xn0['colors'] = $Vysgiumuhj0t['colors'];
            }

            if (isset($Vysgiumuhj0t['convertErrorsToExceptions']) &&
                !isset($Vj23lbel2xn0['convertErrorsToExceptions'])) {
                $Vj23lbel2xn0['convertErrorsToExceptions'] = $Vysgiumuhj0t['convertErrorsToExceptions'];
            }

            if (isset($Vysgiumuhj0t['convertNoticesToExceptions']) &&
                !isset($Vj23lbel2xn0['convertNoticesToExceptions'])) {
                $Vj23lbel2xn0['convertNoticesToExceptions'] = $Vysgiumuhj0t['convertNoticesToExceptions'];
            }

            if (isset($Vysgiumuhj0t['convertWarningsToExceptions']) &&
                !isset($Vj23lbel2xn0['convertWarningsToExceptions'])) {
                $Vj23lbel2xn0['convertWarningsToExceptions'] = $Vysgiumuhj0t['convertWarningsToExceptions'];
            }

            if (isset($Vysgiumuhj0t['processIsolation']) &&
                !isset($Vj23lbel2xn0['processIsolation'])) {
                $Vj23lbel2xn0['processIsolation'] = $Vysgiumuhj0t['processIsolation'];
            }

            if (isset($Vysgiumuhj0t['stopOnError']) &&
                !isset($Vj23lbel2xn0['stopOnError'])) {
                $Vj23lbel2xn0['stopOnError'] = $Vysgiumuhj0t['stopOnError'];
            }

            if (isset($Vysgiumuhj0t['stopOnFailure']) &&
                !isset($Vj23lbel2xn0['stopOnFailure'])) {
                $Vj23lbel2xn0['stopOnFailure'] = $Vysgiumuhj0t['stopOnFailure'];
            }

            if (isset($Vysgiumuhj0t['stopOnIncomplete']) &&
                !isset($Vj23lbel2xn0['stopOnIncomplete'])) {
                $Vj23lbel2xn0['stopOnIncomplete'] = $Vysgiumuhj0t['stopOnIncomplete'];
            }

            if (isset($Vysgiumuhj0t['stopOnRisky']) &&
                !isset($Vj23lbel2xn0['stopOnRisky'])) {
                $Vj23lbel2xn0['stopOnRisky'] = $Vysgiumuhj0t['stopOnRisky'];
            }

            if (isset($Vysgiumuhj0t['stopOnSkipped']) &&
                !isset($Vj23lbel2xn0['stopOnSkipped'])) {
                $Vj23lbel2xn0['stopOnSkipped'] = $Vysgiumuhj0t['stopOnSkipped'];
            }

            if (isset($Vysgiumuhj0t['timeoutForSmallTests']) &&
                !isset($Vj23lbel2xn0['timeoutForSmallTests'])) {
                $Vj23lbel2xn0['timeoutForSmallTests'] = $Vysgiumuhj0t['timeoutForSmallTests'];
            }

            if (isset($Vysgiumuhj0t['timeoutForMediumTests']) &&
                !isset($Vj23lbel2xn0['timeoutForMediumTests'])) {
                $Vj23lbel2xn0['timeoutForMediumTests'] = $Vysgiumuhj0t['timeoutForMediumTests'];
            }

            if (isset($Vysgiumuhj0t['timeoutForLargeTests']) &&
                !isset($Vj23lbel2xn0['timeoutForLargeTests'])) {
                $Vj23lbel2xn0['timeoutForLargeTests'] = $Vysgiumuhj0t['timeoutForLargeTests'];
            }

            if (isset($Vysgiumuhj0t['reportUselessTests']) &&
                !isset($Vj23lbel2xn0['reportUselessTests'])) {
                $Vj23lbel2xn0['reportUselessTests'] = $Vysgiumuhj0t['reportUselessTests'];
            }

            if (isset($Vysgiumuhj0t['strictCoverage']) &&
                !isset($Vj23lbel2xn0['strictCoverage'])) {
                $Vj23lbel2xn0['strictCoverage'] = $Vysgiumuhj0t['strictCoverage'];
            }

            if (isset($Vysgiumuhj0t['disallowTestOutput']) &&
                !isset($Vj23lbel2xn0['disallowTestOutput'])) {
                $Vj23lbel2xn0['disallowTestOutput'] = $Vysgiumuhj0t['disallowTestOutput'];
            }

            if (isset($Vysgiumuhj0t['enforceTimeLimit']) &&
                !isset($Vj23lbel2xn0['enforceTimeLimit'])) {
                $Vj23lbel2xn0['enforceTimeLimit'] = $Vysgiumuhj0t['enforceTimeLimit'];
            }

            if (isset($Vysgiumuhj0t['disallowTodoAnnotatedTests']) &&
                !isset($Vj23lbel2xn0['disallowTodoAnnotatedTests'])) {
                $Vj23lbel2xn0['disallowTodoAnnotatedTests'] = $Vysgiumuhj0t['disallowTodoAnnotatedTests'];
            }

            if (isset($Vysgiumuhj0t['verbose']) &&
                !isset($Vj23lbel2xn0['verbose'])) {
                $Vj23lbel2xn0['verbose'] = $Vysgiumuhj0t['verbose'];
            }

            if (isset($Vysgiumuhj0t['forceCoversAnnotation']) &&
                !isset($Vj23lbel2xn0['forceCoversAnnotation'])) {
                $Vj23lbel2xn0['forceCoversAnnotation'] = $Vysgiumuhj0t['forceCoversAnnotation'];
            }

            if (isset($Vysgiumuhj0t['mapTestClassNameToCoveredClassName']) &&
                !isset($Vj23lbel2xn0['mapTestClassNameToCoveredClassName'])) {
                $Vj23lbel2xn0['mapTestClassNameToCoveredClassName'] = $Vysgiumuhj0t['mapTestClassNameToCoveredClassName'];
            }

            $Vlgmcnoqs0kx = array();

            if (!empty($Vj23lbel2xn0['groups'])) {
                $Vlgmcnoqs0kx = $Vj23lbel2xn0['groups'];
            }

            $Vmc0w2nq5pc5 = $Vj23lbel2xn0['configuration']->getGroupConfiguration();

            if (!empty($Vmc0w2nq5pc5['include']) &&
                !isset($Vj23lbel2xn0['groups'])) {
                $Vj23lbel2xn0['groups'] = $Vmc0w2nq5pc5['include'];
            }

            if (!empty($Vmc0w2nq5pc5['exclude']) &&
                !isset($Vj23lbel2xn0['excludeGroups'])) {
                $Vj23lbel2xn0['excludeGroups'] = array_diff($Vmc0w2nq5pc5['exclude'], $Vlgmcnoqs0kx);
            }

            foreach ($Vj23lbel2xn0['configuration']->getListenerConfiguration() as $V13lyfwn4lxw) {
                if (!class_exists($V13lyfwn4lxw['class'], false) &&
                    $V13lyfwn4lxw['file'] !== '') {
                    require_once $V13lyfwn4lxw['file'];
                }

                if (class_exists($V13lyfwn4lxw['class'])) {
                    if (count($V13lyfwn4lxw['arguments']) == 0) {
                        $V13lyfwn4lxw = new $V13lyfwn4lxw['class'];
                    } else {
                        $V13lyfwn4lxwClass = new ReflectionClass(
                            $V13lyfwn4lxw['class']
                        );
                        $V13lyfwn4lxw      = $V13lyfwn4lxwClass->newInstanceArgs(
                            $V13lyfwn4lxw['arguments']
                        );
                    }

                    if ($V13lyfwn4lxw instanceof PHPUnit_Framework_TestListener) {
                        $Vj23lbel2xn0['listeners'][] = $V13lyfwn4lxw;
                    }
                }
            }

            $Viwzwgtcqbw3 = $Vj23lbel2xn0['configuration']->getLoggingConfiguration();

            if (isset($Viwzwgtcqbw3['coverage-clover']) &&
                !isset($Vj23lbel2xn0['coverageClover'])) {
                $Vj23lbel2xn0['coverageClover'] = $Viwzwgtcqbw3['coverage-clover'];
            }

            if (isset($Viwzwgtcqbw3['coverage-crap4j']) &&
                !isset($Vj23lbel2xn0['coverageCrap4J'])) {
                $Vj23lbel2xn0['coverageCrap4J'] = $Viwzwgtcqbw3['coverage-crap4j'];

                if (isset($Viwzwgtcqbw3['crap4jThreshold']) &&
                    !isset($Vj23lbel2xn0['crap4jThreshold'])) {
                    $Vj23lbel2xn0['crap4jThreshold'] = $Viwzwgtcqbw3['crap4jThreshold'];
                }
            }

            if (isset($Viwzwgtcqbw3['coverage-html']) &&
                !isset($Vj23lbel2xn0['coverageHtml'])) {
                if (isset($Viwzwgtcqbw3['lowUpperBound']) &&
                    !isset($Vj23lbel2xn0['reportLowUpperBound'])) {
                    $Vj23lbel2xn0['reportLowUpperBound'] = $Viwzwgtcqbw3['lowUpperBound'];
                }

                if (isset($Viwzwgtcqbw3['highLowerBound']) &&
                    !isset($Vj23lbel2xn0['reportHighLowerBound'])) {
                    $Vj23lbel2xn0['reportHighLowerBound'] = $Viwzwgtcqbw3['highLowerBound'];
                }

                $Vj23lbel2xn0['coverageHtml'] = $Viwzwgtcqbw3['coverage-html'];
            }

            if (isset($Viwzwgtcqbw3['coverage-php']) &&
                !isset($Vj23lbel2xn0['coveragePHP'])) {
                $Vj23lbel2xn0['coveragePHP'] = $Viwzwgtcqbw3['coverage-php'];
            }

            if (isset($Viwzwgtcqbw3['coverage-text']) &&
                !isset($Vj23lbel2xn0['coverageText'])) {
                $Vj23lbel2xn0['coverageText'] = $Viwzwgtcqbw3['coverage-text'];
                if (isset($Viwzwgtcqbw3['coverageTextShowUncoveredFiles'])) {
                    $Vj23lbel2xn0['coverageTextShowUncoveredFiles'] = $Viwzwgtcqbw3['coverageTextShowUncoveredFiles'];
                } else {
                    $Vj23lbel2xn0['coverageTextShowUncoveredFiles'] = false;
                }
                if (isset($Viwzwgtcqbw3['coverageTextShowOnlySummary'])) {
                    $Vj23lbel2xn0['coverageTextShowOnlySummary'] = $Viwzwgtcqbw3['coverageTextShowOnlySummary'];
                } else {
                    $Vj23lbel2xn0['coverageTextShowOnlySummary'] = false;
                }
            }

            if (isset($Viwzwgtcqbw3['coverage-xml']) &&
                !isset($Vj23lbel2xn0['coverageXml'])) {
                $Vj23lbel2xn0['coverageXml'] = $Viwzwgtcqbw3['coverage-xml'];
            }

            if (isset($Viwzwgtcqbw3['json']) &&
                !isset($Vj23lbel2xn0['jsonLogfile'])) {
                $Vj23lbel2xn0['jsonLogfile'] = $Viwzwgtcqbw3['json'];
            }

            if (isset($Viwzwgtcqbw3['plain'])) {
                $Vj23lbel2xn0['listeners'][] = new PHPUnit_TextUI_ResultPrinter(
                    $Viwzwgtcqbw3['plain'],
                    true
                );
            }

            if (isset($Viwzwgtcqbw3['tap']) &&
                !isset($Vj23lbel2xn0['tapLogfile'])) {
                $Vj23lbel2xn0['tapLogfile'] = $Viwzwgtcqbw3['tap'];
            }

            if (isset($Viwzwgtcqbw3['junit']) &&
                !isset($Vj23lbel2xn0['junitLogfile'])) {
                $Vj23lbel2xn0['junitLogfile'] = $Viwzwgtcqbw3['junit'];

                if (isset($Viwzwgtcqbw3['logIncompleteSkipped']) &&
                    !isset($Vj23lbel2xn0['logIncompleteSkipped'])) {
                    $Vj23lbel2xn0['logIncompleteSkipped'] = $Viwzwgtcqbw3['logIncompleteSkipped'];
                }
            }

            if (isset($Viwzwgtcqbw3['testdox-html']) &&
                !isset($Vj23lbel2xn0['testdoxHTMLFile'])) {
                $Vj23lbel2xn0['testdoxHTMLFile'] = $Viwzwgtcqbw3['testdox-html'];
            }

            if (isset($Viwzwgtcqbw3['testdox-text']) &&
                !isset($Vj23lbel2xn0['testdoxTextFile'])) {
                $Vj23lbel2xn0['testdoxTextFile'] = $Viwzwgtcqbw3['testdox-text'];
            }

            if ((isset($Vj23lbel2xn0['coverageClover']) ||
                isset($Vj23lbel2xn0['coverageCrap4J']) ||
                isset($Vj23lbel2xn0['coverageHtml']) ||
                isset($Vj23lbel2xn0['coveragePHP']) ||
                isset($Vj23lbel2xn0['coverageText']) ||
                isset($Vj23lbel2xn0['coverageXml'])) &&
                $this->runtime->canCollectCodeCoverage()) {
                $Vgpt4we0cx0bConfiguration                             = $Vj23lbel2xn0['configuration']->getFilterConfiguration();
                $Vj23lbel2xn0['addUncoveredFilesFromWhitelist']     = $Vgpt4we0cx0bConfiguration['whitelist']['addUncoveredFilesFromWhitelist'];
                $Vj23lbel2xn0['processUncoveredFilesFromWhitelist'] = $Vgpt4we0cx0bConfiguration['whitelist']['processUncoveredFilesFromWhitelist'];

                if (empty($Vgpt4we0cx0bConfiguration['whitelist']['include']['directory']) &&
                    empty($Vgpt4we0cx0bConfiguration['whitelist']['include']['file'])) {
                    foreach ($Vgpt4we0cx0bConfiguration['blacklist']['include']['directory'] as $Vb3iift025ov) {
                        $this->codeCoverageFilter->addDirectoryToBlacklist(
                            $Vb3iift025ov['path'],
                            $Vb3iift025ov['suffix'],
                            $Vb3iift025ov['prefix'],
                            $Vb3iift025ov['group']
                        );
                    }

                    foreach ($Vgpt4we0cx0bConfiguration['blacklist']['include']['file'] as $Vpu3xl4uhgg5) {
                        $this->codeCoverageFilter->addFileToBlacklist($Vpu3xl4uhgg5);
                    }

                    foreach ($Vgpt4we0cx0bConfiguration['blacklist']['exclude']['directory'] as $Vb3iift025ov) {
                        $this->codeCoverageFilter->removeDirectoryFromBlacklist(
                            $Vb3iift025ov['path'],
                            $Vb3iift025ov['suffix'],
                            $Vb3iift025ov['prefix'],
                            $Vb3iift025ov['group']
                        );
                    }

                    foreach ($Vgpt4we0cx0bConfiguration['blacklist']['exclude']['file'] as $Vpu3xl4uhgg5) {
                        $this->codeCoverageFilter->removeFileFromBlacklist($Vpu3xl4uhgg5);
                    }
                }

                foreach ($Vgpt4we0cx0bConfiguration['whitelist']['include']['directory'] as $Vb3iift025ov) {
                    $this->codeCoverageFilter->addDirectoryToWhitelist(
                        $Vb3iift025ov['path'],
                        $Vb3iift025ov['suffix'],
                        $Vb3iift025ov['prefix']
                    );
                }

                foreach ($Vgpt4we0cx0bConfiguration['whitelist']['include']['file'] as $Vpu3xl4uhgg5) {
                    $this->codeCoverageFilter->addFileToWhitelist($Vpu3xl4uhgg5);
                }

                foreach ($Vgpt4we0cx0bConfiguration['whitelist']['exclude']['directory'] as $Vb3iift025ov) {
                    $this->codeCoverageFilter->removeDirectoryFromWhitelist(
                        $Vb3iift025ov['path'],
                        $Vb3iift025ov['suffix'],
                        $Vb3iift025ov['prefix']
                    );
                }

                foreach ($Vgpt4we0cx0bConfiguration['whitelist']['exclude']['file'] as $Vpu3xl4uhgg5) {
                    $this->codeCoverageFilter->removeFileFromWhitelist($Vpu3xl4uhgg5);
                }
            }
        }

        $Vj23lbel2xn0['addUncoveredFilesFromWhitelist']     = isset($Vj23lbel2xn0['addUncoveredFilesFromWhitelist'])     ? $Vj23lbel2xn0['addUncoveredFilesFromWhitelist']     : true;
        $Vj23lbel2xn0['processUncoveredFilesFromWhitelist'] = isset($Vj23lbel2xn0['processUncoveredFilesFromWhitelist']) ? $Vj23lbel2xn0['processUncoveredFilesFromWhitelist'] : false;
        $Vj23lbel2xn0['backupGlobals']                      = isset($Vj23lbel2xn0['backupGlobals'])                      ? $Vj23lbel2xn0['backupGlobals']                      : null;
        $Vj23lbel2xn0['backupStaticAttributes']             = isset($Vj23lbel2xn0['backupStaticAttributes'])             ? $Vj23lbel2xn0['backupStaticAttributes']             : null;
        $Vj23lbel2xn0['disallowChangesToGlobalState']       = isset($Vj23lbel2xn0['disallowChangesToGlobalState'])       ? $Vj23lbel2xn0['disallowChangesToGlobalState']       : null;
        $Vj23lbel2xn0['cacheTokens']                        = isset($Vj23lbel2xn0['cacheTokens'])                        ? $Vj23lbel2xn0['cacheTokens']                        : false;
        $Vj23lbel2xn0['columns']                            = isset($Vj23lbel2xn0['columns'])                            ? $Vj23lbel2xn0['columns']                            : 80;
        $Vj23lbel2xn0['colors']                             = isset($Vj23lbel2xn0['colors'])                             ? $Vj23lbel2xn0['colors']                             : PHPUnit_TextUI_ResultPrinter::COLOR_DEFAULT;
        $Vj23lbel2xn0['convertErrorsToExceptions']          = isset($Vj23lbel2xn0['convertErrorsToExceptions'])          ? $Vj23lbel2xn0['convertErrorsToExceptions']          : true;
        $Vj23lbel2xn0['convertNoticesToExceptions']         = isset($Vj23lbel2xn0['convertNoticesToExceptions'])         ? $Vj23lbel2xn0['convertNoticesToExceptions']         : true;
        $Vj23lbel2xn0['convertWarningsToExceptions']        = isset($Vj23lbel2xn0['convertWarningsToExceptions'])        ? $Vj23lbel2xn0['convertWarningsToExceptions']        : true;
        $Vj23lbel2xn0['excludeGroups']                      = isset($Vj23lbel2xn0['excludeGroups'])                      ? $Vj23lbel2xn0['excludeGroups']                      : array();
        $Vj23lbel2xn0['groups']                             = isset($Vj23lbel2xn0['groups'])                             ? $Vj23lbel2xn0['groups']                             : array();
        $Vj23lbel2xn0['logIncompleteSkipped']               = isset($Vj23lbel2xn0['logIncompleteSkipped'])               ? $Vj23lbel2xn0['logIncompleteSkipped']               : false;
        $Vj23lbel2xn0['processIsolation']                   = isset($Vj23lbel2xn0['processIsolation'])                   ? $Vj23lbel2xn0['processIsolation']                   : false;
        $Vj23lbel2xn0['repeat']                             = isset($Vj23lbel2xn0['repeat'])                             ? $Vj23lbel2xn0['repeat']                             : false;
        $Vj23lbel2xn0['reportHighLowerBound']               = isset($Vj23lbel2xn0['reportHighLowerBound'])               ? $Vj23lbel2xn0['reportHighLowerBound']               : 90;
        $Vj23lbel2xn0['reportLowUpperBound']                = isset($Vj23lbel2xn0['reportLowUpperBound'])                ? $Vj23lbel2xn0['reportLowUpperBound']                : 50;
        $Vj23lbel2xn0['crap4jThreshold']                    = isset($Vj23lbel2xn0['crap4jThreshold'])                    ? $Vj23lbel2xn0['crap4jThreshold']                    : 30;
        $Vj23lbel2xn0['stopOnError']                        = isset($Vj23lbel2xn0['stopOnError'])                        ? $Vj23lbel2xn0['stopOnError']                        : false;
        $Vj23lbel2xn0['stopOnFailure']                      = isset($Vj23lbel2xn0['stopOnFailure'])                      ? $Vj23lbel2xn0['stopOnFailure']                      : false;
        $Vj23lbel2xn0['stopOnIncomplete']                   = isset($Vj23lbel2xn0['stopOnIncomplete'])                   ? $Vj23lbel2xn0['stopOnIncomplete']                   : false;
        $Vj23lbel2xn0['stopOnRisky']                        = isset($Vj23lbel2xn0['stopOnRisky'])                        ? $Vj23lbel2xn0['stopOnRisky']                        : false;
        $Vj23lbel2xn0['stopOnSkipped']                      = isset($Vj23lbel2xn0['stopOnSkipped'])                      ? $Vj23lbel2xn0['stopOnSkipped']                      : false;
        $Vj23lbel2xn0['timeoutForSmallTests']               = isset($Vj23lbel2xn0['timeoutForSmallTests'])               ? $Vj23lbel2xn0['timeoutForSmallTests']               : 1;
        $Vj23lbel2xn0['timeoutForMediumTests']              = isset($Vj23lbel2xn0['timeoutForMediumTests'])              ? $Vj23lbel2xn0['timeoutForMediumTests']              : 10;
        $Vj23lbel2xn0['timeoutForLargeTests']               = isset($Vj23lbel2xn0['timeoutForLargeTests'])               ? $Vj23lbel2xn0['timeoutForLargeTests']               : 60;
        $Vj23lbel2xn0['reportUselessTests']                 = isset($Vj23lbel2xn0['reportUselessTests'])                 ? $Vj23lbel2xn0['reportUselessTests']                 : false;
        $Vj23lbel2xn0['strictCoverage']                     = isset($Vj23lbel2xn0['strictCoverage'])                     ? $Vj23lbel2xn0['strictCoverage']                     : false;
        $Vj23lbel2xn0['disallowTestOutput']                 = isset($Vj23lbel2xn0['disallowTestOutput'])                 ? $Vj23lbel2xn0['disallowTestOutput']                 : false;
        $Vj23lbel2xn0['enforceTimeLimit']                   = isset($Vj23lbel2xn0['enforceTimeLimit'])                   ? $Vj23lbel2xn0['enforceTimeLimit']                   : false;
        $Vj23lbel2xn0['disallowTodoAnnotatedTests']         = isset($Vj23lbel2xn0['disallowTodoAnnotatedTests'])         ? $Vj23lbel2xn0['disallowTodoAnnotatedTests']         : false;
        $Vj23lbel2xn0['verbose']                            = isset($Vj23lbel2xn0['verbose'])                            ? $Vj23lbel2xn0['verbose']                            : false;
    }

    
    private function showExtensionNotLoadedWarning($Vpt32vvhspnvxtension, $Vbl4yrmdan1y = '')
    {
        if (isset($this->missingExtensions[$Vpt32vvhspnvxtension])) {
            return;
        }

        $this->write("Warning:\t" . 'The ' . $Vpt32vvhspnvxtension . ' extension is not loaded' . "\n");

        if (!empty($Vbl4yrmdan1y)) {
            $this->write("\t\t" . $Vbl4yrmdan1y . "\n");
        }

        $this->missingExtensions[$Vpt32vvhspnvxtension] = true;
    }

    
    private function getCodeCoverageFilter()
    {
        $Vgpt4we0cx0b = new PHP_CodeCoverage_Filter;

        if (defined('__PHPUNIT_PHAR__')) {
            $Vgpt4we0cx0b->addFileToBlacklist(__PHPUNIT_PHAR__);
        }

        $Vn54eydon0cr = new PHPUnit_Util_Blacklist;

        foreach ($Vn54eydon0cr->getBlacklistedDirectories() as $Vb3iift025ovectory) {
            $Vgpt4we0cx0b->addDirectoryToBlacklist($Vb3iift025ovectory);
        }

        return $Vgpt4we0cx0b;
    }
}
