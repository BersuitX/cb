<?php



class PHPUnit_Framework_Constraint_Attribute extends PHPUnit_Framework_Constraint_Composite
{
    
    protected $Vwdqynfrh4s0;

    
    public function __construct(PHPUnit_Framework_Constraint $Veup52kdjcwg, $Vwdqynfrh4s0)
    {
        parent::__construct($Veup52kdjcwg);

        $this->attributeName = $Vwdqynfrh4s0;
    }

    
    public function evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv = '', $V1mtrtkwdl1m = false)
    {
        return parent::evaluate(
            PHPUnit_Framework_Assert::readAttribute(
                $Vddxcctrvo5d,
                $this->attributeName
            ),
            $Vg24o3v4hbzv,
            $V1mtrtkwdl1m
        );
    }

    
    public function toString()
    {
        return 'attribute "' . $this->attributeName . '" ' .
               $this->innerConstraint->toString();
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return $this->toString();
    }
}
