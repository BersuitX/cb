<?php



class PHP_Timer
{
    
    private static $Vp511fyx2cos = array(
      'hour'   => 3600000,
      'minute' => 60000,
      'second' => 1000
    );

    
    private static $Vnnauhhz0koj = array();

    
    public static $Vmmhimmatfyj;

    
    public static function start()
    {
        array_push(self::$Vnnauhhz0koj, microtime(true));
    }

    
    public static function stop()
    {
        return microtime(true) - array_pop(self::$Vnnauhhz0koj);
    }

    
    public static function secondsToTimeString($Vlbwbnl10iav)
    {
        $Vo1vcrr0s0ei = round($Vlbwbnl10iav * 1000);

        foreach (self::$Vp511fyx2cos as $Vt00otk43ld4 => $Vcptarsq5qe4) {
            if ($Vo1vcrr0s0ei >= $Vcptarsq5qe4) {
                $Vlbwbnl10iav = floor($Vo1vcrr0s0ei / $Vcptarsq5qe4 * 100.0) / 100.0;

                return $Vlbwbnl10iav . ' ' . ($Vlbwbnl10iav == 1 ? $Vt00otk43ld4 : $Vt00otk43ld4 . 's');
            }
        }

        return $Vo1vcrr0s0ei . ' ms';
    }

    
    public static function timeSinceStartOfRequest()
    {
        return self::secondsToTimeString(microtime(true) - self::$Vmmhimmatfyj);
    }

    
    public static function resourceUsage()
    {
        return sprintf(
            'Time: %s, Memory: %4.2fMB',
            self::timeSinceStartOfRequest(),
            memory_get_peak_usage(true) / 1048576
        );
    }
}

if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
    PHP_Timer::$Vmmhimmatfyj = $_SERVER['REQUEST_TIME_FLOAT'];
} elseif (isset($_SERVER['REQUEST_TIME'])) {
    PHP_Timer::$Vmmhimmatfyj = $_SERVER['REQUEST_TIME'];
} else {
    PHP_Timer::$Vmmhimmatfyj = microtime(true);
}
