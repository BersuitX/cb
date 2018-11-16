<?php

namespace FastRoute;

if (!function_exists('FastRoute\simpleDispatcher')) {
    
    function simpleDispatcher(callable $Vnqndjhrzfhh, array $V4a4guv4okog = [])
    {
        $V4a4guv4okog += [
            'routeParser' => 'FastRoute\\RouteParser\\Std',
            'dataGenerator' => 'FastRoute\\DataGenerator\\GroupCountBased',
            'dispatcher' => 'FastRoute\\Dispatcher\\GroupCountBased',
            'routeCollector' => 'FastRoute\\RouteCollector',
        ];

        
        $Vq2eaefxwzo5 = new $V4a4guv4okog['routeCollector'](
            new $V4a4guv4okog['routeParser'], new $V4a4guv4okog['dataGenerator']
        );
        $Vnqndjhrzfhh($Vq2eaefxwzo5);

        return new $V4a4guv4okog['dispatcher']($Vq2eaefxwzo5->getData());
    }

    
    function cachedDispatcher(callable $Vnqndjhrzfhh, array $V4a4guv4okog = [])
    {
        $V4a4guv4okog += [
            'routeParser' => 'FastRoute\\RouteParser\\Std',
            'dataGenerator' => 'FastRoute\\DataGenerator\\GroupCountBased',
            'dispatcher' => 'FastRoute\\Dispatcher\\GroupCountBased',
            'routeCollector' => 'FastRoute\\RouteCollector',
            'cacheDisabled' => false,
        ];

        if (!isset($V4a4guv4okog['cacheFile'])) {
            throw new \LogicException('Must specify "cacheFile" option');
        }

        if (!$V4a4guv4okog['cacheDisabled'] && file_exists($V4a4guv4okog['cacheFile'])) {
            $Vi5m4vpvhgqx = require $V4a4guv4okog['cacheFile'];
            if (!is_array($Vi5m4vpvhgqx)) {
                throw new \RuntimeException('Invalid cache file "' . $V4a4guv4okog['cacheFile'] . '"');
            }
            return new $V4a4guv4okog['dispatcher']($Vi5m4vpvhgqx);
        }

        $Vq2eaefxwzo5 = new $V4a4guv4okog['routeCollector'](
            new $V4a4guv4okog['routeParser'], new $V4a4guv4okog['dataGenerator']
        );
        $Vnqndjhrzfhh($Vq2eaefxwzo5);

        
        $Vi5m4vpvhgqx = $Vq2eaefxwzo5->getData();
        if (!$V4a4guv4okog['cacheDisabled']) {
            file_put_contents(
                $V4a4guv4okog['cacheFile'],
                '<?php return ' . var_export($Vi5m4vpvhgqx, true) . ';'
            );
        }

        return new $V4a4guv4okog['dispatcher']($Vi5m4vpvhgqx);
    }
}
