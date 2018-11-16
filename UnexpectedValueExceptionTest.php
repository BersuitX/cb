<?php


namespace DoctrineTest\InstantiatorTest\Exception;

use Doctrine\Instantiator\Exception\UnexpectedValueException;
use Exception;
use PHPUnit_Framework_TestCase;
use ReflectionClass;


class UnexpectedValueExceptionTest extends PHPUnit_Framework_TestCase
{
    public function testFromSerializationTriggeredException()
    {
        $Vpjgfkf3ydiv = new ReflectionClass($this);
        $Vvnhp4yqbunj        = new Exception();
        $Vzzme31ixifp       = UnexpectedValueException::fromSerializationTriggeredException($Vpjgfkf3ydiv, $Vvnhp4yqbunj);

        $this->assertInstanceOf('Doctrine\\Instantiator\\Exception\\UnexpectedValueException', $Vzzme31ixifp);
        $this->assertSame($Vvnhp4yqbunj, $Vzzme31ixifp->getPrevious());
        $this->assertSame(
            'An exception was raised while trying to instantiate an instance of "'
            . __CLASS__  . '" via un-serialization',
            $Vzzme31ixifp->getMessage()
        );
    }

    public function testFromUncleanUnSerialization()
    {
        $Vjqwoq0sz3ty = new ReflectionClass('DoctrineTest\\InstantiatorTestAsset\\AbstractClassAsset');
        $Vzzme31ixifp  = UnexpectedValueException::fromUncleanUnSerialization($Vjqwoq0sz3ty, 'foo', 123, 'bar', 456);

        $this->assertInstanceOf('Doctrine\\Instantiator\\Exception\\UnexpectedValueException', $Vzzme31ixifp);
        $this->assertSame(
            'Could not produce an instance of "DoctrineTest\\InstantiatorTestAsset\\AbstractClassAsset" '
            . 'via un-serialization, since an error was triggered in file "bar" at line "456"',
            $Vzzme31ixifp->getMessage()
        );

        $Vvnhp4yqbunj = $Vzzme31ixifp->getPrevious();

        $this->assertInstanceOf('Exception', $Vvnhp4yqbunj);
        $this->assertSame('foo', $Vvnhp4yqbunj->getMessage());
        $this->assertSame(123, $Vvnhp4yqbunj->getCode());
    }
}
