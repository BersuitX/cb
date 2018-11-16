<?php

namespace Slim\Interfaces;

use RuntimeException;
use InvalidArgumentException;
use Psr\Http\Message\ServerRequestInterface;


interface RouterInterface
{
    
    const DISPATCH_STATUS = 0;
    const ALLOWED_METHODS = 1;

    
    public function map($V0yfl5ulns0o, $Vp1x1qfledcv, $Voc34ggbfvw5);

    
    public function dispatch(ServerRequestInterface $Vyvmmv0t5uw2);

    
    public function pushGroup($Vp1x1qfledcv, $Vp0bahhl3qia);

    
    public function popGroup();

    
    public function getNamedRoute($Vgpjmw221p0b);

    
    public function lookupRoute($Vleum1gctewv);

    
    public function relativePathFor($Vgpjmw221p0b, array $Vqhzkfsafzrc = [], array $V5old1qgxzf3 = []);

    
    public function pathFor($Vgpjmw221p0b, array $Vqhzkfsafzrc = [], array $V5old1qgxzf3 = []);
}
