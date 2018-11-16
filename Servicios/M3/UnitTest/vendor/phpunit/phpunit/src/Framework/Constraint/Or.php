<?php



class PHPUnit_Framework_Constraint_Or extends PHPUnit_Framework_Constraint
{
    
    protected $Vyrjfr52m4o1 = array();

    
    public function setConstraints(array $Vyrjfr52m4o1)
    {
        $this->constraints = array();

        foreach ($Vyrjfr52m4o1 as $Veup52kdjcwg) {
            if (!($Veup52kdjcwg instanceof PHPUnit_Framework_Constraint)) {
                $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsEqual(
                    $Veup52kdjcwg
                );
            }

            $this->constraints[] = $Veup52kdjcwg;
        }
    }

    
    public function evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv = '', $V1mtrtkwdl1m = false)
    {
        $V1haejvd0urz    = false;
        $Veup52kdjcwg = null;

        foreach ($this->constraints as $Veup52kdjcwg) {
            if ($Veup52kdjcwg->evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv, true)) {
                $V1haejvd0urz = true;
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
        $Vlakcyq2pqgp = '';

        foreach ($this->constraints as $Vlpbz5aloxqt => $Veup52kdjcwg) {
            if ($Vlpbz5aloxqt > 0) {
                $Vlakcyq2pqgp .= ' or ';
            }

            $Vlakcyq2pqgp .= $Veup52kdjcwg->toString();
        }

        return $Vlakcyq2pqgp;
    }

    
    public function count()
    {
        $Vdbkece3gnp5 = 0;

        foreach ($this->constraints as $Veup52kdjcwg) {
            $Vdbkece3gnp5 += count($Veup52kdjcwg);
        }

        return $Vdbkece3gnp5;
    }
}