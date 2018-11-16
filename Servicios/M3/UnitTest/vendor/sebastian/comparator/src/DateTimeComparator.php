<?php


namespace SebastianBergmann\Comparator;


class DateTimeComparator extends ObjectComparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return ($Vwcb1oykhumm instanceof \DateTime || $Vwcb1oykhumm instanceof \DateTimeInterface) &&
            ($Vs4nw03sqcam instanceof \DateTime || $Vs4nw03sqcam instanceof \DateTimeInterface);
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false, array &$Vwmzchdebcks = array())
    {
        $Vxo5kvys4l4m = new \DateInterval(sprintf('PT%sS', abs($Vxo5kvys4l4m)));

        $Vwcb1oykhummLower = clone $Vwcb1oykhumm;
        $Vwcb1oykhummUpper = clone $Vwcb1oykhumm;

        if ($Vs4nw03sqcam < $Vwcb1oykhummLower->sub($Vxo5kvys4l4m) ||
            $Vs4nw03sqcam > $Vwcb1oykhummUpper->add($Vxo5kvys4l4m)) {
            throw new ComparisonFailure(
                $Vwcb1oykhumm,
                $Vs4nw03sqcam,
                $this->dateTimeToString($Vwcb1oykhumm),
                $this->dateTimeToString($Vs4nw03sqcam),
                false,
                'Failed asserting that two DateTime objects are equal.'
            );
        }
    }

    
    private function dateTimeToString($Vn25skasrq1i)
    {
        $Ve5tcsso230g = $Vn25skasrq1i->format('Y-m-d\TH:i:s.uO');

        return $Ve5tcsso230g ? $Ve5tcsso230g : 'Invalid DateTimeInterface object';
    }
}
