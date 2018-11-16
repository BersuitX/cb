<?php


require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'BeforeAndAfterTest.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'BeforeClassAndAfterClassTest.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'TestWithTest.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'DataProviderSkippedTest.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'DataProviderIncompleteTest.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'InheritedTestCase.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'NoTestCaseClass.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'NoTestCases.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'NotPublicTestCase.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'NotVoidTestCase.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'OverrideTestCase.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'RequirementsClassBeforeClassHookTest.php';


class Framework_SuiteTest extends PHPUnit_Framework_TestCase
{
    protected $Vv0hyvhlkjqr;

    protected function setUp()
    {
        $this->result = new PHPUnit_Framework_TestResult;
    }

    public static function suite()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite;

        $Vrrxtoyyy15e->addTest(new self('testAddTestSuite'));
        $Vrrxtoyyy15e->addTest(new self('testInheritedTests'));
        $Vrrxtoyyy15e->addTest(new self('testNoTestCases'));
        $Vrrxtoyyy15e->addTest(new self('testNoTestCaseClass'));
        $Vrrxtoyyy15e->addTest(new self('testNotExistingTestCase'));
        $Vrrxtoyyy15e->addTest(new self('testNotPublicTestCase'));
        $Vrrxtoyyy15e->addTest(new self('testNotVoidTestCase'));
        $Vrrxtoyyy15e->addTest(new self('testOneTestCase'));
        $Vrrxtoyyy15e->addTest(new self('testShadowedTests'));
        $Vrrxtoyyy15e->addTest(new self('testBeforeClassAndAfterClassAnnotations'));
        $Vrrxtoyyy15e->addTest(new self('testBeforeAnnotation'));
        $Vrrxtoyyy15e->addTest(new self('testTestWithAnnotation'));
        $Vrrxtoyyy15e->addTest(new self('testSkippedTestDataProvider'));
        $Vrrxtoyyy15e->addTest(new self('testIncompleteTestDataProvider'));
        $Vrrxtoyyy15e->addTest(new self('testRequirementsBeforeClassHook'));
        $Vrrxtoyyy15e->addTest(new self('testDontSkipInheritedClass'));

        return $Vrrxtoyyy15e;
    }

    public function testAddTestSuite()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'OneTestCase'
        );

        $Vrrxtoyyy15e->run($this->result);

        $this->assertEquals(1, count($this->result));
    }

    public function testInheritedTests()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'InheritedTestCase'
        );

        $Vrrxtoyyy15e->run($this->result);

        $this->assertTrue($this->result->wasSuccessful());
        $this->assertEquals(2, count($this->result));
    }

    public function testNoTestCases()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'NoTestCases'
        );

        $Vrrxtoyyy15e->run($this->result);

        $this->assertTrue(!$this->result->wasSuccessful());
        $this->assertEquals(1, $this->result->failureCount());
        $this->assertEquals(1, count($this->result));
    }

    
    public function testNoTestCaseClass()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite('NoTestCaseClass');
    }

    public function testNotExistingTestCase()
    {
        $Vrrxtoyyy15e = new self('notExistingMethod');

        $Vrrxtoyyy15e->run($this->result);

        $this->assertEquals(0, $this->result->errorCount());
        $this->assertEquals(1, $this->result->failureCount());
        $this->assertEquals(1, count($this->result));
    }

    public function testNotPublicTestCase()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'NotPublicTestCase'
        );

        $this->assertEquals(2, count($Vrrxtoyyy15e));
    }

    public function testNotVoidTestCase()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'NotVoidTestCase'
        );

        $this->assertEquals(1, count($Vrrxtoyyy15e));
    }

    public function testOneTestCase()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'OneTestCase'
        );

        $Vrrxtoyyy15e->run($this->result);

        $this->assertEquals(0, $this->result->errorCount());
        $this->assertEquals(0, $this->result->failureCount());
        $this->assertEquals(1, count($this->result));
        $this->assertTrue($this->result->wasSuccessful());
    }

    public function testShadowedTests()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'OverrideTestCase'
        );

        $Vrrxtoyyy15e->run($this->result);

        $this->assertEquals(1, count($this->result));
    }

    public function testBeforeClassAndAfterClassAnnotations()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'BeforeClassAndAfterClassTest'
        );

        BeforeClassAndAfterClassTest::resetProperties();
        $Vrrxtoyyy15e->run($this->result);

        $this->assertEquals(1, BeforeClassAndAfterClassTest::$Vo5jv0xkdbjg, '@beforeClass method was not run once for the whole suite.');
        $this->assertEquals(1, BeforeClassAndAfterClassTest::$V5fw1ldihnvw, '@afterClass method was not run once for the whole suite.');
    }

    public function testBeforeAnnotation()
    {
        $Vpswbntjg3pr = new PHPUnit_Framework_TestSuite(
            'BeforeAndAfterTest'
        );

        BeforeAndAfterTest::resetProperties();
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $this->assertEquals(2, BeforeAndAfterTest::$Vaws5oe4ref4);
        $this->assertEquals(2, BeforeAndAfterTest::$Vl0mfbgkyfxv);
    }

    public function testTestWithAnnotation()
    {
        $Vpswbntjg3pr = new PHPUnit_Framework_TestSuite(
            'TestWithTest'
        );

        BeforeAndAfterTest::resetProperties();
        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();

        $this->assertEquals(4, count($Vv0hyvhlkjqr->passed()));
    }

    public function testSkippedTestDataProvider()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite('DataProviderSkippedTest');

        $Vrrxtoyyy15e->run($this->result);

        $this->assertEquals(3, $this->result->count());
        $this->assertEquals(1, $this->result->skippedCount());
    }

    public function testIncompleteTestDataProvider()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite('DataProviderIncompleteTest');

        $Vrrxtoyyy15e->run($this->result);

        $this->assertEquals(3, $this->result->count());
        $this->assertEquals(1, $this->result->notImplementedCount());
    }

    public function testRequirementsBeforeClassHook()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'RequirementsClassBeforeClassHookTest'
        );

        $Vrrxtoyyy15e->run($this->result);

        $this->assertEquals(0, $this->result->errorCount());
        $this->assertEquals(1, $this->result->skippedCount());
    }

    public function testDontSkipInheritedClass()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
            'DontSkipInheritedClass'
        );

        $Vb3iift025ov = dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'Inheritance' . DIRECTORY_SEPARATOR;

        $Vrrxtoyyy15e->addTestFile($Vb3iift025ov . 'InheritanceA.php');
        $Vrrxtoyyy15e->addTestFile($Vb3iift025ov . 'InheritanceB.php');
        $Vv0hyvhlkjqr = $Vrrxtoyyy15e->run();
        $this->assertEquals(2, count($Vv0hyvhlkjqr));
    }
}
