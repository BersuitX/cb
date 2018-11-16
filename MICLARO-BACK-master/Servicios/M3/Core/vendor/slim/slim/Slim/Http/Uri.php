<?php

namespace Slim\Http;

use InvalidArgumentException;
use \Psr\Http\Message\UriInterface;
use Slim\Http\Environment;


class Uri implements UriInterface
{
    
    protected $Vrr3hq23ezmd = '';

    
    protected $V5mtbw3sgabz = '';

    
    protected $Vsze0k4cneni = '';

    
    protected $Votmxko4hrhx = '';

    
    protected $Vtdpfzm0vmqb;

    
    protected $Vceolxvhj4kw = '';

    
    protected $V2bpoh5hagzp = '';

    
    protected $Vfbt3who3l5d = '';

    
    protected $Vzmx43dmvjzn = '';

    
    public function __construct(
        $Vrr3hq23ezmd,
        $Votmxko4hrhx,
        $Vtdpfzm0vmqb = null,
        $V2bpoh5hagzp = '/',
        $Vfbt3who3l5d = '',
        $Vzmx43dmvjzn = '',
        $V5mtbw3sgabz = '',
        $Vsze0k4cneni = ''
    ) {
        $this->scheme = $this->filterScheme($Vrr3hq23ezmd);
        $this->host = $Votmxko4hrhx;
        $this->port = $this->filterPort($Vtdpfzm0vmqb);
        $this->path = empty($V2bpoh5hagzp) ? '/' : $this->filterPath($V2bpoh5hagzp);
        $this->query = $this->filterQuery($Vfbt3who3l5d);
        $this->fragment = $this->filterQuery($Vzmx43dmvjzn);
        $this->user = $V5mtbw3sgabz;
        $this->password = $Vsze0k4cneni;
    }

    
    public static function createFromString($Vbraexi5phsi)
    {
        if (!is_string($Vbraexi5phsi) && !method_exists($Vbraexi5phsi, '__toString')) {
            throw new InvalidArgumentException('Uri must be a string');
        }

        $Vbkdgagqgicd = parse_url($Vbraexi5phsi);
        $Vrr3hq23ezmd = isset($Vbkdgagqgicd['scheme']) ? $Vbkdgagqgicd['scheme'] : '';
        $V5mtbw3sgabz = isset($Vbkdgagqgicd['user']) ? $Vbkdgagqgicd['user'] : '';
        $V4q3kbwdcdwg = isset($Vbkdgagqgicd['pass']) ? $Vbkdgagqgicd['pass'] : '';
        $Votmxko4hrhx = isset($Vbkdgagqgicd['host']) ? $Vbkdgagqgicd['host'] : '';
        $Vtdpfzm0vmqb = isset($Vbkdgagqgicd['port']) ? $Vbkdgagqgicd['port'] : null;
        $V2bpoh5hagzp = isset($Vbkdgagqgicd['path']) ? $Vbkdgagqgicd['path'] : '';
        $Vfbt3who3l5d = isset($Vbkdgagqgicd['query']) ? $Vbkdgagqgicd['query'] : '';
        $Vzmx43dmvjzn = isset($Vbkdgagqgicd['fragment']) ? $Vbkdgagqgicd['fragment'] : '';

        return new static($Vrr3hq23ezmd, $Votmxko4hrhx, $Vtdpfzm0vmqb, $V2bpoh5hagzp, $Vfbt3who3l5d, $Vzmx43dmvjzn, $V5mtbw3sgabz, $V4q3kbwdcdwg);
    }

    
    public static function createFromEnvironment(Environment $Vfjvvb2twfm1)
    {
        
        $V2hiq1h0gblp = $Vfjvvb2twfm1->get('HTTPS');
        $Vrr3hq23ezmd = (empty($V2hiq1h0gblp) || $V2hiq1h0gblp === 'off') ? 'http' : 'https';

        
        $V5mtbw3sgabzname = $Vfjvvb2twfm1->get('PHP_AUTH_USER', '');
        $Vsze0k4cneni = $Vfjvvb2twfm1->get('PHP_AUTH_PW', '');

        
        if ($Vfjvvb2twfm1->has('HTTP_HOST')) {
            $Votmxko4hrhx = $Vfjvvb2twfm1->get('HTTP_HOST');
        } else {
            $Votmxko4hrhx = $Vfjvvb2twfm1->get('SERVER_NAME');
        }

        
        $Vtdpfzm0vmqb = (int)$Vfjvvb2twfm1->get('SERVER_PORT', 80);
        if (preg_match('/^(\[[a-fA-F0-9:.]+\])(:\d+)?\z/', $Votmxko4hrhx, $Virbphhh55ue)) {
            $Votmxko4hrhx = $Virbphhh55ue[1];

            if (isset($Virbphhh55ue[2])) {
                $Vtdpfzm0vmqb = (int) substr($Virbphhh55ue[2], 1);
            }
        } else {
            $Vc5b0ouiyxjh = strpos($Votmxko4hrhx, ':');
            if ($Vc5b0ouiyxjh !== false) {
                $Vtdpfzm0vmqb = (int) substr($Votmxko4hrhx, $Vc5b0ouiyxjh + 1);
                $Votmxko4hrhx = strstr($Votmxko4hrhx, ':', true);
            }
        }

        
        $Vnwridwfpocv = parse_url($Vfjvvb2twfm1->get('SCRIPT_NAME'), PHP_URL_PATH);
        $Vwm03eqp3n5b = dirname($Vnwridwfpocv);

        
        
        $Vat0aawcw2se = parse_url('http://example.com' . $Vfjvvb2twfm1->get('REQUEST_URI'), PHP_URL_PATH);

        $Vceolxvhj4kw = '';
        $V5ldl4hiwfmw = $Vat0aawcw2se;
        if (stripos($Vat0aawcw2se, $Vnwridwfpocv) === 0) {
            $Vceolxvhj4kw = $Vnwridwfpocv;
        } elseif ($Vwm03eqp3n5b !== '/' && stripos($Vat0aawcw2se, $Vwm03eqp3n5b) === 0) {
            $Vceolxvhj4kw = $Vwm03eqp3n5b;
        }

        if ($Vceolxvhj4kw) {
            $V5ldl4hiwfmw = ltrim(substr($Vat0aawcw2se, strlen($Vceolxvhj4kw)), '/');
        }

        
        $Vfbt3who3l5dString = $Vfjvvb2twfm1->get('QUERY_STRING', '');
        if ($Vfbt3who3l5dString === '') {
            $Vfbt3who3l5dString = parse_url('http://example.com' . $Vfjvvb2twfm1->get('REQUEST_URI'), PHP_URL_QUERY);
        }

        
        $Vzmx43dmvjzn = '';

        
        $Vbraexi5phsi = new static($Vrr3hq23ezmd, $Votmxko4hrhx, $Vtdpfzm0vmqb, $V5ldl4hiwfmw, $Vfbt3who3l5dString, $Vzmx43dmvjzn, $V5mtbw3sgabzname, $Vsze0k4cneni);
        if ($Vceolxvhj4kw) {
            $Vbraexi5phsi = $Vbraexi5phsi->withBasePath($Vceolxvhj4kw);
        }

        return $Vbraexi5phsi;
    }

    

    
    public function getScheme()
    {
        return $this->scheme;
    }

    
    public function withScheme($Vrr3hq23ezmd)
    {
        $Vrr3hq23ezmd = $this->filterScheme($Vrr3hq23ezmd);
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->scheme = $Vrr3hq23ezmd;

        return $Vyrkjyl34c1m;
    }

    
    protected function filterScheme($Vrr3hq23ezmd)
    {
        static $Vwktyfaiy3w3 = [
            '' => true,
            'https' => true,
            'http' => true,
        ];

        if (!is_string($Vrr3hq23ezmd) && !method_exists($Vrr3hq23ezmd, '__toString')) {
            throw new InvalidArgumentException('Uri scheme must be a string');
        }

        $Vrr3hq23ezmd = str_replace('://', '', strtolower((string)$Vrr3hq23ezmd));
        if (!isset($Vwktyfaiy3w3[$Vrr3hq23ezmd])) {
            throw new InvalidArgumentException('Uri scheme must be one of: "", "https", "http"');
        }

        return $Vrr3hq23ezmd;
    }

    

    
    public function getAuthority()
    {
        $V5mtbw3sgabzInfo = $this->getUserInfo();
        $Votmxko4hrhx = $this->getHost();
        $Vtdpfzm0vmqb = $this->getPort();

        return ($V5mtbw3sgabzInfo ? $V5mtbw3sgabzInfo . '@' : '') . $Votmxko4hrhx . ($Vtdpfzm0vmqb !== null ? ':' . $Vtdpfzm0vmqb : '');
    }

    
    public function getUserInfo()
    {
        return $this->user . ($this->password ? ':' . $this->password : '');
    }

    
    public function withUserInfo($V5mtbw3sgabz, $Vsze0k4cneni = null)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->user = $this->filterUserInfo($V5mtbw3sgabz);
        if ($Vyrkjyl34c1m->user) {
            $Vyrkjyl34c1m->password = $Vsze0k4cneni ? $this->filterUserInfo($Vsze0k4cneni) : '';
        } else {
            $Vyrkjyl34c1m->password = '';
        }

