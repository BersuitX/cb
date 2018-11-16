<?php



class PHPUnit_Framework_Constraint_ExceptionCode extends PHPUnit_Framework_Constraint
{
    
    protected $Vtmmb52fhzah;

    
    public function __construct($Vwcb1oykhumm)
    {
        parent::__construct();
        $this->expectedCode = $Vwcb1oykhumm;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return (string) $Vddxcctrvo5d->getCode() == (string) $this->expectedCode;
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return sprintf(
            '%s is equal to expected exception code %s',
            $this->exporter->export($Vddxcctrvo5d->getCode()),
            $this->exporter->export($this->expectedCode)
        );
    }

    
    public function toString()
    {
        return 'exception code is ';
    }
}
