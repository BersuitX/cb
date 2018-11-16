<?php



class PHPUnit_Framework_Constraint_ExceptionMessage extends PHPUnit_Framework_Constraint
{
    
    protected $Vcr3akga0ysh;

    
    public function __construct($Vwcb1oykhumm)
    {
        parent::__construct();
        $this->expectedMessage = $Vwcb1oykhumm;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return strpos($Vddxcctrvo5d->getMessage(), $this->expectedMessage) !== false;
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return sprintf(
            "exception message '%s' contains '%s'",
            $Vddxcctrvo5d->getMessage(),
            $this->expectedMessage
        );
    }

    
    public function toString()
    {
        return 'exception message contains ';
    }
}
