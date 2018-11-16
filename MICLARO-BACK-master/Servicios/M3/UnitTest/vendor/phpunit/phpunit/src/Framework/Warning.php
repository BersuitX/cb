<?php



class PHPUnit_Framework_Warning extends PHPUnit_Framework_TestCase
{
    
    protected $Vbl4yrmdan1y = '';

    
    protected $Vaf3jfgkfpgj = false;

    
    protected $V1ji0ss4bexn = false;

    
    protected $Vqgwnt0xmvnd = false;

    
    protected $Vpilod0srpsw = false;

    
    public function __construct($Vbl4yrmdan1y = '')
    {
        $this->message = $Vbl4yrmdan1y;
        parent::__construct('Warning');
    }

    
    protected function runTest()
    {
        $this->fail($this->message);
    }

    
    public function getMessage()
    {
        return $this->message;
    }

    
    public function toString()
    {
        return 'Warning';
    }
}
