<?php


namespace Tebru\AesEncryption\Test;

use PHPUnit_Framework_TestCase;
use Tebru\AesEncryption\AesEncrypter;
use Tebru\AesEncryption\Enum\AesEnum;
use Tebru\AesEncryption\Strategy\OpenSslStrategy;


class AesEncrypterTest extends PHPUnit_Framework_TestCase
{
    const TEST_STRING = 'The "quick" brown \'fox\' jumped 0ver the lazy dog!?';

    
    public function testcanEncryptString($Vtlfvdwskdge, $Vebeqgh3fepe)
    {
        $this->simpleAssert($Vtlfvdwskdge, $Vebeqgh3fepe, self::TEST_STRING);
    }

    
    public function testCanEncryptInteger($Vtlfvdwskdge, $Vebeqgh3fepe)
    {
        $this->simpleAssert($Vtlfvdwskdge, $Vebeqgh3fepe, 1);
    }

    
    public function testCanEncryptDecimal($Vtlfvdwskdge, $Vebeqgh3fepe)
    {
        $this->simpleAssert($Vtlfvdwskdge, $Vebeqgh3fepe, 1.9);
    }

    
    public function testCanEncryptBool($Vtlfvdwskdge, $Vebeqgh3fepe)
    {
        $this->simpleAssert($Vtlfvdwskdge, $Vebeqgh3fepe, false);
    }

    
    public function testCanEncryptNull($Vtlfvdwskdge, $Vebeqgh3fepe)
    {
        $this->simpleAssert($Vtlfvdwskdge, $Vebeqgh3fepe, null);
    }

    
    public function testCanEncryptArray($Vtlfvdwskdge, $Vebeqgh3fepe)
    {
        $this->simpleAssert($Vtlfvdwskdge, $Vebeqgh3fepe, ['test' => ['test' => 'test']]);
    }

    
    public function testCanEncryptObject($Vtlfvdwskdge, $Vebeqgh3fepe)
    {
        $this->simpleAssert($Vtlfvdwskdge, $Vebeqgh3fepe, new \stdClass());
    }

    public function testWillNotDecryptedNonEncryptedString()
    {
        $V44bx1mr5ks1 = new AesEncrypter($this->generateKey());
        $Vv0hyvhlkjqr = $V44bx1mr5ks1->decrypt(null);
        $this->assertEquals(null, $Vv0hyvhlkjqr);
    }

    
    public function testAlterIvThrowsException()
    {
        $V44bx1mr5ks1 = new AesEncrypter($this->generateKey());
        $Vgmdornk5lyh = $V44bx1mr5ks1->encrypt(self::TEST_STRING);
        $Vgmdornk5lyh .= '1';
        $Vv0hyvhlkjqr = $V44bx1mr5ks1->decrypt($Vgmdornk5lyh);
        $this->assertEquals(self::TEST_STRING, $Vv0hyvhlkjqr);
    }

    
    public function testAlterDataThrowsException()
    {
        $V44bx1mr5ks1 = new AesEncrypter($this->generateKey());
        $Vgmdornk5lyh = $V44bx1mr5ks1->encrypt(self::TEST_STRING);
        $Vgmdornk5lyh = '1' . $Vgmdornk5lyh;
        $Vv0hyvhlkjqr = $V44bx1mr5ks1->decrypt($Vgmdornk5lyh);
        $this->assertEquals(self::TEST_STRING, $Vv0hyvhlkjqr);
    }

    public function testKeyWithCharacters()
    {
        $V44bx1mr5ks1 = new AesEncrypter('!@#$Vulbkn4vjxuq&*(_\'"ds6');
        $Vgmdornk5lyh = $V44bx1mr5ks1->encrypt(self::TEST_STRING);
        $Vxnmbgenatsp = $V44bx1mr5ks1->decrypt($Vgmdornk5lyh);
        $this->assertEquals(self::TEST_STRING, $Vxnmbgenatsp);
    }

    
    public function testInvalidMethodThrowsException()
    {
        $V44bx1mr5ks1 = new AesEncrypter($this->generateKey(), 'test');
        $V44bx1mr5ks1->encrypt('test');
    }

    public function testWillUseOpenSslByDefault()
    {
        $V44bx1mr5ks1 = new AesEncrypter($this->generateKey());

        $this->assertAttributeInstanceOf(OpenSslStrategy::class, 'strategy', $V44bx1mr5ks1);
    }

    private function simpleAssert($Vtlfvdwskdge, $Vebeqgh3fepe, $Vqhzkfsafzrc)
    {
        $V44bx1mr5ks1 = new AesEncrypter($this->generateKey(), $Vtlfvdwskdge, $Vebeqgh3fepe);
        $Vgmdornk5lyh = $V44bx1mr5ks1->encrypt($Vqhzkfsafzrc);
        $Vv0hyvhlkjqr = $V44bx1mr5ks1->decrypt($Vgmdornk5lyh);
        $this->assertEquals($Vqhzkfsafzrc, $Vv0hyvhlkjqr);
    }

    private function generateKey()
    {
        return bin2hex(openssl_random_pseudo_bytes(mt_rand(0, 100)));
    }

    public function encrypterIterations()
    {
        return [
            [AesEnum::METHOD_128, AesEncrypter::STRATEGY_OPENSSL],
            [AesEnum::METHOD_192, AesEncrypter::STRATEGY_OPENSSL],
            [AesEnum::METHOD_256, AesEncrypter::STRATEGY_OPENSSL],
            [AesEnum::METHOD_128, AesEncrypter::STRATEGY_MCRYPT],
            [AesEnum::METHOD_192, AesEncrypter::STRATEGY_MCRYPT],
            [AesEnum::METHOD_256, AesEncrypter::STRATEGY_MCRYPT],
        ];
    }
}
