<?php



class PHPUnit_Framework_Constraint_StringStartsWith extends PHPUnit_Framework_Constraint
{
    
    protected $V2hf2uebv5m0;

    
    public function __construct($V2hf2uebv5m0)
    {
        parent::__construct();
        $this->prefix = $V2hf2uebv5m0;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return strpos($Vddxcctrvo5d, $this->prefix) === 0;
    }

    
    public function toString()
    {
        return 'starts with "' . $this->prefix . '"';
    }
}
