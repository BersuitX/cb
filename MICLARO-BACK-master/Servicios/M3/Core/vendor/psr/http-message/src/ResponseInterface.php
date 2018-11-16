<?php

namespace Psr\Http\Message;


interface ResponseInterface extends MessageInterface
{
    
    public function getStatusCode();

    
    public function withStatus($V5kll1klco0v, $Vzvrc4ysv2qt = '');

    
    public function getReasonPhrase();
}
