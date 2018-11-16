<?php
class Issue1351Test extends PHPUnit_Framework_TestCase
{
    protected $Vbikgxmsfl21;

    
    public function testFailurePre()
    {
        $this->instance = new ChildProcessClass1351();
        $this->assertFalse(true, 'Expected failure.');
    }

    public function testFailurePost()
    {
        $this->assertNull($this->instance);
        $this->assertFalse(class_exists('ChildProcessClass1351', false), 'ChildProcessClass1351 is not loaded.');
    }

    
    public function testExceptionPre()
    {
        $this->instance = new ChildProcessClass1351();
        try {
            throw new LogicException('Expected exception.');
        } catch (LogicException $Vpt32vvhspnv) {
            throw new RuntimeException('Expected rethrown exception.', 0, $Vpt32vvhspnv);
        }
    }

    public function testExceptionPost()
    {
        $this->assertNull($this->instance);
        $this->assertFalse(class_exists('ChildProcessClass1351', false), 'ChildProcessClass1351 is not loaded.');
    }

    public function testPhpCoreLanguageException()
    {
        
        
        $V3ck3wwcfspl = new PDO('sqlite::memory:');
        $V3ck3wwcfspl->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $V3ck3wwcfspl->query("DELETE FROM php_wtf WHERE exception_code = 'STRING'");
    }
}
