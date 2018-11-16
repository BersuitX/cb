<?php



class PHPUnit_Framework_Constraint_PCREMatch extends PHPUnit_Framework_Constraint
{
    
    protected $Vp1x1qfledcv;

    
    public function __construct($Vp1x1qfledcv)
    {
        parent::__construct();
        $this->pattern = $Vp1x1qfledcv;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return preg_match($this->pattern, $Vddxcctrvo5d) > 0;
    }

    
    public function toString()
    {
        return sprintf(
            'matches PCRE pattern "%s"',
            $this->pattern
        );
    }
}
