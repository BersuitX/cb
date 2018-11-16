<?php



class PHPUnit_Util_InvalidArgumentHelper
{
    
    public static function factory($Vlf5kwra10uk, $V31qrja1w0r2, $Vcptarsq5qe4 = null)
    {
        $V4g2wbm2eqr0 = debug_backtrace(false);

        return new PHPUnit_Framework_Exception(
            sprintf(
                'Argument #%d%sof %s::%s() must be a %s',
                $Vlf5kwra10uk,
                $Vcptarsq5qe4 !== null ? ' (' . gettype($Vcptarsq5qe4) . '#' . $Vcptarsq5qe4 . ')' : ' (No Value) ',
                $V4g2wbm2eqr0[1]['class'],
                $V4g2wbm2eqr0[1]['function'],
                $V31qrja1w0r2
            )
        );
    }
}
