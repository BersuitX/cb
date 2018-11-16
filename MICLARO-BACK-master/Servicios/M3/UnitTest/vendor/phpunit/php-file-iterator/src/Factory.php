<?php



class File_Iterator_Factory
{
    
    public function getFileIterator($Vno1hmfcfeuv, $Vj5tuqhgx1hz = '', $Vehrcxivvt4k = '', array $Vd0fgqkfpr15 = array())
    {
        if (is_string($Vno1hmfcfeuv)) {
            $Vno1hmfcfeuv = array($Vno1hmfcfeuv);
        }

        $Vno1hmfcfeuv   = $this->getPathsAfterResolvingWildcards($Vno1hmfcfeuv);
        $Vd0fgqkfpr15 = $this->getPathsAfterResolvingWildcards($Vd0fgqkfpr15);

        if (is_string($Vehrcxivvt4k)) {
            if ($Vehrcxivvt4k != '') {
                $Vehrcxivvt4k = array($Vehrcxivvt4k);
            } else {
                $Vehrcxivvt4k = array();
            }
        }

        if (is_string($Vj5tuqhgx1hz)) {
            if ($Vj5tuqhgx1hz != '') {
                $Vj5tuqhgx1hz = array($Vj5tuqhgx1hz);
            } else {
                $Vj5tuqhgx1hz = array();
            }
        }

        $Vnv250ah4t1q = new AppendIterator;

        foreach ($Vno1hmfcfeuv as $V2bpoh5hagzp) {
            if (is_dir($V2bpoh5hagzp)) {
                $Vnv250ah4t1q->append(
                  new File_Iterator(
                    new RecursiveIteratorIterator(
                      new RecursiveDirectoryIterator($V2bpoh5hagzp, RecursiveDirectoryIterator::FOLLOW_SYMLINKS)
                    ),
                    $Vj5tuqhgx1hz,
                    $Vehrcxivvt4k,
                    $Vd0fgqkfpr15,
                    $V2bpoh5hagzp
                  )
                );
            }
        }

        return $Vnv250ah4t1q;
    }

    
    protected function getPathsAfterResolvingWildcards(array $Vno1hmfcfeuv)
    {
        $V1mfoarjrrmw = array();

        foreach ($Vno1hmfcfeuv as $V2bpoh5hagzp) {
            if ($Vyuvxbrodo42 = glob($V2bpoh5hagzp, GLOB_ONLYDIR)) {
                $V1mfoarjrrmw = array_merge($V1mfoarjrrmw, array_map('realpath', $Vyuvxbrodo42));
            } else {
                $V1mfoarjrrmw[] = realpath($V2bpoh5hagzp);
            }
        }

        return $V1mfoarjrrmw;
    }
}
