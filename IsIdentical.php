<?php



class PHPUnit_Framework_Constraint_IsIdentical extends PHPUnit_Framework_Constraint
{
    
    const EPSILON = 0.0000000001;

    
    protected $Vcptarsq5qe4;

    
    public function __construct($Vcptarsq5qe4)
    {
        parent::__construct();
        $this->value = $Vcptarsq5qe4;
    }

    
    public function evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv = '', $V1mtrtkwdl1m = false)
    {
        if (is_double($this->value) && is_double($Vddxcctrvo5d) &&
            !is_infinite($this->value) && !is_infinite($Vddxcctrvo5d) &&
            !is_nan($this->value) && !is_nan($Vddxcctrvo5d)) {
            $V1haejvd0urz = abs($this->value - $Vddxcctrvo5d) < self::EPSILON;
        } else {
            $V1haejvd0urz = $this->value === $Vddxcctrvo5d;
        }

        if ($V1mtrtkwdl1m) {
            return $V1haejvd0urz;
        }

        if (!$V1haejvd0urz) {
            $Vei44fs011eo = null;

            
            if (is_string($this->value) && is_string($Vddxcctrvo5d)) {
                $Vei44fs011eo = new SebastianBergmann\Comparator\ComparisonFailure(
                    $this->value,
                    $Vddxcctrvo5d,
                    $this->value,
                    $Vddxcctrvo5d
                );
            }

            $this->fail($Vddxcctrvo5d, $Vg24o3v4hbzv, $Vei44fs011eo);
        }
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        if (is_object($this->value) && is_object($Vddxcctrvo5d)) {
            return 'two variables reference the same object';
        }

        if (is_string($this->value) && is_string($Vddxcctrvo5d)) {
            return 'two strings are identical';
        }

        return parent::failureDescription($Vddxcctrvo5d);
    }

    
    public function toString()
    {
        if (is_object($this->value)) {
            return 'is identical to an object of class "' .
                   get_class($this->value) . '"';
        } else {
            return 'is identical to ' .
                   $this->exporter->export($this->value);
        }
    }
}
