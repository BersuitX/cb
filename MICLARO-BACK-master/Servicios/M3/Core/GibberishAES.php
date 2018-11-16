<?php



class GibberishAES {

    protected static $Vkgb5lhveyqk = 256;            
    protected static $Vylr0mn5yc0n = array(128, 192, 256);   

    protected static $Vanijjbptkzf = null;
    protected static $Vydmenfj22yh = null;
    protected static $Vrmarmteaasr = null;
    protected static $Vtrxeb51yhhw = null;
    protected static $Vavjbnyvzxqj = null;

    
    final function __construct() {}
    final function __clone() {}

    
    public static function enc($Ve5tcsso230g, $V4q3kbwdcdwg) {

        $Vkgb5lhveyqk = self::$Vkgb5lhveyqk;

        
        $Vopp1lnslvpd = self::random_pseudo_bytes(8);

        $Vopp1lnslvpded = '';
        $Vjenbmwv21ii = '';

        
        $Vbnufhityujm = (int) ($Vkgb5lhveyqk / 8);
        $V3ihgrozw5na = 16; 
        
        $Vopp1lnslvpded_length = $Vbnufhityujm + $V3ihgrozw5na;

        while (strlen($Vopp1lnslvpded) < $Vopp1lnslvpded_length) {

            $Vjenbmwv21ii = md5($Vjenbmwv21ii.$V4q3kbwdcdwg.$Vopp1lnslvpd, true);
            $Vopp1lnslvpded .= $Vjenbmwv21ii;
        }

        $Vlpbz5aloxqt = substr($Vopp1lnslvpded, 0, $Vbnufhityujm);
        $Vo2g4sjdrdbg = substr($Vopp1lnslvpded, $Vbnufhityujm, $V3ihgrozw5na);

        $Vgmdornk5lyh = self::aes_cbc_encrypt($Ve5tcsso230g, $Vlpbz5aloxqt, $Vo2g4sjdrdbg);

        return $Vgmdornk5lyh !== false ? base64_encode('Salted__'.$Vopp1lnslvpd.$Vgmdornk5lyh) : false;
    }

    
    public static function dec($Ve5tcsso230g, $V4q3kbwdcdwg) {

        $Vkgb5lhveyqk = self::$Vkgb5lhveyqk;

        
        $Vbnufhityujm = (int) ($Vkgb5lhveyqk / 8);
        $V3ihgrozw5na = 16;

        $Vqhzkfsafzrc = base64_decode($Ve5tcsso230g);
        $Vopp1lnslvpd = substr($Vqhzkfsafzrc, 8, 8);
        $Vgmdornk5lyh = substr($Vqhzkfsafzrc, 16);

        
        $V2s0komargyj = 3;
        if ($Vkgb5lhveyqk == 128) {
            $V2s0komargyj = 2;
        }

        $Vqhzkfsafzrc00 = $V4q3kbwdcdwg.$Vopp1lnslvpd;
        $V03zofm1fmrx = array();
        $V03zofm1fmrx[0] = md5($Vqhzkfsafzrc00, true);
        $Vv0hyvhlkjqr = $V03zofm1fmrx[0];

        for ($Vxja1abp34yq = 1; $Vxja1abp34yq < $V2s0komargyj; $Vxja1abp34yq++) {

            $V03zofm1fmrx[$Vxja1abp34yq] = md5($V03zofm1fmrx[$Vxja1abp34yq - 1].$Vqhzkfsafzrc00, true);
            $Vv0hyvhlkjqr .= $V03zofm1fmrx[$Vxja1abp34yq];
        }

        $Vlpbz5aloxqt = substr($Vv0hyvhlkjqr, 0, $Vbnufhityujm);
        $Vo2g4sjdrdbg = substr($Vv0hyvhlkjqr, $Vbnufhityujm, $V3ihgrozw5na);

        return self::aes_cbc_decrypt($Vgmdornk5lyh, $Vlpbz5aloxqt, $Vo2g4sjdrdbg);
    }

    
    public static function size($V3csgtko2oap = null) {

        $Vv0hyvhlkjqr = self::$Vkgb5lhveyqk;

        if (is_null($V3csgtko2oap)) {
            return $Vv0hyvhlkjqr;
        }

        $V3csgtko2oap = (string) $V3csgtko2oap;

        if ($V3csgtko2oap == '') {
            return $Vv0hyvhlkjqr;
        }

        $Vt0sij244usk = ctype_digit($V3csgtko2oap);

        $V3csgtko2oap = (int) $V3csgtko2oap;

        if (!$Vt0sij244usk || !in_array($V3csgtko2oap, self::$Vylr0mn5yc0n)) {

            trigger_error(
                'GibberishAES: Invalid key size value was to be set. It should be integer value (number of bits) amongst: 128, 192, 256.',
                E_USER_WARNING
            );

        } else {

            self::$Vkgb5lhveyqk = $V3csgtko2oap;
        }

        return $Vv0hyvhlkjqr;
    }

    

