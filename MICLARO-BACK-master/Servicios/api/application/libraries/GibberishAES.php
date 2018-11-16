<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class GibberishAES {

    protected static $Vae3huthaxph = 256;            
    protected static $V1wy4314a5nl = array(128, 192, 256);   

    protected static $Vhsp2jkixtky = null;
    protected static $Vnjorouhhehh = null;
    protected static $Vi3zsqaog4ic = null;
    protected static $Vi1cbwmflnm0 = null;
    protected static $V5v1e55x5bqu = null;

    
    final function __construct() {}
    final function __clone() {}

    
    public static function enc($Vxgpowef4o2f, $Vudq2ifru5hp) {

        $Vae3huthaxph = self::$Vae3huthaxph;

        
        $Vvihvkacmria = self::random_pseudo_bytes(8);

        $Vvihvkacmriaed = '';
        $Vvj43ajiqg3z = '';

        
        $Voczss5gthjl = (int) ($Vae3huthaxph / 8);
        $Vcr1yeetjw5b = 16; 
        
        $Vvihvkacmriaed_length = $Voczss5gthjl + $Vcr1yeetjw5b;

        while (strlen($Vvihvkacmriaed) < $Vvihvkacmriaed_length) {

            $Vvj43ajiqg3z = md5($Vvj43ajiqg3z.$Vudq2ifru5hp.$Vvihvkacmria, true);
            $Vvihvkacmriaed .= $Vvj43ajiqg3z;
        }

        $V2xim30qek4u = substr($Vvihvkacmriaed, 0, $Voczss5gthjl);
        $Vhocrmt3naax = substr($Vvihvkacmriaed, $Voczss5gthjl, $Vcr1yeetjw5b);

        $Vyphbhoo022c = self::aes_cbc_encrypt($Vxgpowef4o2f, $V2xim30qek4u, $Vhocrmt3naax);

        return $Vyphbhoo022c !== false ? base64_encode('Salted__'.$Vvihvkacmria.$Vyphbhoo022c) : false;
    }

    
    public static function dec($Vxgpowef4o2f, $Vudq2ifru5hp) {

        $Vae3huthaxph = self::$Vae3huthaxph;

        
        $Voczss5gthjl = (int) ($Vae3huthaxph / 8);
        $Vcr1yeetjw5b = 16;

        $Vfeinw1hsfej = base64_decode($Vxgpowef4o2f);
        $Vvihvkacmria = substr($Vfeinw1hsfej, 8, 8);
        $Vyphbhoo022c = substr($Vfeinw1hsfej, 16);

        
        $V2jeomhqtqnj = 3;
        if ($Vae3huthaxph == 128) {
            $V2jeomhqtqnj = 2;
        }

        $Vfeinw1hsfej00 = $Vudq2ifru5hp.$Vvihvkacmria;
        $Vgwdz1beiky4 = array();
        $Vgwdz1beiky4[0] = md5($Vfeinw1hsfej00, true);
        $Voetc43kt2cr = $Vgwdz1beiky4[0];

        for ($Vep0df0xosaw = 1; $Vep0df0xosaw < $V2jeomhqtqnj; $Vep0df0xosaw++) {

            $Vgwdz1beiky4[$Vep0df0xosaw] = md5($Vgwdz1beiky4[$Vep0df0xosaw - 1].$Vfeinw1hsfej00, true);
            $Voetc43kt2cr .= $Vgwdz1beiky4[$Vep0df0xosaw];
        }

        $V2xim30qek4u = substr($Voetc43kt2cr, 0, $Voczss5gthjl);
        $Vhocrmt3naax = substr($Voetc43kt2cr, $Voczss5gthjl, $Vcr1yeetjw5b);

        return self::aes_cbc_decrypt($Vyphbhoo022c, $V2xim30qek4u, $Vhocrmt3naax);
    }

    
    public static function size($Vjw2s23rpvmp = null) {

        $Voetc43kt2cr = self::$Vae3huthaxph;

        if (is_null($Vjw2s23rpvmp)) {
            return $Voetc43kt2cr;
        }

        $Vjw2s23rpvmp = (string) $Vjw2s23rpvmp;

        if ($Vjw2s23rpvmp == '') {
            return $Voetc43kt2cr;
        }

        $V1kfem2e2uee = ctype_digit($Vjw2s23rpvmp);

        $Vjw2s23rpvmp = (int) $Vjw2s23rpvmp;

        if (!$V1kfem2e2uee || !in_array($Vjw2s23rpvmp, self::$V1wy4314a5nl)) {

            trigger_error(
                'GibberishAES: Invalid key size value was to be set. It should be integer value (number of bits) amongst: 128, 192, 256.',
                E_USER_WARNING
            );

        } else {

            self::$Vae3huthaxph = $Vjw2s23rpvmp;
        }

        return $Voetc43kt2cr;
    }

    

    protected static function random_pseudo_bytes($Vgdtiboyfq04) {

        if (!isset(self::$Vhsp2jkixtky)) {
            self::$Vhsp2jkixtky = function_exists('openssl_random_pseudo_bytes');
        }

        if (self::$Vhsp2jkixtky) {
            return openssl_random_pseudo_bytes($Vgdtiboyfq04);
        }

        

        $V5oujl02ccsg = '';

        for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vgdtiboyfq04; $Vep0df0xosaw++) {

            $Vea43lp5pi23 = hash('sha256', mt_rand());
            $Vsvbbffnkiqb = mt_rand(0, 30);
            $V5oujl02ccsg .= chr(hexdec($Vea43lp5pi23[$Vsvbbffnkiqb].$Vea43lp5pi23[$Vsvbbffnkiqb + 1]));
        }

        return $V5oujl02ccsg;
    }

    protected static function aes_cbc_encrypt($Vxgpowef4o2f, $V2xim30qek4u, $Vhocrmt3naax) {

        $Vae3huthaxph = self::$Vae3huthaxph;

        if (!isset(self::$Vnjorouhhehh)) {
            self::$Vnjorouhhehh = function_exists('openssl_encrypt')
                && version_compare(PHP_VERSION, '5.3.3', '>='); 
        }

        if (self::$Vnjorouhhehh) {
            return openssl_encrypt($Vxgpowef4o2f, "aes-$Vae3huthaxph-cbc", $V2xim30qek4u, true, $Vhocrmt3naax);
        }

        if (!isset(self::$Vi1cbwmflnm0)) {
            self::$Vi1cbwmflnm0 = function_exists('mcrypt_encrypt');
        }

        if (self::$Vi1cbwmflnm0) {

            
            

            $V5f4pn2v3x4r = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');

            if (mcrypt_generic_init($V5f4pn2v3x4r, $V2xim30qek4u, $Vhocrmt3naax) != -1) {

                $Vyphbhoo022c = mcrypt_generic($V5f4pn2v3x4r, self::pkcs7_pad($Vxgpowef4o2f));
                mcrypt_generic_deinit($V5f4pn2v3x4r);
                mcrypt_module_close($V5f4pn2v3x4r);

                return $Vyphbhoo022c;
            }

            return false;
        }

        if (!isset(self::$V5v1e55x5bqu)) {
            self::$V5v1e55x5bqu = self::openssl_cli_exists();
        }

        if (self::$V5v1e55x5bqu) {

            $V0uvplnbjqq0 = 'echo '.self::escapeshellarg($Vxgpowef4o2f).' | openssl enc -e -a -A -aes-'.$Vae3huthaxph.'-cbc -K '.self::strtohex($V2xim30qek4u).' -iv '.self::strtohex($Vhocrmt3naax);

            exec($V0uvplnbjqq0, $Vzxix2pqoztx, $Vb5hjbk2mbwk);

            if ($Vb5hjbk2mbwk == 0 && isset($Vzxix2pqoztx[0])) {
                return base64_decode($Vzxix2pqoztx[0]);
            }

            return false;
        }

        trigger_error(
            'GibberishAES: System requirements failure, please, check them.',
            E_USER_WARNING
        );

        return false;
    }

    protected static function aes_cbc_decrypt($Vnprnuetxrop, $V2xim30qek4u, $Vhocrmt3naax) {

        $Vae3huthaxph = self::$Vae3huthaxph;

        if (!isset(self::$Vi3zsqaog4ic)) {
            self::$Vi3zsqaog4ic = function_exists('openssl_decrypt')
                && version_compare(PHP_VERSION, '5.3.3', '>='); 
        }

        if (self::$Vi3zsqaog4ic) {
            return openssl_decrypt($Vnprnuetxrop, "aes-$Vae3huthaxph-cbc", $V2xim30qek4u, true, $Vhocrmt3naax);
        }

        if (!isset(self::$Vi1cbwmflnm0)) {
            self::$Vi1cbwmflnm0 = function_exists('mcrypt_encrypt');
        }

        if (self::$Vi1cbwmflnm0) {

            $V5f4pn2v3x4r = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');

            if (mcrypt_generic_init($V5f4pn2v3x4r, $V2xim30qek4u, $Vhocrmt3naax) != -1) {

                $Vwezxapgmyke = mdecrypt_generic($V5f4pn2v3x4r, $Vnprnuetxrop);
                mcrypt_generic_deinit($V5f4pn2v3x4r);
                mcrypt_module_close($V5f4pn2v3x4r);

                return self::remove_pkcs7_pad($Vwezxapgmyke);
            }

            return false;
        }

        if (!isset(self::$V5v1e55x5bqu)) {
            self::$V5v1e55x5bqu = self::openssl_cli_exists();
        }

        if (self::$V5v1e55x5bqu) {

            $Vxgpowef4o2f = base64_encode($Vnprnuetxrop);

            $V0uvplnbjqq0 = 'echo '.self::escapeshellarg($Vxgpowef4o2f).' | openssl enc -d -a -A -aes-'.$Vae3huthaxph.'-cbc -K '.self::strtohex($V2xim30qek4u).' -iv '.self::strtohex($Vhocrmt3naax);

            exec($V0uvplnbjqq0, $Vzxix2pqoztx, $Vb5hjbk2mbwk);

            if ($Vb5hjbk2mbwk == 0 && isset($Vzxix2pqoztx[0])) {
                return $Vzxix2pqoztx[0];
            }

            return false;
        }

        trigger_error(
            'GibberishAES: System requirements failure, please, check them.',
            E_USER_WARNING
        );

        return false;
    }

    

    protected static function pkcs7_pad($Vxgpowef4o2f) {

        $Vcr1yeetjw5b = 16;    
        $Vbqimp3k3ljw = $Vcr1yeetjw5b - (strlen($Vxgpowef4o2f) % $Vcr1yeetjw5b);

        return $Vxgpowef4o2f.str_repeat(chr($Vbqimp3k3ljw), $Vbqimp3k3ljw);
    }

    protected static function remove_pkcs7_pad($Vxgpowef4o2f) {

        $Vcr1yeetjw5b = 16;    
        $Vmijszwfiejj = strlen($Vxgpowef4o2f);
        $Vbqimp3k3ljw = ord($Vxgpowef4o2f[$Vmijszwfiejj - 1]);

        if ($Vbqimp3k3ljw > 0 && $Vbqimp3k3ljw <= $Vcr1yeetjw5b) {

            $V2pqktfvs1lb = true;

            for ($Vep0df0xosaw = 1; $Vep0df0xosaw <= $Vbqimp3k3ljw; $Vep0df0xosaw++) {

                if (ord($Vxgpowef4o2f[$Vmijszwfiejj - $Vep0df0xosaw]) != $Vbqimp3k3ljw) {
                    $V2pqktfvs1lb = false;
                    break;
                }
            }

            if ($V2pqktfvs1lb) {
                $Vxgpowef4o2f = substr($Vxgpowef4o2f, 0, $Vmijszwfiejj - $Vbqimp3k3ljw);
            }
        }

        return $Vxgpowef4o2f;
    }

    protected static function openssl_cli_exists() {

        exec('openssl version', $Vzxix2pqoztx, $Vb5hjbk2mbwk);

        return $Vb5hjbk2mbwk == 0;
    }

    protected static function strtohex($Vxgpowef4o2f) {

         $Voetc43kt2cr = '';

         foreach (str_split($Vxgpowef4o2f) as $Vn2ycfau434s) {
             $Voetc43kt2cr .= sprintf("%02X", ord($Vn2ycfau434s));
         }

         return $Voetc43kt2cr;
    }

    protected static function escapeshellarg($Ve1coo2vcs1p) {

        if (strtolower(substr(php_uname('s'), 0, 3 )) == 'win') {

            

            
            
            $Ve1coo2vcs1p = preg_replace('/(\\*)"/g', '$1$1\\"', $Ve1coo2vcs1p);

            
            
            
            $Ve1coo2vcs1p = preg_replace('/(\\*)$/', '$1$1', $Ve1coo2vcs1p);

            

            
            $Ve1coo2vcs1p = '"'.$Ve1coo2vcs1p.'"';

            
            $Ve1coo2vcs1p = preg_replace('/([\(\)%!^"<>&|;, ])/g', '^$1', $Ve1coo2vcs1p);

            return $Ve1coo2vcs1p;
        }

        
        return "'" . str_replace("'", "'\\''", $Ve1coo2vcs1p) . "'";
    }

}