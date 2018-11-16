<?php

namespace Slim\Exception;

use Psr\Http\Message\ServerRequestInterface;

class InvalidMethodException extends \InvalidArgumentException
{
    protected $Vyvmmv0t5uw2;

    public function __construct(ServerRequestInterface $Vyvmmv0t5uw2, $Vtlfvdwskdge)
    {
        $this->request = $Vyvmmv0t5uw2;
        parent::__construct(sprintf('Unsupported HTTP method "%s" provided', $Vtlfvdwskdge));
    }

    public function getRequest()
    {
        return $this->request;
    }
}
