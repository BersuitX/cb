<?php


require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'NoArgTestCaseTest.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'Singleton.php';

$GLOBALS['a']  = 'a';
$_ENV['b']     = 'b';
$_POST['c']    = 'c';
$_GET['d']     = 'd';
$_COOKIE['e']  = 'e';
$_SERVER['f']  = 'f';
$_FILES['g']   = 'g';
$_REQUEST['h'] = 'h';
$GLOBALS['i']  = 'i';


class Framework_TestCaseTest extends PHPUnit_Framework_TestCase
{
    protected $Vwnxezy5oy0d = array('i', 'singleton');

    
    protected static $Vunro3j53ipu = 0;

    public function testCaseToString()
    {
        $Vuvamk1vhxxdhis->assertEquals(
            'Framework_TestCaseTest::testCaseToString',
            $Vuvamk1vhxxdhis->toString()
        );
    }

    public function testSuccess()
    {
        $Vpswbntjg3pr   = new Success;
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(PHPUnit_Runner_BaseTestRunner::STATUS_PASSED, $Vpswbntjg3pr->getStatus());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->errorCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
    }

    public function testFailure()
    {
        $Vpswbntjg3pr   = new Failure;
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE, $Vpswbntjg3pr->getStatus());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->errorCount());
        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
    }

    public function testError()
    {
        $Vpswbntjg3pr   = new TestError;
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(PHPUnit_Runner_BaseTestRunner::STATUS_ERROR, $Vpswbntjg3pr->getStatus());
        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->errorCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
    }

    public function testSkipped()
    {
        $Vpswbntjg3pr   = new TestSkipped();
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(PHPUnit_Runner_BaseTestRunner::STATUS_SKIPPED, $Vpswbntjg3pr->getStatus());
        $Vuvamk1vhxxdhis->assertEquals('Skipped test', $Vpswbntjg3pr->getStatusMessage());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->errorCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
    }

    public function testIncomplete()
    {
        $Vpswbntjg3pr   = new TestIncomplete();
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(PHPUnit_Runner_BaseTestRunner::STATUS_INCOMPLETE, $Vpswbntjg3pr->getStatus());
        $Vuvamk1vhxxdhis->assertEquals('Incomplete test', $Vpswbntjg3pr->getStatusMessage());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->errorCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
    }

    public function testExceptionInSetUp()
    {
        $Vpswbntjg3pr   = new ExceptionInSetUpTest('testSomething');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->setUp);
        $Vuvamk1vhxxdhis->assertFalse($Vpswbntjg3pr->assertPreConditions);
        $Vuvamk1vhxxdhis->assertFalse($Vpswbntjg3pr->testSomething);
        $Vuvamk1vhxxdhis->assertFalse($Vpswbntjg3pr->assertPostConditions);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->tearDown);
    }

    public function testExceptionInAssertPreConditions()
    {
        $Vpswbntjg3pr   = new ExceptionInAssertPreConditionsTest('testSomething');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->setUp);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->assertPreConditions);
        $Vuvamk1vhxxdhis->assertFalse($Vpswbntjg3pr->testSomething);
        $Vuvamk1vhxxdhis->assertFalse($Vpswbntjg3pr->assertPostConditions);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->tearDown);
    }

    public function testExceptionInTest()
    {
        $Vpswbntjg3pr   = new ExceptionInTest('testSomething');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->setUp);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->assertPreConditions);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->testSomething);
        $Vuvamk1vhxxdhis->assertFalse($Vpswbntjg3pr->assertPostConditions);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->tearDown);
    }

    public function testExceptionInAssertPostConditions()
    {
        $Vpswbntjg3pr   = new ExceptionInAssertPostConditionsTest('testSomething');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->setUp);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->assertPreConditions);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->testSomething);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->assertPostConditions);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->tearDown);
    }

    public function testExceptionInTearDown()
    {
        $Vpswbntjg3pr   = new ExceptionInTearDownTest('testSomething');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->setUp);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->assertPreConditions);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->testSomething);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->assertPostConditions);
        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->tearDown);
    }

    public function testNoArgTestCasePasses()
    {
        $Vv0hyvhlkjqr = new PHPUnit_Framework_TestResult;
        $Vuvamk1vhxxd      = new PHPUnit_Framework_TestSuite('NoArgTestCaseTest');

        $Vuvamk1vhxxd->run($Vv0hyvhlkjqr);

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->errorCount());
    }

    public function testWasRun()
    {
        $Vpswbntjg3pr = new WasRun;
        $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertTrue($Vpswbntjg3pr->wasRun);
    }

    public function testException()
    {
        $Vpswbntjg3pr = new ThrowExceptionTestCase('test');
        $Vpswbntjg3pr->setExpectedException('RuntimeException');

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertTrue($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testExceptionWithMessage()
    {
        $Vpswbntjg3pr = new ThrowExceptionTestCase('test');
        $Vpswbntjg3pr->setExpectedException('RuntimeException', 'A runtime error occurred');

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertTrue($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testExceptionWithWrongMessage()
    {
        $Vpswbntjg3pr = new ThrowExceptionTestCase('test');
        $Vpswbntjg3pr->setExpectedException('RuntimeException', 'A logic error occurred');

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertEquals(
            "Failed asserting that exception message 'A runtime error occurred' contains 'A logic error occurred'.",
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    public function testExceptionWithRegexpMessage()
    {
        $Vpswbntjg3pr = new ThrowExceptionTestCase('test');
        $Vpswbntjg3pr->setExpectedExceptionRegExp('RuntimeException', '/runtime .*? occurred/');

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertTrue($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testExceptionWithWrongRegexpMessage()
    {
        $Vpswbntjg3pr = new ThrowExceptionTestCase('test');
        $Vpswbntjg3pr->setExpectedExceptionRegExp('RuntimeException', '/logic .*? occurred/');

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertEquals(
            "Failed asserting that exception message 'A runtime error occurred' matches '/logic .*? occurred/'.",
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    
    public function testExceptionWithInvalidRegexpMessage()
    {
        $Vpswbntjg3pr = new ThrowExceptionTestCase('test');
        $Vpswbntjg3pr->setExpectedExceptionRegExp('RuntimeException', '#runtime .*? occurred/'); 

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(
            "Invalid expected exception message regex given: '#runtime .*? occurred/'",
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    public function testNoException()
    {
        $Vpswbntjg3pr = new ThrowNoExceptionTestCase('test');
        $Vpswbntjg3pr->setExpectedException('RuntimeException');

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
    }

    public function testWrongException()
    {
        $Vpswbntjg3pr = new ThrowExceptionTestCase('test');
        $Vpswbntjg3pr->setExpectedException('InvalidArgumentException');

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->failureCount());
        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
    }

    
    public function testGlobalsBackupPre()
    {
        global $Vmbzc5xgwrgo;
        global $Vxja1abp34yq;

        $Vuvamk1vhxxdhis->assertEquals('a', $Vmbzc5xgwrgo);
        $Vuvamk1vhxxdhis->assertEquals('a', $GLOBALS['a']);
        $Vuvamk1vhxxdhis->assertEquals('b', $_ENV['b']);
        $Vuvamk1vhxxdhis->assertEquals('c', $_POST['c']);
        $Vuvamk1vhxxdhis->assertEquals('d', $_GET['d']);
        $Vuvamk1vhxxdhis->assertEquals('e', $_COOKIE['e']);
        $Vuvamk1vhxxdhis->assertEquals('f', $_SERVER['f']);
        $Vuvamk1vhxxdhis->assertEquals('g', $_FILES['g']);
        $Vuvamk1vhxxdhis->assertEquals('h', $_REQUEST['h']);
        $Vuvamk1vhxxdhis->assertEquals('i', $Vxja1abp34yq);
        $Vuvamk1vhxxdhis->assertEquals('i', $GLOBALS['i']);

        $GLOBALS['a']   = 'aa';
        $GLOBALS['foo'] = 'bar';
        $_ENV['b']      = 'bb';
        $_POST['c']     = 'cc';
        $_GET['d']      = 'dd';
        $_COOKIE['e']   = 'ee';
        $_SERVER['f']   = 'ff';
        $_FILES['g']    = 'gg';
        $_REQUEST['h']  = 'hh';
        $GLOBALS['i']   = 'ii';

        $Vuvamk1vhxxdhis->assertEquals('aa', $Vmbzc5xgwrgo);
        $Vuvamk1vhxxdhis->assertEquals('aa', $GLOBALS['a']);
        $Vuvamk1vhxxdhis->assertEquals('bar', $GLOBALS['foo']);
        $Vuvamk1vhxxdhis->assertEquals('bb', $_ENV['b']);
        $Vuvamk1vhxxdhis->assertEquals('cc', $_POST['c']);
        $Vuvamk1vhxxdhis->assertEquals('dd', $_GET['d']);
        $Vuvamk1vhxxdhis->assertEquals('ee', $_COOKIE['e']);
        $Vuvamk1vhxxdhis->assertEquals('ff', $_SERVER['f']);
        $Vuvamk1vhxxdhis->assertEquals('gg', $_FILES['g']);
        $Vuvamk1vhxxdhis->assertEquals('hh', $_REQUEST['h']);
        $Vuvamk1vhxxdhis->assertEquals('ii', $Vxja1abp34yq);
        $Vuvamk1vhxxdhis->assertEquals('ii', $GLOBALS['i']);
    }

    public function testGlobalsBackupPost()
    {
        global $Vmbzc5xgwrgo;
        global $Vxja1abp34yq;

        $Vuvamk1vhxxdhis->assertEquals('a', $Vmbzc5xgwrgo);
        $Vuvamk1vhxxdhis->assertEquals('a', $GLOBALS['a']);
        $Vuvamk1vhxxdhis->assertEquals('b', $_ENV['b']);
        $Vuvamk1vhxxdhis->assertEquals('c', $_POST['c']);
        $Vuvamk1vhxxdhis->assertEquals('d', $_GET['d']);
        $Vuvamk1vhxxdhis->assertEquals('e', $_COOKIE['e']);
        $Vuvamk1vhxxdhis->assertEquals('f', $_SERVER['f']);
        $Vuvamk1vhxxdhis->assertEquals('g', $_FILES['g']);
        $Vuvamk1vhxxdhis->assertEquals('h', $_REQUEST['h']);
        $Vuvamk1vhxxdhis->assertEquals('ii', $Vxja1abp34yq);
        $Vuvamk1vhxxdhis->assertEquals('ii', $GLOBALS['i']);

        $Vuvamk1vhxxdhis->assertArrayNotHasKey('foo', $GLOBALS);
    }

    
    public function testStaticAttributesBackupPre()
    {
        $GLOBALS['singleton'] = Singleton::getInstance();
        self::$Vunro3j53ipu    = 123;
    }

    
    public function testStaticAttributesBackupPost()
    {
        $Vuvamk1vhxxdhis->assertNotSame($GLOBALS['singleton'], Singleton::getInstance());
        $Vuvamk1vhxxdhis->assertSame(0, self::$Vunro3j53ipu);
    }

    public function testIsInIsolationReturnsFalse()
    {
        $Vpswbntjg3pr   = new IsolationTest('testIsInIsolationReturnsFalse');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertTrue($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testIsInIsolationReturnsTrue()
    {
        $Vpswbntjg3pr   = new IsolationTest('testIsInIsolationReturnsTrue');
        $Vpswbntjg3pr->setRunTestInSeparateProcess(true);
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertTrue($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testExpectOutputStringFooActualFoo()
    {
        $Vpswbntjg3pr   = new OutputTestCase('testExpectOutputStringFooActualFoo');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertTrue($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testExpectOutputStringFooActualBar()
    {
        $Vpswbntjg3pr   = new OutputTestCase('testExpectOutputStringFooActualBar');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertFalse($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testExpectOutputRegexFooActualFoo()
    {
        $Vpswbntjg3pr   = new OutputTestCase('testExpectOutputRegexFooActualFoo');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertTrue($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testExpectOutputRegexFooActualBar()
    {
        $Vpswbntjg3pr   = new OutputTestCase('testExpectOutputRegexFooActualBar');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, count($Vv0hyvhlkjqr));
        $Vuvamk1vhxxdhis->assertFalse($Vv0hyvhlkjqr->wasSuccessful());
    }

    public function testSkipsIfRequiresHigherVersionOfPHPUnit()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testAlwaysSkip');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(
            'PHPUnit 1111111 (or later) is required.',
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    public function testSkipsIfRequiresHigherVersionOfPHP()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testAlwaysSkip2');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(
            'PHP 9999999 (or later) is required.',
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    public function testSkipsIfRequiresNonExistingOs()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testAlwaysSkip3');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(
            'Operating system matching /DOESNOTEXIST/i is required.',
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    public function testSkipsIfRequiresNonExistingFunction()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testNine');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(1, $Vv0hyvhlkjqr->skippedCount());
        $Vuvamk1vhxxdhis->assertEquals(
            'Function testFunc is required.',
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    public function testSkipsIfRequiresNonExistingExtension()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testTen');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(
            'Extension testExt is required.',
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    public function testSkipsProvidesMessagesForAllSkippingReasons()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testAllPossibleRequirements');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertEquals(
            'PHP 99-dev (or later) is required.' . PHP_EOL .
            'PHPUnit 9-dev (or later) is required.' . PHP_EOL .
            'Operating system matching /DOESNOTEXIST/i is required.' . PHP_EOL .
            'Function testFuncOne is required.' . PHP_EOL .
            'Function testFuncTwo is required.' . PHP_EOL .
            'Extension testExtOne is required.' . PHP_EOL .
            'Extension testExtTwo is required.',
            $Vpswbntjg3pr->getStatusMessage()
        );
    }

    public function testRequiringAnExistingMethodDoesNotSkip()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testExistingMethod');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->skippedCount());
    }

    public function testRequiringAnExistingFunctionDoesNotSkip()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testExistingFunction');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->skippedCount());
    }

    public function testRequiringAnExistingExtensionDoesNotSkip()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testExistingExtension');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->skippedCount());
    }

    public function testRequiringAnExistingOsDoesNotSkip()
    {
        $Vpswbntjg3pr   = new RequirementsTest('testExistingOs');
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();
        $Vuvamk1vhxxdhis->assertEquals(0, $Vv0hyvhlkjqr->skippedCount());
    }

    public function testCurrentWorkingDirectoryIsRestored()
    {
        $V30yuu0dim14 = getcwd();

        $Vpswbntjg3pr = new ChangeCurrentWorkingDirectoryTest('testSomethingThatChangesTheCwd');
        $Vpswbntjg3pr->run();

        $Vuvamk1vhxxdhis->assertSame($V30yuu0dim14, getcwd());
    }

    
    public function testTypeErrorCanBeExpected()
    {
        $Vgcvauwd5u5t = new ClassWithScalarTypeDeclarations;
        $Vgcvauwd5u5t->foo(null, null);
    }
}
