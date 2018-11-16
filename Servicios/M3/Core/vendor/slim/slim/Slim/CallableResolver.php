<?php

namespace Slim;

use RuntimeException;
use Psr\Container\ContainerInterface;
use Slim\Interfaces\CallableResolverInterface;


final class CallableResolver implements CallableResolverInterface
{
    const CALLABLE_PATTERN = '!^([^\:]+)\:([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)$!';

    
    private $Vb1jhtbuqbys;

    
    public function __construct(ContainerInterface $Vb1jhtbuqbys)
    {
        $this->container = $Vb1jhtbuqbys;
    }

    
    public function resolve($Vewgt5zaxmyr)
    {
        if (is_callable($Vewgt5zaxmyr)) {
            return $Vewgt5zaxmyr;
        }

        if (!is_string($Vewgt5zaxmyr)) {
            $this->assertCallable($Vewgt5zaxmyr);
        }

        
        if (preg_match(self::CALLABLE_PATTERN, $Vewgt5zaxmyr, $Virbphhh55ue)) {
            $Vm0n5yx0bszg = $this->resolveCallable($Virbphhh55ue[1], $Virbphhh55ue[2]);
            $this->assertCallable($Vm0n5yx0bszg);

            return $Vm0n5yx0bszg;
        }

        $Vm0n5yx0bszg = $this->resolveCallable($Vewgt5zaxmyr);
        $this->assertCallable($Vm0n5yx0bszg);

        return $Vm0n5yx0bszg;
    }

    
    protected function resolveCallable($Vqmu1sajhgfn, $Vtlfvdwskdge = '__invoke')
    {
        if ($this->container->has($Vqmu1sajhgfn)) {
            return [$this->container->get($Vqmu1sajhgfn), $Vtlfvdwskdge];
        }

        if (!class_exists($Vqmu1sajhgfn)) {
            throw new RuntimeException(sprintf('Callable %s does not exist', $Vqmu1sajhgfn));
        }

        return [new $Vqmu1sajhgfn($this->container), $Vtlfvdwskdge];
    }

    
    protected function assertCallable($Vp0bahhl3qia)
    {
        if (!is_callable($Vp0bahhl3qia)) {
            throw new RuntimeException(sprintf(
                '%s is not resolvable',
                is_array($Vp0bahhl3qia) || is_object($Vp0bahhl3qia) ? json_encode($Vp0bahhl3qia) : $Vp0bahhl3qia
            ));
        }
    }
}
