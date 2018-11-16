<?php


namespace SebastianBergmann\Comparator;


class ObjectComparator extends ArrayComparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return is_object($Vwcb1oykhumm) && is_object($Vs4nw03sqcam);
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false, array &$Vwmzchdebcks = array())
    {
        if (get_class($Vs4nw03sqcam) !== get_class($Vwcb1oykhumm)) {
            throw new ComparisonFailure(
                $Vwcb1oykhumm,
                $Vs4nw03sqcam,
                $this->exporter->export($Vwcb1oykhumm),
                $this->exporter->export($Vs4nw03sqcam),
                false,
                sprintf(
                    '%s is not instance of expected class "%s".',
                    $this->exporter->export($Vs4nw03sqcam),
                    get_class($Vwcb1oykhumm)
                )
            );
        }

        
        if (in_array(array($Vs4nw03sqcam, $Vwcb1oykhumm), $Vwmzchdebcks, true) ||
            in_array(array($Vwcb1oykhumm, $Vs4nw03sqcam), $Vwmzchdebcks, true)) {
            return;
        }

        $Vwmzchdebcks[] = array($Vs4nw03sqcam, $Vwcb1oykhumm);

        
        
        
        if ($Vs4nw03sqcam !== $Vwcb1oykhumm) {
            try {
                parent::assertEquals(
                    $this->toArray($Vwcb1oykhumm),
                    $this->toArray($Vs4nw03sqcam),
                    $Vxo5kvys4l4m,
                    $Vgxxhufhstfx,
                    $V2tcbx0tpkh3,
                    $Vwmzchdebcks
                );
            } catch (ComparisonFailure $Vpt32vvhspnv) {
                throw new ComparisonFailure(
                    $Vwcb1oykhumm,
                    $Vs4nw03sqcam,
                    
                    substr_replace($Vpt32vvhspnv->getExpectedAsString(), get_class($Vwcb1oykhumm) . ' Object', 0, 5),
                    substr_replace($Vpt32vvhspnv->getActualAsString(), get_class($Vs4nw03sqcam) . ' Object', 0, 5),
                    false,
                    'Failed asserting that two objects are equal.'
                );
            }
        }
    }

    
    protected function toArray($Vbj3pw2f5egf)
    {
        return $this->exporter->toArray($Vbj3pw2f5egf);
    }
}
