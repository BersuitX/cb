<?php

namespace FastRoute\Dispatcher;

use FastRoute\Dispatcher;

abstract class RegexBasedAbstract implements Dispatcher
{
    
    protected $Vk25pzrbq5im = [];

    
    protected $Vkx1yxutrdyb = [];

    
    abstract protected function dispatchVariableRoute($V4mfe2ojz2lb, $Vbraexi5phsi);

    public function dispatch($V5ea5ghz5clu, $Vbraexi5phsi)
    {
        if (isset($this->staticRouteMap[$V5ea5ghz5clu][$Vbraexi5phsi])) {
            $Voc34ggbfvw5 = $this->staticRouteMap[$V5ea5ghz5clu][$Vbraexi5phsi];
            return [self::FOUND, $Voc34ggbfvw5, []];
        }

        $Veobhavw3yc3 = $this->variableRouteData;
        if (isset($Veobhavw3yc3[$V5ea5ghz5clu])) {
            $Vv0hyvhlkjqr = $this->dispatchVariableRoute($Veobhavw3yc3[$V5ea5ghz5clu], $Vbraexi5phsi);
            if ($Vv0hyvhlkjqr[0] === self::FOUND) {
                return $Vv0hyvhlkjqr;
            }
        }

        
        if ($V5ea5ghz5clu === 'HEAD') {
            if (isset($this->staticRouteMap['GET'][$Vbraexi5phsi])) {
                $Voc34ggbfvw5 = $this->staticRouteMap['GET'][$Vbraexi5phsi];
                return [self::FOUND, $Voc34ggbfvw5, []];
            }
            if (isset($Veobhavw3yc3['GET'])) {
                $Vv0hyvhlkjqr = $this->dispatchVariableRoute($Veobhavw3yc3['GET'], $Vbraexi5phsi);
                if ($Vv0hyvhlkjqr[0] === self::FOUND) {
                    return $Vv0hyvhlkjqr;
                }
            }
        }

        
        if (isset($this->staticRouteMap['*'][$Vbraexi5phsi])) {
            $Voc34ggbfvw5 = $this->staticRouteMap['*'][$Vbraexi5phsi];
            return [self::FOUND, $Voc34ggbfvw5, []];
        }
        if (isset($Veobhavw3yc3['*'])) {
            $Vv0hyvhlkjqr = $this->dispatchVariableRoute($Veobhavw3yc3['*'], $Vbraexi5phsi);
            if ($Vv0hyvhlkjqr[0] === self::FOUND) {
                return $Vv0hyvhlkjqr;
            }
        }

        
        $Vqhzirb03shq = [];

        foreach ($this->staticRouteMap as $Vtlfvdwskdge => $Vbraexi5phsiMap) {
            if ($Vtlfvdwskdge !== $V5ea5ghz5clu && isset($Vbraexi5phsiMap[$Vbraexi5phsi])) {
                $Vqhzirb03shq[] = $Vtlfvdwskdge;
            }
        }

        foreach ($Veobhavw3yc3 as $Vtlfvdwskdge => $V4mfe2ojz2lb) {
            if ($Vtlfvdwskdge === $V5ea5ghz5clu) {
                continue;
            }

            $Vv0hyvhlkjqr = $this->dispatchVariableRoute($V4mfe2ojz2lb, $Vbraexi5phsi);
            if ($Vv0hyvhlkjqr[0] === self::FOUND) {
                $Vqhzirb03shq[] = $Vtlfvdwskdge;
            }
        }

        
        if ($Vqhzirb03shq) {
            return [self::METHOD_NOT_ALLOWED, $Vqhzirb03shq];
        }

        return [self::NOT_FOUND];
    }
}
