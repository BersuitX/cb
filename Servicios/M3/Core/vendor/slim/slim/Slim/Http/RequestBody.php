<?php

namespace Slim\Http;


class RequestBody extends Body
{
    
    public function __construct()
    {
        $V4mgjtqyeyio = fopen('php://temp', 'w+');
        stream_copy_to_stream(fopen('php://input', 'r'), $V4mgjtqyeyio);
        rewind($V4mgjtqyeyio);

        parent::__construct($V4mgjtqyeyio);
    }
}
