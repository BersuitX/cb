<?php


if (!defined('TEST_FILES_PATH')) {
    define(
        'TEST_FILES_PATH',
        dirname(__DIR__) . DIRECTORY_SEPARATOR .
        '_files' . DIRECTORY_SEPARATOR
    );
}

require TEST_FILES_PATH . 'CoverageNamespacedFunctionTest.php';
require TEST_FILES_PATH . 'NamespaceCoveredFunction.php';


class Util_TestTest extends PHPUnit_Framework_TestCase
{
    
    public function testGetExpectedException()
    {
        $this->assertArraySubset(
          array('class' => 'FooBarBaz', 'code' => null, 'message' => ''),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testOne')
        );

        $this->assertArraySubset(
          array('class' => 'Foo_Bar_Baz', 'code' => null, 'message' => ''),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testTwo')
        );

        $this->assertArraySubset(
          array('class' => 'Foo\Bar\Baz', 'code' => null, 'message' => ''),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testThree')
        );

        $this->assertArraySubset(
          array('class' => 'ほげ', 'code' => null, 'message' => ''),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testFour')
        );

        $this->assertArraySubset(
          array('class' => 'Class', 'code' => 1234, 'message' => 'Message'),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testFive')
        );

        $this->assertArraySubset(
          array('class' => 'Class', 'code' => 1234, 'message' => 'Message'),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testSix')
        );

        $this->assertArraySubset(
          array('class' => 'Class', 'code' => 'ExceptionCode', 'message' => 'Message'),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testSeven')
        );

        $this->assertArraySubset(
          array('class' => 'Class', 'code' => 0, 'message' => 'Message'),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testEight')
        );

        $this->assertArraySubset(
          array('class' => 'Class', 'code' => ExceptionTest::ERROR_CODE, 'message' => ExceptionTest::ERROR_MESSAGE),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testNine')
        );

        $this->assertArraySubset(
          array('class' => 'Class', 'code' => null, 'message' => ''),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testSingleLine')
        );

        $this->assertArraySubset(
          array('class' => 'Class', 'code' => My\Space\ExceptionNamespaceTest::ERROR_CODE, 'message' => My\Space\ExceptionNamespaceTest::ERROR_MESSAGE),
          PHPUnit_Util_Test::getExpectedException('My\Space\ExceptionNamespaceTest', 'testConstants')
        );

        
        $this->assertArraySubset(
          array('class' => 'Class', 'code' => 'ExceptionTest::UNKNOWN_CODE_CONSTANT', 'message' => 'ExceptionTest::UNKNOWN_MESSAGE_CONSTANT'),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testUnknownConstants')
        );

        $this->assertArraySubset(
          array('class' => 'Class', 'code' => 'My\Space\ExceptionNamespaceTest::UNKNOWN_CODE_CONSTANT', 'message' => 'My\Space\ExceptionNamespaceTest::UNKNOWN_MESSAGE_CONSTANT'),
          PHPUnit_Util_Test::getExpectedException('My\Space\ExceptionNamespaceTest', 'testUnknownConstants')
        );
    }

    
    public function testGetExpectedRegExp()
    {
        $this->assertArraySubset(
          array('message_regex' => '#regex#'),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testWithRegexMessage')
        );

        $this->assertArraySubset(
          array('message_regex' => '#regex#'),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testWithRegexMessageFromClassConstant')
        );

        $this->assertArraySubset(
          array('message_regex' => 'ExceptionTest::UNKNOWN_MESSAGE_REGEX_CONSTANT'),
          PHPUnit_Util_Test::getExpectedException('ExceptionTest', 'testWithUnknowRegexMessageFromClassConstant')
        );
    }

    
    public function testGetRequirements($Vpswbntjg3pr, $Vv0hyvhlkjqr)
    {
        $this->assertEquals(
            $Vv0hyvhlkjqr,
            PHPUnit_Util_Test::getRequirements('RequirementsTest', $Vpswbntjg3pr)
        );
    }

