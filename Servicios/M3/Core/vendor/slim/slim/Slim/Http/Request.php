<?php

namespace Slim\Http;

use Closure;
use InvalidArgumentException;
use Psr\Http\Message\UploadedFileInterface;
use RuntimeException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;
use Slim\Collection;
use Slim\Exception\InvalidMethodException;
use Slim\Interfaces\Http\HeadersInterface;


class Request extends Message implements ServerRequestInterface
{
    
    protected $Vtlfvdwskdge;

    
    protected $Vh2qj2lk4jsa;

    
    protected $Vbraexi5phsi;

    
    protected $Vqbo5zkysq1g;

    
    protected $V5old1qgxzf3;

    
    protected $Voujri0ure32;

    
    protected $V31wlyu0odna;

    
    protected $Vfwhzdv2bggu;

    
    protected $Vdo33xkf43av = false;

    
    protected $Vwdjdwanexgg = [];

    
    protected $Vawhjzmdy4yk;

    
    protected $Vjhnd2tdkv12 = [
        'CONNECT' => 1,
        'DELETE' => 1,
        'GET' => 1,
        'HEAD' => 1,
        'OPTIONS' => 1,
        'PATCH' => 1,
        'POST' => 1,
        'PUT' => 1,
        'TRACE' => 1,
    ];

    
    public static function createFromEnvironment(Environment $Vdwvtaon2lv0)
    {
        $Vtlfvdwskdge = $Vdwvtaon2lv0['REQUEST_METHOD'];
        $Vbraexi5phsi = Uri::createFromEnvironment($Vdwvtaon2lv0);
        $V5y2wgq24k1v = Headers::createFromEnvironment($Vdwvtaon2lv0);
        $Voujri0ure32 = Cookies::parseHeader($V5y2wgq24k1v->get('Cookie', []));
        $V31wlyu0odna = $Vdwvtaon2lv0->all();
        $V5brf34vsiqi = new RequestBody();
        $Vawhjzmdy4yk = UploadedFile::createFromEnvironment($Vdwvtaon2lv0);

        $Vyvmmv0t5uw2 = new static($Vtlfvdwskdge, $Vbraexi5phsi, $V5y2wgq24k1v, $Voujri0ure32, $V31wlyu0odna, $V5brf34vsiqi, $Vawhjzmdy4yk);

        if ($Vtlfvdwskdge === 'POST' &&
            in_array($Vyvmmv0t5uw2->getMediaType(), ['application/x-www-form-urlencoded', 'multipart/form-data'])
        ) {
            
            $Vyvmmv0t5uw2 = $Vyvmmv0t5uw2->withParsedBody($_POST);
        }
        return $Vyvmmv0t5uw2;
    }

    
    public function __construct(
        $Vtlfvdwskdge,
        UriInterface $Vbraexi5phsi,
        HeadersInterface $V5y2wgq24k1v,
        array $Voujri0ure32,
        array $V31wlyu0odna,
        StreamInterface $V5brf34vsiqi,
        array $Vawhjzmdy4yk = []
    ) {
        try {
            $this->originalMethod = $this->filterMethod($Vtlfvdwskdge);
        } catch (InvalidMethodException $Vpt32vvhspnv) {
            $this->originalMethod = $Vtlfvdwskdge;
        }

        $this->uri = $Vbraexi5phsi;
        $this->headers = $V5y2wgq24k1v;
        $this->cookies = $Voujri0ure32;
        $this->serverParams = $V31wlyu0odna;
        $this->attributes = new Collection();
        $this->body = $V5brf34vsiqi;
        $this->uploadedFiles = $Vawhjzmdy4yk;

        if (isset($V31wlyu0odna['SERVER_PROTOCOL'])) {
            $this->protocolVersion = str_replace('HTTP/', '', $V31wlyu0odna['SERVER_PROTOCOL']);
        }

        if (!$this->headers->has('Host') && $this->uri->getHost() !== '') {
            $Vtdpfzm0vmqb = $this->uri->getPort() ? ":{$this->uri->getPort()}" : '';

            $this->headers->set('Host', $this->uri->getHost() . $Vtdpfzm0vmqb);
        }

        $this->registerMediaTypeParser('application/json', function ($Vioma0xlpppc) {
            $Vv0hyvhlkjqr = json_decode($Vioma0xlpppc, true);
            if (!is_array($Vv0hyvhlkjqr)) {
                return null;
            }
            return $Vv0hyvhlkjqr;
        });

        $this->registerMediaTypeParser('application/xml', function ($Vioma0xlpppc) {
            $V5ao4sv0bboe = libxml_disable_entity_loader(true);
            $V5ao4sv0bboe_errors = libxml_use_internal_errors(true);
            $Vv0hyvhlkjqr = simplexml_load_string($Vioma0xlpppc);
            libxml_disable_entity_loader($V5ao4sv0bboe);
            libxml_clear_errors();
            libxml_use_internal_errors($V5ao4sv0bboe_errors);
            if ($Vv0hyvhlkjqr === false) {
                return null;
            }
            return $Vv0hyvhlkjqr;
        });

        $this->registerMediaTypeParser('text/xml', function ($Vioma0xlpppc) {
            $V5ao4sv0bboe = libxml_disable_entity_loader(true);
            $V5ao4sv0bboe_errors = libxml_use_internal_errors(true);
            $Vv0hyvhlkjqr = simplexml_load_string($Vioma0xlpppc);
            libxml_disable_entity_loader($V5ao4sv0bboe);
            libxml_clear_errors();
            libxml_use_internal_errors($V5ao4sv0bboe_errors);
            if ($Vv0hyvhlkjqr === false) {
                return null;
            }
            return $Vv0hyvhlkjqr;
        });

        $this->registerMediaTypeParser('application/x-www-form-urlencoded', function ($Vioma0xlpppc) {
            parse_str($Vioma0xlpppc, $Vqhzkfsafzrc);
            return $Vqhzkfsafzrc;
        });

        
        if (isset($Vpt32vvhspnv) && $Vpt32vvhspnv instanceof InvalidMethodException) {
            throw $Vpt32vvhspnv;
        }
    }

    
    public function __clone()
    {
        $this->headers = clone $this->headers;
        $this->attributes = clone $this->attributes;
        $this->body = clone $this->body;
    }

    

    
    public function getMethod()
    {
        if ($this->method === null) {
            $this->method = $this->originalMethod;
            $V0jgisegnv4z = $this->getHeaderLine('X-Http-Method-Override');

            if ($V0jgisegnv4z) {
                $this->method = $this->filterMethod($V0jgisegnv4z);
            } elseif ($this->originalMethod === 'POST') {
                $Vyneqr1q2pr0 = $this->filterMethod($this->getParsedBodyParam('_METHOD'));
                if ($Vyneqr1q2pr0 !== null) {
                    $this->method = $Vyneqr1q2pr0;
                }

                if ($this->getBody()->eof()) {
                    $this->getBody()->rewind();
                }
            }
        }

        return $this->method;
    }

    
    public function getOriginalMethod()
    {
        return $this->originalMethod;
    }

    
    public function withMethod($Vtlfvdwskdge)
    {
        $Vtlfvdwskdge = $this->filterMethod($Vtlfvdwskdge);
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->originalMethod = $Vtlfvdwskdge;
        $Vyrkjyl34c1m->method = $Vtlfvdwskdge;

        return $Vyrkjyl34c1m;
    }

    
    protected function filterMethod($Vtlfvdwskdge)
    {
        if ($Vtlfvdwskdge === null) {
            return $Vtlfvdwskdge;
        }

        if (!is_string($Vtlfvdwskdge)) {
            throw new InvalidArgumentException(sprintf(
                'Unsupported HTTP method; must be a string, received %s',
                (is_object($Vtlfvdwskdge) ? get_class($Vtlfvdwskdge) : gettype($Vtlfvdwskdge))
            ));
        }

        $Vtlfvdwskdge = strtoupper($Vtlfvdwskdge);
        if (preg_match("/^[!#$%&'*+.^_`|~0-9a-z-]+$/i", $Vtlfvdwskdge) !== 1) {
            throw new InvalidMethodException($this, $Vtlfvdwskdge);
        }

        return $Vtlfvdwskdge;
    }

    
    public function isMethod($Vtlfvdwskdge)
    {
        return $this->getMethod() === $Vtlfvdwskdge;
    }

    
    public function isGet()
    {
        return $this->isMethod('GET');
    }

    
    public function isPost()
    {
        return $this->isMethod('POST');
    }

    
    public function isPut()
    {
        return $this->isMethod('PUT');
    }

    
    public function isPatch()
    {
        return $this->isMethod('PATCH');
    }

    
    public function isDelete()
    {
        return $this->isMethod('DELETE');
    }

    
    public function isHead()
    {
        return $this->isMethod('HEAD');
    }

    
    public function isOptions()
    {
        return $this->isMethod('OPTIONS');
    }

    
    public function isXhr()
    {
        return $this->getHeaderLine('X-Requested-With') === 'XMLHttpRequest';
    }

    

    
    public function getRequestTarget()
    {
        if ($this->requestTarget) {
            return $this->requestTarget;
        }

        if ($this->uri === null) {
            return '/';
        }

        $Vceolxvhj4kw = $this->uri->getBasePath();
        $V2bpoh5hagzp = $this->uri->getPath();
        $V2bpoh5hagzp = $Vceolxvhj4kw . '/' . ltrim($V2bpoh5hagzp, '/');

        $Vfbt3who3l5d = $this->uri->getQuery();
        if ($Vfbt3who3l5d) {
            $V2bpoh5hagzp .= '?' . $Vfbt3who3l5d;
        }
        $this->requestTarget = $V2bpoh5hagzp;

        return $this->requestTarget;
    }

    
    public function withRequestTarget($Vqbo5zkysq1g)
    {
        if (preg_match('#\s#', $Vqbo5zkysq1g)) {
            throw new InvalidArgumentException(
                'Invalid request target provided; must be a string and cannot contain whitespace'
            );
        }
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->requestTarget = $Vqbo5zkysq1g;

        return $Vyrkjyl34c1m;
    }

    
    public function getUri()
    {
        return $this->uri;
    }

    
    public function withUri(UriInterface $Vbraexi5phsi, $Vcmfiserskma = false)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->uri = $Vbraexi5phsi;

