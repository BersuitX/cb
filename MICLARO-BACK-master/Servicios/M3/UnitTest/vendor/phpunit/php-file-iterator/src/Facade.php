<?php



class File_Iterator_Facade
{
    
    public function getFilesAsArray($Vno1hmfcfeuv, $Vj5tuqhgx1hz = '', $Vehrcxivvt4k = '', array $Vd0fgqkfpr15 = array(), $Vtff21dazbte = FALSE)
    {
        if (is_string($Vno1hmfcfeuv)) {
            $Vno1hmfcfeuv = array($Vno1hmfcfeuv);
        }

        $Vdnxqjiaf0hs  = new File_Iterator_Factory;
        $Vnv250ah4t1q = $Vdnxqjiaf0hs->getFileIterator(
          $Vno1hmfcfeuv, $Vj5tuqhgx1hz, $Vehrcxivvt4k, $Vd0fgqkfpr15
        );

        $V5s0rodgwwbv = array();

        foreach ($Vnv250ah4t1q as $Vpu3xl4uhgg5) {
            $Vpu3xl4uhgg5 = $Vpu3xl4uhgg5->getRealPath();

            if ($Vpu3xl4uhgg5) {
                $V5s0rodgwwbv[] = $Vpu3xl4uhgg5;
            }
        }

        foreach ($Vno1hmfcfeuv as $V2bpoh5hagzp) {
            if (is_file($V2bpoh5hagzp)) {
                $V5s0rodgwwbv[] = realpath($V2bpoh5hagzp);
            }
        }

        $V5s0rodgwwbv = array_unique($V5s0rodgwwbv);
        sort($V5s0rodgwwbv);

        if ($Vtff21dazbte) {
            return array(
              'commonPath' => $this->getCommonPath($V5s0rodgwwbv),
              'files'      => $V5s0rodgwwbv
            );
        } else {
            return $V5s0rodgwwbv;
        }
    }

    
    protected function getCommonPath(array $V5s0rodgwwbv)
    {
        $Vdbkece3gnp5 = count($V5s0rodgwwbv);

        if ($Vdbkece3gnp5 == 0) {
            return '';
        }

        if ($Vdbkece3gnp5 == 1) {
            return dirname($V5s0rodgwwbv[0]) . DIRECTORY_SEPARATOR;
        }

        $Vvdroltbi2z5 = array();

        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $Vvdroltbi2z5[] = $Vx123w0d4ihr = explode(DIRECTORY_SEPARATOR, $Vpu3xl4uhgg5);

            if (empty($Vx123w0d4ihr[0])) {
                $Vx123w0d4ihr[0] = DIRECTORY_SEPARATOR;
            }
        }

        $V2dgbdurpgrt = '';
        $Vqxcg43wz0yd   = FALSE;
        $V5kfw3q1o1vh      = 0;
        $Vdbkece3gnp5--;

        while (!$Vqxcg43wz0yd) {
            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq++) {
                if ($Vvdroltbi2z5[$Vxja1abp34yq][$V5kfw3q1o1vh] != $Vvdroltbi2z5[$Vxja1abp34yq+1][$V5kfw3q1o1vh]) {
                    $Vqxcg43wz0yd = TRUE;
                    break;
                }
            }

            if (!$Vqxcg43wz0yd) {
                $V2dgbdurpgrt .= $Vvdroltbi2z5[0][$V5kfw3q1o1vh];

                if ($V5kfw3q1o1vh > 0) {
                    $V2dgbdurpgrt .= DIRECTORY_SEPARATOR;
                }
            }

            $V5kfw3q1o1vh++;
        }

        return DIRECTORY_SEPARATOR . $V2dgbdurpgrt;
    }
}
