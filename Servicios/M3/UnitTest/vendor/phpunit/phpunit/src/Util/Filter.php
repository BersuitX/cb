<?php



class PHPUnit_Util_Filter
{
    
    public static function getFilteredStacktrace(Exception $Vpt32vvhspnv, $Vmlbtxzqe4g3 = true)
    {
        $V2hf2uebv5m0 = false;
        $Vl1ojrvxhryy = realpath($GLOBALS['_SERVER']['SCRIPT_NAME']);

        if (defined('__PHPUNIT_PHAR_ROOT__')) {
            $V2hf2uebv5m0 = __PHPUNIT_PHAR_ROOT__;
        }

        if ($Vmlbtxzqe4g3 === true) {
            $Vgzfduriprtz = '';
        } else {
            $Vgzfduriprtz = array();
        }

        if ($Vpt32vvhspnv instanceof PHPUnit_Framework_SyntheticError) {
            $Vpt32vvhspnvTrace = $Vpt32vvhspnv->getSyntheticTrace();
            $Vpt32vvhspnvFile  = $Vpt32vvhspnv->getSyntheticFile();
            $Vpt32vvhspnvLine  = $Vpt32vvhspnv->getSyntheticLine();
        } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_Exception) {
            $Vpt32vvhspnvTrace = $Vpt32vvhspnv->getSerializableTrace();
            $Vpt32vvhspnvFile  = $Vpt32vvhspnv->getFile();
            $Vpt32vvhspnvLine  = $Vpt32vvhspnv->getLine();
        } else {
            if ($Vpt32vvhspnv->getPrevious()) {
                $Vpt32vvhspnv = $Vpt32vvhspnv->getPrevious();
            }
            $Vpt32vvhspnvTrace = $Vpt32vvhspnv->getTrace();
            $Vpt32vvhspnvFile  = $Vpt32vvhspnv->getFile();
            $Vpt32vvhspnvLine  = $Vpt32vvhspnv->getLine();
        }

        if (!self::frameExists($Vpt32vvhspnvTrace, $Vpt32vvhspnvFile, $Vpt32vvhspnvLine)) {
            array_unshift(
                $Vpt32vvhspnvTrace,
                array('file' => $Vpt32vvhspnvFile, 'line' => $Vpt32vvhspnvLine)
            );
        }

        $Vn54eydon0cr = new PHPUnit_Util_Blacklist;

        foreach ($Vpt32vvhspnvTrace as $Vjnhvsrh5xox) {
            if (isset($Vjnhvsrh5xox['file']) && is_file($Vjnhvsrh5xox['file']) &&
                !$Vn54eydon0cr->isBlacklisted($Vjnhvsrh5xox['file']) &&
                ($V2hf2uebv5m0 === false || strpos($Vjnhvsrh5xox['file'], $V2hf2uebv5m0) !== 0) &&
                $Vjnhvsrh5xox['file'] !== $Vl1ojrvxhryy) {
                if ($Vmlbtxzqe4g3 === true) {
                    $Vgzfduriprtz .= sprintf(
                        "%s:%s\n",
                        $Vjnhvsrh5xox['file'],
                        isset($Vjnhvsrh5xox['line']) ? $Vjnhvsrh5xox['line'] : '?'
                    );
                } else {
                    $Vgzfduriprtz[] = $Vjnhvsrh5xox;
                }
            }
        }

        return $Vgzfduriprtz;
    }

    
    private static function frameExists(array $V1babchxe11h, $Vpu3xl4uhgg5, $Vrwsmtja4f2j)
    {
        foreach ($V1babchxe11h as $Vjnhvsrh5xox) {
            if (isset($Vjnhvsrh5xox['file']) && $Vjnhvsrh5xox['file'] == $Vpu3xl4uhgg5 &&
                isset($Vjnhvsrh5xox['line']) && $Vjnhvsrh5xox['line'] == $Vrwsmtja4f2j) {
                return true;
            }
        }

        return false;
    }
}
