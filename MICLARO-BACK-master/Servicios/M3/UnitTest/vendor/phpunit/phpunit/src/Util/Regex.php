<?php



class PHPUnit_Util_Regex
{
    public static function pregMatchSafe($Vp1x1qfledcv, $Vkjvds2sfywy, $Virbphhh55ue = null, $Vrycsn2lkvcj = 0, $V5peram4ncbv = 0)
    {
        $Vytgaka4psvl = PHPUnit_Util_ErrorHandler::handleErrorOnce(E_WARNING);
        $Vwetg4hewdr4              = preg_match($Vp1x1qfledcv, $Vkjvds2sfywy, $Virbphhh55ue, $Vrycsn2lkvcj, $V5peram4ncbv);
        $Vytgaka4psvl(); 

        return $Vwetg4hewdr4;
    }
}
