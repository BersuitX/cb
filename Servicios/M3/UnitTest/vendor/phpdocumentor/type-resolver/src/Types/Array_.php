<?php


namespace phpDocumentor\Reflection\Types;

use phpDocumentor\Reflection\Type;


final class Array_ implements Type
{
    
    private $V3gkuaxgsqku;

    
    private $Vsl0pqasewen;

    
    public function __construct(Type $V3gkuaxgsqku = null, Type $Vsl0pqasewen = null)
    {
        if ($Vsl0pqasewen === null) {
            $Vsl0pqasewen = new Compound([ new String_(), new Integer() ]);
        }
        if ($V3gkuaxgsqku === null) {
            $V3gkuaxgsqku = new Mixed();
        }

        $this->valueType = $V3gkuaxgsqku;
        $this->keyType = $Vsl0pqasewen;
    }

    
    public function getKeyType()
    {
        return $this->keyType;
    }

    
    public function getValueType()
    {
        return $this->valueType;
    }

    
    public function __toString()
    {
        if ($this->valueType instanceof Mixed) {
            return 'array';
        }

        return $this->valueType . '[]';
    }
}
