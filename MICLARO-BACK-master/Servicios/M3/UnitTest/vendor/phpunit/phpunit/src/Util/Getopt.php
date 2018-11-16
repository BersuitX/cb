<?php



class PHPUnit_Util_Getopt
{
    public static function getopt(array $Veox3iprl5oz, $Vyt3p0m3wowp, $V0ohunghj3dv = null)
    {
        if (empty($Veox3iprl5oz)) {
            return array(array(), array());
        }

        $V3r30s0gox3z     = array();
        $Vka5tr25w4vz = array();

        if ($V0ohunghj3dv) {
            sort($V0ohunghj3dv);
        }

        if (isset($Veox3iprl5oz[0][0]) && $Veox3iprl5oz[0][0] != '-') {
            array_shift($Veox3iprl5oz);
        }

        reset($Veox3iprl5oz);
        array_map('trim', $Veox3iprl5oz);

        while (list($Vxja1abp34yq, $V5mddzgxir3y) = each($Veox3iprl5oz)) {
            if ($V5mddzgxir3y == '') {
                continue;
            }

            if ($V5mddzgxir3y == '--') {
                $Vka5tr25w4vz = array_merge($Vka5tr25w4vz, array_slice($Veox3iprl5oz, $Vxja1abp34yq + 1));
                break;
            }

            if ($V5mddzgxir3y[0] != '-' ||
                (strlen($V5mddzgxir3y) > 1 && $V5mddzgxir3y[1] == '-' && !$V0ohunghj3dv)) {
                $Vka5tr25w4vz[] = $Veox3iprl5oz[$Vxja1abp34yq];
                continue;
            } elseif (strlen($V5mddzgxir3y) > 1 && $V5mddzgxir3y[1] == '-') {
                self::parseLongOption(
                    substr($V5mddzgxir3y, 2),
                    $V0ohunghj3dv,
                    $V3r30s0gox3z,
                    $Veox3iprl5oz
                );
            } else {
                self::parseShortOption(
                    substr($V5mddzgxir3y, 1),
                    $Vyt3p0m3wowp,
                    $V3r30s0gox3z,
                    $Veox3iprl5oz
                );
            }
        }

        return array($V3r30s0gox3z, $Vka5tr25w4vz);
    }

    protected static function parseShortOption($V5mddzgxir3y, $Vyt3p0m3wowp, &$V3r30s0gox3z, &$Veox3iprl5oz)
    {
        $V5mddzgxir3yLen = strlen($V5mddzgxir3y);

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $V5mddzgxir3yLen; $Vxja1abp34yq++) {
            $Vnolpkwbnzp1     = $V5mddzgxir3y[$Vxja1abp34yq];
            $Vnolpkwbnzp1_arg = null;

            if (($Viqcp1vwbksl = strstr($Vyt3p0m3wowp, $Vnolpkwbnzp1)) === false ||
                $V5mddzgxir3y[$Vxja1abp34yq] == ':') {
                throw new PHPUnit_Framework_Exception(
                    "unrecognized option -- $Vnolpkwbnzp1"
                );
            }

            if (strlen($Viqcp1vwbksl) > 1 && $Viqcp1vwbksl[1] == ':') {
                if (strlen($Viqcp1vwbksl) > 2 && $Viqcp1vwbksl[2] == ':') {
                    if ($Vxja1abp34yq + 1 < $V5mddzgxir3yLen) {
                        $V3r30s0gox3z[] = array($Vnolpkwbnzp1, substr($V5mddzgxir3y, $Vxja1abp34yq + 1));
                        break;
                    }
                } else {
                    if ($Vxja1abp34yq + 1 < $V5mddzgxir3yLen) {
                        $V3r30s0gox3z[] = array($Vnolpkwbnzp1, substr($V5mddzgxir3y, $Vxja1abp34yq + 1));
                        break;
                    } elseif (list(, $Vnolpkwbnzp1_arg) = each($Veox3iprl5oz)) {
                    } else {
                        throw new PHPUnit_Framework_Exception(
                            "option requires an argument -- $Vnolpkwbnzp1"
                        );
                    }
                }
            }

            $V3r30s0gox3z[] = array($Vnolpkwbnzp1, $Vnolpkwbnzp1_arg);
        }
    }

    protected static function parseLongOption($V5mddzgxir3y, $V0ohunghj3dv, &$V3r30s0gox3z, &$Veox3iprl5oz)
    {
        $Vdbkece3gnp5   = count($V0ohunghj3dv);
        $Vautxf03llyt    = explode('=', $V5mddzgxir3y);
        $Vnolpkwbnzp1     = $Vautxf03llyt[0];
        $Vnolpkwbnzp1_arg = null;

        if (count($Vautxf03llyt) > 1) {
            $Vnolpkwbnzp1_arg = $Vautxf03llyt[1];
        }

        $Vnolpkwbnzp1_len = strlen($Vnolpkwbnzp1);

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq++) {
            $Vf4vxy35kn5i  = $V0ohunghj3dv[$Vxja1abp34yq];
            $Vnolpkwbnzp1_start = substr($Vf4vxy35kn5i, 0, $Vnolpkwbnzp1_len);

            if ($Vnolpkwbnzp1_start != $Vnolpkwbnzp1) {
                continue;
            }

            $Vnolpkwbnzp1_rest = substr($Vf4vxy35kn5i, $Vnolpkwbnzp1_len);

            if ($Vnolpkwbnzp1_rest != '' && $Vnolpkwbnzp1[0] != '=' && $Vxja1abp34yq + 1 < $Vdbkece3gnp5 &&
                $Vnolpkwbnzp1 == substr($V0ohunghj3dv[$Vxja1abp34yq+1], 0, $Vnolpkwbnzp1_len)) {
                throw new PHPUnit_Framework_Exception(
                    "option --$Vnolpkwbnzp1 is ambiguous"
                );
            }

            if (substr($Vf4vxy35kn5i, -1) == '=') {
                if (substr($Vf4vxy35kn5i, -2) != '==') {
                    if (!strlen($Vnolpkwbnzp1_arg) &&
                        !(list(, $Vnolpkwbnzp1_arg) = each($Veox3iprl5oz))) {
                        throw new PHPUnit_Framework_Exception(
                            "option --$Vnolpkwbnzp1 requires an argument"
                        );
                    }
                }
            } elseif ($Vnolpkwbnzp1_arg) {
                throw new PHPUnit_Framework_Exception(
                    "option --$Vnolpkwbnzp1 doesn't allow an argument"
                );
            }

            $Vggmpg3tvltw = '--' . preg_replace('/={1,2}$/', '', $Vf4vxy35kn5i);
            $V3r30s0gox3z[]      = array($Vggmpg3tvltw, $Vnolpkwbnzp1_arg);

            return;
        }

        throw new PHPUnit_Framework_Exception("unrecognized option --$Vnolpkwbnzp1");
    }
}
