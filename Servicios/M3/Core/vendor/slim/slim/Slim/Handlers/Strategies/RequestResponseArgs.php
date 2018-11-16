<?php

namespace Slim\Handlers\Strategies;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Interfaces\InvocationStrategyInterface;


class RequestResponseArgs implements InvocationStrategyInterface
{

    
    public function __invoke(
        callable $Vp0bahhl3qia,
        ServerRequestInterface $Vyvmmv0t5uw2,
        ResponseInterface $Vvcjkdrakwx3,
        array $Vrvfbmc1f43d
    ) {
        array_unshift($Vrvfbmc1f43d, $Vyvmmv0t5uw2, $Vvcjkdrakwx3);

        return call_user_func_array($Vp0bahhl3qia, $Vrvfbmc1f43d);
    }
}
