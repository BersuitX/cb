<?php


namespace Tebru\AesEncryption\Strategy;

use Tebru\AesEncryption\Enum\AesEnum;


class OpenSslStrategy extends AesEncryptionStrategy
{

    protected static $Vanijjbptkzf = null;

    public function random_pseudo_bytes($Vxbsqvaghf5p) {

       if (!isset(self::$Vanijjbptkzf)) {
           self::$Vanijjbptkzf = function_exists('openssl_random_pseudo_bytes');
       }

       if (self::$Vanijjbptkzf) {
           return openssl_random_pseudo_bytes($Vxbsqvaghf5p);
       }

       

       $Vapvzh1jsr0n = '';

       for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vxbsqvaghf5p; $Vxja1abp34yq++) {

           $Vhc2ehc10pp2 = hash('sha256', mt_rand());
           $Vmmrcjsrjwsu = mt_rand(0, 30);
           $Vapvzh1jsr0n .= chr(hexdec($Vhc2ehc10pp2[$Vmmrcjsrjwsu].$Vhc2ehc10pp2[$Vmmrcjsrjwsu + 1]));
       }

       return $Vapvzh1jsr0n;
    }

    
    public function createIv()
    {
        return $this->random_pseudo_bytes(16);
    }

    
    public function getIvSize()
    {
        return openssl_cipher_iv_length($this->getEncryptionMethod());
    }

    
    public function encryptData($Vqhzkfsafzrc, $Vxja1abp34yqv)
    {
        return openssl_encrypt($Vqhzkfsafzrc, $this->getEncryptionMethod(), $this->getKey(), true, $Vxja1abp34yqv);
    }

    
    public function decryptData($Vqhzkfsafzrc, $Vxja1abp34yqv)
    {
        return openssl_decrypt($Vqhzkfsafzrc, $this->getEncryptionMethod(), $this->getKey(), true, $Vxja1abp34yqv);
    }

    
    private function getEncryptionMethod()
    {
        $V1glw1pbvebg = AesEnum::getKeySize($this->getMethod()) * 8;

        return 'aes-' . $V1glw1pbvebg . '-' . self::ENCRYPTION_MODE;
    }
}
