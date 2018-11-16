<?php



class PHP_CodeCoverage_Util
{
    
    public static function percent($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vmbzc5xgwrgosString = false, $V0cwxqemgn03 = false)
    {
        if ($Vmbzc5xgwrgosString && $Vglk1nbl1t2o == 0) {
            return '';
        }

        if ($Vglk1nbl1t2o > 0) {
            $V40kyls3eakg = ($Vmbzc5xgwrgo / $Vglk1nbl1t2o) * 100;
        } else {
            $V40kyls3eakg = 100;
        }

        if ($Vmbzc5xgwrgosString) {
            if ($V0cwxqemgn03) {
                return sprintf('%6.2F%%', $V40kyls3eakg);
            }

            return sprintf('%01.2F%%', $V40kyls3eakg);
        } else {
            return $V40kyls3eakg;
        }
    }
}
