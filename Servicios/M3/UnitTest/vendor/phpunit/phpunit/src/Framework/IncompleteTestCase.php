<?php



class PHPUnit_Framework_IncompleteTestCase extends PHPUnit_Framework_TestCase
{
    
    protected $Vbl4yrmdan1y = '';

    
    protected $Vaf3jfgkfpgj = false;

    
    protected $V1ji0ss4bexn = false;

    
    protected $Vqgwnt0xmvnd = false;

    
    protected $Vpilod0srpsw = false;

    
    protected $V5qj3edw1uo4 = false;

    
    public function __construct($Vh0iae5cev4i, $Vc1exo5hbki5, $Vbl4yrmdan1y = '')
    {
        $this->message = $Vbl4yrmdan1y;
        parent::__construct($Vh0iae5cev4i . '::' . $Vc1exo5hbki5);
    }

    
    protected function runTest()
    {
        $this->markTestIncomplete($this->message);
    }

    
    public function getMessage()
    {
        return $this->message;
    }

    
    public function toString()
    {
        return $this->getName();
    }
}
