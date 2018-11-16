<?php



namespace Prophecy;

use Prophecy\Argument\Token;


class Argument
{
    
    public static function exact($Vcptarsq5qe4)
    {
        return new Token\ExactValueToken($Vcptarsq5qe4);
    }

    
    public static function type($V31qrja1w0r2)
    {
        return new Token\TypeToken($V31qrja1w0r2);
    }

    
    public static function which($Vc1exo5hbki5, $Vcptarsq5qe4)
    {
        return new Token\ObjectStateToken($Vc1exo5hbki5, $Vcptarsq5qe4);
    }

    
    public static function that($Vbbxwjhhenxj)
    {
        return new Token\CallbackToken($Vbbxwjhhenxj);
    }

    
    public static function any()
    {
        return new Token\AnyValueToken;
    }

    
    public static function cetera()
    {
        return new Token\AnyValuesToken;
    }

    
    public static function allOf()
    {
        return new Token\LogicalAndToken(func_get_args());
    }

    
    public static function size($Vcptarsq5qe4)
    {
        return new Token\ArrayCountToken($Vcptarsq5qe4);
    }

    
    public static function withEntry($Vlpbz5aloxqt, $Vcptarsq5qe4)
    {
        return new Token\ArrayEntryToken($Vlpbz5aloxqt, $Vcptarsq5qe4);
    }

    
    public static function withEveryEntry($Vcptarsq5qe4)
    {
        return new Token\ArrayEveryEntryToken($Vcptarsq5qe4);
    }

    
    public static function containing($Vcptarsq5qe4)
    {
        return new Token\ArrayEntryToken(self::any(), $Vcptarsq5qe4);
    }

    
    public static function withKey($Vlpbz5aloxqt)
    {
        return new Token\ArrayEntryToken($Vlpbz5aloxqt, self::any());
    }

    
    public static function not($Vcptarsq5qe4)
    {
        return new Token\LogicalNotToken($Vcptarsq5qe4);
    }

    
    public static function containingString($Vcptarsq5qe4)
    {
        return new Token\StringContainsToken($Vcptarsq5qe4);
    }

    
    public static function is($Vcptarsq5qe4)
    {
        return new Token\IdenticalValueToken($Vcptarsq5qe4);
    }

    
    public static function approximate($Vcptarsq5qe4, $V110kpofwxhv = 0)
    {
        return new Token\ApproximateValueToken($Vcptarsq5qe4, $V110kpofwxhv);
    }
}
