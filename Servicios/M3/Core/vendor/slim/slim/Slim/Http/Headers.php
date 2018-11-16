<?php

namespace Slim\Http;

use Slim\Collection;
use Slim\Interfaces\Http\HeadersInterface;


class Headers extends Collection implements HeadersInterface
{
    
    protected static $Vwslblmmtg25 = [
        'CONTENT_TYPE' => 1,
        'CONTENT_LENGTH' => 1,
        'PHP_AUTH_USER' => 1,
        'PHP_AUTH_PW' => 1,
        'PHP_AUTH_DIGEST' => 1,
        'AUTH_TYPE' => 1,
    ];

    
    public static function createFromEnvironment(Environment $Vdwvtaon2lv0)
    {
        $Vqhzkfsafzrc = [];
        $Vdwvtaon2lv0 = self::determineAuthorization($Vdwvtaon2lv0);
        foreach ($Vdwvtaon2lv0 as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $Vlpbz5aloxqt = strtoupper($Vlpbz5aloxqt);
            if (isset(static::$Vwslblmmtg25[$Vlpbz5aloxqt]) || strpos($Vlpbz5aloxqt, 'HTTP_') === 0) {
                if ($Vlpbz5aloxqt !== 'HTTP_CONTENT_LENGTH') {
                    $Vqhzkfsafzrc[$Vlpbz5aloxqt] =  $Vcptarsq5qe4;
                }
            }
        }

        return new static($Vqhzkfsafzrc);
    }

    

    public static function determineAuthorization(Environment $Vdwvtaon2lv0)
    {
        $Vpezivsehvo5 = $Vdwvtaon2lv0->get('HTTP_AUTHORIZATION');

        if (empty($Vpezivsehvo5) && is_callable('getallheaders')) {
            $V5y2wgq24k1v = getallheaders();
            $V5y2wgq24k1v = array_change_key_case($V5y2wgq24k1v, CASE_LOWER);
            if (isset($V5y2wgq24k1v['authorization'])) {
                $Vdwvtaon2lv0->set('HTTP_AUTHORIZATION', $V5y2wgq24k1v['authorization']);
            }
        }

        return $Vdwvtaon2lv0;
    }

    
    public function all()
    {
        $Vjvgnruyerj0 = parent::all();
        $Ve0j5uj4lgwz = [];
        foreach ($Vjvgnruyerj0 as $Vlpbz5aloxqt => $Vasprgsw4sfw) {
            $Ve0j5uj4lgwz[$Vasprgsw4sfw['originalKey']] = $Vasprgsw4sfw['value'];
        }

        return $Ve0j5uj4lgwz;
    }

    
    public function set($Vlpbz5aloxqt, $Vcptarsq5qe4)
    {
        if (!is_array($Vcptarsq5qe4)) {
            $Vcptarsq5qe4 = [$Vcptarsq5qe4];
        }
        parent::set($this->normalizeKey($Vlpbz5aloxqt), [
            'value' => $Vcptarsq5qe4,
            'originalKey' => $Vlpbz5aloxqt
        ]);
    }

    
    public function get($Vlpbz5aloxqt, $V0ekusmibtbl = null)
    {
        if ($this->has($Vlpbz5aloxqt)) {
            return parent::get($this->normalizeKey($Vlpbz5aloxqt))['value'];
        }

        return $V0ekusmibtbl;
    }

    
    public function getOriginalKey($Vlpbz5aloxqt, $V0ekusmibtbl = null)
    {
        if ($this->has($Vlpbz5aloxqt)) {
            return parent::get($this->normalizeKey($Vlpbz5aloxqt))['originalKey'];
        }

        return $V0ekusmibtbl;
    }

    
    public function add($Vlpbz5aloxqt, $Vcptarsq5qe4)
    {
        $Vwpxrhywkjje = $this->get($Vlpbz5aloxqt, []);
        $V0xp2wrk2c2h = is_array($Vcptarsq5qe4) ? $Vcptarsq5qe4 : [$Vcptarsq5qe4];
        $this->set($Vlpbz5aloxqt, array_merge($Vwpxrhywkjje, array_values($V0xp2wrk2c2h)));
    }

    
    public function has($Vlpbz5aloxqt)
    {
        return parent::has($this->normalizeKey($Vlpbz5aloxqt));
    }

    
    public function remove($Vlpbz5aloxqt)
    {
        parent::remove($this->normalizeKey($Vlpbz5aloxqt));
    }

    
    public function normalizeKey($Vlpbz5aloxqt)
    {
        $Vlpbz5aloxqt = strtr(strtolower($Vlpbz5aloxqt), '_', '-');
        if (strpos($Vlpbz5aloxqt, 'http-') === 0) {
            $Vlpbz5aloxqt = substr($Vlpbz5aloxqt, 5);
        }

        return $Vlpbz5aloxqt;
    }
}
