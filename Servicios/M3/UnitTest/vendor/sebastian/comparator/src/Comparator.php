<?php


namespace SebastianBergmann\Comparator;

use SebastianBergmann\Exporter\Exporter;


abstract class Comparator
{
    
    protected $Vdnxqjiaf0hs;

    
    protected $Vnqoiikqsyp5;

    public function __construct()
    {
        $this->exporter = new Exporter;
    }

    
    public function setFactory(Factory $Vdnxqjiaf0hs)
    {
        $this->factory = $Vdnxqjiaf0hs;
    }

    
    abstract public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam);

    
    abstract public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false);
}
