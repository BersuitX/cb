<?php



class PHPUnit_Framework_Constraint_ClassHasAttribute extends PHPUnit_Framework_Constraint
{
    
    protected $Vwdqynfrh4s0;

    
    public function __construct($Vwdqynfrh4s0)
    {
        parent::__construct();
        $this->attributeName = $Vwdqynfrh4s0;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        $Vqmu1sajhgfn = new ReflectionClass($Vddxcctrvo5d);

        return $Vqmu1sajhgfn->hasProperty($this->attributeName);
    }

    
    public function toString()
    {
        return sprintf(
            'has attribute "%s"',
            $this->attributeName
        );
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return sprintf(
            '%sclass "%s" %s',
            is_object($Vddxcctrvo5d) ? 'object of ' : '',
            is_object($Vddxcctrvo5d) ? get_class($Vddxcctrvo5d) : $Vddxcctrvo5d,
            $this->toString()
        );
    }
}
