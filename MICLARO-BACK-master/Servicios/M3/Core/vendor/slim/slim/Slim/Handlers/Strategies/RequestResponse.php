<?php

namespace Slim\Handlers\Strategies;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Interfaces\InvocationStrategyInterface;


class RequestResponse implements InvocationStrategyInterface
{
    
    public function __invoke(
        callable $Vp0bahhl3qia,
        ServerRequestInterface $Vyvmmv0t5uw2,
        ResponseInterface $Vvcjkdrakwx3,
        array $Vrvfbmc1f43d
    ) {
        foreach ($Vrvfbmc1f43d as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
            $Vyvmmv0t5uw2 = $Vyvmmv0t5uw2->withAttribute($Vyiw1hdwmjmw, $V3jv1il2hqc3);
        }

        return call_user_func($Vp0bahhl3qia, $Vyvmmv0t5uw2, $Vvcjkdrakwx3, $Vrvfbmc1f43d);
    }
}
