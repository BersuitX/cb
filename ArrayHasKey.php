<?php



class PHPUnit_Framework_Constraint_ArrayHasKey extends PHPUnit_Framework_Constraint
{
    
    protected $Vlpbz5aloxqt;

    
    public function __construct($Vlpbz5aloxqt)
    {
        parent::__construct();
        $this->key = $Vlpbz5aloxqt;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        if (is_array($Vddxcctrvo5d)) {
            return array_key_exists($this->key, $Vddxcctrvo5d);
        }

        if ($Vddxcctrvo5d instanceof ArrayAccess) {
            return $Vddxcctrvo5d->offsetExists($this->key);
        }

        return false;
    }

    
    public function toString()
    {
        return 'has the key ' . $this->exporter->export($this->key);
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return 'an array ' . $this->toString();
    }
}
