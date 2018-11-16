<?php



namespace Prophecy\Comparator;

use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Comparator\ComparisonFailure;


final class ClosureComparator extends Comparator
{
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return is_object($Vwcb1oykhumm) && $Vwcb1oykhumm instanceof \Closure
            && is_object($Vs4nw03sqcam) && $Vs4nw03sqcam instanceof \Closure;
    }

    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        throw new ComparisonFailure(
            $Vwcb1oykhumm,
            $Vs4nw03sqcam,
            
            '',
            '',
            false,
            'all closures are born different'
        );
    }
}
