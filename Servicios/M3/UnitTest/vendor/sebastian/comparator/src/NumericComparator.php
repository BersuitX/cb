<?php


namespace SebastianBergmann\Comparator;


class NumericComparator extends ScalarComparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        
        
        return is_numeric($Vwcb1oykhumm) && is_numeric($Vs4nw03sqcam) &&
               !(is_double($Vwcb1oykhumm) || is_double($Vs4nw03sqcam)) &&
               !(is_string($Vwcb1oykhumm) && is_string($Vs4nw03sqcam));
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        if (is_infinite($Vs4nw03sqcam) && is_infinite($Vwcb1oykhumm)) {
            return;
        }

        if ((is_infinite($Vs4nw03sqcam) xor is_infinite($Vwcb1oykhumm)) ||
            (is_nan($Vs4nw03sqcam) or is_nan($Vwcb1oykhumm)) ||
            abs($Vs4nw03sqcam - $Vwcb1oykhumm) > $Vxo5kvys4l4m) {
            throw new ComparisonFailure(
                $Vwcb1oykhumm,
                $Vs4nw03sqcam,
                '',
                '',
                false,
                sprintf(
                    'Failed asserting that %s matches expected %s.',
                    $this->exporter->export($Vs4nw03sqcam),
                    $this->exporter->export($Vwcb1oykhumm)
                )
            );
        }
    }
}
