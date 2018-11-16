<?php


if (!defined('TEST_FILES_PATH')) {
    define(
        'TEST_FILES_PATH',
        dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
        '_files' . DIRECTORY_SEPARATOR
    );
}

require_once TEST_FILES_PATH . '../TestCase.php';


class PHP_CodeCoverage_Report_CloverTest extends PHP_CodeCoverage_TestCase
{
    
    public function testCloverForBankAccountTest()
    {
        $Vyorvipo3euk = new PHP_CodeCoverage_Report_Clover;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'BankAccount-clover.xml',
            $Vyorvipo3euk->process($this->getCoverageForBankAccount(), null, 'BankAccount')
        );
    }

    
    public function testCloverForFileWithIgnoredLines()
    {
        $Vyorvipo3euk = new PHP_CodeCoverage_Report_Clover;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'ignored-lines-clover.xml',
            $Vyorvipo3euk->process($this->getCoverageForFileWithIgnoredLines())
        );
    }

    
    public function testCloverForClassWithAnonymousFunction()
    {
        $Vyorvipo3euk = new PHP_CodeCoverage_Report_Clover;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'class-with-anonymous-function-clover.xml',
            $Vyorvipo3euk->process($this->getCoverageForClassWithAnonymousFunction())
        );
    }
}