        return $Vyrkjyl34c1m;
    }

    
    protected function filterUserInfo($Vfbt3who3l5d)
    {
        return preg_replace_callback(
            '/(?:[^a-zA-Z0-9_\-\.~!\$&\'\(\)\*\+,;=]+|%(?![A-Fa-f0-9]{2}))/u',
            function ($Vwetg4hewdr4) {
                return rawurlencode($Vwetg4hewdr4[0]);
            },
            $Vfbt3who3l5d
        );
    }

    
    public function getHost()
    {
        return $this->host;
    }

    
    public function withHost($Votmxko4hrhx)
    {
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->host = $Votmxko4hrhx;

        return $Vyrkjyl34c1m;
    }

    
    public function getPort()
    {
        return $this->port && !$this->hasStandardPort() ? $this->port : null;
    }

    
    public function withPort($Vtdpfzm0vmqb)
    {
        $Vtdpfzm0vmqb = $this->filterPort($Vtdpfzm0vmqb);
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->port = $Vtdpfzm0vmqb;

        return $Vyrkjyl34c1m;
    }

    
    protected function hasStandardPort()
    {
        return ($this->scheme === 'http' && $this->port === 80) || ($this->scheme === 'https' && $this->port === 443);
    }

    
    protected function filterPort($Vtdpfzm0vmqb)
    {
        if (is_null($Vtdpfzm0vmqb) || (is_integer($Vtdpfzm0vmqb) && ($Vtdpfzm0vmqb >= 1 && $Vtdpfzm0vmqb <= 65535))) {
            return $Vtdpfzm0vmqb;
        }

        throw new InvalidArgumentException('Uri port must be null or an integer between 1 and 65535 (inclusive)');
    }

    

    
    public function getPath()
    {
        return $this->path;
    }

    
    public function withPath($V2bpoh5hagzp)
    {
        if (!is_string($V2bpoh5hagzp)) {
            throw new InvalidArgumentException('Uri path must be a string');
        }

        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->path = $this->filterPath($V2bpoh5hagzp);

        
        if (substr($V2bpoh5hagzp, 0, 1) == '/') {
            $Vyrkjyl34c1m->basePath = '';
        }

        return $Vyrkjyl34c1m;
    }

    
    public function getBasePath()
    {
        return $this->basePath;
    }

    
    public function withBasePath($Vceolxvhj4kw)
    {
        if (!is_string($Vceolxvhj4kw)) {
            throw new InvalidArgumentException('Uri path must be a string');
        }
        if (!empty($Vceolxvhj4kw)) {
            $Vceolxvhj4kw = '/' . trim($Vceolxvhj4kw, '/'); 
        }
        $Vyrkjyl34c1m = clone $this;

        if ($Vceolxvhj4kw !== '/') {
            $Vyrkjyl34c1m->basePath = $this->filterPath($Vceolxvhj4kw);
        }

        return $Vyrkjyl34c1m;
    }

    
    protected function filterPath($V2bpoh5hagzp)
    {
        return preg_replace_callback(
            '/(?:[^a-zA-Z0-9_\-\.~:@&=\+\$,\/;%]+|%(?![A-Fa-f0-9]{2}))/',
            function ($Vwetg4hewdr4) {
                return rawurlencode($Vwetg4hewdr4[0]);
            },
            $V2bpoh5hagzp
        );
    }

    

    
    public function getQuery()
    {
        return $this->query;
    }

    
    public function withQuery($Vfbt3who3l5d)
    {
        if (!is_string($Vfbt3who3l5d) && !method_exists($Vfbt3who3l5d, '__toString')) {
            throw new InvalidArgumentException('Uri query must be a string');
        }
        $Vfbt3who3l5d = ltrim((string)$Vfbt3who3l5d, '?');
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->query = $this->filterQuery($Vfbt3who3l5d);

        return $Vyrkjyl34c1m;
    }

    
    protected function filterQuery($Vfbt3who3l5d)
    {
        return preg_replace_callback(
            '/(?:[^a-zA-Z0-9_\-\.~!\$&\'\(\)\*\+,;=%:@\/\?]+|%(?![A-Fa-f0-9]{2}))/',
            function ($Vwetg4hewdr4) {
                return rawurlencode($Vwetg4hewdr4[0]);
            },
            $Vfbt3who3l5d
        );
    }

    

    
    public function getFragment()
    {
        return $this->fragment;
    }

    
    public function withFragment($Vzmx43dmvjzn)
    {
        if (!is_string($Vzmx43dmvjzn) && !method_exists($Vzmx43dmvjzn, '__toString')) {
            throw new InvalidArgumentException('Uri fragment must be a string');
        }
        $Vzmx43dmvjzn = ltrim((string)$Vzmx43dmvjzn, '#');
        $Vyrkjyl34c1m = clone $this;
        $Vyrkjyl34c1m->fragment = $this->filterQuery($Vzmx43dmvjzn);

        return $Vyrkjyl34c1m;
    }

    

    
    public function __toString()
    {
        $Vrr3hq23ezmd = $this->getScheme();
        $Vkaln5wiwe5r = $this->getAuthority();
        $Vceolxvhj4kw = $this->getBasePath();
        $V2bpoh5hagzp = $this->getPath();
        $Vfbt3who3l5d = $this->getQuery();
        $Vzmx43dmvjzn = $this->getFragment();

        $V2bpoh5hagzp = $Vceolxvhj4kw . '/' . ltrim($V2bpoh5hagzp, '/');

        return ($Vrr3hq23ezmd ? $Vrr3hq23ezmd . ':' : '')
            . ($Vkaln5wiwe5r ? '//' . $Vkaln5wiwe5r : '')
            . $V2bpoh5hagzp
            . ($Vfbt3who3l5d ? '?' . $Vfbt3who3l5d : '')
            . ($Vzmx43dmvjzn ? '#' . $Vzmx43dmvjzn : '');
    }

    
    public function getBaseUrl()
    {
        $Vrr3hq23ezmd = $this->getScheme();
        $Vkaln5wiwe5r = $this->getAuthority();
        $Vceolxvhj4kw = $this->getBasePath();

        if ($Vkaln5wiwe5r && substr($Vceolxvhj4kw, 0, 1) !== '/') {
            $Vceolxvhj4kw = $Vceolxvhj4kw . '/' . $Vceolxvhj4kw;
        }

        return ($Vrr3hq23ezmd ? $Vrr3hq23ezmd . ':' : '')
            . ($Vkaln5wiwe5r ? '//' . $Vkaln5wiwe5r : '')
            . rtrim($Vceolxvhj4kw, '/');
    }
}
