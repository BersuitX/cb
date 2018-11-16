<?php



namespace Prophecy\Argument\Token;


class StringContainsToken implements TokenInterface
{
    private $Vcptarsq5qe4;

    
    public function __construct($Vcptarsq5qe4)
    {
        $this->value = $Vcptarsq5qe4;
    }

    public function scoreArgument($Vlf5kwra10uk)
    {
        return strpos($Vlf5kwra10uk, $this->value) !== false ? 6 : false;
    }

    
    public function getValue()
    {
        return $this->value;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return sprintf('contains("%s")', $this->value);
    }
}
