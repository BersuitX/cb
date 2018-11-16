<?php


namespace Tebru\AesEncryption\Enum;

use Tebru\AesEncryption\Exception\InvalidMethodException;


class AesEnum
{
    const METHOD_128 = 'aes128';
    const METHOD_192 = 'aes192';
    const METHOD_256 = 'aes256';

    
    public static function getKeySize($Vtlfvdwskdge)
    {
        $Vhxszcivnyt2 = self::getKeySizes();
        if (!in_array($Vtlfvdwskdge, array_keys($Vhxszcivnyt2), true)) {
            throw new InvalidMethodException(sprintf('Method "%s" is not a valid AES encryption method', $Vtlfvdwskdge));
        }

        return $Vhxszcivnyt2[$Vtlfvdwskdge];
    }

    
    private static function getKeySizes()
    {
        return [
            self::METHOD_128 => 16,
            self::METHOD_192 => 24,
            self::METHOD_256 => 32,
        ];
    }
}
