<?php


namespace Doctrine\Instantiator;

use Closure;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Doctrine\Instantiator\Exception\UnexpectedValueException;
use Exception;
use ReflectionClass;


final class Instantiator implements InstantiatorInterface
{
    
    const SERIALIZATION_FORMAT_USE_UNSERIALIZER   = 'C';
    const SERIALIZATION_FORMAT_AVOID_UNSERIALIZER = 'O';

    
    private static $Vjoteia50thb = array();

    
    private static $Vol1snwtgiy5 = array();

    
    public function instantiate($Vh0iae5cev4i)
    {
        if (isset(self::$Vol1snwtgiy5[$Vh0iae5cev4i])) {
            return clone self::$Vol1snwtgiy5[$Vh0iae5cev4i];
        }

        if (isset(self::$Vjoteia50thb[$Vh0iae5cev4i])) {
            $Vdnxqjiaf0hs = self::$Vjoteia50thb[$Vh0iae5cev4i];

            return $Vdnxqjiaf0hs();
        }

        return $this->buildAndCacheFromFactory($Vh0iae5cev4i);
    }

    
    private function buildAndCacheFromFactory($Vh0iae5cev4i)
    {
        $Vdnxqjiaf0hs  = self::$Vjoteia50thb[$Vh0iae5cev4i] = $this->buildFactory($Vh0iae5cev4i);
        $Vbikgxmsfl21 = $Vdnxqjiaf0hs();

        if ($this->isSafeToClone(new ReflectionClass($Vbikgxmsfl21))) {
            self::$Vol1snwtgiy5[$Vh0iae5cev4i] = clone $Vbikgxmsfl21;
        }

        return $Vbikgxmsfl21;
    }

    
    private function buildFactory($Vh0iae5cev4i)
    {
        $Vpjgfkf3ydiv = $this->getReflectionClass($Vh0iae5cev4i);

        if ($this->isInstantiableViaReflection($Vpjgfkf3ydiv)) {
            return function () use ($Vpjgfkf3ydiv) {
                return $Vpjgfkf3ydiv->newInstanceWithoutConstructor();
            };
        }

        $V2dtnj0yjmwr = sprintf(
            '%s:%d:"%s":0:{}',
            $this->getSerializationFormat($Vpjgfkf3ydiv),
            strlen($Vh0iae5cev4i),
            $Vh0iae5cev4i
        );

        $this->checkIfUnSerializationIsSupported($Vpjgfkf3ydiv, $V2dtnj0yjmwr);

        return function () use ($V2dtnj0yjmwr) {
            return unserialize($V2dtnj0yjmwr);
        };
    }

    
    private function getReflectionClass($Vh0iae5cev4i)
    {
        if (! class_exists($Vh0iae5cev4i)) {
            throw InvalidArgumentException::fromNonExistingClass($Vh0iae5cev4i);
        }

        $Vjqwoq0sz3ty = new ReflectionClass($Vh0iae5cev4i);

        if ($Vjqwoq0sz3ty->isAbstract()) {
            throw InvalidArgumentException::fromAbstractClass($Vjqwoq0sz3ty);
        }

        return $Vjqwoq0sz3ty;
    }

    
    private function checkIfUnSerializationIsSupported(ReflectionClass $Vpjgfkf3ydiv, $V2dtnj0yjmwr)
    {
        set_error_handler(function ($V5kll1klco0v, $Vbl4yrmdan1y, $Vpu3xl4uhgg5, $Vrwsmtja4f2j) use ($Vpjgfkf3ydiv, & $Vpsm42ro4mkq) {
            $Vpsm42ro4mkq = UnexpectedValueException::fromUncleanUnSerialization(
                $Vpjgfkf3ydiv,
                $Vbl4yrmdan1y,
                $V5kll1klco0v,
                $Vpu3xl4uhgg5,
                $Vrwsmtja4f2j
            );
        });

        $this->attemptInstantiationViaUnSerialization($Vpjgfkf3ydiv, $V2dtnj0yjmwr);

        restore_error_handler();

        if ($Vpsm42ro4mkq) {
            throw $Vpsm42ro4mkq;
        }
    }

    
    private function attemptInstantiationViaUnSerialization(ReflectionClass $Vpjgfkf3ydiv, $V2dtnj0yjmwr)
    {
        try {
            unserialize($V2dtnj0yjmwr);
        } catch (Exception $Vzzme31ixifp) {
            restore_error_handler();

            throw UnexpectedValueException::fromSerializationTriggeredException($Vpjgfkf3ydiv, $Vzzme31ixifp);
        }
    }

    
    private function isInstantiableViaReflection(ReflectionClass $Vpjgfkf3ydiv)
    {
        if (\PHP_VERSION_ID >= 50600) {
            return ! ($this->hasInternalAncestors($Vpjgfkf3ydiv) && $Vpjgfkf3ydiv->isFinal());
        }

        return \PHP_VERSION_ID >= 50400 && ! $this->hasInternalAncestors($Vpjgfkf3ydiv);
    }

    
    private function hasInternalAncestors(ReflectionClass $Vpjgfkf3ydiv)
    {
        do {
            if ($Vpjgfkf3ydiv->isInternal()) {
                return true;
            }
        } while ($Vpjgfkf3ydiv = $Vpjgfkf3ydiv->getParentClass());

        return false;
    }

    
    private function getSerializationFormat(ReflectionClass $Vpjgfkf3ydiv)
    {
        if ($this->isPhpVersionWithBrokenSerializationFormat()
            && $Vpjgfkf3ydiv->implementsInterface('Serializable')
        ) {
            return self::SERIALIZATION_FORMAT_USE_UNSERIALIZER;
        }

        return self::SERIALIZATION_FORMAT_AVOID_UNSERIALIZER;
    }

    
    private function isPhpVersionWithBrokenSerializationFormat()
    {
        return PHP_VERSION_ID === 50429 || PHP_VERSION_ID === 50513;
    }

    
    private function isSafeToClone(ReflectionClass $Vjqwoq0sz3ty)
    {
        if (method_exists($Vjqwoq0sz3ty, 'isCloneable') && ! $Vjqwoq0sz3ty->isCloneable()) {
            return false;
        }

        
        return ! $Vjqwoq0sz3ty->hasMethod('__clone');
    }
}
