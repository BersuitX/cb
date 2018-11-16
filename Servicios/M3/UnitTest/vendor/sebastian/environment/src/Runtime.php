<?php


namespace SebastianBergmann\Environment;


class Runtime
{
    
    private static $V5ptb0bmdcu1;

    
    public function canCollectCodeCoverage()
    {
        return $this->hasXdebug() || $this->hasPHPDBGCodeCoverage();
    }

    
    public function getBinary()
    {
        
        if (self::$V5ptb0bmdcu1 === null && $this->isHHVM()) {
            if ((self::$V5ptb0bmdcu1 = getenv('PHP_BINARY')) === false) {
                self::$V5ptb0bmdcu1 = PHP_BINARY;
            }

            self::$V5ptb0bmdcu1 = escapeshellarg(self::$V5ptb0bmdcu1) . ' --php';
        }

        
        if (self::$V5ptb0bmdcu1 === null && defined('PHP_BINARY')) {
            if (PHP_BINARY !== '') {
                self::$V5ptb0bmdcu1 = escapeshellarg(PHP_BINARY);
            }
        }

        
        if (self::$V5ptb0bmdcu1 === null) {
            if (PHP_SAPI == 'cli' && isset($_SERVER['_'])) {
                if (strpos($_SERVER['_'], 'phpunit') !== false) {
                    $Vpu3xl4uhgg5 = file($_SERVER['_']);

                    if (strpos($Vpu3xl4uhgg5[0], ' ') !== false) {
                        $Vvurliuircct          = explode(' ', $Vpu3xl4uhgg5[0]);
                        self::$V5ptb0bmdcu1 = escapeshellarg(trim($Vvurliuircct[1]));
                    } else {
                        self::$V5ptb0bmdcu1 = escapeshellarg(ltrim(trim($Vpu3xl4uhgg5[0]), '#!'));
                    }
                } elseif (strpos(basename($_SERVER['_']), 'php') !== false) {
                    self::$V5ptb0bmdcu1 = escapeshellarg($_SERVER['_']);
                }
            }
        }

        if (self::$V5ptb0bmdcu1 === null) {
            $V1vutc402i1o = array(
                PHP_BINDIR . '/php',
                PHP_BINDIR . '/php-cli.exe',
                PHP_BINDIR . '/php.exe'
            );

            foreach ($V1vutc402i1o as $V5ptb0bmdcu1) {
                if (is_readable($V5ptb0bmdcu1)) {
                    self::$V5ptb0bmdcu1 = escapeshellarg($V5ptb0bmdcu1);
                    break;
                }
            }
        }

        if (self::$V5ptb0bmdcu1 === null) {
            self::$V5ptb0bmdcu1 = 'php';
        }

        return self::$V5ptb0bmdcu1;
    }

    
    public function getNameWithVersion()
    {
        return $this->getName() . ' ' . $this->getVersion();
    }

    
    public function getName()
    {
        if ($this->isHHVM()) {
            return 'HHVM';
        } elseif ($this->isPHPDBG()) {
            return 'PHPDBG';
        } else {
            return 'PHP';
        }
    }

    
    public function getVendorUrl()
    {
        if ($this->isHHVM()) {
            return 'http://hhvm.com/';
        } else {
            return 'https://secure.php.net/';
        }
    }

    
    public function getVersion()
    {
        if ($this->isHHVM()) {
            return HHVM_VERSION;
        } else {
            return PHP_VERSION;
        }
    }

    
    public function hasXdebug()
    {
        return ($this->isPHP() || $this->isHHVM()) && extension_loaded('xdebug');
    }

    
    public function isHHVM()
    {
        return defined('HHVM_VERSION');
    }

    
    public function isPHP()
    {
        return !$this->isHHVM() && !$this->isPHPDBG();
    }

    
    public function isPHPDBG()
    {
        return PHP_SAPI === 'phpdbg' && !$this->isHHVM();
    }

    
    public function hasPHPDBGCodeCoverage()
    {
        return $this->isPHPDBG() && function_exists('phpdbg_start_oplog');
    }
}