    public function requirementsProvider()
    {
        return array(
            array('testOne',    array()),
            array('testTwo',    array('PHPUnit'    => '1.0')),
            array('testThree',  array('PHP'        => '2.0')),
            array('testFour',   array('PHPUnit'    => '2.0', 'PHP' => '1.0')),
            array('testFive',   array('PHP'        => '5.4.0RC6')),
            array('testSix',    array('PHP'        => '5.4.0-alpha1')),
            array('testSeven',  array('PHP'        => '5.4.0beta2')),
            array('testEight',  array('PHP'        => '5.4-dev')),
            array('testNine',   array('functions'  => array('testFunc'))),
            array('testTen',    array('extensions' => array('testExt'))),
            array('testEleven', array('OS'         => '/Linux/i')),
            array(
              'testSpace',
              array(
                'extensions' => array('spl'),
                'OS'         => '/.*/i'
              )
            ),
            array(
              'testAllPossibleRequirements',
              array(
                'PHP'       => '99-dev',
                'PHPUnit'   => '9-dev',
                'OS'        => '/DOESNOTEXIST/i',
                'functions' => array(
                  'testFuncOne',
                  'testFuncTwo',
                ),
                'extensions' => array(
                  'testExtOne',
                  'testExtTwo',
                )
              )
            )
        );
    }

    
    public function testGetRequirementsMergesClassAndMethodDocBlocks()
    {
        $Vfmq1ls5ojvf = array(
            'PHP'       => '5.4',
            'PHPUnit'   => '3.7',
            'OS'        => '/WINNT/i',
            'functions' => array(
              'testFuncClass',
              'testFuncMethod',
            ),
            'extensions' => array(
              'testExtClass',
              'testExtMethod',
            )
        );

        $this->assertEquals(
            $Vfmq1ls5ojvf,
            PHPUnit_Util_Test::getRequirements('RequirementsClassDocBlockTest', 'testMethod')
        );
    }

    
    public function testGetMissingRequirements($Vpswbntjg3pr, $Vv0hyvhlkjqr)
    {
        $this->assertEquals(
            $Vv0hyvhlkjqr,
            PHPUnit_Util_Test::getMissingRequirements('RequirementsTest', $Vpswbntjg3pr)
        );
    }

