<?php



class Framework_MockBuilderTest extends PHPUnit_Framework_TestCase
{
    public function testMockBuilderRequiresClassName()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $this->assertTrue($Va4elnpuniwh instanceof Mockable);
    }

    public function testByDefaultMocksAllMethods()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $this->assertNull($Va4elnpuniwh->mockableMethod());
        $this->assertNull($Va4elnpuniwh->anotherMockableMethod());
    }

    public function testMethodsToMockCanBeSpecified()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Viqcp1vwbksl->setMethods(array('mockableMethod'));
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $this->assertNull($Va4elnpuniwh->mockableMethod());
        $this->assertTrue($Va4elnpuniwh->anotherMockableMethod());
    }

    public function testByDefaultDoesNotPassArgumentsToTheConstructor()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $this->assertEquals(array(null, null), $Va4elnpuniwh->constructorArgs);
    }

    public function testMockClassNameCanBeSpecified()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Viqcp1vwbksl->setMockClassName('ACustomClassName');
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $this->assertTrue($Va4elnpuniwh instanceof ACustomClassName);
    }

    public function testConstructorArgumentsCanBeSpecified()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Viqcp1vwbksl->setConstructorArgs($Vwcb1oykhumm = array(23, 42));
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $this->assertEquals($Vwcb1oykhumm, $Va4elnpuniwh->constructorArgs);
    }

    public function testOriginalConstructorCanBeDisabled()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Viqcp1vwbksl->disableOriginalConstructor();
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $this->assertNull($Va4elnpuniwh->constructorArgs);
    }

    public function testByDefaultOriginalCloneIsPreserved()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $Vher5afl5h02 = clone $Va4elnpuniwh;
        $this->assertTrue($Vher5afl5h02->cloned);
    }

    public function testOriginalCloneCanBeDisabled()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable');
        $Viqcp1vwbksl->disableOriginalClone();
        $Va4elnpuniwh = $Viqcp1vwbksl->getMock();
        $Va4elnpuniwh->cloned = false;
        $Vher5afl5h02 = clone $Va4elnpuniwh;
        $this->assertFalse($Vher5afl5h02->cloned);
    }

    public function testCallingAutoloadCanBeDisabled()
    {
        
        
        $this->markTestIncomplete();
    }

    public function testProvidesAFluentInterface()
    {
        $Viqcp1vwbksl = $this->getMockBuilder('Mockable')
                     ->setMethods(array('mockableMethod'))
                     ->setConstructorArgs(array())
                     ->setMockClassName('DummyClassName')
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->disableAutoload();
        $this->assertTrue($Viqcp1vwbksl instanceof PHPUnit_Framework_MockObject_MockBuilder);
    }
}
