<?php



namespace Prophecy\Comparator;

use Prophecy\Prophecy\ProphecyInterface;
use SebastianBergmann\Comparator\ObjectComparator;

class ProphecyComparator extends ObjectComparator
{
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return is_object($Vwcb1oykhumm) && is_object($Vs4nw03sqcam) && $Vs4nw03sqcam instanceof ProphecyInterface;
    }

    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false, array &$Vwmzchdebcks = array())
    {
        parent::assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam->reveal(), $Vxo5kvys4l4m, $Vgxxhufhstfx, $V2tcbx0tpkh3, $Vwmzchdebcks);
    }
}
