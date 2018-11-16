<?php


namespace phpDocumentor\Reflection\Types;

use phpDocumentor\Reflection\Type;


final class Compound implements Type
{
    
    private $Vdj2jsltudrf;

    
    public function __construct(array $Vdj2jsltudrf)
    {
        foreach ($Vdj2jsltudrf as $V31qrja1w0r2) {
            if (!$V31qrja1w0r2 instanceof Type) {
                throw new \InvalidArgumentException('A compound type can only have other types as elements');
            }
        }

        $this->types = $Vdj2jsltudrf;
    }

    
    public function get($Vojnsu0ourck)
    {
        if (!$this->has($Vojnsu0ourck)) {
            return null;
        }

        return $this->types[$Vojnsu0ourck];
    }

    
    public function has($Vojnsu0ourck)
    {
        return isset($this->types[$Vojnsu0ourck]);
    }

    
    public function __toString()
    {
        return implode('|', $this->types);
    }
}
