<?php


namespace Tebru\AesEncryption\Strategy;


class McryptStrategy extends AesEncryptionStrategy
{
    
    public function createIv()
    {
        return mcrypt_create_iv($this->getIvSize(), MCRYPT_DEV_URANDOM);
    }

    
    public function getIvSize()
    {
        return mcrypt_get_iv_size(self::ENCRYPTION_CIPHER, self::ENCRYPTION_MODE);
    }

    
    public function encryptData($Vqhzkfsafzrc, $Vo2g4sjdrdbg)
    {
        return mcrypt_encrypt(self::ENCRYPTION_CIPHER, $this->getKey(), $Vqhzkfsafzrc, self::ENCRYPTION_MODE, $Vo2g4sjdrdbg);
    }

    
    public function decryptData($Vqhzkfsafzrc, $Vo2g4sjdrdbg)
    {
        return trim(mcrypt_decrypt(self::ENCRYPTION_CIPHER, $this->getKey(), $Vqhzkfsafzrc, self::ENCRYPTION_MODE, $Vo2g4sjdrdbg));
    }
}
