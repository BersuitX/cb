<?php

namespace Slim;

use InvalidArgumentException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Handlers\Strategies\RequestResponse;
use Slim\Interfaces\InvocationStrategyInterface;
use Slim\Interfaces\RouteInterface;


class Route extends Routable implements RouteInterface
{
    use MiddlewareAwareTrait;

    
    protected $V0yfl5ulns0o = [];

    
    protected $Vleum1gctewv;

    
    protected $Vgpjmw221p0b;

    
    protected $V00tm5epe1pm;

    private $Vua3jp5zxf5r = false;

    
    protected $Vbcurieeqlym = 'append';

    
    protected $Vj23lbel2xn0 = [];

    
    protected $Vp0bahhl3qia;

    
    public function __construct($V0yfl5ulns0o, $Vp1x1qfledcv, $Vp0bahhl3qia, $V00tm5epe1pm = [], $Vleum1gctewv = 0)
    {
        $this->methods  = is_string($V0yfl5ulns0o) ? [$V0yfl5ulns0o] : $V0yfl5ulns0o;
        $this->pattern  = $Vp1x1qfledcv;
        $this->callable = $Vp0bahhl3qia;
        $this->groups   = $V00tm5epe1pm;
        $this->identifier = 'route' . $Vleum1gctewv;
    }

    
    public function finalize()
    {
        if ($this->finalized) {
            return;
        }

        $V5hitsphlofw = [];
        foreach ($this->getGroups() as $Vsq5adfvkj3r) {
            $V5hitsphlofw = array_merge($Vsq5adfvkj3r->getMiddleware(), $V5hitsphlofw);
        }

        $this->middleware = array_merge($this->middleware, $V5hitsphlofw);

        foreach ($this->getMiddleware() as $Vjomkjko2fyk) {
            $this->addMiddleware($Vjomkjko2fyk);
        }

        $this->finalized = true;
    }

    
    public function getCallable()
    {
        return $this->callable;
    }

    
    public function setCallable($Vp0bahhl3qia)
    {
        $this->callable = $Vp0bahhl3qia;
    }

    
    public function getMethods()
    {
        return $this->methods;
    }

    
    public function getGroups()
    {
        return $this->groups;
    }

    
    public function getName()
    {
        return $this->name;
    }

    
    public function getIdentifier()
    {
        return $this->identifier;
    }

    
    public function getOutputBuffering()
    {
        return $this->outputBuffering;
    }

    
    public function setOutputBuffering($V4ci5ldaqb4a)
    {
        if (!in_array($V4ci5ldaqb4a, [false, 'prepend', 'append'], true)) {
            throw new InvalidArgumentException('Unknown output buffering mode');
        }
        $this->outputBuffering = $V4ci5ldaqb4a;
    }

    
    public function setName($Vgpjmw221p0b)
    {
        if (!is_string($Vgpjmw221p0b)) {
            throw new InvalidArgumentException('Route name must be a string');
        }
        $this->name = $Vgpjmw221p0b;
        return $this;
    }

    
    public function setArgument($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        $this->arguments[$Vgpjmw221p0b] = $Vcptarsq5qe4;
        return $this;
    }

    
    public function setArguments(array $Vj23lbel2xn0)
    {
        $this->arguments = $Vj23lbel2xn0;
        return $this;
    }

    
    public function getArguments()
    {
        return $this->arguments;
    }

    
    public function getArgument($Vgpjmw221p0b, $V0ekusmibtbl = null)
    {
        if (array_key_exists($Vgpjmw221p0b, $this->arguments)) {
            return $this->arguments[$Vgpjmw221p0b];
        }
        return $V0ekusmibtbl;
    }

    

    
    public function prepare(ServerRequestInterface $Vyvmmv0t5uw2, array $Vj23lbel2xn0)
    {
        
        foreach ($Vj23lbel2xn0 as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
            $this->setArgument($Vyiw1hdwmjmw, $V3jv1il2hqc3);
        }
    }

    
    public function run(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        
        $this->finalize();

        
        return $this->callMiddlewareStack($Vyvmmv0t5uw2, $Vvcjkdrakwx3);
    }

    
    public function __invoke(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        $this->callable = $this->resolveCallable($this->callable);

        
        $Voc34ggbfvw5 = isset($this->container) ? $this->container->get('foundHandler') : new RequestResponse();

        $Vqxmtrhfyjii = $Voc34ggbfvw5($this->callable, $Vyvmmv0t5uw2, $Vvcjkdrakwx3, $this->arguments);

        if ($Vqxmtrhfyjii instanceof ResponseInterface) {
            
            $Vvcjkdrakwx3 = $Vqxmtrhfyjii;
        } elseif (is_string($Vqxmtrhfyjii)) {
            
            if ($Vvcjkdrakwx3->getBody()->isWritable()) {
                $Vvcjkdrakwx3->getBody()->write($Vqxmtrhfyjii);
            }
        }

        return $Vvcjkdrakwx3;
    }
}
