<?php



abstract class PHPUnit_Util_PHP
{
    
    public static function factory()
    {
        if (DIRECTORY_SEPARATOR == '\\') {
            return new PHPUnit_Util_PHP_Windows;
        }

        return new PHPUnit_Util_PHP_Default;
    }

    
    public function runTestJob($Vxvhogozufkq, PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $Vv0hyvhlkjqr->startTest($Vpswbntjg3pr);

        $Veiyjgidkhjo = $this->runJob($Vxvhogozufkq);

        $this->processChildResult(
            $Vpswbntjg3pr,
            $Vv0hyvhlkjqr,
            $Veiyjgidkhjo['stdout'],
            $Veiyjgidkhjo['stderr']
        );
    }

    
    abstract public function runJob($Vxvhogozufkq, array $Vgzibbh1fx1x = array());

    
    protected function settingsToParameters(array $Vgzibbh1fx1x)
    {
        $Vd3322ljwbqh = '';

        foreach ($Vgzibbh1fx1x as $Vwkhvezsmlhv) {
            $Vd3322ljwbqh .= ' -d ' . $Vwkhvezsmlhv;
        }

        return $Vd3322ljwbqh;
    }

    
    private function processChildResult(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_TestResult $Vv0hyvhlkjqr, $Vhobtkzyzlrq, $Vx3rllm2h3ap)
    {
        $Vlbwbnl10iav = 0;

        if (!empty($Vx3rllm2h3ap)) {
            $Vv0hyvhlkjqr->addError(
                $Vpswbntjg3pr,
                new PHPUnit_Framework_Exception(trim($Vx3rllm2h3ap)),
                $Vlbwbnl10iav
            );
        } else {
            set_error_handler(function ($Vw1gxgyvs3zp, $Vgmp43clkfhs, $Vv3o4yaizvys, $Vkbokrl43wan) {
                throw new ErrorException($Vgmp43clkfhs, $Vw1gxgyvs3zp, $Vw1gxgyvs3zp, $Vv3o4yaizvys, $Vkbokrl43wan);
            });
            try {
                if (strpos($Vhobtkzyzlrq, "#!/usr/bin/env php\n") === 0) {
                    $Vhobtkzyzlrq = substr($Vhobtkzyzlrq, 19);
                }

                $Vofhmnoxklhp = unserialize(str_replace("#!/usr/bin/env php\n", '', $Vhobtkzyzlrq));
                restore_error_handler();
            } catch (ErrorException $Vpt32vvhspnv) {
                restore_error_handler();
                $Vofhmnoxklhp = false;

                $Vv0hyvhlkjqr->addError(
                    $Vpswbntjg3pr,
                    new PHPUnit_Framework_Exception(trim($Vhobtkzyzlrq), 0, $Vpt32vvhspnv),
                    $Vlbwbnl10iav
                );
            }

            if ($Vofhmnoxklhp !== false) {
                if (!empty($Vofhmnoxklhp['output'])) {
                    $Vvaiuwffullu = $Vofhmnoxklhp['output'];
                }

                $Vpswbntjg3pr->setResult($Vofhmnoxklhp['testResult']);
                $Vpswbntjg3pr->addToAssertionCount($Vofhmnoxklhp['numAssertions']);

                $Vofhmnoxklhp = $Vofhmnoxklhp['result'];

                if ($Vv0hyvhlkjqr->getCollectCodeCoverageInformation()) {
                    $Vv0hyvhlkjqr->getCodeCoverage()->merge(
                        $Vofhmnoxklhp->getCodeCoverage()
                    );
                }

                $Vlbwbnl10iav           = $Vofhmnoxklhp->time();
                $V0kz5ja2socz = $Vofhmnoxklhp->notImplemented();
                $Vipu2105vwki          = $Vofhmnoxklhp->risky();
                $V05tdp5a3iig        = $Vofhmnoxklhp->skipped();
                $Vpt32vvhspnvrrors         = $Vofhmnoxklhp->errors();
                $Ve2u2ohzoqze       = $Vofhmnoxklhp->failures();

                if (!empty($V0kz5ja2socz)) {
                    $Vv0hyvhlkjqr->addError(
                        $Vpswbntjg3pr,
                        $this->getException($V0kz5ja2socz[0]),
                        $Vlbwbnl10iav
                    );
                } elseif (!empty($Vipu2105vwki)) {
                    $Vv0hyvhlkjqr->addError(
                        $Vpswbntjg3pr,
                        $this->getException($Vipu2105vwki[0]),
                        $Vlbwbnl10iav
                    );
                } elseif (!empty($V05tdp5a3iig)) {
                    $Vv0hyvhlkjqr->addError(
                        $Vpswbntjg3pr,
                        $this->getException($V05tdp5a3iig[0]),
                        $Vlbwbnl10iav
                    );
                } elseif (!empty($Vpt32vvhspnvrrors)) {
                    $Vv0hyvhlkjqr->addError(
                        $Vpswbntjg3pr,
                        $this->getException($Vpt32vvhspnvrrors[0]),
                        $Vlbwbnl10iav
                    );
                } elseif (!empty($Ve2u2ohzoqze)) {
                    $Vv0hyvhlkjqr->addFailure(
                        $Vpswbntjg3pr,
                        $this->getException($Ve2u2ohzoqze[0]),
                        $Vlbwbnl10iav
                    );
                }
            }
        }

        $Vv0hyvhlkjqr->endTest($Vpswbntjg3pr, $Vlbwbnl10iav);

        if (!empty($Vvaiuwffullu)) {
            print $Vvaiuwffullu;
        }
    }

    
    private function getException(PHPUnit_Framework_TestFailure $Vpt32vvhspnvrror)
    {
        $Vpt32vvhspnvxception = $Vpt32vvhspnvrror->thrownException();

        if ($Vpt32vvhspnvxception instanceof __PHP_Incomplete_Class) {
            $Vpt32vvhspnvxceptionArray = array();
            foreach ((array) $Vpt32vvhspnvxception as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
                $Vlpbz5aloxqt                  = substr($Vlpbz5aloxqt, strrpos($Vlpbz5aloxqt, "\0") + 1);
                $Vpt32vvhspnvxceptionArray[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
            }

            $Vpt32vvhspnvxception = new PHPUnit_Framework_SyntheticError(
                sprintf(
                    '%s: %s',
                    $Vpt32vvhspnvxceptionArray['_PHP_Incomplete_Class_Name'],
                    $Vpt32vvhspnvxceptionArray['message']
                ),
                $Vpt32vvhspnvxceptionArray['code'],
                $Vpt32vvhspnvxceptionArray['file'],
                $Vpt32vvhspnvxceptionArray['line'],
                $Vpt32vvhspnvxceptionArray['trace']
            );
        }

        return $Vpt32vvhspnvxception;
    }
}
