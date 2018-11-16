<?php


namespace Tebru\AesEncryption\Strategy;

use Tebru;
use Tebru\AesEncryption\Enum\AesEnum;
use Tebru\AesEncryption\Exception\InvalidNumberOfEncryptionPieces;


abstract class AesEncryptionStrategy
{
    
    const ENCRYPTION_CIPHER = MCRYPT_RIJNDAEL_128;
    const ENCRYPTION_MODE = MCRYPT_MODE_CBC;
    

    
    private $Vlpbz5aloxqt;

    
    private $Vtlfvdwskdge;

    
    public function __construct($Vlpbz5aloxqt, $Vtlfvdwskdge = AesEnum::METHOD_256)
    {
        $this->key = $Vlpbz5aloxqt;
        $this->method = $Vtlfvdwskdge;
    }

    
    abstract public function createIv();

    
    abstract public function getIvSize();

    
    abstract public function encryptData($Vqhzkfsafzrc, $Vo2g4sjdrdbg);

    
    abstract public function decryptData($Vqhzkfsafzrc, $Vo2g4sjdrdbg);

    
    public function encodeData($Vglupe4f3fxb, $Vprz0waeexf0, $Vo2g4sjdrdbg)
    {
        return base64_encode($Vglupe4f3fxb) . '|' . base64_encode($Vprz0waeexf0) . '|' . base64_encode($Vo2g4sjdrdbg);
    }

    
    public function decodeData($Vqhzkfsafzrc)
    {
        $V15fecmmycg2 = explode('|', $Vqhzkfsafzrc);

        Tebru\assert(3 === sizeof($V15fecmmycg2), new InvalidNumberOfEncryptionPieces('Encrypted string has been modified, wrong number of pieces found'));

        return [base64_decode($V15fecmmycg2[0]), base64_decode($V15fecmmycg2[1]), base64_decode($V15fecmmycg2[2])];
    }


    
    public function getMac($Vqhzkfsafzrc)
    {
        return hash_hmac('sha256', $Vqhzkfsafzrc, $this->getKey());
    }

    
    protected function getKey()
    {
        
        $Vfrjid4vr3ci = hash('sha256', $this->key);

        
        $V5ptb0bmdcu1 = hex2bin($Vfrjid4vr3ci);

        
        $Vlpbz5aloxqtSize = AesEnum::getKeySize($this->method);
        $Vlpbz5aloxqt = substr($V5ptb0bmdcu1, 0, $Vlpbz5aloxqtSize);

        return $Vlpbz5aloxqt;
    }

    
    protected function getMethod()
    {
        return $this->method;
    }

}
