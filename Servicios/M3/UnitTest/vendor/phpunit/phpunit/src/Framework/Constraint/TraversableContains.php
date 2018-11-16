<?php



class PHPUnit_Framework_Constraint_TraversableContains extends PHPUnit_Framework_Constraint
{
    
    protected $Vxtveoqpekh0;

    
    protected $Vt3lircrduno;

    
    protected $Vcptarsq5qe4;

    
    public function __construct($Vcptarsq5qe4, $Vxtveoqpekh0 = true, $Vt3lircrduno = false)
    {
        parent::__construct();

        if (!is_bool($Vxtveoqpekh0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'boolean');
        }

        if (!is_bool($Vt3lircrduno)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(3, 'boolean');
        }

        $this->checkForObjectIdentity    = $Vxtveoqpekh0;
        $this->checkForNonObjectIdentity = $Vt3lircrduno;
        $this->value                     = $Vcptarsq5qe4;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        if ($Vddxcctrvo5d instanceof SplObjectStorage) {
            return $Vddxcctrvo5d->contains($this->value);
        }

        if (is_object($this->value)) {
            foreach ($Vddxcctrvo5d as $Vbzemolr5akx) {
                if ($this->checkForObjectIdentity && $Vbzemolr5akx === $this->value) {
                    return true;
                } elseif (!$this->checkForObjectIdentity && $Vbzemolr5akx == $this->value) {
                    return true;
                }
            }
        } else {
            foreach ($Vddxcctrvo5d as $Vbzemolr5akx) {
                if ($this->checkForNonObjectIdentity && $Vbzemolr5akx === $this->value) {
                    return true;
                } elseif (!$this->checkForNonObjectIdentity && $Vbzemolr5akx == $this->value) {
                    return true;
                }
            }
        }

        return false;
    }

    
    public function toString()
    {
        if (is_string($this->value) && strpos($this->value, "\n") !== false) {
            return 'contains "' . $this->value . '"';
        } else {
            return 'contains ' . $this->exporter->export($this->value);
        }
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return sprintf(
            '%s %s',
            is_array($Vddxcctrvo5d) ? 'an array' : 'a traversable',
            $this->toString()
        );
    }
}
