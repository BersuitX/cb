<?php


namespace SebastianBergmann\Comparator;


class MockObjectComparator extends ObjectComparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return $Vwcb1oykhumm instanceof \PHPUnit_Framework_MockObject_MockObject && $Vs4nw03sqcam instanceof \PHPUnit_Framework_MockObject_MockObject;
    }

    
    protected function toArray($Vbj3pw2f5egf)
    {
        $Vvs0hc5bhqj3 = parent::toArray($Vbj3pw2f5egf);

        unset($Vvs0hc5bhqj3['__phpunit_invocationMocker']);

        return $Vvs0hc5bhqj3;
    }
}