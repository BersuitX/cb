<?php


if (!defined('TEST_FILES_PATH')) {
    define(
        'TEST_FILES_PATH',
        dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR .
        '_files' . DIRECTORY_SEPARATOR
    );
}

require_once TEST_FILES_PATH . '../TestCase.php';


class PHP_CodeCoverage_Report_FactoryTest extends PHP_CodeCoverage_TestCase
{
    protected $Vdnxqjiaf0hs;

    protected function setUp()
    {
        $this->factory = new PHP_CodeCoverage_Report_Factory;
    }

    public function testSomething()
    {
        $Vixd4iv51rfm = $this->getCoverageForBankAccount()->getReport();

        $Vciekqs2c3ie = rtrim(TEST_FILES_PATH, DIRECTORY_SEPARATOR);
        $this->assertEquals($Vciekqs2c3ie, $Vixd4iv51rfm->getName());
        $this->assertEquals($Vciekqs2c3ie, $Vixd4iv51rfm->getPath());
        $this->assertEquals(10, $Vixd4iv51rfm->getNumExecutableLines());
        $this->assertEquals(5, $Vixd4iv51rfm->getNumExecutedLines());
        $this->assertEquals(1, $Vixd4iv51rfm->getNumClasses());
        $this->assertEquals(0, $Vixd4iv51rfm->getNumTestedClasses());
        $this->assertEquals(4, $Vixd4iv51rfm->getNumMethods());
        $this->assertEquals(3, $Vixd4iv51rfm->getNumTestedMethods());
        $this->assertEquals('0.00%', $Vixd4iv51rfm->getTestedClassesPercent());
        $this->assertEquals('75.00%', $Vixd4iv51rfm->getTestedMethodsPercent());
        $this->assertEquals('50.00%', $Vixd4iv51rfm->getLineExecutedPercent());
        $this->assertEquals(0, $Vixd4iv51rfm->getNumFunctions());
        $this->assertEquals(0, $Vixd4iv51rfm->getNumTestedFunctions());
        $this->assertNull($Vixd4iv51rfm->getParent());
        $this->assertEquals(array(), $Vixd4iv51rfm->getDirectories());
        #$this->assertEquals(array(), $Vixd4iv51rfm->getFiles());
        #$this->assertEquals(array(), $Vixd4iv51rfm->getChildNodes());

        $this->assertEquals(
            array(
                'BankAccount' => array(
                    'methods' => array(
                        'getBalance' => array(
                            'signature'       => 'getBalance()',
                            'startLine'       => 6,
                            'endLine'         => 9,
                            'executableLines' => 1,
                            'executedLines'   => 1,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#6',
                            'methodName'      => 'getBalance'
                        ),
                        'setBalance' => array(
                            'signature'       => 'setBalance($V1ajn42qznny)',
                            'startLine'       => 11,
                            'endLine'         => 18,
                            'executableLines' => 5,
                            'executedLines'   => 0,
                            'ccn'             => 2,
                            'coverage'        => 0,
                            'crap'            => 6,
                            'link'            => 'BankAccount.php.html#11',
                            'methodName'      => 'setBalance'
                        ),
                        'depositMoney' => array(
                            'signature'       => 'depositMoney($V1ajn42qznny)',
                            'startLine'       => 20,
                            'endLine'         => 25,
                            'executableLines' => 2,
                            'executedLines'   => 2,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#20',
                            'methodName'      => 'depositMoney'
                        ),
                        'withdrawMoney' => array(
                            'signature'       => 'withdrawMoney($V1ajn42qznny)',
                            'startLine'       => 27,
                            'endLine'         => 32,
                            'executableLines' => 2,
                            'executedLines'   => 2,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#27',
                            'methodName'      => 'withdrawMoney'
                        ),
                    ),
                    'startLine'       => 2,
                    'executableLines' => 10,
                    'executedLines'   => 5,
                    'ccn'             => 5,
                    'coverage'        => 50,
                    'crap'            => '8.12',
                    'package'         => array(
                        'namespace'   => '',
                        'fullPackage' => '',
                        'category'    => '',
                        'package'     => '',
                        'subpackage'  => ''
                    ),
                    'link'      => 'BankAccount.php.html#2',
                    'className' => 'BankAccount'
                )
            ),
            $Vixd4iv51rfm->getClasses()
        );

        $this->assertEquals(array(), $Vixd4iv51rfm->getFunctions());
    }

    
    public function testBuildDirectoryStructure()
    {
        $Vtlfvdwskdge = new ReflectionMethod(
            'PHP_CodeCoverage_Report_Factory',
            'buildDirectoryStructure'
        );

        $Vtlfvdwskdge->setAccessible(true);

        $this->assertEquals(
            array(
                'src' => array(
                    'Money.php/f'    => array(),
                    'MoneyBag.php/f' => array()
                )
            ),
            $Vtlfvdwskdge->invoke(
                $this->factory,
                array('src/Money.php' => array(), 'src/MoneyBag.php' => array())
            )
        );
    }

    
    public function testReducePaths($Vnhsnlp2ex3w, $Vtff21dazbte, $Vno1hmfcfeuv)
    {
        $Vtlfvdwskdge = new ReflectionMethod(
            'PHP_CodeCoverage_Report_Factory',
            'reducePaths'
        );

        $Vtlfvdwskdge->setAccessible(true);

        $Vl2hbymvfbvl = $Vtlfvdwskdge->invokeArgs($this->factory, array(&$Vno1hmfcfeuv));

        $this->assertEquals($Vnhsnlp2ex3w, $Vno1hmfcfeuv);
        $this->assertEquals($Vtff21dazbte, $Vl2hbymvfbvl);
    }

    public function reducePathsProvider()
    {
        return array(
            array(
                array(
                    'Money.php'    => array(),
                    'MoneyBag.php' => array()
                ),
                '/home/sb/Money',
                array(
                    '/home/sb/Money/Money.php'    => array(),
                    '/home/sb/Money/MoneyBag.php' => array()
                )
            ),
            array(
                array(
                    'Money.php' => array()
                ),
                '/home/sb/Money/',
                array(
                    '/home/sb/Money/Money.php' => array()
                )
            ),
            array(
                array(),
                '.',
                array()
            ),
            array(
                array(
                    'Money.php'          => array(),
                    'MoneyBag.php'       => array(),
                    'Cash.phar/Cash.php' => array(),
                ),
                '/home/sb/Money',
                array(
                    '/home/sb/Money/Money.php'                 => array(),
                    '/home/sb/Money/MoneyBag.php'              => array(),
                    'phar:///home/sb/Money/Cash.phar/Cash.php' => array(),
                ),
            ),
        );
    }
}
