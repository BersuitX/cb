<?php

namespace Slim;

use RuntimeException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;


trait MiddlewareAwareTrait
{
    
    protected $Veheujj4idzq;

    
    protected $Vfyuhxna0upg = false;

    
    protected function addMiddleware(callable $Vp0bahhl3qia)
    {
        if ($this->middlewareLock) {
            throw new RuntimeException('Middleware can’t be added once the stack is dequeuing');
        }

        if (is_null($this->tip)) {
            $this->seedMiddlewareStack();
        }
        $Vb0oekl1ql4r = $this->tip;
        $this->tip = function (
            ServerRequestInterface $Vyvmmv0t5uw2,
            ResponseInterface $Vvcjkdrakwx3
        ) use (
            $Vp0bahhl3qia,
            $Vb0oekl1ql4r
        ) {
            $Vv0hyvhlkjqr = call_user_func($Vp0bahhl3qia, $Vyvmmv0t5uw2, $Vvcjkdrakwx3, $Vb0oekl1ql4r);
            if ($Vv0hyvhlkjqr instanceof ResponseInterface === false) {
                throw new UnexpectedValueException(
                    'Middleware must return instance of \Psr\Http\Message\ResponseInterface'
                );
            }

            return $Vv0hyvhlkjqr;
        };

        return $this;
    }

    
    protected function seedMiddlewareStack(callable $Vrodkwccahxo = null)
    {
        if (!is_null($this->tip)) {
            throw new RuntimeException('MiddlewareStack can only be seeded once.');
        }
        if ($Vrodkwccahxo === null) {
            $Vrodkwccahxo = $this;
        }
        $this->tip = $Vrodkwccahxo;
    }

    
    public function callMiddlewareStack(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        if (is_null($this->tip)) {
            $this->seedMiddlewareStack();
        }
        
        $Vtpoxs3gutsc = $this->tip;
        $this->middlewareLock = true;
        $Vvcjkdrakwx3 = $Vtpoxs3gutsc($Vyvmmv0t5uw2, $Vvcjkdrakwx3);
        $this->middlewareLock = false;
        return $Vvcjkdrakwx3;
    }
}
