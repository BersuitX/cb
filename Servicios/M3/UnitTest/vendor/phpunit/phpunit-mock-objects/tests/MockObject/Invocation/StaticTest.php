<?php

class Framework_MockObject_Invocation_StaticTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorRequiresClassAndMethodAndParameters()
    {
        new PHPUnit_Framework_MockObject_Invocation_Static('FooClass', 'FooMethod', array('an_argument'));
    }

    public function testAllowToGetClassNameSetInConstructor()
    {
        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Static('FooClass', 'FooMethod', array('an_argument'));

        $this->assertSame('FooClass', $Vplre42uzidm->className);
    }

    public function testAllowToGetMethodNameSetInConstructor()
    {
        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Static('FooClass', 'FooMethod', array('an_argument'));

        $this->assertSame('FooMethod', $Vplre42uzidm->methodName);
    }

    public function testAllowToGetMethodParametersSetInConstructor()
    {
        $Vddls3ptciwm = array(
          'foo', 5, array('a', 'b'), new StdClass, null, false
        );

        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Static(
            'FooClass',
            'FooMethod',
            $Vddls3ptciwm
        );

        $this->assertSame($Vddls3ptciwm, $Vplre42uzidm->parameters);
    }

    public function testConstructorAllowToSetFlagCloneObjectsInParameters()
    {
        $Vsazp03zrvte = array(new StdClass);
        $V1ippfyakgbc = true;

        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Static(
            'FooClass',
            'FooMethod',
            $Vsazp03zrvte,
            $V1ippfyakgbc
        );

        $this->assertEquals($Vsazp03zrvte, $Vplre42uzidm->parameters);
        $this->assertNotSame($Vsazp03zrvte, $Vplre42uzidm->parameters);
    }
}
