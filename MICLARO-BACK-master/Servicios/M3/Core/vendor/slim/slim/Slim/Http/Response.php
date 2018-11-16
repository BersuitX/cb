<?php

namespace Slim\Http;

use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Slim\Interfaces\Http\HeadersInterface;


class Response extends Message implements ResponseInterface
{
    
    protected $Vmtvkqxvklrv = 200;

    
    protected $Vzvrc4ysv2qt = '';

    
    protected static $Vvu5t3gycmdg = [
        
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        444 => 'Connection Closed Without Response',
        451 => 'Unavailable For Legal Reasons',
        499 => 'Client Closed Request',
        
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
        599 => 'Network Connect Timeout Error',
    ];

    
     const EOL = "\r\n";

    
    public function __construct($Vmtvkqxvklrv = 200, HeadersInterface $V5y2wgq24k1v = null, StreamInterface $V5brf34vsiqi = null)
    {
        $this->status = $this->filterStatus($Vmtvkqxvklrv);
        $this->headers = $V5y2wgq24k1v ? $V5y2wgq24k1v : new Headers();
        $this->body = $V5brf34vsiqi ? $V5brf34vsiqi : new Body(fopen('php://temp', 'r+'));
    }

    
    public function __clone()
    {
        $this->headers = clone $this->headers;
    }

    

    
    public function getStatusCode()
    {
        return $this->status;
    }

    
    public function withStatus($V5kll1klco0v, $Vzvrc4ysv2qt = '')
    {
        $V5kll1klco0v = $this->filterStatus($V5kll1klco0v);

        if (!is_string($Vzvrc4ysv2qt) && !method_exists($Vzvrc4ysv2qt, '__toString')) {
            throw new InvalidArgumentException('ReasonPhrase must be a string');
        }

        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->status = $V5kll1klco0v;
        if ($Vzvrc4ysv2qt === '' && isset(static::$Vvu5t3gycmdg[$V5kll1klco0v])) {
            $Vzvrc4ysv2qt = static::$Vvu5t3gycmdg[$V5kll1klco0v];
        }

        if ($Vzvrc4ysv2qt === '') {
            throw new InvalidArgumentException('ReasonPhrase must be supplied for this code');
        }

        $Vyrkjyl34c1m->reasonPhrase = $Vzvrc4ysv2qt;

        return $Vyrkjyl34c1m;
    }

    
    protected function filterStatus($Vmtvkqxvklrv)
    {
        if (!is_integer($Vmtvkqxvklrv) || $Vmtvkqxvklrv<100 || $Vmtvkqxvklrv>599) {
            throw new InvalidArgumentException('Invalid HTTP status code');
        }

        return $Vmtvkqxvklrv;
    }

    
    public function getReasonPhrase()
    {
        if ($this->reasonPhrase) {
            return $this->reasonPhrase;
        }
        if (isset(static::$Vvu5t3gycmdg[$this->status])) {
            return static::$Vvu5t3gycmdg[$this->status];
        }
        return '';
    }

    

    
    public function withHeader($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->headers->set($Vgpjmw221p0b, $Vcptarsq5qe4);

        if ($Vyrkjyl34c1m->getStatusCode() === 200 && strtolower($Vgpjmw221p0b) === 'location') {
            $Vyrkjyl34c1m = $Vyrkjyl34c1m->withStatus(302);
        }

        return $Vyrkjyl34c1m;
    }


    

    
    public function write($Vqhzkfsafzrc)
    {
        $this->getBody()->write($Vqhzkfsafzrc);

        return $this;
    }

    

    
    public function withRedirect($Vnwlngxwnesf, $Vmtvkqxvklrv = null)
    {
        $Vtd2t2y414wi = $this->withHeader('Location', (string)$Vnwlngxwnesf);

        if (is_null($Vmtvkqxvklrv) && $this->getStatusCode() === 200) {
            $Vmtvkqxvklrv = 302;
        }

        if (!is_null($Vmtvkqxvklrv)) {
            return $Vtd2t2y414wi->withStatus($Vmtvkqxvklrv);
        }

        return $Vtd2t2y414wi;
    }

    
    public function withJson($Vqhzkfsafzrc, $Vmtvkqxvklrv = null, $Vkqjmgmehfec = 0)
    {
        $Vvcjkdrakwx3 = $this->withBody(new Body(fopen('php://temp', 'r+')));
        $Vvcjkdrakwx3->body->write($Vvkwvjdx1mcb = json_encode($Vqhzkfsafzrc, $Vkqjmgmehfec));

        
        if ($Vvkwvjdx1mcb === false) {
            throw new \RuntimeException(json_last_error_msg(), json_last_error());
        }

        $Vvcjkdrakwx3WithJson = $Vvcjkdrakwx3->withHeader('Content-Type', 'application/json;charset=utf-8');
        if (isset($Vmtvkqxvklrv)) {
            return $Vvcjkdrakwx3WithJson->withStatus($Vmtvkqxvklrv);
        }
        return $Vvcjkdrakwx3WithJson;
    }

    
    public function isEmpty()
    {
        return in_array($this->getStatusCode(), [204, 205, 304]);
    }

    
    public function isInformational()
    {
        return $this->getStatusCode() >= 100 && $this->getStatusCode() < 200;
    }

    
    public function isOk()
    {
        return $this->getStatusCode() === 200;
    }

    
    public function isSuccessful()
    {
        return $this->getStatusCode() >= 200 && $this->getStatusCode() < 300;
    }

    
    public function isRedirect()
    {
        return in_array($this->getStatusCode(), [301, 302, 303, 307]);
    }

    
    public function isRedirection()
    {
        return $this->getStatusCode() >= 300 && $this->getStatusCode() < 400;
    }

    
    public function isForbidden()
    {
        return $this->getStatusCode() === 403;
    }

    
    public function isNotFound()
    {
        return $this->getStatusCode() === 404;
    }

    
    public function isClientError()
    {
        return $this->getStatusCode() >= 400 && $this->getStatusCode() < 500;
    }

    
    public function isServerError()
    {
        return $this->getStatusCode() >= 500 && $this->getStatusCode() < 600;
    }

    
    public function __toString()
    {
        $Vvaiuwffullu = sprintf(
            'HTTP/%s %s %s',
            $this->getProtocolVersion(),
            $this->getStatusCode(),
            $this->getReasonPhrase()
        );
        $Vvaiuwffullu .= Response::EOL;
        foreach ($this->getHeaders() as $Vgpjmw221p0b => $Vcptarsq5qe4s) {
            $Vvaiuwffullu .= sprintf('%s: %s', $Vgpjmw221p0b, $this->getHeaderLine($Vgpjmw221p0b)) . Response::EOL;
        }
        $Vvaiuwffullu .= Response::EOL;
        $Vvaiuwffullu .= (string)$this->getBody();

        return $Vvaiuwffullu;
    }
}
