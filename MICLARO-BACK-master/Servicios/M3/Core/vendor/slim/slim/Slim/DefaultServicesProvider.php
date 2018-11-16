<?php

namespace Slim;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Handlers\PhpError;
use Slim\Handlers\Error;
use Slim\Handlers\NotFound;
use Slim\Handlers\NotAllowed;
use Slim\Handlers\Strategies\RequestResponse;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Interfaces\CallableResolverInterface;
use Slim\Interfaces\Http\EnvironmentInterface;
use Slim\Interfaces\InvocationStrategyInterface;
use Slim\Interfaces\RouterInterface;


class DefaultServicesProvider
{
    
    public function register($Vb1jhtbuqbys)
    {
        if (!isset($Vb1jhtbuqbys['environment'])) {
            
            $Vb1jhtbuqbys['environment'] = function () {
                return new Environment($_SERVER);
            };
        }

        if (!isset($Vb1jhtbuqbys['request'])) {
            
            $Vb1jhtbuqbys['request'] = function ($Vb1jhtbuqbys) {
                return Request::createFromEnvironment($Vb1jhtbuqbys->get('environment'));
            };
        }

        if (!isset($Vb1jhtbuqbys['response'])) {
            
            $Vb1jhtbuqbys['response'] = function ($Vb1jhtbuqbys) {
                $V5y2wgq24k1v = new Headers(['Content-Type' => 'text/html; charset=UTF-8']);
                $Vvcjkdrakwx3 = new Response(200, $V5y2wgq24k1v);

                return $Vvcjkdrakwx3->withProtocolVersion($Vb1jhtbuqbys->get('settings')['httpVersion']);
            };
        }

        if (!isset($Vb1jhtbuqbys['router'])) {
            
            $Vb1jhtbuqbys['router'] = function ($Vb1jhtbuqbys) {
                $Vye44r2ovpne = false;
                if (isset($Vb1jhtbuqbys->get('settings')['routerCacheFile'])) {
                    $Vye44r2ovpne = $Vb1jhtbuqbys->get('settings')['routerCacheFile'];
                }


                $Vhd2e4dklxzf = (new Router)->setCacheFile($Vye44r2ovpne);
                if (method_exists($Vhd2e4dklxzf, 'setContainer')) {
                    $Vhd2e4dklxzf->setContainer($Vb1jhtbuqbys);
                }

                return $Vhd2e4dklxzf;
            };
        }

        if (!isset($Vb1jhtbuqbys['foundHandler'])) {
            
            $Vb1jhtbuqbys['foundHandler'] = function () {
                return new RequestResponse;
            };
        }

        if (!isset($Vb1jhtbuqbys['phpErrorHandler'])) {
            
            $Vb1jhtbuqbys['phpErrorHandler'] = function ($Vb1jhtbuqbys) {
                return new PhpError($Vb1jhtbuqbys->get('settings')['displayErrorDetails']);
            };
        }

        if (!isset($Vb1jhtbuqbys['errorHandler'])) {
            
            $Vb1jhtbuqbys['errorHandler'] = function ($Vb1jhtbuqbys) {
                return new Error(
                    $Vb1jhtbuqbys->get('settings')['displayErrorDetails']
                );
            };
        }

        if (!isset($Vb1jhtbuqbys['notFoundHandler'])) {
            
            $Vb1jhtbuqbys['notFoundHandler'] = function () {
                return new NotFound;
            };
        }

        if (!isset($Vb1jhtbuqbys['notAllowedHandler'])) {
            
            $Vb1jhtbuqbys['notAllowedHandler'] = function () {
                return new NotAllowed;
            };
        }

        if (!isset($Vb1jhtbuqbys['callableResolver'])) {
            
            $Vb1jhtbuqbys['callableResolver'] = function ($Vb1jhtbuqbys) {
                return new CallableResolver($Vb1jhtbuqbys);
            };
        }
    }
}
