<?php

namespace Slim;

use Psr\Container\ContainerInterface;


abstract class Routable
{
    use CallableResolverAwareTrait;

    
    protected $Vp0bahhl3qia;

    
    protected $Vb1jhtbuqbys;

    
    protected $Vjomkjko2fyk = [];

    
    protected $Vp1x1qfledcv;

    
    public function getMiddleware()
    {
        return $this->middleware;
    }

    
    public function getPattern()
    {
        return $this->pattern;
    }

    
    public function setContainer(ContainerInterface $Vb1jhtbuqbys)
    {
        $this->container = $Vb1jhtbuqbys;
        return $this;
    }

    
    public function add($Vp0bahhl3qia)
    {
        $this->middleware[] = new DeferredCallable($Vp0bahhl3qia, $this->container);
        return $this;
    }

    
    public function setPattern($Vnjqbzzjf1zh)
    {
        $this->pattern = $Vnjqbzzjf1zh;
    }
}
