<?php


namespace SebastianBergmann\RecursionContext;

use PHPUnit_Framework_TestCase;


class ContextTest extends PHPUnit_Framework_TestCase
{
    
    private $Vylnw34ljlp1;

    protected function setUp()
    {
        $this->context = new Context();
    }

    public function failsProvider()
    {
        return array(
            array(true),
            array(false),
            array(null),
            array('string'),
            array(1),
            array(1.5),
            array(fopen('php://memory', 'r'))
        );
    }

    public function valuesProvider()
    {
        $Vvhuu5wijnd1      = new \stdClass();
        $Vvhuu5wijnd1->foo = 'bar';

        $Vfyks4wg4wfx = (object) array(1,2,"Test\r\n",4,5,6,7,8);

        $Vuvvkm1baslr = new \stdClass();
        
        $Vuvvkm1baslr->null = null;
        
        $Vuvvkm1baslr->boolean     = true;
        $Vuvvkm1baslr->integer     = 1;
        $Vuvvkm1baslr->double      = 1.2;
        $Vuvvkm1baslr->string      = '1';
        $Vuvvkm1baslr->text        = "this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext";
        $Vuvvkm1baslr->object      = $Vvhuu5wijnd1;
        $Vuvvkm1baslr->objectagain = $Vvhuu5wijnd1;
        $Vuvvkm1baslr->array       = array('foo' => 'bar');
        $Vuvvkm1baslr->array2      = array(1,2,3,4,5,6);
        $Vuvvkm1baslr->array3      = array($Vuvvkm1baslr, $Vvhuu5wijnd1, $Vfyks4wg4wfx);
        $Vuvvkm1baslr->self        = $Vuvvkm1baslr;

        $Vqictfcp0llj = new \SplObjectStorage();
        $Vqictfcp0llj->attach($Vvhuu5wijnd1);
        $Vqictfcp0llj->foo = $Vvhuu5wijnd1;

        return array(
            array($Vuvvkm1baslr, spl_object_hash($Vuvvkm1baslr)),
            array($Vvhuu5wijnd1, spl_object_hash($Vvhuu5wijnd1)),
            array($Vfyks4wg4wfx, spl_object_hash($Vfyks4wg4wfx)),
            array($Vqictfcp0llj, spl_object_hash($Vqictfcp0llj)),
            array($Vuvvkm1baslr->array, 0),
            array($Vuvvkm1baslr->array2, 0),
            array($Vuvvkm1baslr->array3, 0)
        );
    }

    
    public function testAddFails($Vcptarsq5qe4)
    {
        $this->setExpectedException(
          'SebastianBergmann\\RecursionContext\\Exception',
          'Only arrays and objects are supported'
        );
        $this->context->add($Vcptarsq5qe4);
    }

    
    public function testContainsFails($Vcptarsq5qe4)
    {
        $this->setExpectedException(
          'SebastianBergmann\\RecursionContext\\Exception',
          'Only arrays and objects are supported'
        );
        $this->context->contains($Vcptarsq5qe4);
    }

    
    public function testAdd($Vcptarsq5qe4, $Vlpbz5aloxqt)
    {
        $this->assertEquals($Vlpbz5aloxqt, $this->context->add($Vcptarsq5qe4));

        
        $this->assertEquals($Vlpbz5aloxqt, $this->context->add($Vcptarsq5qe4));
    }

    
    public function testContainsFound($Vcptarsq5qe4, $Vlpbz5aloxqt)
    {
        $this->context->add($Vcptarsq5qe4);
        $this->assertEquals($Vlpbz5aloxqt, $this->context->contains($Vcptarsq5qe4));

        
        $this->assertEquals($Vlpbz5aloxqt, $this->context->contains($Vcptarsq5qe4));
    }

    
    public function testContainsNotFound($Vcptarsq5qe4)
    {
        $this->assertFalse($this->context->contains($Vcptarsq5qe4));
    }
}
