<?php

namespace Slim;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Pimple\Container as PimpleContainer;
use Slim\Exception\ContainerValueNotFoundException;
use Slim\Exception\ContainerException as SlimContainerException;


class Container extends PimpleContainer implements ContainerInterface
{
    
    private $Vk1lbn1zrvhv = [
        'httpVersion' => '1.1',
        'responseChunkSize' => 4096,
        'outputBuffering' => 'append',
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => false,
        'addContentLengthHeader' => true,
        'routerCacheFile' => false,
    ];

    
    public function __construct(array $Vmyhfq3hu0xr = [])
    {
        parent::__construct($Vmyhfq3hu0xr);

        $Vfjij5sgxoow = isset($Vmyhfq3hu0xr['settings']) ? $Vmyhfq3hu0xr['settings'] : [];
        $this->registerDefaultServices($Vfjij5sgxoow);
    }

    
    private function registerDefaultServices($Vfjij5sgxoow)
    {
        $Vk1lbn1zrvhv = $this->defaultSettings;

        
        $this['settings'] = function () use ($Vfjij5sgxoow, $Vk1lbn1zrvhv) {
            return new Collection(array_merge($Vk1lbn1zrvhv, $Vfjij5sgxoow));
        };

        $Vk5pw1rsbvih = new DefaultServicesProvider();
        $Vk5pw1rsbvih->register($this);
    }

    

    
    public function get($V4mdxaz2cfcr)
    {
        if (!$this->offsetExists($V4mdxaz2cfcr)) {
            throw new ContainerValueNotFoundException(sprintf('Identifier "%s" is not defined.', $V4mdxaz2cfcr));
        }
        try {
            return $this->offsetGet($V4mdxaz2cfcr);
        } catch (\InvalidArgumentException $Vzzme31ixifp) {
            if ($this->exceptionThrownByContainer($Vzzme31ixifp)) {
                throw new SlimContainerException(
                    sprintf('Container error while retrieving "%s"', $V4mdxaz2cfcr),
                    null,
                    $Vzzme31ixifp
                );
            } else {
                throw $Vzzme31ixifp;
            }
        }
    }

    
    private function exceptionThrownByContainer(\InvalidArgumentException $Vzzme31ixifp)
    {
        $V1babchxe11h = $Vzzme31ixifp->getTrace()[0];

        return $V1babchxe11h['class'] === PimpleContainer::class && $V1babchxe11h['function'] === 'offsetGet';
    }

    
    public function has($V4mdxaz2cfcr)
    {
        return $this->offsetExists($V4mdxaz2cfcr);
    }


    

    public function __get($Vgpjmw221p0b)
    {
        return $this->get($Vgpjmw221p0b);
    }

    public function __isset($Vgpjmw221p0b)
    {
        return $this->has($Vgpjmw221p0b);
    }
}
