<?php
class ExceptionInSetUpTest extends PHPUnit_Framework_TestCase
{
    public $Vplp3r5j404i                = false;
    public $Vzl3r51aw4lf  = false;
    public $Vjjvgtljzauv = false;
    public $Viscld3nswdb             = false;
    public $Vx24aud4gcbz        = false;

    protected function setUp()
    {
        $this->setUp = true;
        throw new Exception;
    }

    protected function assertPreConditions()
    {
        $this->assertPreConditions = true;
    }

    public function testSomething()
    {
        $this->testSomething = true;
    }

    protected function assertPostConditions()
    {
        $this->assertPostConditions = true;
    }

    protected function tearDown()
    {
        $this->tearDown = true;
    }
}
