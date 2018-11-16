<?php



namespace Prophecy\Argument\Token;



class ArrayCountToken implements TokenInterface
{
    private $Vdbkece3gnp5;

    
    public function __construct($Vcptarsq5qe4)
    {
        $this->count = $Vcptarsq5qe4;
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        return $this->isCountable($Vlf5kwra10uk) && $this->hasProperCount($Vlf5kwra10uk) ? 6 : false;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return sprintf('count(%s)', $this->count);
    }

    
    private function isCountable($Vlf5kwra10uk)
    {
        return (is_array($Vlf5kwra10uk) || $Vlf5kwra10uk instanceof \Countable);
    }

    
    private function hasProperCount($Vlf5kwra10uk)
    {
        return $this->count === count($Vlf5kwra10uk);
    }
}
