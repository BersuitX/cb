<?php

class Framework_MockObject_Invocation_ObjectTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorRequiresClassAndMethodAndParametersAndObject()
    {
        new PHPUnit_Framework_MockObject_Invocation_Object(
            'FooClass',
            'FooMethod',
            array('an_argument'),
        new StdClass
        );
    }

    public function testAllowToGetClassNameSetInConstructor()
    {
        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Object(
            'FooClass',
            'FooMethod',
            array('an_argument'),
            new StdClass
        );

        $this->assertSame('FooClass', $Vplre42uzidm->className);
    }

    public function testAllowToGetMethodNameSetInConstructor()
    {
        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Object(
            'FooClass',
            'FooMethod',
            array('an_argument'),
            new StdClass
        );

        $this->assertSame('FooMethod', $Vplre42uzidm->methodName);
    }

    public function testAllowToGetObjectSetInConstructor()
    {
        $Vbschnqcsflq = new StdClass;

        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Object(
            'FooClass',
            'FooMethod',
            array('an_argument'),
            $Vbschnqcsflq
        );

        $this->assertSame($Vbschnqcsflq, $Vplre42uzidm->object);
    }

    public function testAllowToGetMethodParametersSetInConstructor()
    {
        $Vddls3ptciwm = array(
          'foo', 5, array('a', 'b'), new StdClass, null, false
        );

        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Object(
            'FooClass',
            'FooMethod',
            $Vddls3ptciwm,
            new StdClass
        );

        $this->assertSame($Vddls3ptciwm, $Vplre42uzidm->parameters);
    }

    public function testConstructorAllowToSetFlagCloneObjectsInParameters()
    {
        $Vsazp03zrvte   = array(new StdClass);
        $V1ippfyakgbc = true;

        $Vplre42uzidm = new PHPUnit_Framework_MockObject_Invocation_Object(
            'FooClass',
            'FooMethod',
            $Vsazp03zrvte,
            new StdClass,
            $V1ippfyakgbc
        );

        $this->assertEquals($Vsazp03zrvte, $Vplre42uzidm->parameters);
        $this->assertNotSame($Vsazp03zrvte, $Vplre42uzidm->parameters);
    }
}
