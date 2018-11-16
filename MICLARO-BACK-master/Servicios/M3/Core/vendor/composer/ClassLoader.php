<?php



namespace Composer\Autoload;


class ClassLoader
{
    
    private $V50ntyjdwrv1 = array();
    private $Vgxsgwwui4um = array();
    private $V1wygj0g5foh = array();

    
    private $Vc02a40nqpvo = array();
    private $Vafaxjosqtou = array();

    private $Vosfxp2jpope = false;
    private $Vkmk2lcbusjh = array();
    private $Vkmk2lcbusjhAuthoritative = false;
    private $Vgbaagibasfv = array();
    private $Vzknrxqfhtle;

    public function getPrefixes()
    {
        if (!empty($this->prefixesPsr0)) {
            return call_user_func_array('array_merge', $this->prefixesPsr0);
        }

        return array();
    }

    public function getPrefixesPsr4()
    {
        return $this->prefixDirsPsr4;
    }

    public function getFallbackDirs()
    {
        return $this->fallbackDirsPsr0;
    }

    public function getFallbackDirsPsr4()
    {
        return $this->fallbackDirsPsr4;
    }

    public function getClassMap()
    {
        return $this->classMap;
    }

    
    public function addClassMap(array $Vkmk2lcbusjh)
    {
        if ($this->classMap) {
            $this->classMap = array_merge($this->classMap, $Vkmk2lcbusjh);
        } else {
            $this->classMap = $Vkmk2lcbusjh;
        }
    }

    
    public function add($V2hf2uebv5m0, $Vno1hmfcfeuv, $Vxycgxw5rwvb = false)
    {
        if (!$V2hf2uebv5m0) {
            if ($Vxycgxw5rwvb) {
                $this->fallbackDirsPsr0 = array_merge(
                    (array) $Vno1hmfcfeuv,
                    $this->fallbackDirsPsr0
                );
            } else {
                $this->fallbackDirsPsr0 = array_merge(
                    $this->fallbackDirsPsr0,
                    (array) $Vno1hmfcfeuv
                );
            }

            return;
        }

        $Vj04wpizdbj2 = $V2hf2uebv5m0[0];
        if (!isset($this->prefixesPsr0[$Vj04wpizdbj2][$V2hf2uebv5m0])) {
            $this->prefixesPsr0[$Vj04wpizdbj2][$V2hf2uebv5m0] = (array) $Vno1hmfcfeuv;

            return;
        }
        if ($Vxycgxw5rwvb) {
            $this->prefixesPsr0[$Vj04wpizdbj2][$V2hf2uebv5m0] = array_merge(
                (array) $Vno1hmfcfeuv,
                $this->prefixesPsr0[$Vj04wpizdbj2][$V2hf2uebv5m0]
            );
        } else {
            $this->prefixesPsr0[$Vj04wpizdbj2][$V2hf2uebv5m0] = array_merge(
                $this->prefixesPsr0[$Vj04wpizdbj2][$V2hf2uebv5m0],
                (array) $Vno1hmfcfeuv
            );
        }
    }

    
    public function addPsr4($V2hf2uebv5m0, $Vno1hmfcfeuv, $Vxycgxw5rwvb = false)
    {
        if (!$V2hf2uebv5m0) {
            
            if ($Vxycgxw5rwvb) {
                $this->fallbackDirsPsr4 = array_merge(
                    (array) $Vno1hmfcfeuv,
                    $this->fallbackDirsPsr4
                );
            } else {
                $this->fallbackDirsPsr4 = array_merge(
                    $this->fallbackDirsPsr4,
                    (array) $Vno1hmfcfeuv
                );
            }
        } elseif (!isset($this->prefixDirsPsr4[$V2hf2uebv5m0])) {
            
            $Vxbsqvaghf5p = strlen($V2hf2uebv5m0);
            if ('\\' !== $V2hf2uebv5m0[$Vxbsqvaghf5p - 1]) {
                throw new \InvalidArgumentException("A non-empty PSR-4 prefix must end with a namespace separator.");
            }
            $this->prefixLengthsPsr4[$V2hf2uebv5m0[0]][$V2hf2uebv5m0] = $Vxbsqvaghf5p;
            $this->prefixDirsPsr4[$V2hf2uebv5m0] = (array) $Vno1hmfcfeuv;
        } elseif ($Vxycgxw5rwvb) {
            
            $this->prefixDirsPsr4[$V2hf2uebv5m0] = array_merge(
                (array) $Vno1hmfcfeuv,
                $this->prefixDirsPsr4[$V2hf2uebv5m0]
            );
        } else {
            
            $this->prefixDirsPsr4[$V2hf2uebv5m0] = array_merge(
                $this->prefixDirsPsr4[$V2hf2uebv5m0],
                (array) $Vno1hmfcfeuv
            );
        }
    }

    
    public function set($V2hf2uebv5m0, $Vno1hmfcfeuv)
    {
        if (!$V2hf2uebv5m0) {
            $this->fallbackDirsPsr0 = (array) $Vno1hmfcfeuv;
        } else {
            $this->prefixesPsr0[$V2hf2uebv5m0[0]][$V2hf2uebv5m0] = (array) $Vno1hmfcfeuv;
        }
    }

    
    public function setPsr4($V2hf2uebv5m0, $Vno1hmfcfeuv)
    {
        if (!$V2hf2uebv5m0) {
            $this->fallbackDirsPsr4 = (array) $Vno1hmfcfeuv;
        } else {
            $Vxbsqvaghf5p = strlen($V2hf2uebv5m0);
            if ('\\' !== $V2hf2uebv5m0[$Vxbsqvaghf5p - 1]) {
                throw new \InvalidArgumentException("A non-empty PSR-4 prefix must end with a namespace separator.");
            }
            $this->prefixLengthsPsr4[$V2hf2uebv5m0[0]][$V2hf2uebv5m0] = $Vxbsqvaghf5p;
            $this->prefixDirsPsr4[$V2hf2uebv5m0] = (array) $Vno1hmfcfeuv;
        }
    }

    
    public function setUseIncludePath($Vosfxp2jpope)
    {
        $this->useIncludePath = $Vosfxp2jpope;
    }

    
    public function getUseIncludePath()
    {
        return $this->useIncludePath;
    }

    
    public function setClassMapAuthoritative($Vkmk2lcbusjhAuthoritative)
    {
        $this->classMapAuthoritative = $Vkmk2lcbusjhAuthoritative;
    }

    
    public function isClassMapAuthoritative()
    {
        return $this->classMapAuthoritative;
    }

    
    public function setApcuPrefix($Vzknrxqfhtle)
    {
        $this->apcuPrefix = function_exists('apcu_fetch') && ini_get('apc.enabled') ? $Vzknrxqfhtle : null;
    }

    
    public function getApcuPrefix()
    {
        return $this->apcuPrefix;
    }

    
    public function register($Vxycgxw5rwvb = false)
    {
        spl_autoload_register(array($this, 'loadClass'), true, $Vxycgxw5rwvb);
    }

    
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    
    public function loadClass($Vqmu1sajhgfn)
    {
        if ($Vpu3xl4uhgg5 = $this->findFile($Vqmu1sajhgfn)) {
            includeFile($Vpu3xl4uhgg5);

            return true;
        }
    }

    
    public function findFile($Vqmu1sajhgfn)
    {
        
        if (isset($this->classMap[$Vqmu1sajhgfn])) {
            return $this->classMap[$Vqmu1sajhgfn];
        }
        if ($this->classMapAuthoritative || isset($this->missingClasses[$Vqmu1sajhgfn])) {
            return false;
        }
        if (null !== $this->apcuPrefix) {
            $Vpu3xl4uhgg5 = apcu_fetch($this->apcuPrefix.$Vqmu1sajhgfn, $Vw00lopsb2q5);
            if ($Vw00lopsb2q5) {
                return $Vpu3xl4uhgg5;
            }
        }

        $Vpu3xl4uhgg5 = $this->findFileWithExtension($Vqmu1sajhgfn, '.php');

        
        if (false === $Vpu3xl4uhgg5 && defined('HHVM_VERSION')) {
            $Vpu3xl4uhgg5 = $this->findFileWithExtension($Vqmu1sajhgfn, '.hh');
        }

        if (null !== $this->apcuPrefix) {
            apcu_add($this->apcuPrefix.$Vqmu1sajhgfn, $Vpu3xl4uhgg5);
        }

        if (false === $Vpu3xl4uhgg5) {
            
            $this->missingClasses[$Vqmu1sajhgfn] = true;
        }

        return $Vpu3xl4uhgg5;
    }

