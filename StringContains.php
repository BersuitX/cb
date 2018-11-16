<?php



class PHPUnit_Framework_Constraint_StringContains extends PHPUnit_Framework_Constraint
{
    
    protected $Ve5tcsso230g;

    
    protected $V2tcbx0tpkh3;

    
    public function __construct($Ve5tcsso230g, $V2tcbx0tpkh3 = false)
    {
        parent::__construct();

        $this->string     = $Ve5tcsso230g;
        $this->ignoreCase = $V2tcbx0tpkh3;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        if ($this->ignoreCase) {
            return stripos($Vddxcctrvo5d, $this->string) !== false;
        } else {
            return strpos($Vddxcctrvo5d, $this->string) !== false;
        }
    }

    
    public function toString()
    {
        if ($this->ignoreCase) {
            $Ve5tcsso230g = strtolower($this->string);
        } else {
            $Ve5tcsso230g = $this->string;
        }

        return sprintf(
            'contains "%s"',
            $Ve5tcsso230g
        );
    }
}
