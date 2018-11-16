<?php



class PHPUnit_Extensions_TestDecorator extends PHPUnit_Framework_Assert implements PHPUnit_Framework_Test, PHPUnit_Framework_SelfDescribing
{
    
    protected $Vpswbntjg3pr = null;

    
    public function __construct(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        $this->test = $Vpswbntjg3pr;
    }

    
    public function toString()
    {
        return $this->test->toString();
    }

    
    public function basicRun(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $this->test->run($Vv0hyvhlkjqr);
    }

    
    public function count()
    {
        return count($this->test);
    }

    
    protected function createResult()
    {
        return new PHPUnit_Framework_TestResult;
    }

    
    public function getTest()
    {
        return $this->test;
    }

    
    public function run(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr = null)
    {
        if ($Vv0hyvhlkjqr === null) {
            $Vv0hyvhlkjqr = $this->createResult();
        }

        $this->basicRun($Vv0hyvhlkjqr);

        return $Vv0hyvhlkjqr;
    }
}
