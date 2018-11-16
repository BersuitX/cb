<?php



namespace Pimple\Psr11;

use Pimple\Container as PimpleContainer;
use Psr\Container\ContainerInterface;


final class Container implements ContainerInterface
{
    private $Vyymzk4dypcg;

    public function __construct(PimpleContainer $Vyymzk4dypcg)
    {
        $this->pimple = $Vyymzk4dypcg;
    }

    public function get($V4mdxaz2cfcr)
    {
        return $this->pimple[$V4mdxaz2cfcr];
    }

    public function has($V4mdxaz2cfcr)
    {
        return isset($this->pimple[$V4mdxaz2cfcr]);
    }
}
