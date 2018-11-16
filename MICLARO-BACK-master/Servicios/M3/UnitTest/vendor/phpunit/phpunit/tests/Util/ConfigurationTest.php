<?php



class Util_ConfigurationTest extends PHPUnit_Framework_TestCase
{
    protected $Vagofhq2gyvt;

    protected function setUp()
    {
        $this->configuration = PHPUnit_Util_Configuration::getInstance(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'configuration.xml'
        );
    }

    
    public function testExceptionIsThrownForNotExistingConfigurationFile()
    {
        PHPUnit_Util_Configuration::getInstance('not_existing_file.xml');
    }

    
    public function testShouldReadColorsWhenTrueInConfigurationfile()
    {
        $Vagofhq2gyvtFilename =  dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'configuration.colors.true.xml';
        $Vagofhq2gyvtInstance = PHPUnit_Util_Configuration::getInstance($Vagofhq2gyvtFilename);
        $Vagofhq2gyvtValues   = $Vagofhq2gyvtInstance->getPHPUnitConfiguration();

        $this->assertEquals(PHPUnit_TextUI_ResultPrinter::COLOR_AUTO, $Vagofhq2gyvtValues['colors']);
    }

    
    public function testShouldReadColorsWhenFalseInConfigurationfile()
    {
        $Vagofhq2gyvtFilename =  dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'configuration.colors.false.xml';
        $Vagofhq2gyvtInstance = PHPUnit_Util_Configuration::getInstance($Vagofhq2gyvtFilename);
        $Vagofhq2gyvtValues   = $Vagofhq2gyvtInstance->getPHPUnitConfiguration();

        $this->assertEquals(PHPUnit_TextUI_ResultPrinter::COLOR_NEVER, $Vagofhq2gyvtValues['colors']);
    }

    
    public function testShouldReadColorsWhenEmptyInConfigurationfile()
    {
        $Vagofhq2gyvtFilename =  dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'configuration.colors.empty.xml';
        $Vagofhq2gyvtInstance = PHPUnit_Util_Configuration::getInstance($Vagofhq2gyvtFilename);
        $Vagofhq2gyvtValues   = $Vagofhq2gyvtInstance->getPHPUnitConfiguration();

        $this->assertEquals(PHPUnit_TextUI_ResultPrinter::COLOR_NEVER, $Vagofhq2gyvtValues['colors']);
    }

    
    public function testShouldReadColorsWhenInvalidInConfigurationfile()
    {
        $Vagofhq2gyvtFilename =  dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'configuration.colors.invalid.xml';
        $Vagofhq2gyvtInstance = PHPUnit_Util_Configuration::getInstance($Vagofhq2gyvtFilename);
        $Vagofhq2gyvtValues   = $Vagofhq2gyvtInstance->getPHPUnitConfiguration();

        $this->assertEquals(PHPUnit_TextUI_ResultPrinter::COLOR_NEVER, $Vagofhq2gyvtValues['colors']);
    }

    
    public function testFilterConfigurationIsReadCorrectly()
    {
        $this->assertEquals(
            array(
            'blacklist' =>
            array(
              'include' =>
              array(
                'directory' =>
                array(
                  0 =>
                  array(
                    'path'   => '/path/to/files',
                    'prefix' => '',
                    'suffix' => '.php',
                    'group'  => 'DEFAULT'
                  ),
                ),
                'file' =>
                array(
                  0 => '/path/to/file',
                  1 => '/path/to/file',
                ),
              ),
              'exclude' =>
              array(
                'directory' =>
                array(
                  0 =>
                  array(
                    'path'   => '/path/to/files',
                    'prefix' => '',
                    'suffix' => '.php',
                    'group'  => 'DEFAULT'
                  ),
                ),
                'file' =>
                array(
                  0 => '/path/to/file',
                ),
              ),
            ),
            'whitelist' =>
            array(
              'addUncoveredFilesFromWhitelist'     => true,
              'processUncoveredFilesFromWhitelist' => false,
              'include'                            =>
              array(
                'directory' =>
                array(
                  0 =>
                  array(
                    'path'   => '/path/to/files',
                    'prefix' => '',
                    'suffix' => '.php',
                    'group'  => 'DEFAULT'
                  ),
                ),
                'file' =>
                array(
                  0 => '/path/to/file',
                ),
              ),
              'exclude' =>
              array(
                'directory' =>
                array(
                  0 =>
                  array(
                    'path'   => '/path/to/files',
                    'prefix' => '',
                    'suffix' => '.php',
                    'group'  => 'DEFAULT'
                  ),
                ),
                'file' =>
                array(
                  0 => '/path/to/file',
                ),
              ),
            ),
            ),
            $this->configuration->getFilterConfiguration()
        );
    }

    
    public function testGroupConfigurationIsReadCorrectly()
    {
        $this->assertEquals(
            array(
            'include' =>
            array(
              0 => 'name',
            ),
            'exclude' =>
            array(
              0 => 'name',
            ),
            ),
            $this->configuration->getGroupConfiguration()
        );
    }

    
    public function testListenerConfigurationIsReadCorrectly()
    {
        $Vb3iift025ov         = __DIR__;
        $Vdvo2o2gi4j1 = ini_get('include_path');

        ini_set('include_path', $Vb3iift025ov . PATH_SEPARATOR . $Vdvo2o2gi4j1);

        $this->assertEquals(
            array(
            0 =>
            array(
              'class'     => 'MyListener',
              'file'      => '/optional/path/to/MyListener.php',
              'arguments' =>
              array(
                0 =>
                array(
                  0 => 'Sebastian',
                ),
                1 => 22,
                2 => 'April',
                3 => 19.78,
                4 => null,
                5 => new stdClass,
                6 => dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'MyTestFile.php',
                7 => dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'MyRelativePath',
              ),
            ),
            array(
              'class'     => 'IncludePathListener',
              'file'      => __FILE__,
              'arguments' => array()
            ),
            array(
              'class'     => 'CompactArgumentsListener',
              'file'      => '/CompactArgumentsListener.php',
              'arguments' =>
              array(
                0 => 42
              ),
            ),
            ),
            $this->configuration->getListenerConfiguration()
        );

        ini_set('include_path', $Vdvo2o2gi4j1);
    }

    
    public function testLoggingConfigurationIsReadCorrectly()
    {
        $this->assertEquals(
            array(
            'lowUpperBound'        => '50',
            'highLowerBound'       => '90',
            'coverage-html'        => '/tmp/report',
            'coverage-clover'      => '/tmp/clover.xml',
            'json'                 => '/tmp/logfile.json',
            'plain'                => '/tmp/logfile.txt',
            'tap'                  => '/tmp/logfile.tap',
            'logIncompleteSkipped' => false,
            'junit'                => '/tmp/logfile.xml',
            'testdox-html'         => '/tmp/testdox.html',
            'testdox-text'         => '/tmp/testdox.txt',
            ),
            $this->configuration->getLoggingConfiguration()
        );
    }

    
    public function testPHPConfigurationIsReadCorrectly()
    {
        $this->assertEquals(
            array(
            'include_path' =>
            array(
              dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . '.',
              '/path/to/lib'
            ),
            'ini'    => array('foo' => 'bar'),
            'const'  => array('FOO' => false, 'BAR' => true),
            'var'    => array('foo' => false),
            'env'    => array('foo' => true),
            'post'   => array('foo' => 'bar'),
            'get'    => array('foo' => 'bar'),
            'cookie' => array('foo' => 'bar'),
            'server' => array('foo' => 'bar'),
            'files'  => array('foo' => 'bar'),
            'request'=> array('foo' => 'bar'),
            ),
            $this->configuration->getPHPConfiguration()
        );
    }

    
    public function testPHPConfigurationIsHandledCorrectly()
    {
        $this->configuration->handlePHPConfiguration();

        $V2bpoh5hagzp = dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . '.' . PATH_SEPARATOR . '/path/to/lib';
        $this->assertStringStartsWith($V2bpoh5hagzp, ini_get('include_path'));
        $this->assertEquals(false, FOO);
        $this->assertEquals(true, BAR);
        $this->assertEquals(false, $GLOBALS['foo']);
        $this->assertEquals(true, $_ENV['foo']);
        $this->assertEquals(true, getenv('foo'));
        $this->assertEquals('bar', $_POST['foo']);
        $this->assertEquals('bar', $_GET['foo']);
        $this->assertEquals('bar', $_COOKIE['foo']);
        $this->assertEquals('bar', $_SERVER['foo']);
        $this->assertEquals('bar', $_FILES['foo']);
        $this->assertEquals('bar', $_REQUEST['foo']);
    }

    
    public function testHandlePHPConfigurationDoesNotOverwrittenExistingEnvArrayVariables()
    {
        $_ENV['foo'] = false;
        $this->configuration->handlePHPConfiguration();

        $this->assertEquals(false, $_ENV['foo']);
        $this->assertEquals(true, getenv('foo'));
    }

    
    public function testHandlePHPConfigurationDoesNotOverriteVariablesFromPutEnv()
    {
        putenv('foo=putenv');
        $this->configuration->handlePHPConfiguration();

        $this->assertEquals(true, $_ENV['foo']);
        $this->assertEquals('putenv', getenv('foo'));
    }

    
    public function testPHPUnitConfigurationIsReadCorrectly()
    {
        $this->assertEquals(
            array(
            'backupGlobals'                      => true,
            'backupStaticAttributes'             => false,
            'disallowChangesToGlobalState'       => false,
            'bootstrap'                          => '/path/to/bootstrap.php',
            'cacheTokens'                        => false,
            'columns'                            => 80,
            'colors'                             => 'never',
            'stderr'                             => false,
            'convertErrorsToExceptions'          => true,
            'convertNoticesToExceptions'         => true,
            'convertWarningsToExceptions'        => true,
            'forceCoversAnnotation'              => false,
            'mapTestClassNameToCoveredClassName' => false,
            'printerClass'                       => 'PHPUnit_TextUI_ResultPrinter',
            'stopOnFailure'                      => false,
            'reportUselessTests'                 => false,
            'strictCoverage'                     => false,
            'disallowTestOutput'                 => false,
            'enforceTimeLimit'                   => false,
            'disallowTodoAnnotatedTests'         => false,
            'testSuiteLoaderClass'               => 'PHPUnit_Runner_StandardTestSuiteLoader',
            'verbose'                            => false,
            'timeoutForSmallTests'               => 1,
            'timeoutForMediumTests'              => 10,
            'timeoutForLargeTests'               => 60
            ),
            $this->configuration->getPHPUnitConfiguration()
        );
    }

    
    public function testSeleniumBrowserConfigurationIsReadCorrectly()
    {
        $this->assertEquals(
            array(
            0 =>
            array(
              'name'    => 'Firefox on Linux',
              'browser' => '*firefox /usr/lib/firefox/firefox-bin',
              'host'    => 'my.linux.box',
              'port'    => 4444,
              'timeout' => 30000,
            ),
            ),
            $this->configuration->getSeleniumBrowserConfiguration()
        );
    }

    
    public function testXincludeInConfiguration()
    {
        $Vagofhq2gyvtWithXinclude = PHPUnit_Util_Configuration::getInstance(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'configuration_xinclude.xml'
        );

        $this->assertConfigurationEquals(
            $this->configuration,
            $Vagofhq2gyvtWithXinclude
        );
    }

    
    public function testWithEmptyConfigurations()
    {
        $V2dsbhzb3r0u = PHPUnit_Util_Configuration::getInstance(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'configuration_empty.xml'
        );

        $Vozymm3c0tqw = $V2dsbhzb3r0u->getLoggingConfiguration();
        $this->assertEmpty($Vozymm3c0tqw);

        $Vkyiqtoxqbdy = $V2dsbhzb3r0u->getPHPConfiguration();
        $this->assertEmpty($Vkyiqtoxqbdy['include_path']);

        $Vkyiqtoxqbdyunit = $V2dsbhzb3r0u->getPHPUnitConfiguration();
        $this->assertArrayNotHasKey('bootstrap', $Vkyiqtoxqbdyunit);
        $this->assertArrayNotHasKey('testSuiteLoaderFile', $Vkyiqtoxqbdyunit);
        $this->assertArrayNotHasKey('printerFile', $Vkyiqtoxqbdyunit);

        $Vrrxtoyyy15e = $V2dsbhzb3r0u->getTestSuiteConfiguration();
        $this->assertEmpty($Vrrxtoyyy15e->getGroups());

        $Vgpt4we0cx0b = $V2dsbhzb3r0u->getFilterConfiguration();
        $this->assertEmpty($Vgpt4we0cx0b['blacklist']['include']['directory']);
        $this->assertEmpty($Vgpt4we0cx0b['blacklist']['include']['file']);
        $this->assertEmpty($Vgpt4we0cx0b['blacklist']['exclude']['directory']);
        $this->assertEmpty($Vgpt4we0cx0b['blacklist']['exclude']['file']);
        $this->assertEmpty($Vgpt4we0cx0b['whitelist']['include']['directory']);
        $this->assertEmpty($Vgpt4we0cx0b['whitelist']['include']['file']);
        $this->assertEmpty($Vgpt4we0cx0b['whitelist']['exclude']['directory']);
        $this->assertEmpty($Vgpt4we0cx0b['whitelist']['exclude']['file']);
    }

    
    protected function assertConfigurationEquals(PHPUnit_Util_Configuration $Vwulyqansqjr, PHPUnit_Util_Configuration $Vlobwe0h4k25)
    {
        $this->assertEquals(
            $Vwulyqansqjr->getFilterConfiguration(),
            $Vlobwe0h4k25->getFilterConfiguration()
        );

        $this->assertEquals(
            $Vwulyqansqjr->getGroupConfiguration(),
            $Vlobwe0h4k25->getGroupConfiguration()
        );

        $this->assertEquals(
            $Vwulyqansqjr->getListenerConfiguration(),
            $Vlobwe0h4k25->getListenerConfiguration()
        );

        $this->assertEquals(
            $Vwulyqansqjr->getLoggingConfiguration(),
            $Vlobwe0h4k25->getLoggingConfiguration()
        );

        $this->assertEquals(
            $Vwulyqansqjr->getPHPConfiguration(),
            $Vlobwe0h4k25->getPHPConfiguration()
        );

        $this->assertEquals(
            $Vwulyqansqjr->getPHPUnitConfiguration(),
            $Vlobwe0h4k25->getPHPUnitConfiguration()
        );

        $this->assertEquals(
            $Vwulyqansqjr->getSeleniumBrowserConfiguration(),
            $Vlobwe0h4k25->getSeleniumBrowserConfiguration()
        );

        $this->assertEquals(
            $Vwulyqansqjr->getTestSuiteConfiguration(),
            $Vlobwe0h4k25->getTestSuiteConfiguration()
        );
    }
}
