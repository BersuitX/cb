<?php



class PHPUnit_Framework_Constraint_ArraySubset extends PHPUnit_Framework_Constraint
{
    
    protected $Vjgrhnkfwhsi;

    
    protected $V2xeprdxa0ou;

    
    public function __construct($Vjgrhnkfwhsi, $V2xeprdxa0ou = false)
    {
        parent::__construct();
        $this->strict = $V2xeprdxa0ou;
        $this->subset = $Vjgrhnkfwhsi;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        
        
        if($Vddxcctrvo5d instanceof ArrayAccess) {
            $Vddxcctrvo5d = (array) $Vddxcctrvo5d;
        }

        if($this->subset instanceof ArrayAccess) {
            $this->subset = (array) $this->subset;
        }

        $V0bnsm20ubor = array_replace_recursive($Vddxcctrvo5d, $this->subset);

        if ($this->strict) {
            return $Vddxcctrvo5d === $V0bnsm20ubor;
        } else {
            return $Vddxcctrvo5d == $V0bnsm20ubor;
        }
    }

    
    public function toString()
    {
        return 'has the subset ' . $this->exporter->export($this->subset);
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return 'an array ' . $this->toString();
    }
}
