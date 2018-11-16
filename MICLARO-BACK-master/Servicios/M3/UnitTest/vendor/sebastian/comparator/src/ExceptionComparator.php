<?php


namespace SebastianBergmann\Comparator;


class ExceptionComparator extends ObjectComparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return $Vwcb1oykhumm instanceof \Exception && $Vs4nw03sqcam instanceof \Exception;
    }

    
    protected function toArray($Vbj3pw2f5egf)
    {
        $Vvs0hc5bhqj3 = parent::toArray($Vbj3pw2f5egf);

        unset(
            $Vvs0hc5bhqj3['file'],
            $Vvs0hc5bhqj3['line'],
            $Vvs0hc5bhqj3['trace'],
            $Vvs0hc5bhqj3['string'],
            $Vvs0hc5bhqj3['xdebug_message']
        );

        return $Vvs0hc5bhqj3;
    }
}
