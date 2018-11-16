<?php



class PHPUnit_Util_Fileloader
{
    
    public static function checkAndLoad($Va3qqb0vgkhy)
    {
        $V5w0vu3h11jb = stream_resolve_include_path($Va3qqb0vgkhy);

        if (!$V5w0vu3h11jb || !is_readable($V5w0vu3h11jb)) {
            throw new PHPUnit_Framework_Exception(
                sprintf('Cannot open file "%s".' . "\n", $Va3qqb0vgkhy)
            );
        }

        self::load($V5w0vu3h11jb);

        return $V5w0vu3h11jb;
    }

    
    public static function load($Va3qqb0vgkhy)
    {
        $Vlxwg2sg4vx3 = array_keys(get_defined_vars());

        include_once $Va3qqb0vgkhy;

        $Vhsr4os33dfo     = get_defined_vars();
        $Vxyz0fu0rxfj = array_diff(
            array_keys($Vhsr4os33dfo),
            $Vlxwg2sg4vx3
        );

        foreach ($Vxyz0fu0rxfj as $Vksf0mqerbxo) {
            if ($Vksf0mqerbxo != 'oldVariableNames') {
                $GLOBALS[$Vksf0mqerbxo] = $Vhsr4os33dfo[$Vksf0mqerbxo];
            }
        }

        return $Va3qqb0vgkhy;
    }
}
