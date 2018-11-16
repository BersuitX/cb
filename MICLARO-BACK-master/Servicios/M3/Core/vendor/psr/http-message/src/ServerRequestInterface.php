<?php

namespace Psr\Http\Message;


interface ServerRequestInterface extends RequestInterface
{
    
    public function getServerParams();

    
    public function getCookieParams();

    
    public function withCookieParams(array $Voujri0ure32);

    
    public function getQueryParams();

    
    public function withQueryParams(array $Vfbt3who3l5d);

    
    public function getUploadedFiles();

    
    public function withUploadedFiles(array $Vawhjzmdy4yk);

    
    public function getParsedBody();

    
    public function withParsedBody($Vqhzkfsafzrc);

    
    public function getAttributes();

    
    public function getAttribute($Vgpjmw221p0b, $V0ekusmibtbl = null);

    
    public function withAttribute($Vgpjmw221p0b, $Vcptarsq5qe4);

    
    public function withoutAttribute($Vgpjmw221p0b);
}
