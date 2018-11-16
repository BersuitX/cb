<?php


namespace SebastianBergmann\Comparator;


class ScalarComparator extends Comparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return ((is_scalar($Vwcb1oykhumm) xor null === $Vwcb1oykhumm) &&
               (is_scalar($Vs4nw03sqcam) xor null === $Vs4nw03sqcam))
               
               || (is_string($Vwcb1oykhumm) && is_object($Vs4nw03sqcam) && method_exists($Vs4nw03sqcam, '__toString'))
               || (is_object($Vwcb1oykhumm) && method_exists($Vwcb1oykhumm, '__toString') && is_string($Vs4nw03sqcam));
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        $Vwcb1oykhummToCompare = $Vwcb1oykhumm;
        $Vs4nw03sqcamToCompare   = $Vs4nw03sqcam;

        
        
        if (is_string($Vwcb1oykhumm) || is_string($Vs4nw03sqcam)) {
            $Vwcb1oykhummToCompare = (string) $Vwcb1oykhummToCompare;
            $Vs4nw03sqcamToCompare   = (string) $Vs4nw03sqcamToCompare;

            if ($V2tcbx0tpkh3) {
                $Vwcb1oykhummToCompare = strtolower($Vwcb1oykhummToCompare);
                $Vs4nw03sqcamToCompare   = strtolower($Vs4nw03sqcamToCompare);
            }
        }

        if ($Vwcb1oykhummToCompare != $Vs4nw03sqcamToCompare) {
            if (is_string($Vwcb1oykhumm) && is_string($Vs4nw03sqcam)) {
                throw new ComparisonFailure(
                    $Vwcb1oykhumm,
                    $Vs4nw03sqcam,
                    $this->exporter->export($Vwcb1oykhumm),
                    $this->exporter->export($Vs4nw03sqcam),
                    false,
                    'Failed asserting that two strings are equal.'
                );
            }

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
