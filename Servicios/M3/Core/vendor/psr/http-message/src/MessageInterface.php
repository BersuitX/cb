<?php

namespace Psr\Http\Message;


interface MessageInterface
{
    
    public function getProtocolVersion();

    
    public function withProtocolVersion($Vzqixmthnyoe);

    
    public function getHeaders();

    
    public function hasHeader($Vgpjmw221p0b);

    
    public function getHeader($Vgpjmw221p0b);

    
    public function getHeaderLine($Vgpjmw221p0b);

    
    public function withHeader($Vgpjmw221p0b, $Vcptarsq5qe4);

    
    public function withAddedHeader($Vgpjmw221p0b, $Vcptarsq5qe4);

    
    public function withoutHeader($Vgpjmw221p0b);

    
    public function getBody();

    
    public function withBody(StreamInterface $V5brf34vsiqi);
}
