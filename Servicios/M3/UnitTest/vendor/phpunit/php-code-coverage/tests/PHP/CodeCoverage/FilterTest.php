<?php


if (!defined('TEST_FILES_PATH')) {
    define(
        'TEST_FILES_PATH',
        dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
        '_files' . DIRECTORY_SEPARATOR
    );
}


class PHP_CodeCoverage_FilterTest extends PHPUnit_Framework_TestCase
{
    protected $Vgpt4we0cx0b;
    protected $V5s0rodgwwbv;

    protected function setUp()
    {
        $this->filter = unserialize('O:23:"PHP_CodeCoverage_Filter":0:{}');

        $this->files = array(
            TEST_FILES_PATH . 'BankAccount.php',
            TEST_FILES_PATH . 'BankAccountTest.php',
            TEST_FILES_PATH . 'CoverageClassExtendedTest.php',
            TEST_FILES_PATH . 'CoverageClassTest.php',
            TEST_FILES_PATH . 'CoverageFunctionParenthesesTest.php',
            TEST_FILES_PATH . 'CoverageFunctionParenthesesWhitespaceTest.php',
            TEST_FILES_PATH . 'CoverageFunctionTest.php',
            TEST_FILES_PATH . 'CoverageMethodOneLineAnnotationTest.php',
            TEST_FILES_PATH . 'CoverageMethodParenthesesTest.php',
            TEST_FILES_PATH . 'CoverageMethodParenthesesWhitespaceTest.php',
            TEST_FILES_PATH . 'CoverageMethodTest.php',
            TEST_FILES_PATH . 'CoverageNoneTest.php',
            TEST_FILES_PATH . 'CoverageNotPrivateTest.php',
            TEST_FILES_PATH . 'CoverageNotProtectedTest.php',
            TEST_FILES_PATH . 'CoverageNotPublicTest.php',
            TEST_FILES_PATH . 'CoverageNothingTest.php',
            TEST_FILES_PATH . 'CoveragePrivateTest.php',
            TEST_FILES_PATH . 'CoverageProtectedTest.php',
            TEST_FILES_PATH . 'CoveragePublicTest.php',
            TEST_FILES_PATH . 'CoverageTwoDefaultClassAnnotations.php',
            TEST_FILES_PATH . 'CoveredClass.php',
            TEST_FILES_PATH . 'CoveredFunction.php',
            TEST_FILES_PATH . 'NamespaceCoverageClassExtendedTest.php',
            TEST_FILES_PATH . 'NamespaceCoverageClassTest.php',
            TEST_FILES_PATH . 'NamespaceCoverageCoversClassPublicTest.php',
            TEST_FILES_PATH . 'NamespaceCoverageCoversClassTest.php',
            TEST_FILES_PATH . 'NamespaceCoverageMethodTest.php',
            TEST_FILES_PATH . 'NamespaceCoverageNotPrivateTest.php',
            TEST_FILES_PATH . 'NamespaceCoverageNotProtectedTest.php',
            TEST_FILES_PATH . 'NamespaceCoverageNotPublicTest.php',
            TEST_FILES_PATH . 'NamespaceCoveragePrivateTest.php',
            TEST_FILES_PATH . 'NamespaceCoverageProtectedTest.php',
            TEST_FILES_PATH . 'NamespaceCoveragePublicTest.php',
            TEST_FILES_PATH . 'NamespaceCoveredClass.php',
            TEST_FILES_PATH . 'NotExistingCoveredElementTest.php',
            TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php',
            TEST_FILES_PATH . 'source_with_ignore.php',
            TEST_FILES_PATH . 'source_with_namespace.php',
            TEST_FILES_PATH . 'source_with_oneline_annotations.php',
            TEST_FILES_PATH . 'source_without_ignore.php',
            TEST_FILES_PATH . 'source_without_namespace.php'
        );
    }

    
    public function testAddingAFileToTheBlacklistWorks()
    {
        $this->filter->addFileToBlacklist($this->files[0]);

        $this->assertEquals(
            array($this->files[0]),
            $this->filter->getBlacklist()
        );
    }

    
    public function testRemovingAFileFromTheBlacklistWorks()
    {
        $this->filter->addFileToBlacklist($this->files[0]);
        $this->filter->removeFileFromBlacklist($this->files[0]);

        $this->assertEquals(array(), $this->filter->getBlacklist());
    }

    
    public function testAddingADirectoryToTheBlacklistWorks()
    {
        $this->filter->addDirectoryToBlacklist(TEST_FILES_PATH);

        $Vn54eydon0cr = $this->filter->getBlacklist();
        sort($Vn54eydon0cr);

        $this->assertEquals($this->files, $Vn54eydon0cr);
    }

    
    public function testAddingFilesToTheBlacklistWorks()
    {
        $Vxvtuduzlxzp = new File_Iterator_Facade;
        $V5s0rodgwwbv  = $Vxvtuduzlxzp->getFilesAsArray(
            TEST_FILES_PATH,
            $Vj5tuqhgx1hz = '.php'
        );

        $this->filter->addFilesToBlacklist($V5s0rodgwwbv);

        $Vn54eydon0cr = $this->filter->getBlacklist();
        sort($Vn54eydon0cr);

        $this->assertEquals($this->files, $Vn54eydon0cr);
    }

    
    public function testRemovingADirectoryFromTheBlacklistWorks()
    {
        $this->filter->addDirectoryToBlacklist(TEST_FILES_PATH);
        $this->filter->removeDirectoryFromBlacklist(TEST_FILES_PATH);

        $this->assertEquals(array(), $this->filter->getBlacklist());
    }

    
    public function testAddingAFileToTheWhitelistWorks()
    {
        $this->filter->addFileToWhitelist($this->files[0]);

        $this->assertEquals(
            array($this->files[0]),
            $this->filter->getWhitelist()
        );
    }

    
    public function testRemovingAFileFromTheWhitelistWorks()
    {
        $this->filter->addFileToWhitelist($this->files[0]);
        $this->filter->removeFileFromWhitelist($this->files[0]);

        $this->assertEquals(array(), $this->filter->getWhitelist());
    }

    
    public function testAddingADirectoryToTheWhitelistWorks()
    {
        $this->filter->addDirectoryToWhitelist(TEST_FILES_PATH);

        $Vtmhjqhs32cf = $this->filter->getWhitelist();
        sort($Vtmhjqhs32cf);

        $this->assertEquals($this->files, $Vtmhjqhs32cf);
    }

    
    public function testAddingFilesToTheWhitelistWorks()
    {
        $Vxvtuduzlxzp = new File_Iterator_Facade;
        $V5s0rodgwwbv  = $Vxvtuduzlxzp->getFilesAsArray(
            TEST_FILES_PATH,
            $Vj5tuqhgx1hz = '.php'
        );

        $this->filter->addFilesToWhitelist($V5s0rodgwwbv);

        $Vtmhjqhs32cf = $this->filter->getWhitelist();
        sort($Vtmhjqhs32cf);

        $this->assertEquals($this->files, $Vtmhjqhs32cf);
    }

    
    public function testRemovingADirectoryFromTheWhitelistWorks()
    {
        $this->filter->addDirectoryToWhitelist(TEST_FILES_PATH);
        $this->filter->removeDirectoryFromWhitelist(TEST_FILES_PATH);

        $this->assertEquals(array(), $this->filter->getWhitelist());
    }

    
    public function testIsFile()
    {
        $this->assertFalse($this->filter->isFile('vfs://root/a/path'));
        $this->assertFalse($this->filter->isFile('xdebug://debug-eval'));
        $this->assertFalse($this->filter->isFile('eval()\'d code'));
        $this->assertFalse($this->filter->isFile('runtime-created function'));
        $this->assertFalse($this->filter->isFile('assert code'));
        $this->assertFalse($this->filter->isFile('regexp code'));
        $this->assertTrue($this->filter->isFile(__FILE__));
    }

    
    public function testBlacklistedFileIsFiltered()
    {
        $this->filter->addFileToBlacklist($this->files[0]);
        $this->assertTrue($this->filter->isFiltered($this->files[0]));
    }

    
    public function testWhitelistedFileIsNotFiltered()
    {
        $this->filter->addFileToWhitelist($this->files[0]);
        $this->assertFalse($this->filter->isFiltered($this->files[0]));
    }

    
    public function testNotWhitelistedFileIsFiltered()
    {
        $this->filter->addFileToWhitelist($this->files[0]);
        $this->assertTrue($this->filter->isFiltered($this->files[1]));
    }

    
    public function testNonFilesAreFiltered()
    {
        $this->assertTrue($this->filter->isFiltered('vfs://root/a/path'));
        $this->assertTrue($this->filter->isFiltered('xdebug://debug-eval'));
        $this->assertTrue($this->filter->isFiltered('eval()\'d code'));
        $this->assertTrue($this->filter->isFiltered('runtime-created function'));
        $this->assertTrue($this->filter->isFiltered('assert code'));
        $this->assertTrue($this->filter->isFiltered('regexp code'));
        $this->assertFalse($this->filter->isFiltered(__FILE__));
    }
}
