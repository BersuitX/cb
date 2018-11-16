<?php

namespace Psr\Http\Message;


interface UploadedFileInterface
{
    
    public function getStream();

    
    public function moveTo($Vcl5ky4x4bi4);
    
    
    public function getSize();
    
    
    public function getError();
    
    
    public function getClientFilename();
    
    
    public function getClientMediaType();
}
