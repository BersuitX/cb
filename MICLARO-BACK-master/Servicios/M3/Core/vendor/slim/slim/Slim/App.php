<?php

namespace Slim;

use Exception;
use Slim\Exception\InvalidMethodException;
use Slim\Http\Response;
use Throwable;
use Closure;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;
use FastRoute\Dispatcher;
use Slim\Exception\SlimException;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;
use Slim\Http\Uri;
use Slim\Http\Headers;
use Slim\Http\Body;
use Slim\Http\Request;
use Slim\Interfaces\Http\EnvironmentInterface;
use Slim\Interfaces\RouteGroupInterface;
use Slim\Interfaces\RouteInterface;
use Slim\Interfaces\RouterInterface;


class App
{
    use MiddlewareAwareTrait;

    
    const VERSION = '3.10.0';

    
    private $Vb1jhtbuqbys;

    

    
    public function __construct($Vb1jhtbuqbys = [])
    {
        if (is_array($Vb1jhtbuqbys)) {
            $Vb1jhtbuqbys = new Container($Vb1jhtbuqbys);
        }
        if (!$Vb1jhtbuqbys instanceof ContainerInterface) {
            throw new InvalidArgumentException('Expected a ContainerInterface');
        }
        $this->container = $Vb1jhtbuqbys;
    }

    
    public function getContainer()
    {
        return $this->container;
    }

    
    public function add($Vp0bahhl3qia)
    {
        return $this->addMiddleware(new DeferredCallable($Vp0bahhl3qia, $this->container));
    }

    
    public function __call($Vtlfvdwskdge, $Veox3iprl5oz)
    {
        if ($this->container->has($Vtlfvdwskdge)) {
            $Vuvvkm1baslr = $this->container->get($Vtlfvdwskdge);
            if (is_callable($Vuvvkm1baslr)) {
                return call_user_func_array($Vuvvkm1baslr, $Veox3iprl5oz);
            }
        }

        throw new \BadMethodCallException("Method $Vtlfvdwskdge is not a valid method");
    }

    

    
    public function get($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        return $this->map(['GET'], $Vp1x1qfledcv, $Vp0bahhl3qia);
    }

    
    public function post($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        return $this->map(['POST'], $Vp1x1qfledcv, $Vp0bahhl3qia);
    }

    
    public function put($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        return $this->map(['PUT'], $Vp1x1qfledcv, $Vp0bahhl3qia);
    }

    
    public function patch($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        return $this->map(['PATCH'], $Vp1x1qfledcv, $Vp0bahhl3qia);
    }

    
    public function delete($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        return $this->map(['DELETE'], $Vp1x1qfledcv, $Vp0bahhl3qia);
    }

    
    public function options($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        return $this->map(['OPTIONS'], $Vp1x1qfledcv, $Vp0bahhl3qia);
    }

    
    public function any($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        return $this->map(['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'], $Vp1x1qfledcv, $Vp0bahhl3qia);
    }

    
    public function map(array $Vtlfvdwskdges, $Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        if ($Vp0bahhl3qia instanceof Closure) {
            $Vp0bahhl3qia = $Vp0bahhl3qia->bindTo($this->container);
        }

        $Vkihybm3bccb = $this->container->get('router')->map($Vtlfvdwskdges, $Vp1x1qfledcv, $Vp0bahhl3qia);
        if (is_callable([$Vkihybm3bccb, 'setContainer'])) {
            $Vkihybm3bccb->setContainer($this->container);
        }

        if (is_callable([$Vkihybm3bccb, 'setOutputBuffering'])) {
            $Vkihybm3bccb->setOutputBuffering($this->container->get('settings')['outputBuffering']);
        }

        return $Vkihybm3bccb;
    }

    
    public function redirect($V2435fgfpotg, $Vusanxtmh52m, $Vmtvkqxvklrv = 302)
    {
        $Voc34ggbfvw5 = function ($Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3) use ($Vusanxtmh52m, $Vmtvkqxvklrv) {
            return $Vvcjkdrakwx3->withHeader('Location', (string)$Vusanxtmh52m)->withStatus($Vmtvkqxvklrv);
        };

        return $this->get($V2435fgfpotg, $Voc34ggbfvw5);
    }

    
    public function group($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        
        $Vsq5adfvkj3r = $this->container->get('router')->pushGroup($Vp1x1qfledcv, $Vp0bahhl3qia);
        $Vsq5adfvkj3r->setContainer($this->container);
        $Vsq5adfvkj3r($this);
        $this->container->get('router')->popGroup();
        return $Vsq5adfvkj3r;
    }

    

    
    public function run($Vumjzgskfnwd = false)
    {
        $Vvcjkdrakwx3 = $this->container->get('response');

        try {
            ob_start();
            $Vvcjkdrakwx3 = $this->process($this->container->get('request'), $Vvcjkdrakwx3);
        } catch (InvalidMethodException $Vpt32vvhspnv) {
            $Vvcjkdrakwx3 = $this->processInvalidMethod($Vpt32vvhspnv->getRequest(), $Vvcjkdrakwx3);
        } finally {
            $Vvaiuwffullu = ob_get_clean();
        }

        if (!empty($Vvaiuwffullu) && $Vvcjkdrakwx3->getBody()->isWritable()) {
            $VvaiuwffulluBuffering = $this->container->get('settings')['outputBuffering'];
            if ($VvaiuwffulluBuffering === 'prepend') {
                
                $V5brf34vsiqi = new Http\Body(fopen('php://temp', 'r+'));
                $V5brf34vsiqi->write($Vvaiuwffullu . $Vvcjkdrakwx3->getBody());
                $Vvcjkdrakwx3 = $Vvcjkdrakwx3->withBody($V5brf34vsiqi);
            } elseif ($VvaiuwffulluBuffering === 'append') {
                
                $Vvcjkdrakwx3->getBody()->write($Vvaiuwffullu);
            }
        }

        $Vvcjkdrakwx3 = $this->finalize($Vvcjkdrakwx3);

        if (!$Vumjzgskfnwd) {
            $this->respond($Vvcjkdrakwx3);
        }

        return $Vvcjkdrakwx3;
    }

    
    protected function processInvalidMethod(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        $Vkihybm3bccbr = $this->container->get('router');
        if (is_callable([$Vyvmmv0t5uw2->getUri(), 'getBasePath']) && is_callable([$Vkihybm3bccbr, 'setBasePath'])) {
            $Vkihybm3bccbr->setBasePath($Vyvmmv0t5uw2->getUri()->getBasePath());
        }

        $Vyvmmv0t5uw2 = $this->dispatchRouterAndPrepareRoute($Vyvmmv0t5uw2, $Vkihybm3bccbr);
        $Vkihybm3bccbInfo = $Vyvmmv0t5uw2->getAttribute('routeInfo', [RouterInterface::DISPATCH_STATUS => Dispatcher::NOT_FOUND]);

        if ($Vkihybm3bccbInfo[RouterInterface::DISPATCH_STATUS] === Dispatcher::METHOD_NOT_ALLOWED) {
            return $this->handleException(
                new MethodNotAllowedException($Vyvmmv0t5uw2, $Vvcjkdrakwx3, $Vkihybm3bccbInfo[RouterInterface::ALLOWED_METHODS]),
                $Vyvmmv0t5uw2,
                $Vvcjkdrakwx3
            );
        }

        return $this->handleException(new NotFoundException($Vyvmmv0t5uw2, $Vvcjkdrakwx3), $Vyvmmv0t5uw2, $Vvcjkdrakwx3);
    }

    
    public function process(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        
        $Vkihybm3bccbr = $this->container->get('router');
        if (is_callable([$Vyvmmv0t5uw2->getUri(), 'getBasePath']) && is_callable([$Vkihybm3bccbr, 'setBasePath'])) {
            $Vkihybm3bccbr->setBasePath($Vyvmmv0t5uw2->getUri()->getBasePath());
        }

        
        if ($this->container->get('settings')['determineRouteBeforeAppMiddleware'] === true) {
            
            $Vyvmmv0t5uw2 = $this->dispatchRouterAndPrepareRoute($Vyvmmv0t5uw2, $Vkihybm3bccbr);
        }

        
        try {
            $Vvcjkdrakwx3 = $this->callMiddlewareStack($Vyvmmv0t5uw2, $Vvcjkdrakwx3);
        } catch (Exception $Vpt32vvhspnv) {
            $Vvcjkdrakwx3 = $this->handleException($Vpt32vvhspnv, $Vyvmmv0t5uw2, $Vvcjkdrakwx3);
        } catch (Throwable $Vpt32vvhspnv) {
            $Vvcjkdrakwx3 = $this->handlePhpError($Vpt32vvhspnv, $Vyvmmv0t5uw2, $Vvcjkdrakwx3);
        }

        return $Vvcjkdrakwx3;
    }

    
    public function respond(ResponseInterface $Vvcjkdrakwx3)
    {
        
        if (!headers_sent()) {
            
            foreach ($Vvcjkdrakwx3->getHeaders() as $Vgpjmw221p0b => $Vmyhfq3hu0xr) {
                foreach ($Vmyhfq3hu0xr as $Vcptarsq5qe4) {
                    header(sprintf('%s: %s', $Vgpjmw221p0b, $Vcptarsq5qe4), false);
                }
            }

            
            

            
            header(sprintf(
                'HTTP/%s %s %s',
                $Vvcjkdrakwx3->getProtocolVersion(),
                $Vvcjkdrakwx3->getStatusCode(),
                $Vvcjkdrakwx3->getReasonPhrase()
            ));
        }

        
        if (!$this->isEmptyResponse($Vvcjkdrakwx3)) {
            $V5brf34vsiqi = $Vvcjkdrakwx3->getBody();
            if ($V5brf34vsiqi->isSeekable()) {
                $V5brf34vsiqi->rewind();
            }
            $Vgzibbh1fx1x       = $this->container->get('settings');
            $V21cuqotws0d      = $Vgzibbh1fx1x['responseChunkSize'];

            $Va4g2zyowgcl  = $Vvcjkdrakwx3->getHeaderLine('Content-Length');
            if (!$Va4g2zyowgcl) {
                $Va4g2zyowgcl = $V5brf34vsiqi->getSize();
            }


            if (isset($Va4g2zyowgcl)) {
                $Vdmq22escru0 = $Va4g2zyowgcl;
                while ($Vdmq22escru0 > 0 && !$V5brf34vsiqi->eof()) {
                    $Vqhzkfsafzrc = $V5brf34vsiqi->read(min($V21cuqotws0d, $Vdmq22escru0));
                    echo $Vqhzkfsafzrc;

                    $Vdmq22escru0 -= strlen($Vqhzkfsafzrc);

                    if (connection_status() != CONNECTION_NORMAL) {
                        break;
                    }
                }
            } else {
                while (!$V5brf34vsiqi->eof()) {
                    echo $V5brf34vsiqi->read($V21cuqotws0d);
                    if (connection_status() != CONNECTION_NORMAL) {
                        break;
                    }
                }
            }
        }
    }

    
    public function __invoke(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        
        $Vkihybm3bccbInfo = $Vyvmmv0t5uw2->getAttribute('routeInfo');

        
        $Vkihybm3bccbr = $this->container->get('router');

        
        if (null === $Vkihybm3bccbInfo || ($Vkihybm3bccbInfo['request'] !== [$Vyvmmv0t5uw2->getMethod(), (string) $Vyvmmv0t5uw2->getUri()])) {
            $Vyvmmv0t5uw2 = $this->dispatchRouterAndPrepareRoute($Vyvmmv0t5uw2, $Vkihybm3bccbr);
            $Vkihybm3bccbInfo = $Vyvmmv0t5uw2->getAttribute('routeInfo');
        }

        if ($Vkihybm3bccbInfo[0] === Dispatcher::FOUND) {
            $Vkihybm3bccb = $Vkihybm3bccbr->lookupRoute($Vkihybm3bccbInfo[1]);
            return $Vkihybm3bccb->run($Vyvmmv0t5uw2, $Vvcjkdrakwx3);
        } elseif ($Vkihybm3bccbInfo[0] === Dispatcher::METHOD_NOT_ALLOWED) {
            if (!$this->container->has('notAllowedHandler')) {
                throw new MethodNotAllowedException($Vyvmmv0t5uw2, $Vvcjkdrakwx3, $Vkihybm3bccbInfo[1]);
            }
            
            $Vhobkeqd0uok = $this->container->get('notAllowedHandler');
            return $Vhobkeqd0uok($Vyvmmv0t5uw2, $Vvcjkdrakwx3, $Vkihybm3bccbInfo[1]);
        }

        if (!$this->container->has('notFoundHandler')) {
            throw new NotFoundException($Vyvmmv0t5uw2, $Vvcjkdrakwx3);
        }
        
        $Vvlq1t4m5x4x = $this->container->get('notFoundHandler');
        return $Vvlq1t4m5x4x($Vyvmmv0t5uw2, $Vvcjkdrakwx3);
    }

    
    public function subRequest(
        $Vtlfvdwskdge,
        $V2bpoh5hagzp,
        $Vfbt3who3l5d = '',
        array $V5y2wgq24k1v = [],
        array $Voujri0ure32 = [],
        $V5brf34vsiqiContent = '',
        ResponseInterface $Vvcjkdrakwx3 = null
    ) {
        $Vpt32vvhspnvnv = $this->container->get('environment');
        $Vbraexi5phsi = Uri::createFromEnvironment($Vpt32vvhspnvnv)->withPath($V2bpoh5hagzp)->withQuery($Vfbt3who3l5d);
        $V5y2wgq24k1v = new Headers($V5y2wgq24k1v);
        $V31wlyu0odna = $Vpt32vvhspnvnv->all();
        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $V5brf34vsiqi->write($V5brf34vsiqiContent);
        $V5brf34vsiqi->rewind();
        $Vyvmmv0t5uw2 = new Request($Vtlfvdwskdge, $Vbraexi5phsi, $V5y2wgq24k1v, $Voujri0ure32, $V31wlyu0odna, $V5brf34vsiqi);

        if (!$Vvcjkdrakwx3) {
            $Vvcjkdrakwx3 = $this->container->get('response');
        }

        return $this($Vyvmmv0t5uw2, $Vvcjkdrakwx3);
    }

    
    protected function dispatchRouterAndPrepareRoute(ServerRequestInterface $Vyvmmv0t5uw2, RouterInterface $Vkihybm3bccbr)
    {
        $Vkihybm3bccbInfo = $Vkihybm3bccbr->dispatch($Vyvmmv0t5uw2);

        if ($Vkihybm3bccbInfo[0] === Dispatcher::FOUND) {
            $Vkihybm3bccbArguments = [];
            foreach ($Vkihybm3bccbInfo[2] as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
                $Vkihybm3bccbArguments[$Vyiw1hdwmjmw] = urldecode($V3jv1il2hqc3);
            }

            $Vkihybm3bccb = $Vkihybm3bccbr->lookupRoute($Vkihybm3bccbInfo[1]);
            $Vkihybm3bccb->prepare($Vyvmmv0t5uw2, $Vkihybm3bccbArguments);

            
            $Vyvmmv0t5uw2 = $Vyvmmv0t5uw2->withAttribute('route', $Vkihybm3bccb);
        }

        $Vkihybm3bccbInfo['request'] = [$Vyvmmv0t5uw2->getMethod(), (string) $Vyvmmv0t5uw2->getUri()];

        return $Vyvmmv0t5uw2->withAttribute('routeInfo', $Vkihybm3bccbInfo);
    }

    
    protected function finalize(ResponseInterface $Vvcjkdrakwx3)
    {
        
        ini_set('default_mimetype', '');

        if ($this->isEmptyResponse($Vvcjkdrakwx3)) {
            return $Vvcjkdrakwx3->withoutHeader('Content-Type')->withoutHeader('Content-Length');
        }

        
        if (isset($this->container->get('settings')['addContentLengthHeader']) &&
            $this->container->get('settings')['addContentLengthHeader'] == true) {
            if (ob_get_length() > 0) {
                throw new \RuntimeException("Unexpected data in output buffer. " .
                    "Maybe you have characters before an opening <?php tag?");
            }
            $V5mlu1ykrbu5 = $Vvcjkdrakwx3->getBody()->getSize();
            if ($V5mlu1ykrbu5 !== null && !$Vvcjkdrakwx3->hasHeader('Content-Length')) {
                $Vvcjkdrakwx3 = $Vvcjkdrakwx3->withHeader('Content-Length', (string) $V5mlu1ykrbu5);
            }
        }

        return $Vvcjkdrakwx3;
    }

    
    protected function isEmptyResponse(ResponseInterface $Vvcjkdrakwx3)
    {
        if (method_exists($Vvcjkdrakwx3, 'isEmpty')) {
            return $Vvcjkdrakwx3->isEmpty();
        }

        return in_array($Vvcjkdrakwx3->getStatusCode(), [204, 205, 304]);
    }

    
    protected function handleException(Exception $Vpt32vvhspnv, ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        if ($Vpt32vvhspnv instanceof MethodNotAllowedException) {
            $Voc34ggbfvw5 = 'notAllowedHandler';
            $Vdhafuyqqxgk = [$Vpt32vvhspnv->getRequest(), $Vpt32vvhspnv->getResponse(), $Vpt32vvhspnv->getAllowedMethods()];
        } elseif ($Vpt32vvhspnv instanceof NotFoundException) {
            $Voc34ggbfvw5 = 'notFoundHandler';
            $Vdhafuyqqxgk = [$Vpt32vvhspnv->getRequest(), $Vpt32vvhspnv->getResponse(), $Vpt32vvhspnv];
        } elseif ($Vpt32vvhspnv instanceof SlimException) {
            
            return $Vpt32vvhspnv->getResponse();
        } else {
            
            $Voc34ggbfvw5 = 'errorHandler';
            $Vdhafuyqqxgk = [$Vyvmmv0t5uw2, $Vvcjkdrakwx3, $Vpt32vvhspnv];
        }

        if ($this->container->has($Voc34ggbfvw5)) {
            $Vp0bahhl3qia = $this->container->get($Voc34ggbfvw5);
            
            return call_user_func_array($Vp0bahhl3qia, $Vdhafuyqqxgk);
        }

        
        throw $Vpt32vvhspnv;
    }

    
    protected function handlePhpError(Throwable $Vpt32vvhspnv, ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        $Voc34ggbfvw5 = 'phpErrorHandler';
        $Vdhafuyqqxgk = [$Vyvmmv0t5uw2, $Vvcjkdrakwx3, $Vpt32vvhspnv];

        if ($this->container->has($Voc34ggbfvw5)) {
            $Vp0bahhl3qia = $this->container->get($Voc34ggbfvw5);
            
            return call_user_func_array($Vp0bahhl3qia, $Vdhafuyqqxgk);
        }

        
        throw $Vpt32vvhspnv;
    }
}
