<?php



class PHPUnit_Util_GlobalState
{
    
    protected static $Vegehlmzhwsn = array(
      '_ENV',
      '_POST',
      '_GET',
      '_COOKIE',
      '_SERVER',
      '_FILES',
      '_REQUEST'
    );

    
    protected static $VegehlmzhwsnLong = array(
      'HTTP_ENV_VARS',
      'HTTP_POST_VARS',
      'HTTP_GET_VARS',
      'HTTP_COOKIE_VARS',
      'HTTP_SERVER_VARS',
      'HTTP_POST_FILES'
    );

    public static function getIncludedFilesAsString()
    {
        return static::processIncludedFilesAsString(get_included_files());
    }

    public static function processIncludedFilesAsString(array $V5s0rodgwwbv)
    {
        $Vn54eydon0cr = new PHPUnit_Util_Blacklist;
        $V2hf2uebv5m0    = false;
        $Vv0hyvhlkjqr    = '';

        if (defined('__PHPUNIT_PHAR__')) {
            $V2hf2uebv5m0 = 'phar://' . __PHPUNIT_PHAR__ . '/';
        }

        for ($Vxja1abp34yq = count($V5s0rodgwwbv) - 1; $Vxja1abp34yq > 0; $Vxja1abp34yq--) {
            $Vpu3xl4uhgg5 = $V5s0rodgwwbv[$Vxja1abp34yq];

            if ($V2hf2uebv5m0 !== false && strpos($Vpu3xl4uhgg5, $V2hf2uebv5m0) === 0) {
                continue;
            }

            
            if (preg_match('/^(vfs|phpvfs[a-z0-9]+):/', $Vpu3xl4uhgg5)) {
                continue;
            }

            if (!$Vn54eydon0cr->isBlacklisted($Vpu3xl4uhgg5) && is_file($Vpu3xl4uhgg5)) {
                $Vv0hyvhlkjqr = 'require_once \'' . $Vpu3xl4uhgg5 . "';\n" . $Vv0hyvhlkjqr;
            }
        }

        return $Vv0hyvhlkjqr;
    }

    public static function getIniSettingsAsString()
    {
        $Vv0hyvhlkjqr      = '';
        $Vxja1abp34yqniSettings = ini_get_all(null, false);

        foreach ($Vxja1abp34yqniSettings as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $Vv0hyvhlkjqr .= sprintf(
                '@ini_set(%s, %s);' . "\n",
                self::exportVariable($Vlpbz5aloxqt),
                self::exportVariable($Vcptarsq5qe4)
            );
        }

        return $Vv0hyvhlkjqr;
    }

    public static function getConstantsAsString()
    {
        $Vcabzt4suk2c = get_defined_constants(true);
        $Vv0hyvhlkjqr    = '';

        if (isset($Vcabzt4suk2c['user'])) {
            foreach ($Vcabzt4suk2c['user'] as $Vgpjmw221p0b => $Vcptarsq5qe4) {
                $Vv0hyvhlkjqr .= sprintf(
                    'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                    $Vgpjmw221p0b,
                    $Vgpjmw221p0b,
                    self::exportVariable($Vcptarsq5qe4)
                );
            }
        }

        return $Vv0hyvhlkjqr;
    }

    public static function getGlobalsAsString()
    {
        $Vv0hyvhlkjqr            = '';
        $Vegehlmzhwsn = self::getSuperGlobalArrays();

        foreach ($Vegehlmzhwsn as $Vpl2mc1wl5wt) {
            if (isset($GLOBALS[$Vpl2mc1wl5wt]) &&
                is_array($GLOBALS[$Vpl2mc1wl5wt])) {
                foreach (array_keys($GLOBALS[$Vpl2mc1wl5wt]) as $Vlpbz5aloxqt) {
                    if ($GLOBALS[$Vpl2mc1wl5wt][$Vlpbz5aloxqt] instanceof Closure) {
                        continue;
                    }

                    $Vv0hyvhlkjqr .= sprintf(
                        '$GLOBALS[\'%s\'][\'%s\'] = %s;' . "\n",
                        $Vpl2mc1wl5wt,
                        $Vlpbz5aloxqt,
                        self::exportVariable($GLOBALS[$Vpl2mc1wl5wt][$Vlpbz5aloxqt])
                    );
                }
            }
        }

        $Vn54eydon0cr   = $Vegehlmzhwsn;
        $Vn54eydon0cr[] = 'GLOBALS';

        foreach (array_keys($GLOBALS) as $Vlpbz5aloxqt) {
            if (!in_array($Vlpbz5aloxqt, $Vn54eydon0cr) && !$GLOBALS[$Vlpbz5aloxqt] instanceof Closure) {
                $Vv0hyvhlkjqr .= sprintf(
                    '$GLOBALS[\'%s\'] = %s;' . "\n",
                    $Vlpbz5aloxqt,
                    self::exportVariable($GLOBALS[$Vlpbz5aloxqt])
                );
            }
        }

        return $Vv0hyvhlkjqr;
    }

    protected static function getSuperGlobalArrays()
    {
        if (ini_get('register_long_arrays') == '1') {
            return array_merge(
                self::$Vegehlmzhwsn,
                self::$VegehlmzhwsnLong
            );
        } else {
            return self::$Vegehlmzhwsn;
        }
    }

    protected static function exportVariable($Vxjof1iqtr44)
    {
        if (is_scalar($Vxjof1iqtr44) || is_null($Vxjof1iqtr44) ||
           (is_array($Vxjof1iqtr44) && self::arrayOnlyContainsScalars($Vxjof1iqtr44))) {
            return var_export($Vxjof1iqtr44, true);
        }

        return 'unserialize(' .
                var_export(serialize($Vxjof1iqtr44), true) .
                ')';
    }

    protected static function arrayOnlyContainsScalars(array $Vvs0hc5bhqj3)
    {
        $Vv0hyvhlkjqr = true;

        foreach ($Vvs0hc5bhqj3 as $Vbzemolr5akx) {
            if (is_array($Vbzemolr5akx)) {
                $Vv0hyvhlkjqr = self::arrayOnlyContainsScalars($Vbzemolr5akx);
            } elseif (!is_scalar($Vbzemolr5akx) && !is_null($Vbzemolr5akx)) {
                $Vv0hyvhlkjqr = false;
            }

            if ($Vv0hyvhlkjqr === false) {
                break;
            }
        }

        return $Vv0hyvhlkjqr;
    }
}
