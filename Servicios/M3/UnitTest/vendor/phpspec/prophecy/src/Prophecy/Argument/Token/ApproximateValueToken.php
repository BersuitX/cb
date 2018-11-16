<?php



namespace Prophecy\Argument\Token;


class ApproximateValueToken implements TokenInterface
{
    private $Vcptarsq5qe4;
    private $V110kpofwxhv;

    public function __construct($Vcptarsq5qe4, $V110kpofwxhv = 0)
    {
        $this->value = $Vcptarsq5qe4;
        $this->precision = $V110kpofwxhv;
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        return round($Vlf5kwra10uk, $this->precision) === round($this->value, $this->precision) ? 10 : false;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return sprintf('≅%s', round($this->value, $this->precision));
    }
}
