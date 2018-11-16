<?php



class PHPUnit_TextUI_Command
{
    
    protected $Vj23lbel2xn0 = array(
        'listGroups'              => false,
        'loader'                  => null,
        'useDefaultConfiguration' => true
    );

    
    protected $V4a4guv4okog = array();

    
    protected $V3buqu4ru0oe = array(
        'colors=='             => null,
        'bootstrap='           => null,
        'columns='             => null,
        'configuration='       => null,
        'coverage-clover='     => null,
        'coverage-crap4j='     => null,
        'coverage-html='       => null,
        'coverage-php='        => null,
        'coverage-text=='      => null,
        'coverage-xml='        => null,
        'debug'                => null,
        'exclude-group='       => null,
        'filter='              => null,
        'testsuite='           => null,
        'group='               => null,
        'help'                 => null,
        'include-path='        => null,
        'list-groups'          => null,
        'loader='              => null,
        'log-json='            => null,
        'log-junit='           => null,
        'log-tap='             => null,
        'process-isolation'    => null,
        'repeat='              => null,
        'stderr'               => null,
        'stop-on-error'        => null,
        'stop-on-failure'      => null,
        'stop-on-incomplete'   => null,
        'stop-on-risky'        => null,
        'stop-on-skipped'      => null,
        'report-useless-tests' => null,
        'strict-coverage'      => null,
        'disallow-test-output' => null,
        'enforce-time-limit'   => null,
        'disallow-todo-tests'  => null,
        'strict-global-state'  => null,
        'strict'               => null,
        'tap'                  => null,
        'testdox'              => null,
        'testdox-html='        => null,
        'testdox-text='        => null,
        'test-suffix='         => null,
        'no-configuration'     => null,
        'no-coverage'          => null,
        'no-globals-backup'    => null,
        'printer='             => null,
        'static-backup'        => null,
        'verbose'              => null,
        'version'              => null
    );

    
    private $Vtmgbysw5i5q = false;

    
    public static function main($V0yhjqqwjxma = true)
    {
        $Vtpf5mpptbuy = new static;

        return $Vtpf5mpptbuy->run($_SERVER['argv'], $V0yhjqqwjxma);
    }

    
    public function run(array $argv, $V0yhjqqwjxma = true)
    {
        $this->handleArguments($argv);

        $Vp304br0tuhk = $this->createRunner();

        if (is_object($this->arguments['test']) &&
            $this->arguments['test'] instanceof PHPUnit_Framework_Test) {
            $Vrrxtoyyy15e = $this->arguments['test'];
        } else {
            $Vrrxtoyyy15e = $Vp304br0tuhk->getTest(
                $this->arguments['test'],
                $this->arguments['testFile'],
                $this->arguments['testSuffixes']
            );
        }

        if ($this->arguments['listGroups']) {
            $this->printVersionString();

            print "Available test group(s):\n";

            $V00tm5epe1pm = $Vrrxtoyyy15e->getGroups();
            sort($V00tm5epe1pm);

            foreach ($V00tm5epe1pm as $Vsq5adfvkj3r) {
                print " - $Vsq5adfvkj3r\n";
            }

            if ($V0yhjqqwjxma) {
                exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
            } else {
                return PHPUnit_TextUI_TestRunner::SUCCESS_EXIT;
            }
        }

        unset($this->arguments['test']);
        unset($this->arguments['testFile']);

        try {
            $Vv0hyvhlkjqr = $Vp304br0tuhk->doRun($Vrrxtoyyy15e, $this->arguments);
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            print $Vpt32vvhspnv->getMessage() . "\n";
        }

        $Vlgck4bmjqgq = PHPUnit_TextUI_TestRunner::FAILURE_EXIT;

        if (isset($Vv0hyvhlkjqr) && $Vv0hyvhlkjqr->wasSuccessful()) {
            $Vlgck4bmjqgq = PHPUnit_TextUI_TestRunner::SUCCESS_EXIT;
        } elseif (!isset($Vv0hyvhlkjqr) || $Vv0hyvhlkjqr->errorCount() > 0) {
            $Vlgck4bmjqgq = PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT;
        }

        if ($V0yhjqqwjxma) {
            exit($Vlgck4bmjqgq);
        } else {
            return $Vlgck4bmjqgq;
        }
    }

    
    protected function createRunner()
    {
        return new PHPUnit_TextUI_TestRunner($this->arguments['loader']);
    }

    
    protected function handleArguments(array $argv)
    {
        if (defined('__PHPUNIT_PHAR__')) {
            $this->longOptions['check-version'] = null;
            $this->longOptions['selfupdate']    = null;
            $this->longOptions['self-update']   = null;
            $this->longOptions['selfupgrade']   = null;
            $this->longOptions['self-upgrade']  = null;
        }

        try {
            $this->options = PHPUnit_Util_Getopt::getopt(
                $argv,
                'd:c:hv',
                array_keys($this->longOptions)
            );
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->showError($Vpt32vvhspnv->getMessage());
        }

        foreach ($this->options[0] as $Vm5brxnj0cwq) {
            switch ($Vm5brxnj0cwq[0]) {
                case '--colors':
                    $this->arguments['colors'] = $Vm5brxnj0cwq[1] ?: PHPUnit_TextUI_ResultPrinter::COLOR_AUTO;
                    break;

                case '--bootstrap':
                    $this->arguments['bootstrap'] = $Vm5brxnj0cwq[1];
                    break;

                case '--columns':
                    if (is_numeric($Vm5brxnj0cwq[1])) {
                        $this->arguments['columns'] = (int) $Vm5brxnj0cwq[1];
                    } elseif ($Vm5brxnj0cwq[1] == 'max') {
                        $this->arguments['columns'] = 'max';
                    }
                    break;

                case 'c':
                case '--configuration':
                    $this->arguments['configuration'] = $Vm5brxnj0cwq[1];
                    break;

                case '--coverage-clover':
                    $this->arguments['coverageClover'] = $Vm5brxnj0cwq[1];
                    break;

                case '--coverage-crap4j':
                    $this->arguments['coverageCrap4J'] = $Vm5brxnj0cwq[1];
                    break;

                case '--coverage-html':
                    $this->arguments['coverageHtml'] = $Vm5brxnj0cwq[1];
                    break;

                case '--coverage-php':
                    $this->arguments['coveragePHP'] = $Vm5brxnj0cwq[1];
                    break;

                case '--coverage-text':
                    if ($Vm5brxnj0cwq[1] === null) {
                        $Vm5brxnj0cwq[1] = 'php://stdout';
                    }

                    $this->arguments['coverageText']                   = $Vm5brxnj0cwq[1];
                    $this->arguments['coverageTextShowUncoveredFiles'] = false;
                    $this->arguments['coverageTextShowOnlySummary']    = false;
                    break;

                case '--coverage-xml':
                    $this->arguments['coverageXml'] = $Vm5brxnj0cwq[1];
                    break;

                case 'd':
                    $Vny2uq2slirh = explode('=', $Vm5brxnj0cwq[1]);

                    if (isset($Vny2uq2slirh[0])) {
                        if (isset($Vny2uq2slirh[1])) {
                            ini_set($Vny2uq2slirh[0], $Vny2uq2slirh[1]);
                        } else {
                            ini_set($Vny2uq2slirh[0], true);
                        }
                    }
                    break;

                case '--debug':
                    $this->arguments['debug'] = true;
                    break;

                case 'h':
                case '--help':
                    $this->showHelp();
                    exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
                    break;

                case '--filter':
                    $this->arguments['filter'] = $Vm5brxnj0cwq[1];
                    break;

                case '--testsuite':
                    $this->arguments['testsuite'] = $Vm5brxnj0cwq[1];
                    break;

                case '--group':
                    $this->arguments['groups'] = explode(',', $Vm5brxnj0cwq[1]);
                    break;

                case '--exclude-group':
                    $this->arguments['excludeGroups'] = explode(
                        ',',
                        $Vm5brxnj0cwq[1]
                    );
                    break;

                case '--test-suffix':
                    $this->arguments['testSuffixes'] = explode(
                        ',',
                        $Vm5brxnj0cwq[1]
                    );
                    break;

                case '--include-path':
                    $Vdvo2o2gi4j1 = $Vm5brxnj0cwq[1];
                    break;

                case '--list-groups':
                    $this->arguments['listGroups'] = true;
                    break;

                case '--printer':
                    $this->arguments['printer'] = $Vm5brxnj0cwq[1];
                    break;

                case '--loader':
                    $this->arguments['loader'] = $Vm5brxnj0cwq[1];
                    break;

                case '--log-json':
                    $this->arguments['jsonLogfile'] = $Vm5brxnj0cwq[1];
                    break;

                case '--log-junit':
                    $this->arguments['junitLogfile'] = $Vm5brxnj0cwq[1];
                    break;

                case '--log-tap':
                    $this->arguments['tapLogfile'] = $Vm5brxnj0cwq[1];
                    break;

                case '--process-isolation':
                    $this->arguments['processIsolation'] = true;
                    break;

                case '--repeat':
                    $this->arguments['repeat'] = (int) $Vm5brxnj0cwq[1];
                    break;

                case '--stderr':
                    $this->arguments['stderr'] = true;
                    break;

                case '--stop-on-error':
                    $this->arguments['stopOnError'] = true;
                    break;

                case '--stop-on-failure':
                    $this->arguments['stopOnFailure'] = true;
                    break;

                case '--stop-on-incomplete':
                    $this->arguments['stopOnIncomplete'] = true;
                    break;

                case '--stop-on-risky':
                    $this->arguments['stopOnRisky'] = true;
                    break;

                case '--stop-on-skipped':
                    $this->arguments['stopOnSkipped'] = true;
                    break;

                case '--tap':
                    $this->arguments['printer'] = 'PHPUnit_Util_Log_TAP';
                    break;

                case '--testdox':
                    $this->arguments['printer'] = 'PHPUnit_Util_TestDox_ResultPrinter_Text';
                    break;

                case '--testdox-html':
                    $this->arguments['testdoxHTMLFile'] = $Vm5brxnj0cwq[1];
                    break;

                case '--testdox-text':
                    $this->arguments['testdoxTextFile'] = $Vm5brxnj0cwq[1];
                    break;

                case '--no-configuration':
                    $this->arguments['useDefaultConfiguration'] = false;
                    break;

                case '--no-coverage':
                    $this->arguments['noCoverage'] = true;
                    break;

                case '--no-globals-backup':
                    $this->arguments['backupGlobals'] = false;
                    break;

                case '--static-backup':
                    $this->arguments['backupStaticAttributes'] = true;
                    break;

                case 'v':
                case '--verbose':
                    $this->arguments['verbose'] = true;
                    break;

                case '--version':
                    $this->printVersionString();
                    exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
                    break;

                case '--report-useless-tests':
                    $this->arguments['reportUselessTests'] = true;
                    break;

                case '--strict-coverage':
                    $this->arguments['strictCoverage'] = true;
                    break;

                case '--strict-global-state':
                    $this->arguments['disallowChangesToGlobalState'] = true;
                    break;

                case '--disallow-test-output':
                    $this->arguments['disallowTestOutput'] = true;
                    break;

                case '--enforce-time-limit':
                    $this->arguments['enforceTimeLimit'] = true;
                    break;

                case '--disallow-todo-tests':
                    $this->arguments['disallowTodoAnnotatedTests'] = true;
                    break;

                case '--strict':
                    $this->arguments['reportUselessTests']         = true;
                    $this->arguments['strictCoverage']             = true;
                    $this->arguments['disallowTestOutput']         = true;
                    $this->arguments['enforceTimeLimit']           = true;
                    $this->arguments['disallowTodoAnnotatedTests'] = true;
                    $this->arguments['deprecatedStrictModeOption'] = true;
                    break;

                case '--check-version':
                    $this->handleVersionCheck();
                    break;

                case '--selfupdate':
                case '--self-update':
                    $this->handleSelfUpdate();
                    break;

                case '--selfupgrade':
                case '--self-upgrade':
                    $this->handleSelfUpdate(true);
                    break;

                case '--whitelist':
                    $this->arguments['whitelist'] = $Vm5brxnj0cwq[1];
                    break;

                default:
                    $Vm5brxnj0cwqName = str_replace('--', '', $Vm5brxnj0cwq[0]);

                    if (isset($this->longOptions[$Vm5brxnj0cwqName])) {
                        $Voc34ggbfvw5 = $this->longOptions[$Vm5brxnj0cwqName];
                    } elseif (isset($this->longOptions[$Vm5brxnj0cwqName . '='])) {
                        $Voc34ggbfvw5 = $this->longOptions[$Vm5brxnj0cwqName . '='];
                    }

                    if (isset($Voc34ggbfvw5) && is_callable(array($this, $Voc34ggbfvw5))) {
                        $this->$Voc34ggbfvw5($Vm5brxnj0cwq[1]);
                    }
            }
        }

        $this->handleCustomTestSuite();

        if (!isset($this->arguments['test'])) {
            if (isset($this->options[1][0])) {
                $this->arguments['test'] = $this->options[1][0];
            }

            if (isset($this->options[1][1])) {
                $this->arguments['testFile'] = realpath($this->options[1][1]);
            } else {
                $this->arguments['testFile'] = '';
            }

            if (isset($this->arguments['test']) &&
                is_file($this->arguments['test']) &&
                substr($this->arguments['test'], -5, 5) != '.phpt') {
                $this->arguments['testFile'] = realpath($this->arguments['test']);
                $this->arguments['test']     = substr($this->arguments['test'], 0, strrpos($this->arguments['test'], '.'));
            }
        }

        if (!isset($this->arguments['testSuffixes'])) {
            $this->arguments['testSuffixes'] = array('Test.php', '.phpt');
        }

        if (isset($Vdvo2o2gi4j1)) {
            ini_set(
                'include_path',
                $Vdvo2o2gi4j1 . PATH_SEPARATOR . ini_get('include_path')
            );
        }

        if ($this->arguments['loader'] !== null) {
            $this->arguments['loader'] = $this->handleLoader($this->arguments['loader']);
        }

        if (isset($this->arguments['configuration']) &&
            is_dir($this->arguments['configuration'])) {
            $Vrgrykv155ex = $this->arguments['configuration'] . '/phpunit.xml';

            if (file_exists($Vrgrykv155ex)) {
                $this->arguments['configuration'] = realpath(
                    $Vrgrykv155ex
                );
            } elseif (file_exists($Vrgrykv155ex . '.dist')) {
                $this->arguments['configuration'] = realpath(
                    $Vrgrykv155ex . '.dist'
                );
            }
        } elseif (!isset($this->arguments['configuration']) &&
                  $this->arguments['useDefaultConfiguration']) {
            if (file_exists('phpunit.xml')) {
                $this->arguments['configuration'] = realpath('phpunit.xml');
            } elseif (file_exists('phpunit.xml.dist')) {
                $this->arguments['configuration'] = realpath(
                    'phpunit.xml.dist'
                );
            }
        }

        if (isset($this->arguments['configuration'])) {
            try {
                $Vagofhq2gyvt = PHPUnit_Util_Configuration::getInstance(
                    $this->arguments['configuration']
                );
            } catch (Throwable $Vpt32vvhspnv) {
                print $Vpt32vvhspnv->getMessage() . "\n";
                exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
            } catch (Exception $Vpt32vvhspnv) {
                print $Vpt32vvhspnv->getMessage() . "\n";
                exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
            }

            $V2nklx5dwf5a = $Vagofhq2gyvt->getPHPUnitConfiguration();

            $Vagofhq2gyvt->handlePHPConfiguration();

            
            if (isset($this->arguments['bootstrap'])) {
                $this->handleBootstrap($this->arguments['bootstrap']);
            } elseif (isset($V2nklx5dwf5a['bootstrap'])) {
                $this->handleBootstrap($V2nklx5dwf5a['bootstrap']);
            }

            
            if (isset($V2nklx5dwf5a['stderr']) && ! isset($this->arguments['stderr'])) {
                $this->arguments['stderr'] = $V2nklx5dwf5a['stderr'];
            }

            if (isset($V2nklx5dwf5a['columns']) && ! isset($this->arguments['columns'])) {
                $this->arguments['columns'] = $V2nklx5dwf5a['columns'];
            }

            if (isset($V2nklx5dwf5a['printerClass'])) {
                if (isset($V2nklx5dwf5a['printerFile'])) {
                    $Vpu3xl4uhgg5 = $V2nklx5dwf5a['printerFile'];
                } else {
                    $Vpu3xl4uhgg5 = '';
                }

                $this->arguments['printer'] = $this->handlePrinter(
                    $V2nklx5dwf5a['printerClass'],
                    $Vpu3xl4uhgg5
                );
            }

            if (isset($V2nklx5dwf5a['testSuiteLoaderClass'])) {
                if (isset($V2nklx5dwf5a['testSuiteLoaderFile'])) {
                    $Vpu3xl4uhgg5 = $V2nklx5dwf5a['testSuiteLoaderFile'];
                } else {
                    $Vpu3xl4uhgg5 = '';
                }

                $this->arguments['loader'] = $this->handleLoader(
                    $V2nklx5dwf5a['testSuiteLoaderClass'],
                    $Vpu3xl4uhgg5
                );
            }

            $Vyswk0o25esm = $Vagofhq2gyvt->getSeleniumBrowserConfiguration();

            if (!empty($Vyswk0o25esm)) {
                $this->arguments['deprecatedSeleniumConfiguration'] = true;

                if (class_exists('PHPUnit_Extensions_SeleniumTestCase')) {
                    PHPUnit_Extensions_SeleniumTestCase::$Vyswk0o25esm = $Vyswk0o25esm;
                }
            }

            if (!isset($this->arguments['test'])) {
                $Vu2klvvt2yb4 = $Vagofhq2gyvt->getTestSuiteConfiguration(isset($this->arguments['testsuite']) ? $this->arguments['testsuite'] : null);

                if ($Vu2klvvt2yb4 !== null) {
                    $this->arguments['test'] = $Vu2klvvt2yb4;
                }
            }
        } elseif (isset($this->arguments['bootstrap'])) {
            $this->handleBootstrap($this->arguments['bootstrap']);
        }

        if (isset($this->arguments['printer']) &&
            is_string($this->arguments['printer'])) {
            $this->arguments['printer'] = $this->handlePrinter($this->arguments['printer']);
        }

        if (isset($this->arguments['test']) && is_string($this->arguments['test']) && substr($this->arguments['test'], -5, 5) == '.phpt') {
            $Vpswbntjg3pr = new PHPUnit_Extensions_PhptTestCase($this->arguments['test']);

            $this->arguments['test'] = new PHPUnit_Framework_TestSuite;
            $this->arguments['test']->addTest($Vpswbntjg3pr);
        }

        if (!isset($this->arguments['test']) ||
            (isset($this->arguments['testDatabaseLogRevision']) && !isset($this->arguments['testDatabaseDSN']))) {
            $this->showHelp();
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
        }
    }

    
    protected function handleLoader($Vvvz4tefrpjl, $Vdyn2i44zqfy = '')
    {
        if (!class_exists($Vvvz4tefrpjl, false)) {
            if ($Vdyn2i44zqfy == '') {
                $Vdyn2i44zqfy = PHPUnit_Util_Filesystem::classNameToFilename(
                    $Vvvz4tefrpjl
                );
            }

            $Vdyn2i44zqfy = stream_resolve_include_path($Vdyn2i44zqfy);

            if ($Vdyn2i44zqfy) {
                require $Vdyn2i44zqfy;
            }
        }

        if (class_exists($Vvvz4tefrpjl, false)) {
            $Vqmu1sajhgfn = new ReflectionClass($Vvvz4tefrpjl);

            if ($Vqmu1sajhgfn->implementsInterface('PHPUnit_Runner_TestSuiteLoader') &&
                $Vqmu1sajhgfn->isInstantiable()) {
                return $Vqmu1sajhgfn->newInstance();
            }
        }

        if ($Vvvz4tefrpjl == 'PHPUnit_Runner_StandardTestSuiteLoader') {
            return;
        }

        $this->showError(
            sprintf(
                'Could not use "%s" as loader.',
                $Vvvz4tefrpjl
            )
        );
    }

    
    protected function handlePrinter($Vdnvyfhs514z, $Vzrr4ok0trw5 = '')
    {
        if (!class_exists($Vdnvyfhs514z, false)) {
            if ($Vzrr4ok0trw5 == '') {
                $Vzrr4ok0trw5 = PHPUnit_Util_Filesystem::classNameToFilename(
                    $Vdnvyfhs514z
                );
            }

            $Vzrr4ok0trw5 = stream_resolve_include_path($Vzrr4ok0trw5);

            if ($Vzrr4ok0trw5) {
                require $Vzrr4ok0trw5;
            }
        }

        if (class_exists($Vdnvyfhs514z)) {
            $Vqmu1sajhgfn = new ReflectionClass($Vdnvyfhs514z);

            if ($Vqmu1sajhgfn->implementsInterface('PHPUnit_Framework_TestListener') &&
                $Vqmu1sajhgfn->isSubclassOf('PHPUnit_Util_Printer') &&
                $Vqmu1sajhgfn->isInstantiable()) {
                if ($Vqmu1sajhgfn->isSubclassOf('PHPUnit_TextUI_ResultPrinter')) {
                    return $Vdnvyfhs514z;
                }

                $Vnfcvdbxcgl2 = isset($this->arguments['stderr']) ? 'php://stderr' : null;

                return $Vqmu1sajhgfn->newInstance($Vnfcvdbxcgl2);
            }
        }

        $this->showError(
            sprintf(
                'Could not use "%s" as printer.',
                $Vdnvyfhs514z
            )
        );
    }

    
    protected function handleBootstrap($Vpu3xl4uhgg5name)
    {
        try {
            PHPUnit_Util_Fileloader::checkAndLoad($Vpu3xl4uhgg5name);
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->showError($Vpt32vvhspnv->getMessage());
        }
    }

    
    protected function handleSelfUpdate($V4fehcgffhw4 = false)
    {
        $this->printVersionString();

        $Vhvdz152zff0 = realpath($_SERVER['argv'][0]);

        if (!is_writable($Vhvdz152zff0)) {
            print 'No write permission to update ' . $Vhvdz152zff0 . "\n";
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
        }

        if (!extension_loaded('openssl')) {
            print "The OpenSSL extension is not loaded.\n";
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
        }

        if (!$V4fehcgffhw4) {
            $V1uq3oy0jrel = sprintf(
                'https://phar.phpunit.de/phpunit-%s.phar',
                file_get_contents(
                    sprintf(
                        'https://phar.phpunit.de/latest-version-of/phpunit-%s',
                        PHPUnit_Runner_Version::series()
                    )
                )
            );
        } else {
            $V1uq3oy0jrel = sprintf(
                'https://phar.phpunit.de/phpunit%s.phar',
                PHPUnit_Runner_Version::getReleaseChannel()
            );
        }

        $V0lh3chwevde = tempnam(sys_get_temp_dir(), 'phpunit') . '.phar';

        
        $Vctpjiu20tj3 = dirname($V0lh3chwevde) . '/ca.pem';
        copy(__PHPUNIT_PHAR_ROOT__ . '/ca.pem', $Vctpjiu20tj3);

        print 'Updating the PHPUnit PHAR ... ';

        $V4a4guv4okog = array(
            'ssl' => array(
                'allow_self_signed' => false,
                'cafile'            => $Vctpjiu20tj3,
                'verify_peer'       => true
            )
        );

        if (PHP_VERSION_ID < 50600) {
            $V4a4guv4okog['ssl']['CN_match']        = 'phar.phpunit.de';
            $V4a4guv4okog['ssl']['SNI_server_name'] = 'phar.phpunit.de';
        }

        file_put_contents(
            $V0lh3chwevde,
            file_get_contents(
                $V1uq3oy0jrel,
                false,
                stream_context_create($V4a4guv4okog)
            )
        );

        chmod($V0lh3chwevde, 0777 & ~umask());

        try {
            $Vjgulhhikaiq = new Phar($V0lh3chwevde);
            unset($Vjgulhhikaiq);
            rename($V0lh3chwevde, $Vhvdz152zff0);
            unlink($Vctpjiu20tj3);
        } catch (Throwable $Vovnlkckyvio) {
            $Vpt32vvhspnv = $Vovnlkckyvio;
        } catch (Exception $Vovnlkckyvio) {
            $Vpt32vvhspnv = $Vovnlkckyvio;
        }

        if (isset($Vpt32vvhspnv)) {
            unlink($Vctpjiu20tj3);
            unlink($V0lh3chwevde);
            print " done\n\n" . $Vpt32vvhspnv->getMessage() . "\n";
            exit(2);
        }

        print " done\n";
        exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
    }

    
    protected function handleVersionCheck()
    {
        $this->printVersionString();

        $Vwbbtndhgv2j = file_get_contents('https://phar.phpunit.de/latest-version-of/phpunit');
        $Vi2hkirvqrdn    = version_compare($Vwbbtndhgv2j, PHPUnit_Runner_Version::id(), '>');

        if ($Vi2hkirvqrdn) {
            print "You are not using the latest version of PHPUnit.\n";
            print 'Use "phpunit --self-upgrade" to install PHPUnit ' . $Vwbbtndhgv2j . "\n";
        } else {
            print "You are using the latest version of PHPUnit.\n";
        }

        exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
    }

    
    protected function showHelp()
    {
        $this->printVersionString();

        print <<<EOT
Usage: phpunit [options] UnitTest [UnitTest.php]
       phpunit [options] <directory>

Code Coverage Options:

  --coverage-clover <file>  Generate code coverage report in Clover XML format.
  --coverage-crap4j <file>  Generate code coverage report in Crap4J XML format.
  --coverage-html <dir>     Generate code coverage report in HTML format.
  --coverage-php <file>     Export PHP_CodeCoverage object to file.
  --coverage-text=<file>    Generate code coverage report in text format.
                            Default: Standard output.
  --coverage-xml <dir>      Generate code coverage report in PHPUnit XML format.

Logging Options:

  --log-junit <file>        Log test execution in JUnit XML format to file.
  --log-tap <file>          Log test execution in TAP format to file.
  --log-json <file>         Log test execution in JSON format.
  --testdox-html <file>     Write agile documentation in HTML format to file.
  --testdox-text <file>     Write agile documentation in Text format to file.

Test Selection Options:

  --filter <pattern>        Filter which tests to run.
  --testsuite <name>        Filter which testsuite to run.
  --group ...               Only runs tests from the specified group(s).
  --exclude-group ...       Exclude tests from the specified group(s).
  --list-groups             List available test groups.
  --test-suffix ...         Only search for test in files with specified
                            suffix(es). Default: Test.php,.phpt

Test Execution Options:

  --report-useless-tests    Be strict about tests that do not test anything.
  --strict-coverage         Be strict about unintentionally covered code.
  --strict-global-state     Be strict about changes to global state
  --disallow-test-output    Be strict about output during tests.
  --enforce-time-limit      Enforce time limit based on test size.
  --disallow-todo-tests     Disallow @todo-annotated tests.

  --process-isolation       Run each test in a separate PHP process.
  --no-globals-backup       Do not backup and restore \$GLOBALS for each test.
  --static-backup           Backup and restore static attributes for each test.

  --colors=<flag>           Use colors in output ("never", "auto" or "always").
  --columns <n>             Number of columns to use for progress output.
  --columns max             Use maximum number of columns for progress output.
  --stderr                  Write to STDERR instead of STDOUT.
  --stop-on-error           Stop execution upon first error.
  --stop-on-failure         Stop execution upon first error or failure.
  --stop-on-risky           Stop execution upon first risky test.
  --stop-on-skipped         Stop execution upon first skipped test.
  --stop-on-incomplete      Stop execution upon first incomplete test.
  -v|--verbose              Output more verbose information.
  --debug                   Display debugging information during test execution.

  --loader <loader>         TestSuiteLoader implementation to use.
  --repeat <times>          Runs the test(s) repeatedly.
  --tap                     Report test execution progress in TAP format.
  --testdox                 Report test execution progress in TestDox format.
  --printer <printer>       TestListener implementation to use.

Configuration Options:

  --bootstrap <file>        A "bootstrap" PHP file that is run before the tests.
  -c|--configuration <file> Read configuration from XML file.
  --no-configuration        Ignore default configuration file (phpunit.xml).
  --no-coverage             Ignore code coverage configuration.
  --include-path <path(s)>  Prepend PHP's include_path with given path(s).
  -d key[=value]            Sets a php.ini value.

Miscellaneous Options:

  -h|--help                 Prints this usage information.
  --version                 Prints the version and exits.

EOT;

        if (defined('__PHPUNIT_PHAR__')) {
            print "\n  --check-version           Check whether PHPUnit is the latest version.";
            print "\n  --self-update             Update PHPUnit to the latest version within the same\n                            release series.\n";
            print "\n  --self-upgrade            Upgrade PHPUnit to the latest version.\n";
        }
    }

    
    protected function handleCustomTestSuite()
    {
    }

    private function printVersionString()
    {
        if ($this->versionStringPrinted) {
            return;
        }

        print PHPUnit_Runner_Version::getVersionString() . "\n\n";

        $this->versionStringPrinted = true;
    }

    
    private function showError($Vbl4yrmdan1y)
    {
        $this->printVersionString();

        print $Vbl4yrmdan1y . "\n";

        exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
    }
}
