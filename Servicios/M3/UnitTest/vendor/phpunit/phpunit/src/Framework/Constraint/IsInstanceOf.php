<?php



class PHPUnit_Framework_Constraint_IsInstanceOf extends PHPUnit_Framework_Constraint
{
    
    protected $Vh0iae5cev4i;

    
    public function __construct($Vh0iae5cev4i)
    {
        parent::__construct();
        $this->className = $Vh0iae5cev4i;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return ($Vddxcctrvo5d instanceof $this->className);
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return sprintf(
            '%s is an instance of %s "%s"',
            $this->exporter->shortenedExport($Vddxcctrvo5d),
            $this->getType(),
            $this->className
        );
    }

    
    public function toString()
    {
        return sprintf(
            'is instance of %s "%s"',
            $this->getType(),
            $this->className
        );
    }

    private function getType()
    {
        try {
            $Vjqwoq0sz3ty = new ReflectionClass($this->className);
            if ($Vjqwoq0sz3ty->isInterface()) {
                return 'interface';
            }
        } catch (ReflectionException $Vpt32vvhspnv) {
        }

        return 'class';
    }
}
