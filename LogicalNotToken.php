<?php



namespace Prophecy\Argument\Token;


class LogicalNotToken implements TokenInterface
{
    
    private $Vx5bl5ubgnhj;

    
    public function __construct($Vcptarsq5qe4)
    {
        $this->token = $Vcptarsq5qe4 instanceof TokenInterface? $Vcptarsq5qe4 : new ExactValueToken($Vcptarsq5qe4);
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        return false === $this->token->scoreArgument($Vlf5kwra10uk) ? 4 : false;
    }

    
    public function isLast()
    {
        return $this->token->isLast();
    }

    
    public function getOriginatingToken()
    {
        return $this->token;
    }

    
    public function __toString()
    {
        return sprintf('not(%s)', $this->token);
    }
}
