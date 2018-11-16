<?php



namespace Pimple\Tests\Psr11;

use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Pimple\Psr11\ServiceLocator;
use Pimple\Tests\Fixtures;


class ServiceLocatorTest extends TestCase
{
    public function testCanAccessServices()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };
        $Vcxkut5dcpqu = new ServiceLocator($Vyymzk4dypcg, array('service'));

        $this->assertSame($Vyymzk4dypcg['service'], $Vcxkut5dcpqu->get('service'));
    }

    public function testCanAccessAliasedServices()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };
        $Vcxkut5dcpqu = new ServiceLocator($Vyymzk4dypcg, array('alias' => 'service'));

        $this->assertSame($Vyymzk4dypcg['service'], $Vcxkut5dcpqu->get('alias'));
    }

    
    public function testCannotAccessAliasedServiceUsingRealIdentifier()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };
        $Vcxkut5dcpqu = new ServiceLocator($Vyymzk4dypcg, array('alias' => 'service'));

        $Vsdtsk3ofza3 = $Vcxkut5dcpqu->get('service');
    }

    
    public function testGetValidatesServiceCanBeLocated()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };
        $Vcxkut5dcpqu = new ServiceLocator($Vyymzk4dypcg, array('alias' => 'service'));

        $Vsdtsk3ofza3 = $Vcxkut5dcpqu->get('foo');
    }

    
    public function testGetValidatesTargetServiceExists()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };
        $Vcxkut5dcpqu = new ServiceLocator($Vyymzk4dypcg, array('alias' => 'invalid'));

        $Vsdtsk3ofza3 = $Vcxkut5dcpqu->get('alias');
    }

    public function testHasValidatesServiceCanBeLocated()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service1'] = function () {
            return new Fixtures\Service();
        };
        $Vyymzk4dypcg['service2'] = function () {
            return new Fixtures\Service();
        };
        $Vcxkut5dcpqu = new ServiceLocator($Vyymzk4dypcg, array('service1'));

        $this->assertTrue($Vcxkut5dcpqu->has('service1'));
        $this->assertFalse($Vcxkut5dcpqu->has('service2'));
    }

    public function testHasChecksIfTargetServiceExists()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };
        $Vcxkut5dcpqu = new ServiceLocator($Vyymzk4dypcg, array('foo' => 'service', 'bar' => 'invalid'));

        $this->assertTrue($Vcxkut5dcpqu->has('foo'));
        $this->assertFalse($Vcxkut5dcpqu->has('bar'));
    }
}