    private function findFileWithExtension($Vqmu1sajhgfn, $Vzshgtw5fx5p)
    {
        
        $Vgg0ck51ele2 = strtr($Vqmu1sajhgfn, '\\', DIRECTORY_SEPARATOR) . $Vzshgtw5fx5p;

        $Vj04wpizdbj2 = $Vqmu1sajhgfn[0];
        if (isset($this->prefixLengthsPsr4[$Vj04wpizdbj2])) {
            $Vfro04vesu5k = $Vqmu1sajhgfn;
            while (false !== $Va3hosmr3m10 = strrpos($Vfro04vesu5k, '\\')) {
                $Vfro04vesu5k = substr($Vfro04vesu5k, 0, $Va3hosmr3m10);
                $Vgk2e5lvvnrn = $Vfro04vesu5k.'\\';
                if (isset($this->prefixDirsPsr4[$Vgk2e5lvvnrn])) {
                    foreach ($this->prefixDirsPsr4[$Vgk2e5lvvnrn] as $Vb3iift025ov) {
                        $Vxbsqvaghf5p = $this->prefixLengthsPsr4[$Vj04wpizdbj2][$Vgk2e5lvvnrn];
                        if (file_exists($Vpu3xl4uhgg5 = $Vb3iift025ov . DIRECTORY_SEPARATOR . substr($Vgg0ck51ele2, $Vxbsqvaghf5p))) {
                            return $Vpu3xl4uhgg5;
                        }
                    }
                }
            }
        }

        
        foreach ($this->fallbackDirsPsr4 as $Vb3iift025ov) {
            if (file_exists($Vpu3xl4uhgg5 = $Vb3iift025ov . DIRECTORY_SEPARATOR . $Vgg0ck51ele2)) {
                return $Vpu3xl4uhgg5;
            }
        }

        
        if (false !== $Vc5b0ouiyxjh = strrpos($Vqmu1sajhgfn, '\\')) {
            
            $Vt5h5bwnv3ql = substr($Vgg0ck51ele2, 0, $Vc5b0ouiyxjh + 1)
                . strtr(substr($Vgg0ck51ele2, $Vc5b0ouiyxjh + 1), '_', DIRECTORY_SEPARATOR);
        } else {
            
            $Vt5h5bwnv3ql = strtr($Vqmu1sajhgfn, '_', DIRECTORY_SEPARATOR) . $Vzshgtw5fx5p;
        }

        if (isset($this->prefixesPsr0[$Vj04wpizdbj2])) {
            foreach ($this->prefixesPsr0[$Vj04wpizdbj2] as $V2hf2uebv5m0 => $Vb3iift025ovs) {
                if (0 === strpos($Vqmu1sajhgfn, $V2hf2uebv5m0)) {
                    foreach ($Vb3iift025ovs as $Vb3iift025ov) {
                        if (file_exists($Vpu3xl4uhgg5 = $Vb3iift025ov . DIRECTORY_SEPARATOR . $Vt5h5bwnv3ql)) {
                            return $Vpu3xl4uhgg5;
                        }
                    }
                }
            }
        }

        
        foreach ($this->fallbackDirsPsr0 as $Vb3iift025ov) {
            if (file_exists($Vpu3xl4uhgg5 = $Vb3iift025ov . DIRECTORY_SEPARATOR . $Vt5h5bwnv3ql)) {
                return $Vpu3xl4uhgg5;
            }
        }

        
        if ($this->useIncludePath && $Vpu3xl4uhgg5 = stream_resolve_include_path($Vt5h5bwnv3ql)) {
            return $Vpu3xl4uhgg5;
        }

        return false;
    }
}


function includeFile($Vpu3xl4uhgg5)
{
    include $Vpu3xl4uhgg5;
}
