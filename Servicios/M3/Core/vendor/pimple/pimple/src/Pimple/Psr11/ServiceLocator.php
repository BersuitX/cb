<?php



namespace Pimple\Psr11;

use Pimple\Container as PimpleContainer;
use Pimple\Exception\UnknownIdentifierException;
use Psr\Container\ContainerInterface;


class ServiceLocator implements ContainerInterface
{
    private $Vb1jhtbuqbys;
    private $Vsikwyoiyz3y = array();

    
    public function __construct(PimpleContainer $Vb1jhtbuqbys, array $Vp0j3yprgfwj)
    {
        $this->container = $Vb1jhtbuqbys;

        foreach ($Vp0j3yprgfwj as $Vlpbz5aloxqt => $V4mdxaz2cfcr) {
            $this->aliases[\is_int($Vlpbz5aloxqt) ? $V4mdxaz2cfcr : $Vlpbz5aloxqt] = $V4mdxaz2cfcr;
        }
    }

    
    public function get($V4mdxaz2cfcr)
    {
        if (!isset($this->aliases[$V4mdxaz2cfcr])) {
            throw new UnknownIdentifierException($V4mdxaz2cfcr);
        }

        return $this->container[$this->aliases[$V4mdxaz2cfcr]];
    }

    
    public function has($V4mdxaz2cfcr)
    {
        return isset($this->aliases[$V4mdxaz2cfcr]) && isset($this->container[$this->aliases[$V4mdxaz2cfcr]]);
    }
}
