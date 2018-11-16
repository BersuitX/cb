<?php

namespace Slim\Exception;

use Exception;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;


class SlimException extends Exception
{
    
    protected $Vyvmmv0t5uw2;

    
    protected $Vvcjkdrakwx3;

    
    public function __construct(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        parent::__construct();
        $this->request = $Vyvmmv0t5uw2;
        $this->response = $Vvcjkdrakwx3;
    }

    
    public function getRequest()
    {
        return $this->request;
    }

    
    public function getResponse()
    {
        return $this->response;
    }
}
