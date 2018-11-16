<?php



namespace Pimple\Tests\Psr11;

use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Pimple\Psr11\Container as PsrContainer;
use Pimple\Tests\Fixtures\Service;

class ContainerTest extends TestCase
{
    public function testGetReturnsExistingService()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Service();
        };
        $Ve22jvtd41zz = new PsrContainer($Vyymzk4dypcg);

        $this->assertSame($Vyymzk4dypcg['service'], $Ve22jvtd41zz->get('service'));
    }

    
    public function testGetThrowsExceptionIfServiceIsNotFound()
    {
        $Vyymzk4dypcg = new Container();
        $Ve22jvtd41zz = new PsrContainer($Vyymzk4dypcg);

        $Ve22jvtd41zz->get('service');
    }

    public function testHasReturnsTrueIfServiceExists()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Service();
        };
        $Ve22jvtd41zz = new PsrContainer($Vyymzk4dypcg);

        $this->assertTrue($Ve22jvtd41zz->has('service'));
    }

    public function testHasReturnsFalseIfServiceDoesNotExist()
    {
        $Vyymzk4dypcg = new Container();
        $Ve22jvtd41zz = new PsrContainer($Vyymzk4dypcg);

        $this->assertFalse($Ve22jvtd41zz->has('service'));
    }
}
