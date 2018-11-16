<?php

namespace Slim\Interfaces;

use InvalidArgumentException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;


interface RouteInterface
{

    
    public function getArgument($Vgpjmw221p0b, $V0ekusmibtbl = null);

    
    public function getArguments();

    
    public function getName();

    
    public function getPattern();

    
    public function setArgument($Vgpjmw221p0b, $Vcptarsq5qe4);

    
    public function setArguments(array $Vj23lbel2xn0);

    
    public function setOutputBuffering($V4ci5ldaqb4a);

    
    public function setName($Vgpjmw221p0b);

    
    public function add($Vp0bahhl3qia);

    
    public function prepare(ServerRequestInterface $Vyvmmv0t5uw2, array $Vj23lbel2xn0);

    
    public function run(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3);

    
    public function __invoke(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3);
}
