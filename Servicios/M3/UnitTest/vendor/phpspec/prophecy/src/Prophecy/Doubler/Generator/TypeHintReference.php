<?php

namespace Prophecy\Doubler\Generator;


final class TypeHintReference
{
    public function isBuiltInParamTypeHint($V31qrja1w0r2)
    {
        switch ($V31qrja1w0r2) {
            case 'self':
            case 'array':
                return true;

            case 'callable':
                return PHP_VERSION_ID >= 50400;

            case 'bool':
            case 'float':
            case 'int':
            case 'string':
                return PHP_VERSION_ID >= 70000;

            case 'iterable':
                return PHP_VERSION_ID >= 70100;

            case 'object':
                return PHP_VERSION_ID >= 70200;

            default:
                return false;
        }
    }

    public function isBuiltInReturnTypeHint($V31qrja1w0r2)
    {
        if ($V31qrja1w0r2 === 'void') {
            return PHP_VERSION_ID >= 70100;
        }

        return $this->isBuiltInParamTypeHint($V31qrja1w0r2);
    }
}
