<?php


use SebastianBergmann\Exporter\Exporter;


abstract class PHPUnit_Framework_Constraint implements Countable, PHPUnit_Framework_SelfDescribing
{
    protected $Vnqoiikqsyp5;

    public function __construct()
    {
        $this->exporter = new Exporter;
    }

    
    public function evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv = '', $V1mtrtkwdl1m = false)
    {
        $V1haejvd0urz = false;

        if ($this->matches($Vddxcctrvo5d)) {
            $V1haejvd0urz = true;
        }

        if ($V1mtrtkwdl1m) {
            return $V1haejvd0urz;
        }

        if (!$V1haejvd0urz) {
            $this->fail($Vddxcctrvo5d, $Vg24o3v4hbzv);
        }
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return false;
    }

    
    public function count()
    {
        return 1;
    }

    
    protected function fail($Vddxcctrvo5d, $Vg24o3v4hbzv, SebastianBergmann\Comparator\ComparisonFailure $Vu2boav2khfu = null)
    {
        $Vcnb5stwobqy = sprintf(
            'Failed asserting that %s.',
            $this->failureDescription($Vddxcctrvo5d)
        );

        $V2wi12qzl0r5 = $this->additionalFailureDescription($Vddxcctrvo5d);

        if ($V2wi12qzl0r5) {
            $Vcnb5stwobqy .= "\n" . $V2wi12qzl0r5;
        }

        if (!empty($Vg24o3v4hbzv)) {
            $Vcnb5stwobqy = $Vg24o3v4hbzv . "\n" . $Vcnb5stwobqy;
        }

        throw new PHPUnit_Framework_ExpectationFailedException(
            $Vcnb5stwobqy,
            $Vu2boav2khfu
        );
    }

    
    protected function additionalFailureDescription($Vddxcctrvo5d)
    {
        return '';
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return $this->exporter->export($Vddxcctrvo5d) . ' ' . $this->toString();
    }
}
