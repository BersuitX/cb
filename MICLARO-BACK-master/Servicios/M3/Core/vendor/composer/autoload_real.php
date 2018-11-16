<?php



class ComposerAutoloaderInitd850a35bfc910b6a12f0117e267c7c8f
{
    private static $Vovnziqng5rv;

    public static function loadClassLoader($Vqmu1sajhgfn)
    {
        if ('Composer\Autoload\ClassLoader' === $Vqmu1sajhgfn) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$Vovnziqng5rv) {
            return self::$Vovnziqng5rv;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd850a35bfc910b6a12f0117e267c7c8f', 'loadClassLoader'), true, true);
        self::$Vovnziqng5rv = $Vovnziqng5rv = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInitd850a35bfc910b6a12f0117e267c7c8f', 'loadClassLoader'));

        $Vs4mvla0zfpu = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        if ($Vs4mvla0zfpu) {
            require_once __DIR__ . '/autoload_static.php';

            call_user_func(\Composer\Autoload\ComposerStaticInitd850a35bfc910b6a12f0117e267c7c8f::getInitializer($Vovnziqng5rv));
        } else {
            $Vbdjnzdn3xmh = require __DIR__ . '/autoload_namespaces.php';
            foreach ($Vbdjnzdn3xmh as $Vi4q0wxavk53 => $V2bpoh5hagzp) {
                $Vovnziqng5rv->set($Vi4q0wxavk53, $V2bpoh5hagzp);
            }

            $Vbdjnzdn3xmh = require __DIR__ . '/autoload_psr4.php';
            foreach ($Vbdjnzdn3xmh as $Vi4q0wxavk53 => $V2bpoh5hagzp) {
                $Vovnziqng5rv->setPsr4($Vi4q0wxavk53, $V2bpoh5hagzp);
            }

            $Vqmu1sajhgfnMap = require __DIR__ . '/autoload_classmap.php';
            if ($Vqmu1sajhgfnMap) {
                $Vovnziqng5rv->addClassMap($Vqmu1sajhgfnMap);
            }
        }

        $Vovnziqng5rv->register(true);

        if ($Vs4mvla0zfpu) {
            $Vl0hnp0uicv0 = Composer\Autoload\ComposerStaticInitd850a35bfc910b6a12f0117e267c7c8f::$V5s0rodgwwbv;
        } else {
            $Vl0hnp0uicv0 = require __DIR__ . '/autoload_files.php';
        }
        foreach ($Vl0hnp0uicv0 as $Vsvyfcjol2df => $Vpu3xl4uhgg5) {
            composerRequired850a35bfc910b6a12f0117e267c7c8f($Vsvyfcjol2df, $Vpu3xl4uhgg5);
        }

        return $Vovnziqng5rv;
    }
}

function composerRequired850a35bfc910b6a12f0117e267c7c8f($Vsvyfcjol2df, $Vpu3xl4uhgg5)
{
    if (empty($GLOBALS['__composer_autoload_files'][$Vsvyfcjol2df])) {
        require $Vpu3xl4uhgg5;

        $GLOBALS['__composer_autoload_files'][$Vsvyfcjol2df] = true;
    }
}
