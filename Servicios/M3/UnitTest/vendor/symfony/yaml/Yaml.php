<?php



namespace Symfony\Component\Yaml;

use Symfony\Component\Yaml\Exception\ParseException;


class Yaml
{
    const DUMP_OBJECT = 1;
    const PARSE_EXCEPTION_ON_INVALID_TYPE = 2;
    const PARSE_OBJECT = 4;
    const PARSE_OBJECT_FOR_MAP = 8;
    const DUMP_EXCEPTION_ON_INVALID_TYPE = 16;
    const PARSE_DATETIME = 32;
    const DUMP_OBJECT_AS_MAP = 64;
    const DUMP_MULTI_LINE_LITERAL_BLOCK = 128;
    const PARSE_CONSTANT = 256;
    const PARSE_CUSTOM_TAGS = 512;
    const DUMP_EMPTY_ARRAY_AS_SEQUENCE = 1024;

    
    const PARSE_KEYS_AS_STRINGS = 2048;

    
    public static function parseFile($Va3qqb0vgkhy, $Vrycsn2lkvcj = 0)
    {
        $Vklvvq0m52jf = new Parser();

        return $Vklvvq0m52jf->parseFile($Va3qqb0vgkhy, $Vrycsn2lkvcj);
    }

    
    public static function parse($Vioma0xlpppc, $Vrycsn2lkvcj = 0)
    {
        if (is_bool($Vrycsn2lkvcj)) {
            @trigger_error('Passing a boolean flag to toggle exception handling is deprecated since Symfony 3.1 and will be removed in 4.0. Use the PARSE_EXCEPTION_ON_INVALID_TYPE flag instead.', E_USER_DEPRECATED);

            if ($Vrycsn2lkvcj) {
                $Vrycsn2lkvcj = self::PARSE_EXCEPTION_ON_INVALID_TYPE;
            } else {
                $Vrycsn2lkvcj = 0;
            }
        }

        if (func_num_args() >= 3) {
            @trigger_error('Passing a boolean flag to toggle object support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the PARSE_OBJECT flag instead.', E_USER_DEPRECATED);

            if (func_get_arg(2)) {
                $Vrycsn2lkvcj |= self::PARSE_OBJECT;
            }
        }

        if (func_num_args() >= 4) {
            @trigger_error('Passing a boolean flag to toggle object for map support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::PARSE_OBJECT_FOR_MAP flag instead.', E_USER_DEPRECATED);

            if (func_get_arg(3)) {
                $Vrycsn2lkvcj |= self::PARSE_OBJECT_FOR_MAP;
            }
        }

        $Vklvvq0m52jf = new Parser();

        return $Vklvvq0m52jf->parse($Vioma0xlpppc, $Vrycsn2lkvcj);
    }

    
    public static function dump($Vioma0xlpppc, $Vpggj2bp4nlr = 2, $Vrdvd0lwwb1c = 4, $Vrycsn2lkvcj = 0)
    {
        if (is_bool($Vrycsn2lkvcj)) {
            @trigger_error('Passing a boolean flag to toggle exception handling is deprecated since Symfony 3.1 and will be removed in 4.0. Use the DUMP_EXCEPTION_ON_INVALID_TYPE flag instead.', E_USER_DEPRECATED);

            if ($Vrycsn2lkvcj) {
                $Vrycsn2lkvcj = self::DUMP_EXCEPTION_ON_INVALID_TYPE;
            } else {
                $Vrycsn2lkvcj = 0;
            }
        }

        if (func_num_args() >= 5) {
            @trigger_error('Passing a boolean flag to toggle object support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the DUMP_OBJECT flag instead.', E_USER_DEPRECATED);

            if (func_get_arg(4)) {
                $Vrycsn2lkvcj |= self::DUMP_OBJECT;
            }
        }

        $Vklvvq0m52jf = new Dumper($Vrdvd0lwwb1c);

        return $Vklvvq0m52jf->dump($Vioma0xlpppc, $Vpggj2bp4nlr, 0, $Vrycsn2lkvcj);
    }
}
