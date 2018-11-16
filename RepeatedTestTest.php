<?php



class Extensions_RepeatedTestTest extends PHPUnit_Framework_TestCase
{
    protected $Vrrxtoyyy15e;

    public function __construct()
    {
        $this->suite = new PHPUnit_Framework_TestSuite;

        $this->suite->addTest(new Success);
        $this->suite->addTest(new Success);
    }

    public function testRepeatedOnce()
    {
        $Vpswbntjg3pr = new PHPUnit_Extensions_RepeatedTest($this->suite, 1);
        $this->assertEquals(2, count($Vpswbntjg3pr));

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();
        $this->assertEquals(2, count($Vv0hyvhlkjqr));
    }

    public function testRepeatedMoreThanOnce()
    {
        $Vpswbntjg3pr = new PHPUnit_Extensions_RepeatedTest($this->suite, 3);
        $this->assertEquals(6, count($Vpswbntjg3pr));

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();
        $this->assertEquals(6, count($Vv0hyvhlkjqr));
    }

    public function testRepeatedZero()
    {
        $Vpswbntjg3pr = new PHPUnit_Extensions_RepeatedTest($this->suite, 0);
        $this->assertEquals(0, count($Vpswbntjg3pr));

        $Vv0hyvhlkjqr = $Vpswbntjg3pr->run();
        $this->assertEquals(0, count($Vv0hyvhlkjqr));
    }

    public function testRepeatedNegative()
    {
        try {
            $Vpswbntjg3pr = new PHPUnit_Extensions_RepeatedTest($this->suite, -1);
        } catch (Exception $Vpt32vvhspnv) {
            return;
        }

        $this->fail('Should throw an Exception');
    }
}
