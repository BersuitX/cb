<?php


namespace phpDocumentor\Reflection\Types;

use phpDocumentor\Reflection\Type;


final class Nullable implements Type
{
    
    private $Vwjycn1rmekv;

    
    public function __construct(Type $Vwjycn1rmekv)
    {
        $this->realType = $Vwjycn1rmekv;
    }

    
    public function getActualType()
    {
        return $this->realType;
    }

    
    public function __toString()
    {
        return '?' . $this->realType->__toString();
    }
}
