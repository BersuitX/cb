<?php



class PHPUnit_Framework_Constraint_StringEndsWith extends PHPUnit_Framework_Constraint
{
    
    protected $V52q32upexbe;

    
    public function __construct($V52q32upexbe)
    {
        parent::__construct();
        $this->suffix = $V52q32upexbe;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return substr($Vddxcctrvo5d, 0 - strlen($this->suffix)) == $this->suffix;
    }

    
    public function toString()
    {
        return 'ends with "' . $this->suffix . '"';
    }
}
