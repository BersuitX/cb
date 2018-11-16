<?php
class Framework_MockObject_Matcher_ConsecutiveParametersTest extends PHPUnit_Framework_TestCase
{
    public function testIntegration()
    {
        $Va4elnpuniwh = $this->getMock('stdClass', array('foo'));
        $Va4elnpuniwh
            ->expects($this->any())
            ->method('foo')
            ->withConsecutive(
                array('bar'),
                array(21, 42)
            );
        $Va4elnpuniwh->foo('bar');
        $Va4elnpuniwh->foo(21, 42);
    }

    public function testIntegrationWithLessAssertionsThenMethodCalls()
    {
        $Va4elnpuniwh = $this->getMock('stdClass', array('foo'));
        $Va4elnpuniwh
            ->expects($this->any())
            ->method('foo')
            ->withConsecutive(
                array('bar')
            );
        $Va4elnpuniwh->foo('bar');
        $Va4elnpuniwh->foo(21, 42);
    }

    public function testIntegrationExpectingException()
    {
        $Va4elnpuniwh = $this->getMock('stdClass', array('foo'));
        $Va4elnpuniwh
            ->expects($this->any())
            ->method('foo')
            ->withConsecutive(
                array('bar'),
                array(21, 42)
            );
        $Va4elnpuniwh->foo('bar');
        $this->setExpectedException('PHPUnit_Framework_ExpectationFailedException');
        $Va4elnpuniwh->foo('invalid');
    }
}
