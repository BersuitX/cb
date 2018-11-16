<?php


namespace DoctrineTest\InstantiatorTest\Exception;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use PHPUnit_Framework_TestCase;
use ReflectionClass;


class InvalidArgumentExceptionTest extends PHPUnit_Framework_TestCase
{
    public function testFromNonExistingTypeWithNonExistingClass()
    {
        $Vh0iae5cev4i = __CLASS__ . uniqid();
        $Vzzme31ixifp = InvalidArgumentException::fromNonExistingClass($Vh0iae5cev4i);

        $this->assertInstanceOf('Doctrine\\Instantiator\\Exception\\InvalidArgumentException', $Vzzme31ixifp);
        $this->assertSame('The provided class "' . $Vh0iae5cev4i . '" does not exist', $Vzzme31ixifp->getMessage());
    }

    public function testFromNonExistingTypeWithTrait()
    {
        if (PHP_VERSION_ID < 50400) {
            $this->markTestSkipped('Need at least PHP 5.4.0, as this test requires traits support to run');
        }

        $Vzzme31ixifp = InvalidArgumentException::fromNonExistingClass(
            'DoctrineTest\\InstantiatorTestAsset\\SimpleTraitAsset'
        );

        $this->assertSame(
            'The provided type "DoctrineTest\\InstantiatorTestAsset\\SimpleTraitAsset" is a trait, '
            . 'and can not be instantiated',
            $Vzzme31ixifp->getMessage()
        );
    }

    public function testFromNonExistingTypeWithInterface()
    {
        $Vzzme31ixifp = InvalidArgumentException::fromNonExistingClass('Doctrine\\Instantiator\\InstantiatorInterface');

        $this->assertSame(
            'The provided type "Doctrine\\Instantiator\\InstantiatorInterface" is an interface, '
            . 'and can not be instantiated',
            $Vzzme31ixifp->getMessage()
        );
    }

    public function testFromAbstractClass()
    {
        $Vjqwoq0sz3ty = new ReflectionClass('DoctrineTest\\InstantiatorTestAsset\\AbstractClassAsset');
        $Vzzme31ixifp  = InvalidArgumentException::fromAbstractClass($Vjqwoq0sz3ty);

        $this->assertSame(
            'The provided class "DoctrineTest\\InstantiatorTestAsset\\AbstractClassAsset" is abstract, '
            . 'and can not be instantiated',
            $Vzzme31ixifp->getMessage()
        );
    }
}
