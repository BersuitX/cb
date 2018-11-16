<?php



namespace Pimple\Tests;

use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Pimple\ServiceIterator;
use Pimple\Tests\Fixtures\Service;

class ServiceIteratorTest extends TestCase
{
    public function testIsIterable()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service1'] = function () {
            return new Service();
        };
        $Vyymzk4dypcg['service2'] = function () {
            return new Service();
        };
        $Vyymzk4dypcg['service3'] = function () {
            return new Service();
        };
        $Vnv250ah4t1q = new ServiceIterator($Vyymzk4dypcg, array('service1', 'service2'));

        $this->assertSame(array('service1' => $Vyymzk4dypcg['service1'], 'service2' => $Vyymzk4dypcg['service2']), iterator_to_array($Vnv250ah4t1q));
    }
}
