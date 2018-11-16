<?php

namespace FastRoute\Dispatcher;

class GroupPosBased extends RegexBasedAbstract
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

            
            for ($Vxja1abp34yq = 1; '' === $Virbphhh55ue[$Vxja1abp34yq]; ++$Vxja1abp34yq);

            list($Voc34ggbfvw5, $Vcifnnvy3bnu) = $Vqhzkfsafzrc['routeMap'][$Vxja1abp34yq];

            $Vjmb1ygyspt2 = [];
            foreach ($Vcifnnvy3bnu as $Vlg2r5tyiaz1) {
                $Vjmb1ygyspt2[$Vlg2r5tyiaz1] = $Virbphhh55ue[$Vxja1abp34yq++];
            }
            return [self::FOUND, $Voc34ggbfvw5, $Vjmb1ygyspt2];
        }

        return [self::NOT_FOUND];
    }
}