        if (!$Vcmfiserskma) {
            if ($Vbraexi5phsi->getHost() !== '') {
                $Vyrkjyl34c1m->headers->set('Host', $Vbraexi5phsi->getHost());
            }
        } else {
            if ($Vbraexi5phsi->getHost() !== '' && (!$this->hasHeader('Host') || $this->getHeaderLine('Host') === '')) {
                $Vyrkjyl34c1m->headers->set('Host', $Vbraexi5phsi->getHost());
            }
        }

        return $Vyrkjyl34c1m;
    }

    
    public function getContentType()
    {
        $Vv0hyvhlkjqr = $this->getHeader('Content-Type');

        return $Vv0hyvhlkjqr ? $Vv0hyvhlkjqr[0] : null;
    }

    
    public function getMediaType()
    {
        $Vu0gcqqdlst1 = $this->getContentType();
        if ($Vu0gcqqdlst1) {
            $Vu0gcqqdlst1Parts = preg_split('/\s*[;,]\s*/', $Vu0gcqqdlst1);

            return strtolower($Vu0gcqqdlst1Parts[0]);
        }

        return null;
    }

    
    public function getMediaTypeParams()
    {
        $Vu0gcqqdlst1 = $this->getContentType();
        $Vu0gcqqdlst1Params = [];
        if ($Vu0gcqqdlst1) {
            $Vu0gcqqdlst1Parts = preg_split('/\s*[;,]\s*/', $Vu0gcqqdlst1);
            $Vu0gcqqdlst1PartsLength = count($Vu0gcqqdlst1Parts);
            for ($Vxja1abp34yq = 1; $Vxja1abp34yq < $Vu0gcqqdlst1PartsLength; $Vxja1abp34yq++) {
                $Vxqsg0qmadz0 = explode('=', $Vu0gcqqdlst1Parts[$Vxja1abp34yq]);
                $Vu0gcqqdlst1Params[strtolower($Vxqsg0qmadz0[0])] = $Vxqsg0qmadz0[1];
            }
        }

        return $Vu0gcqqdlst1Params;
    }

    
    public function getContentCharset()
    {
        $Vxf44cqoqtlf = $this->getMediaTypeParams();
        if (isset($Vxf44cqoqtlf['charset'])) {
            return $Vxf44cqoqtlf['charset'];
        }

        return null;
    }

    
    public function getContentLength()
    {
        $Vv0hyvhlkjqr = $this->headers->get('Content-Length');

        return $Vv0hyvhlkjqr ? (int)$Vv0hyvhlkjqr[0] : null;
    }

    

    
    public function getCookieParams()
    {
        return $this->cookies;
    }

    
    public function getCookieParam($Vlpbz5aloxqt, $V0ekusmibtbl = null)
    {
        $Voujri0ure32 = $this->getCookieParams();
        $Vv0hyvhlkjqr = $V0ekusmibtbl;
        if (isset($Voujri0ure32[$Vlpbz5aloxqt])) {
            $Vv0hyvhlkjqr = $Voujri0ure32[$Vlpbz5aloxqt];
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function withCookieParams(array $Voujri0ure32)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->cookies = $Voujri0ure32;

        return $Vyrkjyl34c1m;
    }

    

    
    public function getQueryParams()
    {
        if (is_array($this->queryParams)) {
            return $this->queryParams;
        }

        if ($this->uri === null) {
            return [];
        }

        parse_str($this->uri->getQuery(), $this->queryParams); 

        return $this->queryParams;
    }

    
    public function withQueryParams(array $Vfbt3who3l5d)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->queryParams = $Vfbt3who3l5d;

        return $Vyrkjyl34c1m;
    }

    

    
    public function getUploadedFiles()
    {
        return $this->uploadedFiles;
    }

    
    public function withUploadedFiles(array $Vawhjzmdy4yk)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->uploadedFiles = $Vawhjzmdy4yk;

        return $Vyrkjyl34c1m;
    }

    

    
    public function getServerParams()
    {
        return $this->serverParams;
    }

    
    public function getServerParam($Vlpbz5aloxqt, $V0ekusmibtbl = null)
    {
        $V31wlyu0odna = $this->getServerParams();

        return isset($V31wlyu0odna[$Vlpbz5aloxqt]) ? $V31wlyu0odna[$Vlpbz5aloxqt] : $V0ekusmibtbl;
    }

    

    
    public function getAttributes()
    {
        return $this->attributes->all();
    }

    
    public function getAttribute($Vgpjmw221p0b, $V0ekusmibtbl = null)
    {
        return $this->attributes->get($Vgpjmw221p0b, $V0ekusmibtbl);
    }

    
    public function withAttribute($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->attributes->set($Vgpjmw221p0b, $Vcptarsq5qe4);

        return $Vyrkjyl34c1m;
    }

    
    public function withAttributes(array $Vfwhzdv2bggu)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->attributes = new Collection($Vfwhzdv2bggu);

        return $Vyrkjyl34c1m;
    }

    
    public function withoutAttribute($Vgpjmw221p0b)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->attributes->remove($Vgpjmw221p0b);

        return $Vyrkjyl34c1m;
    }

    

    
    public function getParsedBody()
    {
        if ($this->bodyParsed !== false) {
            return $this->bodyParsed;
        }

        if (!$this->body) {
            return null;
        }

        $Vf30dhwqp0jq = $this->getMediaType();

        
        $Vbkdgagqgicd = explode('+', $Vf30dhwqp0jq);
        if (count($Vbkdgagqgicd) >= 2) {
            $Vf30dhwqp0jq = 'application/' . $Vbkdgagqgicd[count($Vbkdgagqgicd)-1];
        }

        if (isset($this->bodyParsers[$Vf30dhwqp0jq]) === true) {
            $V5brf34vsiqi = (string)$this->getBody();
            $V0luatne1svb = $this->bodyParsers[$Vf30dhwqp0jq]($V5brf34vsiqi);

            if (!is_null($V0luatne1svb) && !is_object($V0luatne1svb) && !is_array($V0luatne1svb)) {
                throw new RuntimeException(
                    'Request body media type parser return value must be an array, an object, or null'
                );
            }
            $this->bodyParsed = $V0luatne1svb;
            return $this->bodyParsed;
        }

        return null;
    }

    
    public function withParsedBody($Vqhzkfsafzrc)
    {
        if (!is_null($Vqhzkfsafzrc) && !is_object($Vqhzkfsafzrc) && !is_array($Vqhzkfsafzrc)) {
            throw new InvalidArgumentException('Parsed body value must be an array, an object, or null');
        }

        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->bodyParsed = $Vqhzkfsafzrc;

        return $Vyrkjyl34c1m;
    }

    
    public function reparseBody()
    {
        $this->bodyParsed = false;

        return $this;
    }

    
    public function registerMediaTypeParser($Vf30dhwqp0jq, callable $Vp0bahhl3qia)
    {
        if ($Vp0bahhl3qia instanceof Closure) {
            $Vp0bahhl3qia = $Vp0bahhl3qia->bindTo($this);
        }
        $this->bodyParsers[(string)$Vf30dhwqp0jq] = $Vp0bahhl3qia;
    }

    

    
    public function getParam($Vlpbz5aloxqt, $V0ekusmibtbl = null)
    {
        $Vwbhflzjldd2 = $this->getParsedBody();
        $Vfjc1ulfzf2s = $this->getQueryParams();
        $Vv0hyvhlkjqr = $V0ekusmibtbl;
        if (is_array($Vwbhflzjldd2) && isset($Vwbhflzjldd2[$Vlpbz5aloxqt])) {
            $Vv0hyvhlkjqr = $Vwbhflzjldd2[$Vlpbz5aloxqt];
        } elseif (is_object($Vwbhflzjldd2) && property_exists($Vwbhflzjldd2, $Vlpbz5aloxqt)) {
            $Vv0hyvhlkjqr = $Vwbhflzjldd2->$Vlpbz5aloxqt;
        } elseif (isset($Vfjc1ulfzf2s[$Vlpbz5aloxqt])) {
            $Vv0hyvhlkjqr = $Vfjc1ulfzf2s[$Vlpbz5aloxqt];
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function getParsedBodyParam($Vlpbz5aloxqt, $V0ekusmibtbl = null)
    {
        $Vwbhflzjldd2 = $this->getParsedBody();
        $Vv0hyvhlkjqr = $V0ekusmibtbl;
        if (is_array($Vwbhflzjldd2) && isset($Vwbhflzjldd2[$Vlpbz5aloxqt])) {
            $Vv0hyvhlkjqr = $Vwbhflzjldd2[$Vlpbz5aloxqt];
        } elseif (is_object($Vwbhflzjldd2) && property_exists($Vwbhflzjldd2, $Vlpbz5aloxqt)) {
            $Vv0hyvhlkjqr = $Vwbhflzjldd2->$Vlpbz5aloxqt;
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function getQueryParam($Vlpbz5aloxqt, $V0ekusmibtbl = null)
    {
        $Vfjc1ulfzf2s = $this->getQueryParams();
        $Vv0hyvhlkjqr = $V0ekusmibtbl;
        if (isset($Vfjc1ulfzf2s[$Vlpbz5aloxqt])) {
            $Vv0hyvhlkjqr = $Vfjc1ulfzf2s[$Vlpbz5aloxqt];
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function getParams(array $Vydpoa3gsxln = null)
    {
        $Vdhafuyqqxgk = $this->getQueryParams();
        $Vwbhflzjldd2 = $this->getParsedBody();
        if ($Vwbhflzjldd2) {
            $Vdhafuyqqxgk = array_merge($Vdhafuyqqxgk, (array)$Vwbhflzjldd2);
        }

        if ($Vydpoa3gsxln) {
            $Vydpoa3gsxlnParams = [];
            foreach ($Vydpoa3gsxln as $Vlpbz5aloxqt) {
                if (array_key_exists($Vlpbz5aloxqt, $Vdhafuyqqxgk)) {
                    $Vydpoa3gsxlnParams[$Vlpbz5aloxqt] = $Vdhafuyqqxgk[$Vlpbz5aloxqt];
                }
            }
            return $Vydpoa3gsxlnParams;
        }

        return $Vdhafuyqqxgk;
    }
}
