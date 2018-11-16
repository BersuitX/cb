<?php



namespace Pimple\Tests\Fixtures;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PimpleServiceProvider implements ServiceProviderInterface
{
    
    public function register(Container $Vyymzk4dypcg)
    {
        $Vyymzk4dypcg['param'] = 'value';

        $Vyymzk4dypcg['service'] = function () {
            return new Service();
        };

        $Vyymzk4dypcg['factory'] = $Vyymzk4dypcg->factory(function () {
            return new Service();
        });
    }
}
