<?php



class PHP_Token_Stream_CachingFactory
{
    
    protected static $Vzwp15rts0pz = array();

    
    public static function get($Va3qqb0vgkhy)
    {
        if (!isset(self::$Vzwp15rts0pz[$Va3qqb0vgkhy])) {
            self::$Vzwp15rts0pz[$Va3qqb0vgkhy] = new PHP_Token_Stream($Va3qqb0vgkhy);
        }

        return self::$Vzwp15rts0pz[$Va3qqb0vgkhy];
    }

    
    public static function clear($Va3qqb0vgkhy = null)
    {
        if (is_string($Va3qqb0vgkhy)) {
            unset(self::$Vzwp15rts0pz[$Va3qqb0vgkhy]);
        } else {
            self::$Vzwp15rts0pz = array();
        }
    }
}
