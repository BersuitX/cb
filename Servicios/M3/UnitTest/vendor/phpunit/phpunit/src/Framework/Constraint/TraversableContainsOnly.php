<?php



class PHPUnit_Framework_Constraint_TraversableContainsOnly extends PHPUnit_Framework_Constraint
{
    
    protected $Veup52kdjcwg;

    
    protected $V31qrja1w0r2;

    
    public function __construct($V31qrja1w0r2, $V252yl31d1cg = true)
    {
        parent::__construct();

        if ($V252yl31d1cg) {
            $this->constraint = new PHPUnit_Framework_Constraint_IsType($V31qrja1w0r2);
        } else {
            $this->constraint = new PHPUnit_Framework_Constraint_IsInstanceOf(
                $V31qrja1w0r2
            );
        }

        $this->type = $V31qrja1w0r2;
    }

    
    public function evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv = '', $V1mtrtkwdl1m = false)
    {
        $V1haejvd0urz = true;

        foreach ($Vddxcctrvo5d as $Virsew13xpli) {
            if (!$this->constraint->evaluate($Virsew13xpli, '', true)) {
                $V1haejvd0urz = false;
                break;
            }
        }

        if ($V1mtrtkwdl1m) {
            return $V1haejvd0urz;
        }

        if (!$V1haejvd0urz) {
            $this->fail($Vddxcctrvo5d, $Vg24o3v4hbzv);
        }
    }

    
    public function toString()
    {
        return 'contains only values of type "' . $this->type . '"';
    }
}
