<?php

namespace Psr\Http\Message;


interface RequestInterface extends MessageInterface
{
    
    public function getRequestTarget();

    
    public function withRequestTarget($Vqbo5zkysq1g);

    
    public function getMethod();

    
    public function withMethod($Vtlfvdwskdge);

    
    public function getUri();

    
    public function withUri(UriInterface $Vbraexi5phsi, $Vcmfiserskma = false);
}
