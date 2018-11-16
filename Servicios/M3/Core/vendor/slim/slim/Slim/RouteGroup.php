<?php

namespace Slim;

use Closure;
use Slim\Interfaces\RouteGroupInterface;


class RouteGroup extends Routable implements RouteGroupInterface
{
    
    public function __construct($Vp1x1qfledcv, $Vp0bahhl3qia)
    {
        $this->pattern = $Vp1x1qfledcv;
        $this->callable = $Vp0bahhl3qia;
    }

    
    public function __invoke(App $V0ojkog2p2jp = null)
    {
        $Vp0bahhl3qia = $this->resolveCallable($this->callable);
        if ($Vp0bahhl3qia instanceof Closure && $V0ojkog2p2jp !== null) {
            $Vp0bahhl3qia = $Vp0bahhl3qia->bindTo($V0ojkog2p2jp);
        }

        $Vp0bahhl3qia($V0ojkog2p2jp);
    }
}
