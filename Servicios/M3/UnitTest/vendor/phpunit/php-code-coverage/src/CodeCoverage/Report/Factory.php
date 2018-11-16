<?php



class PHP_CodeCoverage_Report_Factory
{
    
    public function create(PHP_CodeCoverage $Vbt1bqdir3su)
    {
        $V5s0rodgwwbv      = $Vbt1bqdir3su->getData();
        $Vtff21dazbte = $this->reducePaths($V5s0rodgwwbv);
        $Vixd4iv51rfm       = new PHP_CodeCoverage_Report_Node_Directory(
            $Vtff21dazbte,
            null
        );

        $this->addItems(
            $Vixd4iv51rfm,
            $this->buildDirectoryStructure($V5s0rodgwwbv),
            $Vbt1bqdir3su->getTests(),
            $Vbt1bqdir3su->getCacheTokens()
        );

        return $Vixd4iv51rfm;
    }

    
    private function addItems(PHP_CodeCoverage_Report_Node_Directory $Vixd4iv51rfm, array $Vdgaj5zam5hd, array $Vo50qpjpkko3, $Vlbjlgfocnro)
    {
        foreach ($Vdgaj5zam5hd as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            if (substr($Vlpbz5aloxqt, -2) == '/f') {
                $Vlpbz5aloxqt = substr($Vlpbz5aloxqt, 0, -2);

                if (file_exists($Vixd4iv51rfm->getPath() . DIRECTORY_SEPARATOR . $Vlpbz5aloxqt)) {
                    $Vixd4iv51rfm->addFile($Vlpbz5aloxqt, $Vcptarsq5qe4, $Vo50qpjpkko3, $Vlbjlgfocnro);
                }
            } else {
                $Vypmkgldf3eu = $Vixd4iv51rfm->addDirectory($Vlpbz5aloxqt);
                $this->addItems($Vypmkgldf3eu, $Vcptarsq5qe4, $Vo50qpjpkko3, $Vlbjlgfocnro);
            }
        }
    }

    
    private function buildDirectoryStructure($V5s0rodgwwbv)
    {
        $Vv0hyvhlkjqr = array();

        foreach ($V5s0rodgwwbv as $V2bpoh5hagzp => $Vpu3xl4uhgg5) {
            $V2bpoh5hagzp    = explode('/', $V2bpoh5hagzp);
            $Vmpd32rox1lh = &$Vv0hyvhlkjqr;
            $Vbulqadoj2ef     = count($V2bpoh5hagzp);

            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vbulqadoj2ef; $Vxja1abp34yq++) {
                if ($Vxja1abp34yq == ($Vbulqadoj2ef - 1)) {
                    $V31qrja1w0r2 = '/f';
                } else {
                    $V31qrja1w0r2 = '';
                }

                $Vmpd32rox1lh = &$Vmpd32rox1lh[$V2bpoh5hagzp[$Vxja1abp34yq] . $V31qrja1w0r2];
            }

            $Vmpd32rox1lh = $Vpu3xl4uhgg5;
        }

        return $Vv0hyvhlkjqr;
    }

    
    private function reducePaths(&$V5s0rodgwwbv)
    {
        if (empty($V5s0rodgwwbv)) {
            return '.';
        }

        $Vtff21dazbte = '';
        $V2bpoh5hagzps      = array_keys($V5s0rodgwwbv);

        if (count($V5s0rodgwwbv) == 1) {
            $Vtff21dazbte                 = dirname($V2bpoh5hagzps[0]) . '/';
            $V5s0rodgwwbv[basename($V2bpoh5hagzps[0])] = $V5s0rodgwwbv[$V2bpoh5hagzps[0]];

            unset($V5s0rodgwwbv[$V2bpoh5hagzps[0]]);

            return $Vtff21dazbte;
        }

        $Vbulqadoj2ef = count($V2bpoh5hagzps);

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vbulqadoj2ef; $Vxja1abp34yq++) {
            
            if (strpos($V2bpoh5hagzps[$Vxja1abp34yq], 'phar://') === 0) {
                $V2bpoh5hagzps[$Vxja1abp34yq] = substr($V2bpoh5hagzps[$Vxja1abp34yq], 7);
                $V2bpoh5hagzps[$Vxja1abp34yq] = strtr($V2bpoh5hagzps[$Vxja1abp34yq], '/', DIRECTORY_SEPARATOR);
            }
            $V2bpoh5hagzps[$Vxja1abp34yq] = explode(DIRECTORY_SEPARATOR, $V2bpoh5hagzps[$Vxja1abp34yq]);

            if (empty($V2bpoh5hagzps[$Vxja1abp34yq][0])) {
                $V2bpoh5hagzps[$Vxja1abp34yq][0] = DIRECTORY_SEPARATOR;
            }
        }

        $Vqxcg43wz0yd = false;
        $Vbulqadoj2ef  = count($V2bpoh5hagzps);

        while (!$Vqxcg43wz0yd) {
            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vbulqadoj2ef - 1; $Vxja1abp34yq++) {
                if (!isset($V2bpoh5hagzps[$Vxja1abp34yq][0]) ||
                    !isset($V2bpoh5hagzps[$Vxja1abp34yq+1][0]) ||
                    $V2bpoh5hagzps[$Vxja1abp34yq][0] != $V2bpoh5hagzps[$Vxja1abp34yq+1][0]) {
                    $Vqxcg43wz0yd = true;
                    break;
                }
            }

            if (!$Vqxcg43wz0yd) {
                $Vtff21dazbte .= $V2bpoh5hagzps[0][0];

                if ($V2bpoh5hagzps[0][0] != DIRECTORY_SEPARATOR) {
                    $Vtff21dazbte .= DIRECTORY_SEPARATOR;
                }

                for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vbulqadoj2ef; $Vxja1abp34yq++) {
                    array_shift($V2bpoh5hagzps[$Vxja1abp34yq]);
                }
            }
        }

        $Vzxjtibpieyg = array_keys($V5s0rodgwwbv);
        $Vbulqadoj2ef      = count($Vzxjtibpieyg);

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vbulqadoj2ef; $Vxja1abp34yq++) {
            $V5s0rodgwwbv[implode('/', $V2bpoh5hagzps[$Vxja1abp34yq])] = $V5s0rodgwwbv[$Vzxjtibpieyg[$Vxja1abp34yq]];
            unset($V5s0rodgwwbv[$Vzxjtibpieyg[$Vxja1abp34yq]]);
        }

        ksort($V5s0rodgwwbv);

        return substr($Vtff21dazbte, 0, -1);
    }
}