    public function missingRequirementsProvider()
    {
        return array(
            array('testOne',            array()),
            array('testNine',           array('Function testFunc is required.')),
            array('testTen',            array('Extension testExt is required.')),
            array('testAlwaysSkip',     array('PHPUnit 1111111 (or later) is required.')),
            array('testAlwaysSkip2',    array('PHP 9999999 (or later) is required.')),
            array('testAlwaysSkip3',    array('Operating system matching /DOESNOTEXIST/i is required.')),
            array('testAllPossibleRequirements', array(
              'PHP 99-dev (or later) is required.',
              'PHPUnit 9-dev (or later) is required.',
              'Operating system matching /DOESNOTEXIST/i is required.',
              'Function testFuncOne is required.',
              'Function testFuncTwo is required.',
              'Extension testExtOne is required.',
              'Extension testExtTwo is required.',
            )),
        );
    }

    
    public function testGetProvidedDataRegEx()
    {
        $Vv0hyvhlkjqr = preg_match(PHPUnit_Util_Test::REGEX_DATA_PROVIDER, '@dataProvider method', $Virbphhh55ue);
        $this->assertEquals(1, $Vv0hyvhlkjqr);
        $this->assertEquals('method', $Virbphhh55ue[1]);

        $Vv0hyvhlkjqr = preg_match(PHPUnit_Util_Test::REGEX_DATA_PROVIDER, '@dataProvider class::method', $Virbphhh55ue);
        $this->assertEquals(1, $Vv0hyvhlkjqr);
        $this->assertEquals('class::method', $Virbphhh55ue[1]);

        $Vv0hyvhlkjqr = preg_match(PHPUnit_Util_Test::REGEX_DATA_PROVIDER, '@dataProvider namespace\class::method', $Virbphhh55ue);
        $this->assertEquals(1, $Vv0hyvhlkjqr);
        $this->assertEquals('namespace\class::method', $Virbphhh55ue[1]);

        $Vv0hyvhlkjqr = preg_match(PHPUnit_Util_Test::REGEX_DATA_PROVIDER, '@dataProvider namespace\namespace\class::method', $Virbphhh55ue);
        $this->assertEquals(1, $Vv0hyvhlkjqr);
        $this->assertEquals('namespace\namespace\class::method', $Virbphhh55ue[1]);

        $Vv0hyvhlkjqr = preg_match(PHPUnit_Util_Test::REGEX_DATA_PROVIDER, '@dataProvider メソッド', $Virbphhh55ue);
        $this->assertEquals(1, $Vv0hyvhlkjqr);
        $this->assertEquals('メソッド', $Virbphhh55ue[1]);
    }

    
    public function testTestWithEmptyAnnotation()
    {
        $Vv0hyvhlkjqr = PHPUnit_Util_Test::getDataFromTestWithAnnotation("/**\n * @anotherAnnotation\n */");
        $this->assertNull($Vv0hyvhlkjqr);
    }

    
    public function testTestWithSimpleCase()
    {
        $Vv0hyvhlkjqr = PHPUnit_Util_Test::getDataFromTestWithAnnotation('/**
                                                                     * @testWith [1]
                                                                     */');
        $this->assertEquals(array(array(1)), $Vv0hyvhlkjqr);
    }

    
    public function testTestWithMultiLineMultiParameterCase()
    {
        $Vv0hyvhlkjqr = PHPUnit_Util_Test::getDataFromTestWithAnnotation('/**
                                                                     * @testWith [1, 2]
                                                                     * [3, 4]
                                                                     */');
        $this->assertEquals(array(array(1, 2), array(3, 4)), $Vv0hyvhlkjqr);
    }

    
    public function testTestWithVariousTypes()
    {
        $Vv0hyvhlkjqr = PHPUnit_Util_Test::getDataFromTestWithAnnotation('/**
            * @testWith ["ab"]
            *           [true]
            *           [null]
         */');
        $this->assertEquals(array(array('ab'), array(true), array(null)), $Vv0hyvhlkjqr);
    }

    
    public function testTestWithAnnotationAfter()
    {
        $Vv0hyvhlkjqr = PHPUnit_Util_Test::getDataFromTestWithAnnotation('/**
                                                                     * @testWith [1]
                                                                     *           [2]
                                                                     * @annotation
                                                                     */');
        $this->assertEquals(array(array(1), array(2)), $Vv0hyvhlkjqr);
    }

    
    public function testTestWithSimpleTextAfter()
    {
        $Vv0hyvhlkjqr = PHPUnit_Util_Test::getDataFromTestWithAnnotation('/**
                                                                     * @testWith [1]
                                                                     *           [2]
                                                                     * blah blah
                                                                     */');
        $this->assertEquals(array(array(1), array(2)), $Vv0hyvhlkjqr);
    }

    
    public function testTestWithCharacterEscape()
    {
        $Vv0hyvhlkjqr = PHPUnit_Util_Test::getDataFromTestWithAnnotation('/**
                                                                     * @testWith ["\"", "\""]
                                                                     */');
        $this->assertEquals(array(array('"', '"')), $Vv0hyvhlkjqr);
    }

    
    public function testTestWithThrowsProperExceptionIfDatasetCannotBeParsed()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Exception',
            '/^The dataset for the @testWith annotation cannot be parsed:/'
        );
        PHPUnit_Util_Test::getDataFromTestWithAnnotation('/**
                                                           * @testWith [s]
                                                           */');
    }

    public function testTestWithThrowsProperExceptionIfMultiLineDatasetCannotBeParsed()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Exception',
            '/^The dataset for the @testWith annotation cannot be parsed:/'
        );
        PHPUnit_Util_Test::getDataFromTestWithAnnotation('/**
                                                           * @testWith ["valid"]
                                                           *           [invalid]
                                                           */');
    }

    
    public function testParseAnnotation()
    {
        $this->assertEquals(
            array('Foo', 'ほげ'),
            PHPUnit_Util_Test::getDependencies(get_class($this), 'methodForTestParseAnnotation')
        );
    }

    
    public function methodForTestParseAnnotation()
    {
    }

    
    public function testParseAnnotationThatIsOnlyOneLine()
    {
        $this->assertEquals(
            array('Bar'),
            PHPUnit_Util_Test::getDependencies(get_class($this), 'methodForTestParseAnnotationThatIsOnlyOneLine')
        );
    }

    
    public function methodForTestParseAnnotationThatIsOnlyOneLine()
    {
        
    }

    
    public function testGetLinesToBeCovered($Vpswbntjg3pr, $Vbkt5laoakgf)
    {
        if (strpos($Vpswbntjg3pr, 'Namespace') === 0) {
            $Vwcb1oykhumm = array(
              TEST_FILES_PATH . 'NamespaceCoveredClass.php' => $Vbkt5laoakgf
            );
        } elseif ($Vpswbntjg3pr === 'CoverageNoneTest') {
            $Vwcb1oykhumm = array();
        } elseif ($Vpswbntjg3pr === 'CoverageNothingTest') {
            $Vwcb1oykhumm = false;
        } elseif ($Vpswbntjg3pr === 'CoverageFunctionTest') {
            $Vwcb1oykhumm = array(
              TEST_FILES_PATH . 'CoveredFunction.php' => $Vbkt5laoakgf
            );
        } else {
            $Vwcb1oykhumm = array(TEST_FILES_PATH . 'CoveredClass.php' => $Vbkt5laoakgf);
        }

        $this->assertEquals(
            $Vwcb1oykhumm,
            PHPUnit_Util_Test::getLinesToBeCovered(
                $Vpswbntjg3pr, 'testSomething'
            )
        );
    }

    
    public function testGetLinesToBeCovered2()
    {
        PHPUnit_Util_Test::getLinesToBeCovered(
            'NotExistingCoveredElementTest', 'testOne'
        );
    }

    
    public function testGetLinesToBeCovered3()
    {
        PHPUnit_Util_Test::getLinesToBeCovered(
            'NotExistingCoveredElementTest', 'testTwo'
        );
    }

    
    public function testGetLinesToBeCovered4()
    {
        PHPUnit_Util_Test::getLinesToBeCovered(
            'NotExistingCoveredElementTest', 'testThree'
        );
    }

    
    public function testGetLinesToBeCoveredSkipsNonExistentMethods()
    {
        $this->assertSame(
            array(),
            PHPUnit_Util_Test::getLinesToBeCovered(
                'NotExistingCoveredElementTest',
                'methodDoesNotExist'
            )
        );
    }

    
    public function testTwoCoversDefaultClassAnnoationsAreNotAllowed()
    {
        PHPUnit_Util_Test::getLinesToBeCovered(
            'CoverageTwoDefaultClassAnnotations',
            'testSomething'
        );
    }

    
    public function testFunctionParenthesesAreAllowed()
    {
        $this->assertSame(
            array(TEST_FILES_PATH . 'CoveredFunction.php' => range(2, 4)),
            PHPUnit_Util_Test::getLinesToBeCovered(
                'CoverageFunctionParenthesesTest',
                'testSomething'
            )
        );
    }

    
    public function testFunctionParenthesesAreAllowedWithWhitespace()
    {
        $this->assertSame(
            array(TEST_FILES_PATH . 'CoveredFunction.php' => range(2, 4)),
            PHPUnit_Util_Test::getLinesToBeCovered(
                'CoverageFunctionParenthesesWhitespaceTest',
                'testSomething'
            )
        );
    }

    
    public function testMethodParenthesesAreAllowed()
    {
        $this->assertSame(
            array(TEST_FILES_PATH . 'CoveredClass.php' => range(31, 35)),
            PHPUnit_Util_Test::getLinesToBeCovered(
                'CoverageMethodParenthesesTest',
                'testSomething'
            )
        );
    }

    
    public function testMethodParenthesesAreAllowedWithWhitespace()
    {
        $this->assertSame(
            array(TEST_FILES_PATH . 'CoveredClass.php' => range(31, 35)),
            PHPUnit_Util_Test::getLinesToBeCovered(
                'CoverageMethodParenthesesWhitespaceTest',
                'testSomething'
            )
        );
    }

    
    public function testNamespacedFunctionCanBeCoveredOrUsed()
    {
        $this->assertEquals(
            array(
                TEST_FILES_PATH . 'NamespaceCoveredFunction.php' => range(4, 7)
            ),
            PHPUnit_Util_Test::getLinesToBeCovered(
                'CoverageNamespacedFunctionTest',
                'testFunc'
            )
        );
    }

    public function getLinesToBeCoveredProvider()
    {
        return array(
          array(
            'CoverageNoneTest',
            array()
          ),
          array(
            'CoverageClassExtendedTest',
            array_merge(range(19, 36), range(2, 17))
          ),
          array(
            'CoverageClassTest',
            range(19, 36)
          ),
          array(
            'CoverageMethodTest',
            range(31, 35)
          ),
          array(
            'CoverageMethodOneLineAnnotationTest',
            range(31, 35)
          ),
          array(
            'CoverageNotPrivateTest',
            array_merge(range(25, 29), range(31, 35))
          ),
          array(
            'CoverageNotProtectedTest',
            array_merge(range(21, 23), range(31, 35))
          ),
          array(
            'CoverageNotPublicTest',
            array_merge(range(21, 23), range(25, 29))
          ),
          array(
            'CoveragePrivateTest',
            range(21, 23)
          ),
          array(
            'CoverageProtectedTest',
            range(25, 29)
          ),
          array(
            'CoveragePublicTest',
            range(31, 35)
          ),
          array(
            'CoverageFunctionTest',
            range(2, 4)
          ),
          array(
            'NamespaceCoverageClassExtendedTest',
            array_merge(range(21, 38), range(4, 19))
          ),
          array(
            'NamespaceCoverageClassTest',
            range(21, 38)
          ),
          array(
            'NamespaceCoverageMethodTest',
            range(33, 37)
          ),
          array(
            'NamespaceCoverageNotPrivateTest',
            array_merge(range(27, 31), range(33, 37))
          ),
          array(
            'NamespaceCoverageNotProtectedTest',
            array_merge(range(23, 25), range(33, 37))
          ),
          array(
            'NamespaceCoverageNotPublicTest',
            array_merge(range(23, 25), range(27, 31))
          ),
          array(
            'NamespaceCoveragePrivateTest',
            range(23, 25)
          ),
          array(
            'NamespaceCoverageProtectedTest',
            range(27, 31)
          ),
          array(
            'NamespaceCoveragePublicTest',
            range(33, 37)
          ),
          array(
            'NamespaceCoverageCoversClassTest',
            array_merge(range(23, 25), range(27, 31), range(33, 37), range(6, 8), range(10, 13), range(15, 18))
          ),
          array(
            'NamespaceCoverageCoversClassPublicTest',
            range(33, 37)
          ),
          array(
            'CoverageNothingTest',
            false
          )
        );
    }
}
