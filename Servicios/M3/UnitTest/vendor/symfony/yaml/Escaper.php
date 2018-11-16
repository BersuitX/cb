<?php



namespace Symfony\Component\Yaml;


class Escaper
{
    
    const REGEX_CHARACTER_TO_ESCAPE = "[\\x00-\\x1f]|\xc2\x85|\xc2\xa0|\xe2\x80\xa8|\xe2\x80\xa9";

    
    
    
    
    private static $Vfghvr5yn0r3 = array('\\', '\\\\', '\\"', '"',
                                     "\x00",  "\x01",  "\x02",  "\x03",  "\x04",  "\x05",  "\x06",  "\x07",
                                     "\x08",  "\x09",  "\x0a",  "\x0b",  "\x0c",  "\x0d",  "\x0e",  "\x0f",
                                     "\x10",  "\x11",  "\x12",  "\x13",  "\x14",  "\x15",  "\x16",  "\x17",
                                     "\x18",  "\x19",  "\x1a",  "\x1b",  "\x1c",  "\x1d",  "\x1e",  "\x1f",
                                     "\xc2\x85", "\xc2\xa0", "\xe2\x80\xa8", "\xe2\x80\xa9",
                               );
    private static $V1c1xjf2itcs = array('\\\\', '\\"', '\\\\', '\\"',
                                     '\\0',   '\\x01', '\\x02', '\\x03', '\\x04', '\\x05', '\\x06', '\\a',
                                     '\\b',   '\\t',   '\\n',   '\\v',   '\\f',   '\\r',   '\\x0e', '\\x0f',
                                     '\\x10', '\\x11', '\\x12', '\\x13', '\\x14', '\\x15', '\\x16', '\\x17',
                                     '\\x18', '\\x19', '\\x1a', '\\e',   '\\x1c', '\\x1d', '\\x1e', '\\x1f',
                                     '\\N', '\\_', '\\L', '\\P',
                              );

    
    public static function requiresDoubleQuoting($Vcptarsq5qe4)
    {
        return 0 < preg_match('/'.self::REGEX_CHARACTER_TO_ESCAPE.'/u', $Vcptarsq5qe4);
    }

    
    public static function escapeWithDoubleQuotes($Vcptarsq5qe4)
    {
        return sprintf('"%s"', str_replace(self::$Vfghvr5yn0r3, self::$V1c1xjf2itcs, $Vcptarsq5qe4));
    }

    
    public static function requiresSingleQuoting($Vcptarsq5qe4)
    {
        
        
        if (in_array(strtolower($Vcptarsq5qe4), array('null', '~', 'true', 'false', 'y', 'n', 'yes', 'no', 'on', 'off'))) {
            return true;
        }

        
        
        return 0 < preg_match('/[ \s \' " \: \{ \} \[ \] , & \* \# \?] | \A[ \- ? | < > = ! % @ ` ]/x', $Vcptarsq5qe4);
    }

    
    public static function escapeWithSingleQuotes($Vcptarsq5qe4)
    {
        return sprintf("'%s'", str_replace('\'', '\'\'', $Vcptarsq5qe4));
    }
}
