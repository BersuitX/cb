<?php

namespace Slim\Exception;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class MethodNotAllowedException extends SlimException
{
    
    protected $Vqhzirb03shq;

    
    public function __construct(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3, array $Vqhzirb03shq)
    {
        parent::__construct($Vyvmmv0t5uw2, $Vvcjkdrakwx3);
        $this->allowedMethods = $Vqhzirb03shq;
    }

    
    public function getAllowedMethods()
    {
        return $this->allowedMethods;
    }
}
