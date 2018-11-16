<?php



class PHP_CodeCoverage_Driver_PHPDBG implements PHP_CodeCoverage_Driver
{
    
    public function __construct()
    {
        if (PHP_SAPI !== 'phpdbg') {
            throw new PHP_CodeCoverage_Exception(
                'This driver requires the PHPDBG SAPI'
            );
        }

        if (!function_exists('phpdbg_start_oplog')) {
            throw new PHP_CodeCoverage_Exception(
                'This build of PHPDBG does not support code coverage'
            );
        }
    }

    
    public function start()
    {
        phpdbg_start_oplog();
    }

    
    public function stop()
    {
        static $Vivcfgbfpvqb = array();

        $Vq1c1quhx5jw = phpdbg_end_oplog();

        if ($Vivcfgbfpvqb == array()) {
            $Vxcfb3xe2m1o = phpdbg_get_executable();
        } else {
            $V0ua2gh3zchh = array_diff(
                get_included_files(),
                array_keys($Vivcfgbfpvqb)
            );

            if ($V0ua2gh3zchh) {
                $Vxcfb3xe2m1o = phpdbg_get_executable(
                    array('files' => $V0ua2gh3zchh)
                );
            } else {
                $Vxcfb3xe2m1o = array();
            }
        }

        foreach ($Vxcfb3xe2m1o as $Vpu3xl4uhgg5 => $Vbkt5laoakgf) {
            foreach ($Vbkt5laoakgf as $Vxofuhh4zbwv => $Vg0etkph5lk4) {
                $Vxcfb3xe2m1o[$Vpu3xl4uhgg5][$Vxofuhh4zbwv] = self::LINE_NOT_EXECUTED;
            }
        }

        $Vivcfgbfpvqb = array_merge($Vivcfgbfpvqb, $Vxcfb3xe2m1o);

        return $this->detectExecutedLines($Vivcfgbfpvqb, $Vq1c1quhx5jw);
    }

    
    private function detectExecutedLines(array $Vxcfb3xe2m1o, array $Vq1c1quhx5jw)
    {
        foreach ($Vq1c1quhx5jw as $Vpu3xl4uhgg5 => $Veayo35uujlf) {
            foreach ($Veayo35uujlf as $Vxofuhh4zbwv => $Vg0etkph5lk4) {
                
                
                if (isset($Vxcfb3xe2m1o[$Vpu3xl4uhgg5][$Vxofuhh4zbwv])) {
                    $Vxcfb3xe2m1o[$Vpu3xl4uhgg5][$Vxofuhh4zbwv] = self::LINE_EXECUTED;
                }
            }
        }

        return $Vxcfb3xe2m1o;
    }
}
