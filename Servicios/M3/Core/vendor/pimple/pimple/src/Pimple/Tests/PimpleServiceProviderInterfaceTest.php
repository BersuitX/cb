<?php



namespace Pimple\Tests;

use Pimple\Container;


class PimpleServiceProviderInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testProvider()
    {
        $Vyymzk4dypcg = new Container();

        $Vyymzk4dypcgServiceProvider = new Fixtures\PimpleServiceProvider();
        $Vyymzk4dypcgServiceProvider->register($Vyymzk4dypcg);

        $this->assertEquals('value', $Vyymzk4dypcg['param']);
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vyymzk4dypcg['service']);

        $Vxfodhws22k0 = $Vyymzk4dypcg['factory'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vxfodhws22k0);

        $Vfp2rzuwfajm = $Vyymzk4dypcg['factory'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vfp2rzuwfajm);

        $this->assertNotSame($Vxfodhws22k0, $Vfp2rzuwfajm);
    }

    public function testProviderWithRegisterMethod()
    {
        $Vyymzk4dypcg = new Container();

        $Vyymzk4dypcg->register(new Fixtures\PimpleServiceProvider(), array(
            'anotherParameter' => 'anotherValue',
        ));

        $this->assertEquals('value', $Vyymzk4dypcg['param']);
        $this->assertEquals('anotherValue', $Vyymzk4dypcg['anotherParameter']);

        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vyymzk4dypcg['service']);

        $Vxfodhws22k0 = $Vyymzk4dypcg['factory'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vxfodhws22k0);

        $Vfp2rzuwfajm = $Vyymzk4dypcg['factory'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vfp2rzuwfajm);

        $this->assertNotSame($Vxfodhws22k0, $Vfp2rzuwfajm);
    }
}
