<?php


namespace Tebru\AesEncryption;

use Tebru;
use Tebru\AesEncryption\Enum\AesEnum;
use Tebru\AesEncryption\Exception\IvSizeMismatchException;
use Tebru\AesEncryption\Exception\MacHashMismatchException;
use Tebru\AesEncryption\Strategy\AesEncryptionStrategy;
use Tebru\AesEncryption\Strategy\McryptStrategy;
use Tebru\AesEncryption\Strategy\OpenSslStrategy;


class AesEncrypter
{
    const STRATEGY_OPENSSL = 'openssl';
    const STRATEGY_MCRYPT = 'mcrypt';

    
    private $Vebeqgh3fepe;

    
    public function __construct($Vlpbz5aloxqt, $Vtlfvdwskdge = AesEnum::METHOD_256, $Vebeqgh3fepe = null)
    {
        if (null === $Vebeqgh3fepe) {
            
            $Vebeqgh3fepe = (function_exists('openssl_encrypt'))
                ? new OpenSslStrategy($Vlpbz5aloxqt, $Vtlfvdwskdge)
                : new McryptStrategy($Vlpbz5aloxqt, $Vtlfvdwskdge);
        } else {
            $Vebeqgh3fepe = (self::STRATEGY_OPENSSL === $Vebeqgh3fepe)
                ? new OpenSslStrategy($Vlpbz5aloxqt, $Vtlfvdwskdge)
                : new McryptStrategy($Vlpbz5aloxqt, $Vtlfvdwskdge);
        }

        $this->strategy = $Vebeqgh3fepe;
    }

    
    public function encrypt($Vqhzkfsafzrc)
    {
        $Vvuducfvgz1l = serialize($Vqhzkfsafzrc);
        $Vo2g4sjdrdbg = $this->strategy->createIv();
        $Vgmdornk5lyh = $this->strategy->encryptData($Vvuducfvgz1l, $Vo2g4sjdrdbg);
        $Vprz0waeexf0 = $this->strategy->getMac($Vgmdornk5lyh);
        $Vxrcwydotg2m = $this->strategy->encodeData($Vgmdornk5lyh, $Vprz0waeexf0, $Vo2g4sjdrdbg);

        return $Vxrcwydotg2m;
    }

    
    public function decrypt($Vqhzkfsafzrc)
    {
        
        if (false === strpos($Vqhzkfsafzrc, '|')) {
            return $Vqhzkfsafzrc;
        }

        list($Vgmdornk5lyhData, $Vprz0waeexf0, $Vo2g4sjdrdbg) = $this->strategy->decodeData($Vqhzkfsafzrc);

        Tebru\assert($Vprz0waeexf0 === $this->strategy->getMac($Vgmdornk5lyhData), new MacHashMismatchException('MAC hashes do not match'));
        Tebru\assert(strlen($Vo2g4sjdrdbg) === $this->strategy->getIvSize(), new IvSizeMismatchException('IV size does not match expectation'));

        $Vvuducfvgz1l = $this->strategy->decryptData($Vgmdornk5lyhData, $Vo2g4sjdrdbg);

        $Vxnmbgenatsp = unserialize($Vvuducfvgz1l);

        return $Vxnmbgenatsp;
    }
}
