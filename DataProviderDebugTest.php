<?php
class DataProviderDebugTest extends PHPUnit_Framework_TestCase
{
    
    public function testProvider()
    {
        $this->assertTrue(true);
    }

    public static function provider()
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
        $Vuvvkm1baslr->self        = $Vuvvkm1baslr;

        $Vqictfcp0llj = new \SplObjectStorage();
        $Vqictfcp0llj->attach($Vvhuu5wijnd1);
        $Vqictfcp0llj->foo = $Vvhuu5wijnd1;

        return array(
            array(null, true, 1, 1.0),
            array(1.2, fopen('php://memory', 'r'), '1'),
            array(array(array(1,2,3), array(3,4,5))),
            
            array("this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext"),
            array(new \stdClass(), $Vuvvkm1baslr, array(), $Vqictfcp0llj, $Vfyks4wg4wfx),
            array(chr(0) . chr(1) . chr(2) . chr(3) . chr(4) . chr(5), implode('', array_map('chr', range(0x0e, 0x1f)))),
            array(chr(0x00) . chr(0x09))
        );
    }
}
