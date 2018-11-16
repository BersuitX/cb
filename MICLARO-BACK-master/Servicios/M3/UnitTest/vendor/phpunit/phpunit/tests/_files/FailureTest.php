<?php
class FailureTest extends PHPUnit_Framework_TestCase
{
    public function testAssertArrayEqualsArray()
    {
        $this->assertEquals(array(1), array(2), 'message');
    }

    public function testAssertIntegerEqualsInteger()
    {
        $this->assertEquals(1, 2, 'message');
    }

    public function testAssertObjectEqualsObject()
    {
        $Vmbzc5xgwrgo      = new StdClass;
        $Vmbzc5xgwrgo->foo = 'bar';

        $Vglk1nbl1t2o      = new StdClass;
        $Vglk1nbl1t2o->bar = 'foo';

        $this->assertEquals($Vmbzc5xgwrgo, $Vglk1nbl1t2o, 'message');
    }

    public function testAssertNullEqualsString()
    {
        $this->assertEquals(null, 'bar', 'message');
    }

    public function testAssertStringEqualsString()
    {
        $this->assertEquals('foo', 'bar', 'message');
    }

    public function testAssertTextEqualsText()
    {
        $this->assertEquals("foo\nbar\n", "foo\nbaz\n", 'message');
    }

    public function testAssertStringMatchesFormat()
    {
        $this->assertStringMatchesFormat('*%s*', '**', 'message');
    }

    public function testAssertNumericEqualsNumeric()
    {
        $this->assertEquals(1, 2, 'message');
    }

    public function testAssertTextSameText()
    {
        $this->assertSame('foo', 'bar', 'message');
    }

    public function testAssertObjectSameObject()
    {
        $this->assertSame(new StdClass, new StdClass, 'message');
    }

    public function testAssertObjectSameNull()
    {
        $this->assertSame(new StdClass, null, 'message');
    }

    public function testAssertFloatSameFloat()
    {
        $this->assertSame(1.0, 1.5, 'message');
    }

    
    public function testAssertStringMatchesFormatFile()
    {
        $this->assertStringMatchesFormatFile(__DIR__ . '/expectedFileFormat.txt', '...BAR...');
    }
}
