<?php


namespace SebastianBergmann\Comparator;


class SplObjectStorageComparator extends Comparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return $Vwcb1oykhumm instanceof \SplObjectStorage && $Vs4nw03sqcam instanceof \SplObjectStorage;
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        foreach ($Vs4nw03sqcam as $Vbj3pw2f5egf) {
            if (!$Vwcb1oykhumm->contains($Vbj3pw2f5egf)) {
                throw new ComparisonFailure(
                    $Vwcb1oykhumm,
                    $Vs4nw03sqcam,
                    $this->exporter->export($Vwcb1oykhumm),
                    $this->exporter->export($Vs4nw03sqcam),
                    false,
                    'Failed asserting that two objects are equal.'
                );
            }
        }

        foreach ($Vwcb1oykhumm as $Vbj3pw2f5egf) {
            if (!$Vs4nw03sqcam->contains($Vbj3pw2f5egf)) {
                throw new ComparisonFailure(
                    $Vwcb1oykhumm,
                    $Vs4nw03sqcam,
                    $this->exporter->export($Vwcb1oykhumm),
                    $this->exporter->export($Vs4nw03sqcam),
                    false,
                    'Failed asserting that two objects are equal.'
                );
            }
        }
    }
}
