<?php



namespace Symfony\Component\Yaml;

use Symfony\Component\Yaml\Exception\ParseException;


class Unescaper
{
    
    const REGEX_ESCAPED_CHARACTER = '\\\\(x[0-9a-fA-F]{2}|u[0-9a-fA-F]{4}|U[0-9a-fA-F]{8}|.)';

    
    public function unescapeSingleQuotedString($Vcptarsq5qe4)
    {
        return str_replace('\'\'', '\'', $Vcptarsq5qe4);
    }

    
    public function unescapeDoubleQuotedString($Vcptarsq5qe4)
    {
        $Vbbxwjhhenxj = function ($Vwetg4hewdr4) {
            return $this->unescapeCharacter($Vwetg4hewdr4[0]);
        };

        
        return preg_replace_callback('/'.self::REGEX_ESCAPED_CHARACTER.'/u', $Vbbxwjhhenxj, $Vcptarsq5qe4);
    }

    
    private function unescapeCharacter($Vcptarsq5qe4)
    {
        switch ($Vcptarsq5qe4[1]) {
            case '0':
                return "\x0";
            case 'a':
                return "\x7";
            case 'b':
                return "\x8";
            case 't':
                return "\t";
            case "\t":
                return "\t";
            case 'n':
                return "\n";
            case 'v':
                return "\xB";
            case 'f':
                return "\xC";
            case 'r':
                return "\r";
            case 'e':
                return "\x1B";
            case ' ':
                return ' ';
            case '"':
                return '"';
            case '/':
                return '/';
            case '\\':
                return '\\';
            case 'N':
                
                return "\xC2\x85";
            case '_':
                
                return "\xC2\xA0";
            case 'L':
                
                return "\xE2\x80\xA8";
            case 'P':
                
                return "\xE2\x80\xA9";
            case 'x':
                return self::utf8chr(hexdec(substr($Vcptarsq5qe4, 2, 2)));
            case 'u':
                return self::utf8chr(hexdec(substr($Vcptarsq5qe4, 2, 4)));
            case 'U':
                return self::utf8chr(hexdec(substr($Vcptarsq5qe4, 2, 8)));
            default:
                throw new ParseException(sprintf('Found unknown escape character "%s".', $Vcptarsq5qe4));
        }
    }

    
    private static function utf8chr($Vibefsvmlpru)
    {
        if (0x80 > $Vibefsvmlpru %= 0x200000) {
            return chr($Vibefsvmlpru);
        }
        if (0x800 > $Vibefsvmlpru) {
            return chr(0xC0 | $Vibefsvmlpru >> 6).chr(0x80 | $Vibefsvmlpru & 0x3F);
        }
        if (0x10000 > $Vibefsvmlpru) {
            return chr(0xE0 | $Vibefsvmlpru >> 12).chr(0x80 | $Vibefsvmlpru >> 6 & 0x3F).chr(0x80 | $Vibefsvmlpru & 0x3F);
        }

        return chr(0xF0 | $Vibefsvmlpru >> 18).chr(0x80 | $Vibefsvmlpru >> 12 & 0x3F).chr(0x80 | $Vibefsvmlpru >> 6 & 0x3F).chr(0x80 | $Vibefsvmlpru & 0x3F);
    }
}
