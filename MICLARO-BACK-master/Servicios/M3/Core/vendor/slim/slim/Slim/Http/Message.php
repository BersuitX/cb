<?php

namespace Slim\Http;

use InvalidArgumentException;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;


abstract class Message implements MessageInterface
{
    
    protected $Vyuouxobon3q = '1.1';

    
    protected static $Vsiedrvbrds4 = [
        '1.0' => true,
        '1.1' => true,
        '2.0' => true,
        '2' => true,
    ];

    
    protected $V5y2wgq24k1v;

    
    protected $V5brf34vsiqi;


    
    public function __set($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        
    }

    

    
    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }

    
    public function withProtocolVersion($Vzqixmthnyoe)
    {
        if (!isset(self::$Vsiedrvbrds4[$Vzqixmthnyoe])) {
            throw new InvalidArgumentException(
                'Invalid HTTP version. Must be one of: '
                . implode(', ', array_keys(self::$Vsiedrvbrds4))
            );
        }
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->protocolVersion = $Vzqixmthnyoe;

        return $Vyrkjyl34c1m;
    }

    

    
    public function getHeaders()
    {
        return $this->headers->all();
    }

    
    public function hasHeader($Vgpjmw221p0b)
    {
        return $this->headers->has($Vgpjmw221p0b);
    }

    
    public function getHeader($Vgpjmw221p0b)
    {
        return $this->headers->get($Vgpjmw221p0b, []);
    }

    
    public function getHeaderLine($Vgpjmw221p0b)
    {
        return implode(',', $this->headers->get($Vgpjmw221p0b, []));
    }

    
    public function withHeader($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->headers->set($Vgpjmw221p0b, $Vcptarsq5qe4);

        return $Vyrkjyl34c1m;
    }

    
    public function withAddedHeader($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->headers->add($Vgpjmw221p0b, $Vcptarsq5qe4);

        return $Vyrkjyl34c1m;
    }

    
    public function withoutHeader($Vgpjmw221p0b)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->headers->remove($Vgpjmw221p0b);

        return $Vyrkjyl34c1m;
    }

    

    
    public function getBody()
    {
        return $this->body;
    }

    
    public function withBody(StreamInterface $V5brf34vsiqi)
    {
        
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->body = $V5brf34vsiqi;

        return $Vyrkjyl34c1m;
    }
}
