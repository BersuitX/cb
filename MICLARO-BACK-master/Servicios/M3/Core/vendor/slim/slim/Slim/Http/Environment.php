<?php

namespace Slim\Http;

use Slim\Collection;
use Slim\Interfaces\Http\EnvironmentInterface;


class Environment extends Collection implements EnvironmentInterface
{
    
    public static function mock(array $Veaml2yrl3p2 = [])
    {
        
        if ((isset($Veaml2yrl3p2['HTTPS']) && $Veaml2yrl3p2['HTTPS'] !== 'off') ||
            ((isset($Veaml2yrl3p2['REQUEST_SCHEME']) && $Veaml2yrl3p2['REQUEST_SCHEME'] === 'https'))) {
            $Vwlhl0racyj3 = 'https';
            $Vdjovvguec5j = 443;
        } else {
            $Vwlhl0racyj3 = 'http';
            $Vdjovvguec5j = 80;
        }

        $Vqhzkfsafzrc = array_merge([
            'SERVER_PROTOCOL'      => 'HTTP/1.1',
            'REQUEST_METHOD'       => 'GET',
            'REQUEST_SCHEME'       => $Vwlhl0racyj3,
            'SCRIPT_NAME'          => '',
            'REQUEST_URI'          => '',
            'QUERY_STRING'         => '',
            'SERVER_NAME'          => 'localhost',
            'SERVER_PORT'          => $Vdjovvguec5j,
            'HTTP_HOST'            => 'localhost',
            'HTTP_ACCEPT'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'HTTP_ACCEPT_LANGUAGE' => 'en-US,en;q=0.8',
            'HTTP_ACCEPT_CHARSET'  => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
            'HTTP_USER_AGENT'      => 'Slim Framework',
            'REMOTE_ADDR'          => '127.0.0.1',
            'REQUEST_TIME'         => time(),
            'REQUEST_TIME_FLOAT'   => microtime(true),
        ], $Veaml2yrl3p2);

        return new static($Vqhzkfsafzrc);
    }
}
