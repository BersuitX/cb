<?php


namespace Doctrine\Instantiator\Exception;

use InvalidArgumentException as BaseInvalidArgumentException;
use ReflectionClass;


class InvalidArgumentException extends BaseInvalidArgumentException implements ExceptionInterface
{
    
    public static function fromNonExistingClass($Vh0iae5cev4i)
    {
        if (interface_exists($Vh0iae5cev4i)) {
            return new self(sprintf('The provided type "%s" is an interface, and can not be instantiated', $Vh0iae5cev4i));
        }

        if (PHP_VERSION_ID >= 50400 && trait_exists($Vh0iae5cev4i)) {
            return new self(sprintf('The provided type "%s" is a trait, and can not be instantiated', $Vh0iae5cev4i));
        }

        return new self(sprintf('The provided class "%s" does not exist', $Vh0iae5cev4i));
    }

    
    public static function fromAbstractClass(ReflectionClass $Vpjgfkf3ydiv)
    {
        return new self(sprintf(
            'The provided class "%s" is abstract, and can not be instantiated',
            $Vpjgfkf3ydiv->getName()
        ));
    }
}
