<?php



namespace Composer\Autoload;

class ComposerStaticInitd850a35bfc910b6a12f0117e267c7c8f
{
    public static $V5s0rodgwwbv = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        'b7bf1465e14ecc3a1268731334db5608' => __DIR__ . '/..' . '/tebru/assert/src/assert.php',
    );

    public static $V50ntyjdwrv1 = array (
        'T' => 
        array (
            'Tebru\\Test\\' => 11,
            'Tebru\\AesEncryption\\Test\\' => 25,
            'Tebru\\AesEncryption\\' => 20,
        ),
        'S' => 
        array (
            'Slim\\Views\\' => 11,
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $Vgxsgwwui4um = array (
        'Tebru\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/tebru/assert/tests',
        ),
        'Tebru\\AesEncryption\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/tebru/aes-encryption/tests',
        ),
        'Tebru\\AesEncryption\\' => 
        array (
            0 => __DIR__ . '/..' . '/tebru/aes-encryption/src',
        ),
        'Slim\\Views\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/php-view/src',
        ),
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $Vc02a40nqpvo = array (
        'w' => 
        array (
            'wigilabs\\curlWigiM3' => 
            array (
                0 => __DIR__ . '/..' . '/jsngonzalez/curl-wigi-m3/src',
            ),
        ),
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $Vovnziqng5rv)
    {
        return \Closure::bind(function () use ($Vovnziqng5rv) {
            $Vovnziqng5rv->prefixLengthsPsr4 = ComposerStaticInitd850a35bfc910b6a12f0117e267c7c8f::$V50ntyjdwrv1;
            $Vovnziqng5rv->prefixDirsPsr4 = ComposerStaticInitd850a35bfc910b6a12f0117e267c7c8f::$Vgxsgwwui4um;
            $Vovnziqng5rv->prefixesPsr0 = ComposerStaticInitd850a35bfc910b6a12f0117e267c7c8f::$Vc02a40nqpvo;

        }, null, ClassLoader::class);
    }
}
