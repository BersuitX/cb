<?php

namespace FastRoute;

use PHPUnit\Framework\TestCase;

class RouteCollectorTest extends TestCase
{
    public function testShortcuts()
    {
        $V4dwxqccdkfa = new DummyRouteCollector();

        $V4dwxqccdkfa->delete('/delete', 'delete');
        $V4dwxqccdkfa->get('/get', 'get');
        $V4dwxqccdkfa->head('/head', 'head');
        $V4dwxqccdkfa->patch('/patch', 'patch');
        $V4dwxqccdkfa->post('/post', 'post');
        $V4dwxqccdkfa->put('/put', 'put');

        $Vwcb1oykhumm = [
            ['DELETE', '/delete', 'delete'],
            ['GET', '/get', 'get'],
            ['HEAD', '/head', 'head'],
            ['PATCH', '/patch', 'patch'],
            ['POST', '/post', 'post'],
            ['PUT', '/put', 'put'],
        ];

        $this->assertSame($Vwcb1oykhumm, $V4dwxqccdkfa->routes);
    }

    public function testGroups()
    {
        $V4dwxqccdkfa = new DummyRouteCollector();

        $V4dwxqccdkfa->delete('/delete', 'delete');
        $V4dwxqccdkfa->get('/get', 'get');
        $V4dwxqccdkfa->head('/head', 'head');
        $V4dwxqccdkfa->patch('/patch', 'patch');
        $V4dwxqccdkfa->post('/post', 'post');
        $V4dwxqccdkfa->put('/put', 'put');

        $V4dwxqccdkfa->addGroup('/group-one', function (DummyRouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->delete('/delete', 'delete');
            $V4dwxqccdkfa->get('/get', 'get');
            $V4dwxqccdkfa->head('/head', 'head');
            $V4dwxqccdkfa->patch('/patch', 'patch');
            $V4dwxqccdkfa->post('/post', 'post');
            $V4dwxqccdkfa->put('/put', 'put');

            $V4dwxqccdkfa->addGroup('/group-two', function (DummyRouteCollector $V4dwxqccdkfa) {
                $V4dwxqccdkfa->delete('/delete', 'delete');
                $V4dwxqccdkfa->get('/get', 'get');
                $V4dwxqccdkfa->head('/head', 'head');
                $V4dwxqccdkfa->patch('/patch', 'patch');
                $V4dwxqccdkfa->post('/post', 'post');
                $V4dwxqccdkfa->put('/put', 'put');
            });
        });

        $V4dwxqccdkfa->addGroup('/admin', function (DummyRouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->get('-some-info', 'admin-some-info');
        });
        $V4dwxqccdkfa->addGroup('/admin-', function (DummyRouteCollector $V4dwxqccdkfa) {
            $V4dwxqccdkfa->get('more-info', 'admin-more-info');
        });

        $Vwcb1oykhumm = [
            ['DELETE', '/delete', 'delete'],
            ['GET', '/get', 'get'],
            ['HEAD', '/head', 'head'],
            ['PATCH', '/patch', 'patch'],
            ['POST', '/post', 'post'],
            ['PUT', '/put', 'put'],
            ['DELETE', '/group-one/delete', 'delete'],
            ['GET', '/group-one/get', 'get'],
            ['HEAD', '/group-one/head', 'head'],
            ['PATCH', '/group-one/patch', 'patch'],
            ['POST', '/group-one/post', 'post'],
            ['PUT', '/group-one/put', 'put'],
            ['DELETE', '/group-one/group-two/delete', 'delete'],
            ['GET', '/group-one/group-two/get', 'get'],
            ['HEAD', '/group-one/group-two/head', 'head'],
            ['PATCH', '/group-one/group-two/patch', 'patch'],
            ['POST', '/group-one/group-two/post', 'post'],
            ['PUT', '/group-one/group-two/put', 'put'],
            ['GET', '/admin-some-info', 'admin-some-info'],
            ['GET', '/admin-more-info', 'admin-more-info'],
        ];

        $this->assertSame($Vwcb1oykhumm, $V4dwxqccdkfa->routes);
    }
}

class DummyRouteCollector extends RouteCollector
{
    public $V4dwxqccdkfaoutes = [];

    public function __construct()
    {
    }

    public function addRoute($Vtlfvdwskdge, $V4dwxqccdkfaoute, $Voc34ggbfvw5)
    {
        $V4dwxqccdkfaoute = $this->currentGroupPrefix . $V4dwxqccdkfaoute;
        $this->routes[] = [$Vtlfvdwskdge, $V4dwxqccdkfaoute, $Voc34ggbfvw5];
    }
}
