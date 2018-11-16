<?php


namespace phpDocumentor\Reflection\Types;

use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Type;


final class Object_ implements Type
{
    
    private $Vdipqmegdb34;

    
    public function __construct(Fqsen $Vdipqmegdb34 = null)
    {
        if (strpos((string)$Vdipqmegdb34, '::') !== false || strpos((string)$Vdipqmegdb34, '()') !== false) {
            throw new \InvalidArgumentException(
                'Object types can only refer to a class, interface or trait but a method, function, constant or '
                . 'property was received: ' . (string)$Vdipqmegdb34
            );
        }

        $this->fqsen = $Vdipqmegdb34;
    }

    
    public function getFqsen()
    {
        return $this->fqsen;
    }

    
    public function __toString()
    {
        if ($this->fqsen) {
            return (string)$this->fqsen;
        }

        return 'object';
    }
}
