<?php



namespace Prophecy\Argument\Token;


class AnyValuesToken implements TokenInterface
{
    
    public function scoreArgument($Vlf5kwra10uk)
    {
        return 2;
    }

    
    public function isLast()
    {
        return true;
    }

    
    public function __toString()
    {
        return '* [, ...]';
    }
}
