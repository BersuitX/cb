<?php
class Framework_MockObject_GeneratorTest extends PHPUnit_Framework_TestCase
{
    
    protected $Vi5uqhlkbfzi;

    protected function setUp()
    {
        $this->generator = new PHPUnit_Framework_MockObject_Generator;
    }

    
    public function testGetMockFailsWhenInvalidFunctionNameIsPassedInAsAFunctionToMock()
    {
        $this->generator->getMock('StdClass', array(0));
    }

    
    public function testGetMockCanCreateNonExistingFunctions()
    {
        $Va4elnpuniwh = $this->generator->getMock('StdClass', array('testFunction'));
        $this->assertTrue(method_exists($Va4elnpuniwh, 'testFunction'));
    }

    
    public function testGetMockGeneratorFails()
    {
        $Va4elnpuniwh = $this->generator->getMock('StdClass', array('foo', 'foo'));
    }

    
    public function testGetMockForAbstractClassDoesNotFailWhenFakingInterfaces()
    {
        $Va4elnpuniwh = $this->generator->getMockForAbstractClass('Countable');
        $this->assertTrue(method_exists($Va4elnpuniwh, 'count'));
    }

    
    public function testGetMockForAbstractClassStubbingAbstractClass()
    {
        $Va4elnpuniwh = $this->generator->getMockForAbstractClass('AbstractMockTestClass');
        $this->assertTrue(method_exists($Va4elnpuniwh, 'doSomething'));
    }

    
    public function testGetMockForAbstractClassWithNonExistentMethods()
    {
        $Va4elnpuniwh = $this->generator->getMockForAbstractClass(
            'AbstractMockTestClass',
            array(),
            '',
            true,
            true,
            true,
            array('nonexistentMethod')
        );

        $this->assertTrue(method_exists($Va4elnpuniwh, 'nonexistentMethod'));
        $this->assertTrue(method_exists($Va4elnpuniwh, 'doSomething'));
    }

    
    public function testGetMockForAbstractClassShouldCreateStubsOnlyForAbstractMethodWhenNoMethodsWereInformed()
    {
        $Va4elnpuniwh = $this->generator->getMockForAbstractClass('AbstractMockTestClass');

        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->willReturn('testing');

        $this->assertEquals('testing', $Va4elnpuniwh->doSomething());
        $this->assertEquals(1, $Va4elnpuniwh->returnAnything());
    }

    
    public function testGetMockForAbstractClassExpectingInvalidArgumentException($Vh0iae5cev4i, $Va4elnpuniwhClassName)
    {
        $Va4elnpuniwh = $this->generator->getMockForAbstractClass($Vh0iae5cev4i, array(), $Va4elnpuniwhClassName);
    }

    
    public function testGetMockForAbstractClassAbstractClassDoesNotExist()
    {
        $Va4elnpuniwh = $this->generator->getMockForAbstractClass('Tux');
    }

    
    public static function getMockForAbstractClassExpectsInvalidArgumentExceptionDataprovider()
    {
        return array(
            'className not a string' => array(array(), ''),
            'mockClassName not a string' => array('Countable', new StdClass),
        );
    }

    
    public function testGetMockForTraitWithNonExistentMethodsAndNonAbstractMethods()
    {
        $Va4elnpuniwh = $this->generator->getMockForTrait(
            'AbstractTrait',
            array(),
            '',
            true,
            true,
            true,
            array('nonexistentMethod')
        );

        $this->assertTrue(method_exists($Va4elnpuniwh, 'nonexistentMethod'));
        $this->assertTrue(method_exists($Va4elnpuniwh, 'doSomething'));
        $this->assertTrue($Va4elnpuniwh->mockableMethod());
        $this->assertTrue($Va4elnpuniwh->anotherMockableMethod());
    }

    
    public function testGetMockForTraitStubbingAbstractMethod()
    {
        $Va4elnpuniwh = $this->generator->getMockForTrait('AbstractTrait');
        $this->assertTrue(method_exists($Va4elnpuniwh, 'doSomething'));
    }

    
    public function testGetMockForSingletonWithReflectionSuccess()
    {
        
        require_once __DIR__ . '/_fixture/SingletonClass.php';

        $Va4elnpuniwh = $this->generator->getMock('SingletonClass', array('doSomething'), array(), '', false);
        $this->assertInstanceOf('SingletonClass', $Va4elnpuniwh);
    }

    
    public function testGetMockForSingletonWithUnserializeFail()
    {
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            $this->markTestSkipped('Only for PHP < 5.4.0');
        }

        $this->setExpectedException('PHPUnit_Framework_MockObject_RuntimeException');

        
        require_once __DIR__ . '/_fixture/SingletonClass.php';

        $Va4elnpuniwh = $this->generator->getMock('SingletonClass', array('doSomething'), array(), '', false);
    }

    
    public function testGetMockForSoapClientReflectionMethodsDuplication()
    {
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            $this->markTestSkipped('Only for PHP < 5.4.0');
        }

        $Va4elnpuniwh = $this->generator->getMock('SoapClient', array(), array(), '', false);
        $this->assertInstanceOf('SoapClient', $Va4elnpuniwh);
    }
}
