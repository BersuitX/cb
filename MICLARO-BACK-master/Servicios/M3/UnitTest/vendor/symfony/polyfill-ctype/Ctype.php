<?php



namespace Symfony\Polyfill\Ctype;


final class Ctype
{
    
    public static function ctype_alnum($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^A-Za-z0-9]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_alpha($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^A-Za-z]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_cntrl($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^\x00-\x1f\x7f]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_digit($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^0-9]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_graph($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^!-~]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_lower($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^a-z]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_print($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^ -~]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_punct($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^!-\/\:-@\[-`\{-~]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_space($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^\s]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_upper($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^A-Z]/', $Vlakcyq2pqgp);
    }

    
    public static function ctype_xdigit($Vlakcyq2pqgp)
    {
        $Vlakcyq2pqgp = self::convert_int_to_char_for_ctype($Vlakcyq2pqgp);

        return \is_string($Vlakcyq2pqgp) && '' !== $Vlakcyq2pqgp && !preg_match('/[^A-Fa-f0-9]/', $Vlakcyq2pqgp);
    }

    
    private static function convert_int_to_char_for_ctype($Vyo1rkvgmvsh)
    {
        if (!\is_int($Vyo1rkvgmvsh)) {
            return $Vyo1rkvgmvsh;
        }

        if ($Vyo1rkvgmvsh < -128 || $Vyo1rkvgmvsh > 255) {
            return (string) $Vyo1rkvgmvsh;
        }

        if ($Vyo1rkvgmvsh < 0) {
            $Vyo1rkvgmvsh += 256;
        }

        return \chr($Vyo1rkvgmvsh);
    }
}
