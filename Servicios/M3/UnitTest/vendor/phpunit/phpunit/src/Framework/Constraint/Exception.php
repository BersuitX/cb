<?php



class PHPUnit_Framework_Constraint_Exception extends PHPUnit_Framework_Constraint
{
    
    protected $Vh0iae5cev4i;

    
    public function __construct($Vh0iae5cev4i)
    {
        parent::__construct();
        $this->className = $Vh0iae5cev4i;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return $Vddxcctrvo5d instanceof $this->className;
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        if ($Vddxcctrvo5d !== null) {
            $Vbl4yrmdan1y = '';
            if ($Vddxcctrvo5d instanceof Exception) {
                $Vbl4yrmdan1y = '. Message was: "' . $Vddxcctrvo5d->getMessage() . '" at'
                        . "\n" . $Vddxcctrvo5d->getTraceAsString();
            }

            return sprintf(
                'exception of type "%s" matches expected exception "%s"%s',
                get_class($Vddxcctrvo5d),
                $this->className,
                $Vbl4yrmdan1y
            );
        }

        return sprintf(
            'exception of type "%s" is thrown',
            $this->className
        );
    }

    
    public function toString()
    {
        return sprintf(
            'exception of type "%s"',
            $this->className
        );
    }
}
