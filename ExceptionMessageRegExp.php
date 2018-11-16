<?php



class PHPUnit_Framework_Constraint_ExceptionMessageRegExp extends PHPUnit_Framework_Constraint
{
    
    protected $Vyiipuqhtadr;

    
    public function __construct($Vwcb1oykhumm)
    {
        parent::__construct();
        $this->expectedMessageRegExp = $Vwcb1oykhumm;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        $Vwetg4hewdr4 = PHPUnit_Util_Regex::pregMatchSafe($this->expectedMessageRegExp, $Vddxcctrvo5d->getMessage());

        if (false === $Vwetg4hewdr4) {
            throw new PHPUnit_Framework_Exception(
                "Invalid expected exception message regex given: '{$this->expectedMessageRegExp}'"
            );
        }

        return 1 === $Vwetg4hewdr4;
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return sprintf(
            "exception message '%s' matches '%s'",
            $Vddxcctrvo5d->getMessage(),
            $this->expectedMessageRegExp
        );
    }

    
    public function toString()
    {
        return 'exception message matches ';
    }
}
