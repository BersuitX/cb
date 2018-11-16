<?php



abstract class PHPUnit_Framework_Constraint_Composite extends PHPUnit_Framework_Constraint
{
    
    protected $Vr2lrnivickf;

    
    public function __construct(PHPUnit_Framework_Constraint $Vr2lrnivickf)
    {
        parent::__construct();
        $this->innerConstraint = $Vr2lrnivickf;
    }

    
    public function evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv = '', $V1mtrtkwdl1m = false)
    {
        try {
            return $this->innerConstraint->evaluate(
                $Vddxcctrvo5d,
                $Vg24o3v4hbzv,
                $V1mtrtkwdl1m
            );
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->fail($Vddxcctrvo5d, $Vg24o3v4hbzv);
        }
    }

    
    public function count()
    {
        return count($this->innerConstraint);
    }
}
