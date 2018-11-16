<?php

namespace FastRoute\Dispatcher;

class MarkBased extends RegexBasedAbstract
{
    public function __construct($Vqhzkfsafzrc)
    {
        list($this->staticRouteMap, $this->variableRouteData) = $Vqhzkfsafzrc;
    }

    protected function dispatchVariableRoute($V4mfe2ojz2lb, $Vbraexi5phsi)
    {
        foreach ($V4mfe2ojz2lb as $Vqhzkfsafzrc) {
            if (!preg_match($Vqhzkfsafzrc['regex'], $Vbraexi5phsi, $Virbphhh55ue)) {
                continue;
            }

            list($Voc34ggbfvw5, $Vcifnnvy3bnu) = $Vqhzkfsafzrc['routeMap'][$Virbphhh55ue['MARK']];

            $Vjmb1ygyspt2 = [];
            $Vxja1abp34yq = 0;
            foreach ($Vcifnnvy3bnu as $Vlg2r5tyiaz1) {
                $Vjmb1ygyspt2[$Vlg2r5tyiaz1] = $Virbphhh55ue[++$Vxja1abp34yq];
            }
            return [self::FOUND, $Voc34ggbfvw5, $Vjmb1ygyspt2];
        }

        return [self::NOT_FOUND];
    }
}
