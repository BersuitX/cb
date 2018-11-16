<?php


namespace SebastianBergmann\Comparator;


class DoubleComparator extends NumericComparator
{
    
    const EPSILON = 0.0000000001;

    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return (is_double($Vwcb1oykhumm) || is_double($Vs4nw03sqcam)) && is_numeric($Vwcb1oykhumm) && is_numeric($Vs4nw03sqcam);
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        if ($Vxo5kvys4l4m == 0) {
            $Vxo5kvys4l4m = self::EPSILON;
        }

        parent::assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m, $Vgxxhufhstfx, $V2tcbx0tpkh3);
    }
}
