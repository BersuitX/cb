<?php



class PHPUnit_Util_String
{
    
    public static function convertToUtf8($Ve5tcsso230g)
    {
        if (!self::isUtf8($Ve5tcsso230g)) {
            if (function_exists('mb_convert_encoding')) {
                $Ve5tcsso230g = mb_convert_encoding($Ve5tcsso230g, 'UTF-8');
            } else {
                $Ve5tcsso230g = utf8_encode($Ve5tcsso230g);
            }
        }

        return $Ve5tcsso230g;
    }

    
    protected static function isUtf8($Ve5tcsso230g)
    {
        $Vxbsqvaghf5p = strlen($Ve5tcsso230g);

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vxbsqvaghf5p; $Vxja1abp34yq++) {
            if (ord($Ve5tcsso230g[$Vxja1abp34yq]) < 0x80) {
                $V4qixmekps3e = 0;
            } elseif ((ord($Ve5tcsso230g[$Vxja1abp34yq]) & 0xE0) == 0xC0) {
                $V4qixmekps3e = 1;
            } elseif ((ord($Ve5tcsso230g[$Vxja1abp34yq]) & 0xF0) == 0xE0) {
                $V4qixmekps3e = 2;
            } elseif ((ord($Ve5tcsso230g[$Vxja1abp34yq]) & 0xF0) == 0xF0) {
                $V4qixmekps3e = 3;
            } else {
                return false;
            }

            for ($V5kfw3q1o1vh = 0; $V5kfw3q1o1vh < $V4qixmekps3e; $V5kfw3q1o1vh++) {
                if ((++$Vxja1abp34yq == $Vxbsqvaghf5p) || ((ord($Ve5tcsso230g[$Vxja1abp34yq]) & 0xC0) != 0x80)) {
                    return false;
                }
            }
        }

        return true;
    }
}
