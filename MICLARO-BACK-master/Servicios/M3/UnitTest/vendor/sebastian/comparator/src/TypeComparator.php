<?php


namespace SebastianBergmann\Comparator;


class TypeComparator extends Comparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return true;
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        if (gettype($Vwcb1oykhumm) != gettype($Vs4nw03sqcam)) {
            throw new ComparisonFailure(
                $Vwcb1oykhumm,
                $Vs4nw03sqcam,
                
                '',
                '',
                false,
                sprintf(
                    '%s does not match expected type "%s".',
                    $this->exporter->shortenedExport($Vs4nw03sqcam),
                    gettype($Vwcb1oykhumm)
                )
            );
        }
    }
}