    protected static function random_pseudo_bytes($Vxbsqvaghf5p) {

        if (!isset(self::$Vanijjbptkzf)) {
            self::$Vanijjbptkzf = function_exists('openssl_random_pseudo_bytes');
        }

        if (self::$Vanijjbptkzf) {
            return openssl_random_pseudo_bytes($Vxbsqvaghf5p);
        }

        

        $Vapvzh1jsr0n = '';

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vxbsqvaghf5p; $Vxja1abp34yq++) {

            $Vhc2ehc10pp2 = hash('sha256', mt_rand());
            $Vmmrcjsrjwsu = mt_rand(0, 30);
            $Vapvzh1jsr0n .= chr(hexdec($Vhc2ehc10pp2[$Vmmrcjsrjwsu].$Vhc2ehc10pp2[$Vmmrcjsrjwsu + 1]));
        }

        return $Vapvzh1jsr0n;
    }

    protected static function aes_cbc_encrypt($Ve5tcsso230g, $Vlpbz5aloxqt, $Vo2g4sjdrdbg) {

        $Vkgb5lhveyqk = self::$Vkgb5lhveyqk;

        if (!isset(self::$Vydmenfj22yh)) {
            self::$Vydmenfj22yh = function_exists('openssl_encrypt')
                && version_compare(PHP_VERSION, '5.3.3', '>='); 
        }

        if (self::$Vydmenfj22yh) {
            return openssl_encrypt($Ve5tcsso230g, "aes-$Vkgb5lhveyqk-cbc", $Vlpbz5aloxqt, true, $Vo2g4sjdrdbg);
        }

        if (!isset(self::$Vtrxeb51yhhw)) {
            self::$Vtrxeb51yhhw = function_exists('mcrypt_encrypt');
        }

        if (self::$Vtrxeb51yhhw) {

            
            

            $Vxaqw5tf4qzp = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');

            if (mcrypt_generic_init($Vxaqw5tf4qzp, $Vlpbz5aloxqt, $Vo2g4sjdrdbg) != -1) {

                $Vgmdornk5lyh = mcrypt_generic($Vxaqw5tf4qzp, self::pkcs7_pad($Ve5tcsso230g));
                mcrypt_generic_deinit($Vxaqw5tf4qzp);
                mcrypt_module_close($Vxaqw5tf4qzp);

                return $Vgmdornk5lyh;
            }

            return false;
        }

        if (!isset(self::$Vavjbnyvzxqj)) {
            self::$Vavjbnyvzxqj = self::openssl_cli_exists();
        }

        if (self::$Vavjbnyvzxqj) {

            $Vws4fwyj1dwx = 'echo '.self::escapeshellarg($Ve5tcsso230g).' | openssl enc -e -a -A -aes-'.$Vkgb5lhveyqk.'-cbc -K '.self::strtohex($Vlpbz5aloxqt).' -iv '.self::strtohex($Vo2g4sjdrdbg);

            exec($Vws4fwyj1dwx, $Vvaiuwffullu, $Vrpudtlhfyg0);

            if ($Vrpudtlhfyg0 == 0 && isset($Vvaiuwffullu[0])) {
                return base64_decode($Vvaiuwffullu[0]);
            }

            return false;
        }

        trigger_error(
            'GibberishAES: System requirements failure, please, check them.',
            E_USER_WARNING
        );

        return false;
    }

    protected static function aes_cbc_decrypt($V1eu3hxlotus, $Vlpbz5aloxqt, $Vo2g4sjdrdbg) {

        $Vkgb5lhveyqk = self::$Vkgb5lhveyqk;

        if (!isset(self::$Vrmarmteaasr)) {
            self::$Vrmarmteaasr = function_exists('openssl_decrypt')
                && version_compare(PHP_VERSION, '5.3.3', '>='); 
        }

        if (self::$Vrmarmteaasr) {
            return openssl_decrypt($V1eu3hxlotus, "aes-$Vkgb5lhveyqk-cbc", $Vlpbz5aloxqt, true, $Vo2g4sjdrdbg);
        }

        if (!isset(self::$Vtrxeb51yhhw)) {
            self::$Vtrxeb51yhhw = function_exists('mcrypt_encrypt');
        }

        if (self::$Vtrxeb51yhhw) {

            $Vxaqw5tf4qzp = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');

            if (mcrypt_generic_init($Vxaqw5tf4qzp, $Vlpbz5aloxqt, $Vo2g4sjdrdbg) != -1) {

                $Vxnmbgenatsp = mdecrypt_generic($Vxaqw5tf4qzp, $V1eu3hxlotus);
                mcrypt_generic_deinit($Vxaqw5tf4qzp);
                mcrypt_module_close($Vxaqw5tf4qzp);

                return self::remove_pkcs7_pad($Vxnmbgenatsp);
            }

            return false;
        }

        if (!isset(self::$Vavjbnyvzxqj)) {
            self::$Vavjbnyvzxqj = self::openssl_cli_exists();
        }

        if (self::$Vavjbnyvzxqj) {

            $Ve5tcsso230g = base64_encode($V1eu3hxlotus);

            $Vws4fwyj1dwx = 'echo '.self::escapeshellarg($Ve5tcsso230g).' | openssl enc -d -a -A -aes-'.$Vkgb5lhveyqk.'-cbc -K '.self::strtohex($Vlpbz5aloxqt).' -iv '.self::strtohex($Vo2g4sjdrdbg);

            exec($Vws4fwyj1dwx, $Vvaiuwffullu, $Vrpudtlhfyg0);

            if ($Vrpudtlhfyg0 == 0 && isset($Vvaiuwffullu[0])) {
                return $Vvaiuwffullu[0];
            }

            return false;
        }

        trigger_error(
            'GibberishAES: System requirements failure, please, check them.',
            E_USER_WARNING
        );

        return false;
    }

    

    protected static function pkcs7_pad($Ve5tcsso230g) {

        $V3ihgrozw5na = 16;    
        $Vvrnry5d11ur = $V3ihgrozw5na - (strlen($Ve5tcsso230g) % $V3ihgrozw5na);

        return $Ve5tcsso230g.str_repeat(chr($Vvrnry5d11ur), $Vvrnry5d11ur);
    }

    protected static function remove_pkcs7_pad($Ve5tcsso230g) {

        $V3ihgrozw5na = 16;    
        $Vr2qvsfpjonn = strlen($Ve5tcsso230g);
        $Vvrnry5d11ur = ord($Ve5tcsso230g[$Vr2qvsfpjonn - 1]);

        if ($Vvrnry5d11ur > 0 && $Vvrnry5d11ur <= $V3ihgrozw5na) {

            $Vktjmygkny1a = true;

            for ($Vxja1abp34yq = 1; $Vxja1abp34yq <= $Vvrnry5d11ur; $Vxja1abp34yq++) {

                if (ord($Ve5tcsso230g[$Vr2qvsfpjonn - $Vxja1abp34yq]) != $Vvrnry5d11ur) {
                    $Vktjmygkny1a = false;
                    break;
                }
            }

            if ($Vktjmygkny1a) {
                $Ve5tcsso230g = substr($Ve5tcsso230g, 0, $Vr2qvsfpjonn - $Vvrnry5d11ur);
            }
        }

        return $Ve5tcsso230g;
    }

    protected static function openssl_cli_exists() {

        exec('openssl version', $Vvaiuwffullu, $Vrpudtlhfyg0);

        return $Vrpudtlhfyg0 == 0;
    }

    protected static function strtohex($Ve5tcsso230g) {

         $Vv0hyvhlkjqr = '';

         foreach (str_split($Ve5tcsso230g) as $Vibefsvmlpru) {
             $Vv0hyvhlkjqr .= sprintf("%02X", ord($Vibefsvmlpru));
         }

         return $Vv0hyvhlkjqr;
    }

    protected static function escapeshellarg($V5mddzgxir3y) {

        if (strtolower(substr(php_uname('s'), 0, 3 )) == 'win') {

            

            
            
            $V5mddzgxir3y = preg_replace('/(\\*)"/g', '$1$1\\"', $V5mddzgxir3y);

            
            
            
            $V5mddzgxir3y = preg_replace('/(\\*)$/', '$1$1', $V5mddzgxir3y);

            

            
            $V5mddzgxir3y = '"'.$V5mddzgxir3y.'"';

            
            $V5mddzgxir3y = preg_replace('/([\(\)%!^"<>&|;, ])/g', '^$1', $V5mddzgxir3y);

            return $V5mddzgxir3y;
        }

        
        return "'" . str_replace("'", "'\\''", $V5mddzgxir3y) . "'";
    }

}