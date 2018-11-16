<?php
class DoubleTestCase implements PHPUnit_Framework_Test
{
    protected $V0yzsmqqj1m3;

    public function __construct(PHPUnit_Framework_TestCase $V0yzsmqqj1m3)
    {
        $this->testCase = $V0yzsmqqj1m3;
    }

    public function count()
    {
        return 2;
    }

    public function run(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr = null)
    {
        $Vv0hyvhlkjqr->startTest($this);

        $this->testCase->runBare();
        $this->testCase->runBare();

        $Vv0hyvhlkjqr->endTest($this, 0);
    }
}
