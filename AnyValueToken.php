<?php



namespace Prophecy\Argument\Token;


class AnyValueToken implements TokenInterface
{
    
    public function scoreArgument($Vlf5kwra10uk)
    {
        return 3;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return '*';
    }
}
