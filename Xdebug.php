<?php



class PHP_CodeCoverage_Driver_Xdebug implements PHP_CodeCoverage_Driver
{
    
    public function __construct()
    {
        if (!extension_loaded('xdebug')) {
            throw new PHP_CodeCoverage_Exception('This driver requires Xdebug');
        }

        if (version_compare(phpversion('xdebug'), '2.2.0-dev', '>=') &&
            !ini_get('xdebug.coverage_enable')) {
            throw new PHP_CodeCoverage_Exception(
                'xdebug.coverage_enable=On has to be set in php.ini'
            );
        }
    }

    
    public function start()
    {
        xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);
    }

    
    public function stop()
    {
        $Vqhzkfsafzrc = xdebug_get_code_coverage();
        xdebug_stop_code_coverage();

        return $this->cleanup($Vqhzkfsafzrc);
    }

    
    private function cleanup(array $Vqhzkfsafzrc)
    {
        foreach (array_keys($Vqhzkfsafzrc) as $Vpu3xl4uhgg5) {
            unset($Vqhzkfsafzrc[$Vpu3xl4uhgg5][0]);

            if ($Vpu3xl4uhgg5 != 'xdebug://debug-eval' && file_exists($Vpu3xl4uhgg5)) {
                $Vq5gy13b53wg = $this->getNumberOfLinesInFile($Vpu3xl4uhgg5);

                foreach (array_keys($Vqhzkfsafzrc[$Vpu3xl4uhgg5]) as $Vrwsmtja4f2j) {
                    if (isset($Vqhzkfsafzrc[$Vpu3xl4uhgg5][$Vrwsmtja4f2j]) && $Vrwsmtja4f2j > $Vq5gy13b53wg) {
                        unset($Vqhzkfsafzrc[$Vpu3xl4uhgg5][$Vrwsmtja4f2j]);
                    }
                }
            }
        }

        return $Vqhzkfsafzrc;
    }

    
    private function getNumberOfLinesInFile($Vpu3xl4uhgg5)
    {
        $Vd3322ljwbqh = file_get_contents($Vpu3xl4uhgg5);
        $Vrwsmtja4f2js  = substr_count($Vd3322ljwbqh, "\n");

        if (substr($Vd3322ljwbqh, -1) !== "\n") {
            $Vrwsmtja4f2js++;
        }

        return $Vrwsmtja4f2js;
    }
}
