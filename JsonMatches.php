<?php



class PHPUnit_Framework_Constraint_JsonMatches extends PHPUnit_Framework_Constraint
{
    
    protected $Vcptarsq5qe4;

    
    public function __construct($Vcptarsq5qe4)
    {
        parent::__construct();
        $this->value = $Vcptarsq5qe4;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        $V1rwqotksrps = json_decode($Vddxcctrvo5d);
        if (json_last_error()) {
            return false;
        }

        $Vrrdecg1utd0 = json_decode($this->value);
        if (json_last_error()) {
            return false;
        }

        return $V1rwqotksrps == $Vrrdecg1utd0;
    }

    
    public function toString()
    {
        return sprintf(
            'matches JSON string "%s"',
            $this->value
        );
    }
}
