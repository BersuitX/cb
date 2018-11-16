<?php
    $Veqekzxyjyqy=0;    
    $Vonnn0nfpbux = array();
    $V4stf05kgafy=array();
    if(isset($V4stf05kgafyistDetalleProducto,$V4stf05kgafyistDetalleProducto["aDetalleProducto"])){
        foreach ($V4stf05kgafyistDetalleProducto["aDetalleProducto"] as $Vep0df0xosaw => $Vxxtccqydhzn) {
            foreach ($Vxxtccqydhzn as $Vv3o4gn4ugio => $Vxxtccqydhzn2) {
                $Vxxtccqydhzn2 = str_replace("\r\n","",$Vxxtccqydhzn2);
                $V4stf05kgafyistDetalleProducto["aDetalleProducto"][$Vep0df0xosaw][$Vv3o4gn4ugio] = $Vhu2a2k1d152->arrayToString($Vxxtccqydhzn2);
            }
        }
        $Vonnn0nfpbux = $V4stf05kgafyistDetalleProducto["aDetalleProducto"];
    }
    
    $Vonnn0nfpbuxonse["error"]=$Veqekzxyjyqy;
    $Vonnn0nfpbuxonse["response"]=$Vonnn0nfpbux;
    $Vonnn0nfpbuxonse["lista"]=$V4stf05kgafy;

    echo json_encode($Vonnn0nfpbuxonse);
?>