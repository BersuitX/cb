<?php

namespace Psr\Http\Message;


interface StreamInterface
{
    
    public function __toString();

    
    public function close();

    
    public function detach();

    
    public function getSize();

    
    public function tell();

    
    public function eof();

    
    public function isSeekable();

    
    public function seek($V5peram4ncbv, $V0hp5tomtvke = SEEK_SET);

    
    public function rewind();

    
    public function isWritable();

    
    public function write($Ve5tcsso230g);

    
    public function isReadable();

    
    public function read($Vxbsqvaghf5p);

    
    public function getContents();

    
    public function getMetadata($Vlpbz5aloxqt = null);
}
