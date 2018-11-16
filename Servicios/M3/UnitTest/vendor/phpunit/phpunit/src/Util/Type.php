<?php



class PHPUnit_Util_Type
{
    public static function isType($V31qrja1w0r2)
    {
        return in_array(
            $V31qrja1w0r2,
            array(
            'numeric',
            'integer',
            'int',
            'float',
            'string',
            'boolean',
            'bool',
            'null',
            'array',
            'object',
            'resource',
            'scalar'
            )
        );
    }
}
