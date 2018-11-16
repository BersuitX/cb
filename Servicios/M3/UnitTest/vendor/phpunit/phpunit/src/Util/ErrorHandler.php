<?php





require_once dirname(__DIR__) . '/Framework/Error.php';
require_once dirname(__DIR__) . '/Framework/Error/Notice.php';
require_once dirname(__DIR__) . '/Framework/Error/Warning.php';
require_once dirname(__DIR__) . '/Framework/Error/Deprecated.php';


class PHPUnit_Util_ErrorHandler
{
    protected static $Vekrzpsv0jcq = array();

    
    public static function getErrorStack()
    {
        return self::$Vekrzpsv0jcq;
    }

    
    public static function handleError($Vw1gxgyvs3zp, $Vgmp43clkfhs, $Vv3o4yaizvys, $Vkbokrl43wan)
    {
        if (!($Vw1gxgyvs3zp & error_reporting())) {
            return false;
        }

        self::$Vekrzpsv0jcq[] = array($Vw1gxgyvs3zp, $Vgmp43clkfhs, $Vv3o4yaizvys, $Vkbokrl43wan);

        $V1babchxe11h = debug_backtrace(false);
        array_shift($V1babchxe11h);

        foreach ($V1babchxe11h as $Vjnhvsrh5xox) {
            if ($Vjnhvsrh5xox['function'] == '__toString') {
                return false;
            }
        }

        if ($Vw1gxgyvs3zp == E_NOTICE || $Vw1gxgyvs3zp == E_USER_NOTICE || $Vw1gxgyvs3zp == E_STRICT) {
            if (PHPUnit_Framework_Error_Notice::$V4mhqh0gr4xi !== true) {
                return false;
            }

            $Vzzme31ixifp = 'PHPUnit_Framework_Error_Notice';
        } elseif ($Vw1gxgyvs3zp == E_WARNING || $Vw1gxgyvs3zp == E_USER_WARNING) {
            if (PHPUnit_Framework_Error_Warning::$V4mhqh0gr4xi !== true) {
                return false;
            }

            $Vzzme31ixifp = 'PHPUnit_Framework_Error_Warning';
        } elseif ($Vw1gxgyvs3zp == E_DEPRECATED || $Vw1gxgyvs3zp == E_USER_DEPRECATED) {
            if (PHPUnit_Framework_Error_Deprecated::$V4mhqh0gr4xi !== true) {
                return false;
            }

            $Vzzme31ixifp = 'PHPUnit_Framework_Error_Deprecated';
        } else {
            $Vzzme31ixifp = 'PHPUnit_Framework_Error';
        }

        throw new $Vzzme31ixifp($Vgmp43clkfhs, $Vw1gxgyvs3zp, $Vv3o4yaizvys, $Vkbokrl43wan);
    }

    
    public static function handleErrorOnce($Vgh50ngeaaqo = E_WARNING)
    {
        $Vataaqbrcj5d = function () {
            static $Vuq52lmvrb0k = false;
            if (!$Vuq52lmvrb0k) {
                $Vuq52lmvrb0k = true;
                
                return restore_error_handler();
            }
        };

        set_error_handler(function ($Vw1gxgyvs3zp, $Vgmp43clkfhs) use ($Vgh50ngeaaqo) {
            if ($Vw1gxgyvs3zp === $Vgh50ngeaaqo) {
                return;
            }

            return false;
        });

        return $Vataaqbrcj5d;
    }
}
