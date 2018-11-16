<?php

namespace Slim;

use FastRoute\Dispatcher;
use Psr\Container\ContainerInterface;
use InvalidArgumentException;
use RuntimeException;
use Psr\Http\Message\ServerRequestInterface;
use FastRoute\RouteCollector;
use FastRoute\RouteParser;
use FastRoute\RouteParser\Std as StdParser;
use Slim\Interfaces\RouteGroupInterface;
use Slim\Interfaces\RouterInterface;
use Slim\Interfaces\RouteInterface;


class Router implements RouterInterface
{
    
    protected $Vb1jhtbuqbys;

    
    protected $V2bqntybzuup;

    
    protected $Vceolxvhj4kw = '';

    
    protected $V3qclzi1htsc = false;

    
    protected $Vautqavmdzuj = [];

    
    protected $V0m401iynubx = 0;

    
    protected $Vw55oioxrzmt = [];

    
    protected $Vrcs0fwqjecs;

    
    public function __construct(RouteParser $V5zzh1da1wpy = null)
    {
        $this->routeParser = $V5zzh1da1wpy ?: new StdParser;
    }

    
    public function setBasePath($Vceolxvhj4kw)
    {
        if (!is_string($Vceolxvhj4kw)) {
            throw new InvalidArgumentException('Router basePath must be a string');
        }

        $this->basePath = $Vceolxvhj4kw;

        return $this;
    }

    
    public function setCacheFile($V3qclzi1htsc)
    {
        if (!is_string($V3qclzi1htsc) && $V3qclzi1htsc !== false) {
            throw new InvalidArgumentException('Router cacheFile must be a string or false');
        }

        $this->cacheFile = $V3qclzi1htsc;

        if ($V3qclzi1htsc !== false && !is_writable(dirname($V3qclzi1htsc))) {
            throw new RuntimeException('Router cacheFile directory must be writable');
        }


        return $this;
    }

    
    public function setContainer(ContainerInterface $Vb1jhtbuqbys)
    {
        $this->container = $Vb1jhtbuqbys;
    }

    
    public function map($V0yfl5ulns0o, $Vp1x1qfledcv, $Voc34ggbfvw5)
    {
        if (!is_string($Vp1x1qfledcv)) {
            throw new InvalidArgumentException('Route pattern must be a string');
        }

        
        if ($this->routeGroups) {
            $Vp1x1qfledcv = $this->processGroups() . $Vp1x1qfledcv;
        }

        
        $V0yfl5ulns0o = array_map("strtoupper", $V0yfl5ulns0o);

        
        $Vkihybm3bccb = $this->createRoute($V0yfl5ulns0o, $Vp1x1qfledcv, $Voc34ggbfvw5);
        $this->routes[$Vkihybm3bccb->getIdentifier()] = $Vkihybm3bccb;
        $this->routeCounter++;

        return $Vkihybm3bccb;
    }

    
    public function dispatch(ServerRequestInterface $Vyvmmv0t5uw2)
    {
        $Vbraexi5phsi = '/' . ltrim($Vyvmmv0t5uw2->getUri()->getPath(), '/');

        return $this->createDispatcher()->dispatch(
            $Vyvmmv0t5uw2->getMethod(),
            $Vbraexi5phsi
        );
    }

    
    protected function createRoute($V0yfl5ulns0o, $Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        $Vkihybm3bccb = new Route($V0yfl5ulns0o, $Vp1x1qfledcv, $Vp0bahhl3qia, $this->routeGroups, $this->routeCounter);
        if (!empty($this->container)) {
            $Vkihybm3bccb->setContainer($this->container);
        }

        return $Vkihybm3bccb;
    }

    
    protected function createDispatcher()
    {
        if ($this->dispatcher) {
            return $this->dispatcher;
        }

        $Vkihybm3bccbDefinitionCallback = function (RouteCollector $V4dwxqccdkfa) {
            foreach ($this->getRoutes() as $Vkihybm3bccb) {
                $V4dwxqccdkfa->addRoute($Vkihybm3bccb->getMethods(), $Vkihybm3bccb->getPattern(), $Vkihybm3bccb->getIdentifier());
            }
        };

        if ($this->cacheFile) {
            $this->dispatcher = \FastRoute\cachedDispatcher($Vkihybm3bccbDefinitionCallback, [
                'routeParser' => $this->routeParser,
                'cacheFile' => $this->cacheFile,
            ]);
        } else {
            $this->dispatcher = \FastRoute\simpleDispatcher($Vkihybm3bccbDefinitionCallback, [
                'routeParser' => $this->routeParser,
            ]);
        }

        return $this->dispatcher;
    }

    
    public function setDispatcher(Dispatcher $Vrcs0fwqjecs)
    {
        $this->dispatcher = $Vrcs0fwqjecs;
    }

    
    public function getRoutes()
    {
        return $this->routes;
    }

    
    public function getNamedRoute($Vgpjmw221p0b)
    {
        foreach ($this->routes as $Vkihybm3bccb) {
            if ($Vgpjmw221p0b == $Vkihybm3bccb->getName()) {
                return $Vkihybm3bccb;
            }
        }
        throw new RuntimeException('Named route does not exist for name: ' . $Vgpjmw221p0b);
    }

    
    public function removeNamedRoute($Vgpjmw221p0b)
    {
        $Vkihybm3bccb = $this->getNamedRoute($Vgpjmw221p0b);

        
        unset($this->routes[$Vkihybm3bccb->getIdentifier()]);
    }

    
    protected function processGroups()
    {
        $Vp1x1qfledcv = "";
        foreach ($this->routeGroups as $Vsq5adfvkj3r) {
            $Vp1x1qfledcv .= $Vsq5adfvkj3r->getPattern();
        }
        return $Vp1x1qfledcv;
    }

    
    public function pushGroup($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        $Vsq5adfvkj3r = new RouteGroup($Vp1x1qfledcv, $Vp0bahhl3qia);
        array_push($this->routeGroups, $Vsq5adfvkj3r);
        return $Vsq5adfvkj3r;
    }

    
    public function popGroup()
    {
        $Vsq5adfvkj3r = array_pop($this->routeGroups);
        return $Vsq5adfvkj3r instanceof RouteGroup ? $Vsq5adfvkj3r : false;
    }

    
    public function lookupRoute($Vleum1gctewv)
    {
        if (!isset($this->routes[$Vleum1gctewv])) {
            throw new RuntimeException('Route not found, looks like your route cache is stale.');
        }
        return $this->routes[$Vleum1gctewv];
    }

    
    public function relativePathFor($Vgpjmw221p0b, array $Vqhzkfsafzrc = [], array $V5old1qgxzf3 = [])
    {
        $Vkihybm3bccb = $this->getNamedRoute($Vgpjmw221p0b);
        $Vp1x1qfledcv = $Vkihybm3bccb->getPattern();

        $Vkihybm3bccbDatas = $this->routeParser->parse($Vp1x1qfledcv);
        
        
        
        
        $Vkihybm3bccbDatas = array_reverse($Vkihybm3bccbDatas);

        $Vlz1o0gvqnp4 = [];
        foreach ($Vkihybm3bccbDatas as $Vkihybm3bccbData) {
            foreach ($Vkihybm3bccbData as $Virsew13xpli) {
                if (is_string($Virsew13xpli)) {
                    
                    $Vlz1o0gvqnp4[] = $Virsew13xpli;
                    continue;
                }

                
                if (!array_key_exists($Virsew13xpli[0], $Vqhzkfsafzrc)) {
                    
                    
                    
                    $Vlz1o0gvqnp4 = [];
                    $Vxom11xqhhwy = $Virsew13xpli[0];
                    break;
                }
                $Vlz1o0gvqnp4[] = $Vqhzkfsafzrc[$Virsew13xpli[0]];
            }
            if (!empty($Vlz1o0gvqnp4)) {
                
                
                break;
            }
        }

        if (empty($Vlz1o0gvqnp4)) {
            throw new InvalidArgumentException('Missing data for URL segment: ' . $Vxom11xqhhwy);
        }
        $Vnwlngxwnesf = implode('', $Vlz1o0gvqnp4);

        if ($V5old1qgxzf3) {
            $Vnwlngxwnesf .= '?' . http_build_query($V5old1qgxzf3);
        }

        return $Vnwlngxwnesf;
    }


    
    public function pathFor($Vgpjmw221p0b, array $Vqhzkfsafzrc = [], array $V5old1qgxzf3 = [])
    {
        $Vnwlngxwnesf = $this->relativePathFor($Vgpjmw221p0b, $Vqhzkfsafzrc, $V5old1qgxzf3);

        if ($this->basePath) {
            $Vnwlngxwnesf = $this->basePath . $Vnwlngxwnesf;
        }

        return $Vnwlngxwnesf;
    }

    
    public function urlFor($Vgpjmw221p0b, array $Vqhzkfsafzrc = [], array $V5old1qgxzf3 = [])
    {
        trigger_error('urlFor() is deprecated. Use pathFor() instead.', E_USER_DEPRECATED);
        return $this->pathFor($Vgpjmw221p0b, $Vqhzkfsafzrc, $V5old1qgxzf3);
    }
}
