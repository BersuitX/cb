<?php


namespace Doctrine\Instantiator\Exception;

use Exception;
use ReflectionClass;
use UnexpectedValueException as BaseUnexpectedValueException;


class UnexpectedValueException extends BaseUnexpectedValueException implements ExceptionInterface
{
    
    public static function fromSerializationTriggeredException(ReflectionClass $Vpjgfkf3ydiv, Exception $Vzzme31ixifp)
    {
        return new self(
            sprintf(
                'An exception was raised while trying to instantiate an instance of "%s" via un-serialization',
                $Vpjgfkf3ydiv->getName()
            ),
            0,
            $Vzzme31ixifp
        );
    }

    
    public static function fromUncleanUnSerialization(
        ReflectionClass $Vpjgfkf3ydiv,
        $Vcwntrfm1523,
        $Vcsod34zqeq0,
        $Vacq34tetxf4,
        $Vshcgf0v2hyr
    ) {
        return new self(
            sprintf(
                'Could not produce an instance of "%s" via un-serialization, since an error was triggered '
                . 'in file "%s" at line "%d"',
                $Vpjgfkf3ydiv->getName(),
                $Vacq34tetxf4,
                $Vshcgf0v2hyr
            ),
            0,
            new Exception($Vcwntrfm1523, $Vcsod34zqeq0)
        );
    }
}
