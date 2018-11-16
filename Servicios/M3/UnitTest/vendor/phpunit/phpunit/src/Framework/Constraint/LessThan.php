<?php



class PHPUnit_Framework_Constraint_LessThan extends PHPUnit_Framework_Constraint
{
    
    protected $Vcptarsq5qe4;

    
    public function __construct($Vcptarsq5qe4)
    {
        parent::__construct();
        $this->value = $Vcptarsq5qe4;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return $this->value > $Vddxcctrvo5d;
    }

    
    public function toString()
    {
        return 'is less than ' . $this->exporter->export($this->value);
    }
}
