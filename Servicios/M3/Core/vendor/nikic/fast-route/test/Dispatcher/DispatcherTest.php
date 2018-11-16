<?php

namespace FastRoute\Dispatcher;

use FastRoute\RouteCollector;
use PHPUnit\Framework\TestCase;

abstract class DispatcherTest extends TestCase
{
    
    abstract protected function getDispatcherClass();

    
    abstract protected function getDataGeneratorClass();

    
    private function generateDispatcherOptions()
    {
        return [
            'dataGenerator' => $this->getDataGeneratorClass(),
            'dispatcher' => $this->getDispatcherClass()
        ];
    }

    
    public function testFoundDispatches($Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj)
    {
        $Vrcs0fwqjecs = \FastRoute\simpleDispatcher($Vbbxwjhhenxj, $this->generateDispatcherOptions());
        $Vb5bkktmopn1 = $Vrcs0fwqjecs->dispatch($Vtlfvdwskdge, $Vbraexi5phsi);
        $this->assertSame($Vrcs0fwqjecs::FOUND, $Vb5bkktmopn1[0]);
        $this->assertSame($Voc34ggbfvw5, $Vb5bkktmopn1[1]);
        $this->assertSame($V3k4ftr4kvbj, $Vb5bkktmopn1[2]);
    }

    
    public function testNotFoundDispatches($Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj)
    {
        $Vrcs0fwqjecs = \FastRoute\simpleDispatcher($Vbbxwjhhenxj, $this->generateDispatcherOptions());
        $V5bs0abmc43e = $Vrcs0fwqjecs->dispatch($Vtlfvdwskdge, $Vbraexi5phsi);
        $this->assertArrayNotHasKey(1, $V5bs0abmc43e,
            'NOT_FOUND result must only contain a single element in the returned info array'
        );
        $this->assertSame($Vrcs0fwqjecs::NOT_FOUND, $V5bs0abmc43e[0]);
    }

    
    public function testMethodNotAllowedDispatches($Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Viuusyidwvb0)
    {
        $Vrcs0fwqjecs = \FastRoute\simpleDispatcher($Vbbxwjhhenxj, $this->generateDispatcherOptions());
        $V5bs0abmc43e = $Vrcs0fwqjecs->dispatch($Vtlfvdwskdge, $Vbraexi5phsi);
        $this->assertArrayHasKey(1, $V5bs0abmc43e,
            'METHOD_NOT_ALLOWED result must return an array of allowed methods at index 1'
        );

        list($Vcvauzmtvivs, $VtlfvdwskdgeArray) = $Vrcs0fwqjecs->dispatch($Vtlfvdwskdge, $Vbraexi5phsi);
        $this->assertSame($Vrcs0fwqjecs::METHOD_NOT_ALLOWED, $Vcvauzmtvivs);
        $this->assertSame($Viuusyidwvb0, $VtlfvdwskdgeArray);
    }

    
    public function testDuplicateVariableNameError()
    {
        \FastRoute\simpleDispatcher(function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/foo/{test}/{test:\d+}', 'handler0');
        }, $this->generateDispatcherOptions());
    }

    
    public function testDuplicateVariableRoute()
    {
        \FastRoute\simpleDispatcher(function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{id}', 'handler0'); 
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}', 'handler1');
        }, $this->generateDispatcherOptions());
    }

    
    public function testDuplicateStaticRoute()
    {
        \FastRoute\simpleDispatcher(function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/user', 'handler1');
        }, $this->generateDispatcherOptions());
    }

    
    public function testShadowedStaticRoute()
    {
        \FastRoute\simpleDispatcher(function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/user/nikic', 'handler1');
        }, $this->generateDispatcherOptions());
    }

    
    public function testCapturing()
    {
        \FastRoute\simpleDispatcher(function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/{lang:(en|de)}', 'handler0');
        }, $this->generateDispatcherOptions());
    }

    public function provideFoundDispatchCases()
    {
        $Vc2wn3ne1mgk = [];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/resource/123/456', 'handler0');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/resource/123/456';
        $Voc34ggbfvw5 = 'handler0';
        $V3k4ftr4kvbj = [];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/handler0', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/handler1', 'handler1');
            $V4dwxqccdkfa->addRoute('GET', '/handler2', 'handler2');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/handler2';
        $Voc34ggbfvw5 = 'handler2';
        $V3k4ftr4kvbj = [];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}/{id:[0-9]+}', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/user/{id:[0-9]+}', 'handler1');
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}', 'handler2');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/user/rdlowrey';
        $Voc34ggbfvw5 = 'handler2';
        $V3k4ftr4kvbj = ['name' => 'rdlowrey'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/user/12345';
        $Voc34ggbfvw5 = 'handler1';
        $V3k4ftr4kvbj = ['id' => '12345'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/user/NaN';
        $Voc34ggbfvw5 = 'handler2';
        $V3k4ftr4kvbj = ['name' => 'NaN'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/user/rdlowrey/12345';
        $Voc34ggbfvw5 = 'handler0';
        $V3k4ftr4kvbj = ['name' => 'rdlowrey', 'id' => '12345'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{id:[0-9]+}', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/user/12345/extension', 'handler1');
            $V4dwxqccdkfa->addRoute('GET', '/user/{id:[0-9]+}.{extension}', 'handler2');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/user/12345.svg';
        $Voc34ggbfvw5 = 'handler2';
        $V3k4ftr4kvbj = ['id' => '12345', 'extension' => 'svg'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}/{id:[0-9]+}', 'handler1');
            $V4dwxqccdkfa->addRoute('GET', '/static0', 'handler2');
            $V4dwxqccdkfa->addRoute('GET', '/static1', 'handler3');
            $V4dwxqccdkfa->addRoute('HEAD', '/static1', 'handler4');
        };

        $Vtlfvdwskdge = 'HEAD';
        $Vbraexi5phsi = '/user/rdlowrey';
        $Voc34ggbfvw5 = 'handler0';
        $V3k4ftr4kvbj = ['name' => 'rdlowrey'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        

        $Vtlfvdwskdge = 'HEAD';
        $Vbraexi5phsi = '/user/rdlowrey/1234';
        $Voc34ggbfvw5 = 'handler1';
        $V3k4ftr4kvbj = ['name' => 'rdlowrey', 'id' => '1234'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        

        $Vtlfvdwskdge = 'HEAD';
        $Vbraexi5phsi = '/static0';
        $Voc34ggbfvw5 = 'handler2';
        $V3k4ftr4kvbj = [];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        

        $Vtlfvdwskdge = 'HEAD';
        $Vbraexi5phsi = '/static1';
        $Voc34ggbfvw5 = 'handler4';
        $V3k4ftr4kvbj = [];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}', 'handler0');
            $V4dwxqccdkfa->addRoute('POST', '/user/{name:[a-z]+}', 'handler1');
        };

        $Vtlfvdwskdge = 'POST';
        $Vbraexi5phsi = '/user/rdlowrey';
        $Voc34ggbfvw5 = 'handler1';
        $V3k4ftr4kvbj = ['name' => 'rdlowrey'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}', 'handler0');
            $V4dwxqccdkfa->addRoute('POST', '/user/{name:[a-z]+}', 'handler1');
            $V4dwxqccdkfa->addRoute('POST', '/user/{name}', 'handler2');
        };

        $Vtlfvdwskdge = 'POST';
        $Vbraexi5phsi = '/user/rdlowrey';
        $Voc34ggbfvw5 = 'handler1';
        $V3k4ftr4kvbj = ['name' => 'rdlowrey'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}/edit', 'handler1');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/user/rdlowrey/edit';
        $Voc34ggbfvw5 = 'handler1';
        $V3k4ftr4kvbj = ['name' => 'rdlowrey'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Voc34ggbfvw5, $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute(['GET', 'POST'], '/user', 'handlerGetPost');
            $V4dwxqccdkfa->addRoute(['DELETE'], '/user', 'handlerDelete');
            $V4dwxqccdkfa->addRoute([], '/user', 'handlerNone');
        };

        $V3k4ftr4kvbj = [];
        $Vc2wn3ne1mgk[] = ['GET', '/user', $Vbbxwjhhenxj, 'handlerGetPost', $V3k4ftr4kvbj];
        $Vc2wn3ne1mgk[] = ['POST', '/user', $Vbbxwjhhenxj, 'handlerGetPost', $V3k4ftr4kvbj];
        $Vc2wn3ne1mgk[] = ['DELETE', '/user', $Vbbxwjhhenxj, 'handlerDelete', $V3k4ftr4kvbj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('POST', '/user.json', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/{entity}.json', 'handler1');
        };

        $Vc2wn3ne1mgk[] = ['GET', '/user.json', $Vbbxwjhhenxj, 'handler1', ['entity' => 'user']];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '', 'handler0');
        };

        $Vc2wn3ne1mgk[] = ['GET', '', $Vbbxwjhhenxj, 'handler0', []];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('HEAD', '/a/{foo}', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/b/{foo}', 'handler1');
        };

        $Vc2wn3ne1mgk[] = ['HEAD', '/b/bar', $Vbbxwjhhenxj, 'handler1', ['foo' => 'bar']];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('HEAD', '/a', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/b', 'handler1');
        };

        $Vc2wn3ne1mgk[] = ['HEAD', '/b', $Vbbxwjhhenxj, 'handler1', []];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/foo', 'handler0');
            $V4dwxqccdkfa->addRoute('HEAD', '/{bar}', 'handler1');
        };

        $Vc2wn3ne1mgk[] = ['HEAD', '/foo', $Vbbxwjhhenxj, 'handler1', ['bar' => 'foo']];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('*', '/user', 'handler0');
            $V4dwxqccdkfa->addRoute('*', '/{user}', 'handler1');
            $V4dwxqccdkfa->addRoute('GET', '/user', 'handler2');
        };

        $Vc2wn3ne1mgk[] = ['GET', '/user', $Vbbxwjhhenxj, 'handler2', []];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('*', '/user', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/user', 'handler1');
        };

        $Vc2wn3ne1mgk[] = ['POST', '/user', $Vbbxwjhhenxj, 'handler0', []];

        

        $Vc2wn3ne1mgk[] = ['HEAD', '/user', $Vbbxwjhhenxj, 'handler1', []];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/{bar}', 'handler0');
            $V4dwxqccdkfa->addRoute('*', '/foo', 'handler1');
        };

        $Vc2wn3ne1mgk[] = ['GET', '/foo', $Vbbxwjhhenxj, 'handler0', ['bar' => 'foo']];

        

        $Vbbxwjhhenxj = function(RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user', 'handler0');
            $V4dwxqccdkfa->addRoute('*', '/{foo:.*}', 'handler1');
        };

        $Vc2wn3ne1mgk[] = ['POST', '/bar', $Vbbxwjhhenxj, 'handler1', ['foo' => 'bar']];

        

        return $Vc2wn3ne1mgk;
    }

    public function provideNotFoundDispatchCases()
    {
        $Vc2wn3ne1mgk = [];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/resource/123/456', 'handler0');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/not-found';

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj];

        

        
        $Vtlfvdwskdge = 'POST';
        $Vbraexi5phsi = '/not-found';

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj];

        

        
        $Vtlfvdwskdge = 'PUT';
        $Vbraexi5phsi = '/not-found';

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/handler0', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/handler1', 'handler1');
            $V4dwxqccdkfa->addRoute('GET', '/handler2', 'handler2');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/not-found';

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}/{id:[0-9]+}', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/user/{id:[0-9]+}', 'handler1');
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}', 'handler2');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/not-found';

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj];

        

        
        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/user/rdlowrey/12345/not-found';

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj];

        

        
        $Vtlfvdwskdge = 'HEAD';

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj];

        

        return $Vc2wn3ne1mgk;
    }

    public function provideMethodNotAllowedDispatchCases()
    {
        $Vc2wn3ne1mgk = [];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/resource/123/456', 'handler0');
        };

        $Vtlfvdwskdge = 'POST';
        $Vbraexi5phsi = '/resource/123/456';
        $Vqhzirb03shq = ['GET'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Vqhzirb03shq];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/resource/123/456', 'handler0');
            $V4dwxqccdkfa->addRoute('POST', '/resource/123/456', 'handler1');
            $V4dwxqccdkfa->addRoute('PUT', '/resource/123/456', 'handler2');
            $V4dwxqccdkfa->addRoute('*', '/', 'handler3');
        };

        $Vtlfvdwskdge = 'DELETE';
        $Vbraexi5phsi = '/resource/123/456';
        $Vqhzirb03shq = ['GET', 'POST', 'PUT'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Vqhzirb03shq];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('GET', '/user/{name}/{id:[0-9]+}', 'handler0');
            $V4dwxqccdkfa->addRoute('POST', '/user/{name}/{id:[0-9]+}', 'handler1');
            $V4dwxqccdkfa->addRoute('PUT', '/user/{name}/{id:[0-9]+}', 'handler2');
            $V4dwxqccdkfa->addRoute('PATCH', '/user/{name}/{id:[0-9]+}', 'handler3');
        };

        $Vtlfvdwskdge = 'DELETE';
        $Vbraexi5phsi = '/user/rdlowrey/42';
        $Vqhzirb03shq = ['GET', 'POST', 'PUT', 'PATCH'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Vqhzirb03shq];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('POST', '/user/{name}', 'handler1');
            $V4dwxqccdkfa->addRoute('PUT', '/user/{name:[a-z]+}', 'handler2');
            $V4dwxqccdkfa->addRoute('PATCH', '/user/{name:[a-z]+}', 'handler3');
        };

        $Vtlfvdwskdge = 'GET';
        $Vbraexi5phsi = '/user/rdlowrey';
        $Vqhzirb03shq = ['POST', 'PUT', 'PATCH'];

        $Vc2wn3ne1mgk[] = [$Vtlfvdwskdge, $Vbraexi5phsi, $Vbbxwjhhenxj, $Vqhzirb03shq];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute(['GET', 'POST'], '/user', 'handlerGetPost');
            $V4dwxqccdkfa->addRoute(['DELETE'], '/user', 'handlerDelete');
            $V4dwxqccdkfa->addRoute([], '/user', 'handlerNone');
        };

        $Vc2wn3ne1mgk[] = ['PUT', '/user', $Vbbxwjhhenxj, ['GET', 'POST', 'DELETE']];

        

        $Vbbxwjhhenxj = function (RouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->addRoute('POST', '/user.json', 'handler0');
            $V4dwxqccdkfa->addRoute('GET', '/{entity}.json', 'handler1');
        };

        $Vc2wn3ne1mgk[] = ['PUT', '/user.json', $Vbbxwjhhenxj, ['POST', 'GET']];

        

        return $Vc2wn3ne1mgk;
    }
}
