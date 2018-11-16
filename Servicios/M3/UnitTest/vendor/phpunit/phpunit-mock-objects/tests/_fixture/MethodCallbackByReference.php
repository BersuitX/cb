<?php
class MethodCallbackByReference
{
    public function bar(&$Vmbzc5xgwrgo, &$Vglk1nbl1t2o, $Vibefsvmlpru)
    {
        Legacy::bar($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru);
    }

    public function callback(&$Vmbzc5xgwrgo, &$Vglk1nbl1t2o, $Vibefsvmlpru)
    {
        $Vglk1nbl1t2o = 1;
    }
}
