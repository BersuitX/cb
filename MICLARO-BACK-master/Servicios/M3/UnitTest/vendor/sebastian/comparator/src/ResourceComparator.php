<?php


namespace SebastianBergmann\Comparator;


class ResourceComparator extends Comparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return is_resource($Vwcb1oykhumm) && is_resource($Vs4nw03sqcam);
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        if ($Vs4nw03sqcam != $Vwcb1oykhumm) {
            throw new ComparisonFailure(
                $Vwcb1oykhumm,
                $Vs4nw03sqcam,
                $this->exporter->export($Vwcb1oykhumm),
                $this->exporter->export($Vs4nw03sqcam)
            );
        }
    }
}
