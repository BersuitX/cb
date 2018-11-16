<?php



class PHPUnit_Framework_Constraint_Not extends PHPUnit_Framework_Constraint
{
    
    protected $Veup52kdjcwg;

    
    public function __construct($Veup52kdjcwg)
    {
        parent::__construct();

        if (!($Veup52kdjcwg instanceof PHPUnit_Framework_Constraint)) {
            $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsEqual($Veup52kdjcwg);
        }

        $this->constraint = $Veup52kdjcwg;
    }

    
    public static function negate($Ve5tcsso230g)
    {
        return str_replace(
            array(
            'contains ',
            'exists',
            'has ',
            'is ',
            'are ',
            'matches ',
            'starts with ',
            'ends with ',
            'reference ',
            'not not '
            ),
            array(
            'does not contain ',
            'does not exist',
            'does not have ',
            'is not ',
            'are not ',
            'does not match ',
            'starts not with ',
            'ends not with ',
            'don\'t reference ',
            'not '
            ),
            $Ve5tcsso230g
        );
    }

    
    public function evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv = '', $V1mtrtkwdl1m = false)
    {
        $V1haejvd0urz = !$this->constraint->evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv, true);

        if ($V1mtrtkwdl1m) {
            return $V1haejvd0urz;
        }

        if (!$V1haejvd0urz) {
            $this->fail($Vddxcctrvo5d, $Vg24o3v4hbzv);
        }
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        switch (get_class($this->constraint)) {
            case 'PHPUnit_Framework_Constraint_And':
            case 'PHPUnit_Framework_Constraint_Not':
            case 'PHPUnit_Framework_Constraint_Or':
                return 'not( ' . $this->constraint->failureDescription($Vddxcctrvo5d) . ' )';

            default:
                return self::negate(
                    $this->constraint->failureDescription($Vddxcctrvo5d)
                );
        }
    }

    
    public function toString()
    {
        switch (get_class($this->constraint)) {
            case 'PHPUnit_Framework_Constraint_And':
            case 'PHPUnit_Framework_Constraint_Not':
            case 'PHPUnit_Framework_Constraint_Or':
                return 'not( ' . $this->constraint->toString() . ' )';

            default:
                return self::negate(
                    $this->constraint->toString()
                );
        }
    }

    
    public function count()
    {
        return count($this->constraint);
    }
}
