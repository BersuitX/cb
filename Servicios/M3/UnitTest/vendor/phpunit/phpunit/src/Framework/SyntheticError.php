<?php



class PHPUnit_Framework_SyntheticError extends PHPUnit_Framework_AssertionFailedError
{
    
    protected $Vfwvune3b1wg = '';

    
    protected $Vnvppweuyfwo = 0;

    
    protected $V3ruvwdhyd0d = array();

    
    public function __construct($Vbl4yrmdan1y, $V5kll1klco0v, $Vpu3xl4uhgg5, $Vrwsmtja4f2j, $V1babchxe11h)
    {
        parent::__construct($Vbl4yrmdan1y, $V5kll1klco0v);

        $this->syntheticFile  = $Vpu3xl4uhgg5;
        $this->syntheticLine  = $Vrwsmtja4f2j;
        $this->syntheticTrace = $V1babchxe11h;
    }

    
    public function getSyntheticFile()
    {
        return $this->syntheticFile;
    }

    
    public function getSyntheticLine()
    {
        return $this->syntheticLine;
    }

    
    public function getSyntheticTrace()
    {
        return $this->syntheticTrace;
    }
}
