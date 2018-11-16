<?php

namespace Slim\Http;

use InvalidArgumentException;
use Slim\Interfaces\Http\CookiesInterface;


class Cookies implements CookiesInterface
{
    
    protected $Vaj5xrkjxc3u = [];

    
    protected $V5tfsi5djmmw = [];

    
    protected $Vaahcuu04siz = [
        'value' => '',
        'domain' => null,
        'hostonly' => null,
        'path' => null,
        'expires' => null,
        'secure' => false,
        'httponly' => false,
        'samesite' => null
    ];

    
    public function __construct(array $Voujri0ure32 = [])
    {
        $this->requestCookies = $Voujri0ure32;
    }

    
    public function setDefaults(array $Vgzibbh1fx1x)
    {
        $this->defaults = array_replace($this->defaults, $Vgzibbh1fx1x);
    }

    
    public function get($Vgpjmw221p0b, $V0ekusmibtbl = null)
    {
        return isset($this->requestCookies[$Vgpjmw221p0b]) ? $this->requestCookies[$Vgpjmw221p0b] : $V0ekusmibtbl;
    }

    
    public function set($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        if (!is_array($Vcptarsq5qe4)) {
            $Vcptarsq5qe4 = ['value' => (string)$Vcptarsq5qe4];
        }
        $this->responseCookies[$Vgpjmw221p0b] = array_replace($this->defaults, $Vcptarsq5qe4);
    }

    
    public function toHeaders()
    {
        $V5y2wgq24k1v = [];
        foreach ($this->responseCookies as $Vgpjmw221p0b => $Vr5bjxtnldcv) {
            $V5y2wgq24k1v[] = $this->toHeader($Vgpjmw221p0b, $Vr5bjxtnldcv);
        }

        return $V5y2wgq24k1v;
    }

    
    protected function toHeader($Vgpjmw221p0b, array $Vr5bjxtnldcv)
    {
        $Vv0hyvhlkjqr = urlencode($Vgpjmw221p0b) . '=' . urlencode($Vr5bjxtnldcv['value']);

        if (isset($Vr5bjxtnldcv['domain'])) {
            $Vv0hyvhlkjqr .= '; domain=' . $Vr5bjxtnldcv['domain'];
        }

        if (isset($Vr5bjxtnldcv['path'])) {
            $Vv0hyvhlkjqr .= '; path=' . $Vr5bjxtnldcv['path'];
        }

        if (isset($Vr5bjxtnldcv['expires'])) {
            if (is_string($Vr5bjxtnldcv['expires'])) {
                $Vmi5z2atb0cw = strtotime($Vr5bjxtnldcv['expires']);
            } else {
                $Vmi5z2atb0cw = (int)$Vr5bjxtnldcv['expires'];
            }
            if ($Vmi5z2atb0cw !== 0) {
                $Vv0hyvhlkjqr .= '; expires=' . gmdate('D, d-M-Y H:i:s e', $Vmi5z2atb0cw);
            }
        }

        if (isset($Vr5bjxtnldcv['secure']) && $Vr5bjxtnldcv['secure']) {
            $Vv0hyvhlkjqr .= '; secure';
        }

        if (isset($Vr5bjxtnldcv['hostonly']) && $Vr5bjxtnldcv['hostonly']) {
            $Vv0hyvhlkjqr .= '; HostOnly';
        }

        if (isset($Vr5bjxtnldcv['httponly']) && $Vr5bjxtnldcv['httponly']) {
            $Vv0hyvhlkjqr .= '; HttpOnly';
        }

        if (isset($Vr5bjxtnldcv['samesite']) && in_array(strtolower($Vr5bjxtnldcv['samesite']), ['lax', 'strict'], true)) {
            
            $Vv0hyvhlkjqr .= '; SameSite=' . $Vr5bjxtnldcv['samesite'];
        }

        return $Vv0hyvhlkjqr;
    }

    
    public static function parseHeader($Vy5yyyefdntg)
    {
        if (is_array($Vy5yyyefdntg) === true) {
            $Vy5yyyefdntg = isset($Vy5yyyefdntg[0]) ? $Vy5yyyefdntg[0] : '';
        }

        if (is_string($Vy5yyyefdntg) === false) {
            throw new InvalidArgumentException('Cannot parse Cookie data. Header value must be a string.');
        }

        $Vy5yyyefdntg = rtrim($Vy5yyyefdntg, "\r\n");
        $Vktjanwmyo04 = preg_split('@[;]\s*@', $Vy5yyyefdntg);
        $Voujri0ure32 = [];

        foreach ($Vktjanwmyo04 as $V4cg5ds3yiky) {
            $V4cg5ds3yiky = explode('=', $V4cg5ds3yiky, 2);

            if (count($V4cg5ds3yiky) === 2) {
                $Vlpbz5aloxqt = urldecode($V4cg5ds3yiky[0]);
                $Vcptarsq5qe4 = urldecode($V4cg5ds3yiky[1]);

                if (!isset($Voujri0ure32[$Vlpbz5aloxqt])) {
                    $Voujri0ure32[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
                }
            }
        }

        return $Voujri0ure32;
    }
}
