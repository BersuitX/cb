<?php



namespace Prophecy\Prophecy;


class Revealer implements RevealerInterface
{
    
    public function reveal($Vcptarsq5qe4)
    {
        if (is_array($Vcptarsq5qe4)) {
            return array_map(array($this, __FUNCTION__), $Vcptarsq5qe4);
        }

        if (!is_object($Vcptarsq5qe4)) {
            return $Vcptarsq5qe4;
        }

        if ($Vcptarsq5qe4 instanceof ProphecyInterface) {
            $Vcptarsq5qe4 = $Vcptarsq5qe4->reveal();
        }

        return $Vcptarsq5qe4;
    }
}
