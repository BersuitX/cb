<?php

namespace Slim;

use RuntimeException;
use Psr\Container\ContainerInterface;
use Slim\Interfaces\CallableResolverInterface;


trait CallableResolverAwareTrait
{
    
    protected function resolveCallable($Vp0bahhl3qia)
    {
        if (!$this->container instanceof ContainerInterface) {
            return $Vp0bahhl3qia;
        }

        
        $Vc3lyjuvff1a = $this->container->get('callableResolver');

        return $Vc3lyjuvff1a->resolve($Vp0bahhl3qia);
    }
}
