<?php
    $Veqekzxyjyqy=1;    
    $Vonnn0nfpbux = "En el momento no cuentas con servicios disponibles";
    $V1q5xkbcnn5z = array();
    $Vktnbvtvrwhf = array();
    $Vdawwn2urq42 = array();

    if(isset($Vo2ymdycvsus)){

        if(isset($Vo2ymdycvsus["valorRenta"])){
            if(intval($Vo2ymdycvsus["valorRenta"]) > 0){
                $Vo2ymdycvsus["valorRenta"] = str_replace(".00","", $Vo2ymdycvsus["valorRenta"]);
            }else{
                $Vo2ymdycvsus["valorRenta"] = "0";   
            }
        }else{
             $Vo2ymdycvsus["valorRenta"] = "0";
        }


        $Vn3vzzdr2m1a = array();
        if(isset($Vo2ymdycvsus["servicioDisponible"])){
            $Vo2ymdycvsus["servicioDisponible"] = $Vhu2a2k1d152->getArray($Vo2ymdycvsus["servicioDisponible"]);
            foreach ($Vo2ymdycvsus["servicioDisponible"] as $Vep0df0xosaw => $Vwrkhytly2rl) {
                if($Vwrkhytly2rl->categoria=="3"){
                    foreach ($Vwrkhytly2rl as $Vv3o4gn4ugio => $Va4zo0rltynr) {
                        if($Vv3o4gn4ugio == "valor"){
                            $Vo2ymdycvsus["servicioDisponible"][$Vep0df0xosaw]->$Vv3o4gn4ugio = str_replace(",00","", $Va4zo0rltynr);
                        }
                    }
                    array_push($V1q5xkbcnn5z, $Vo2ymdycvsus["servicioDisponible"][$Vep0df0xosaw]);
                }
                
            }

            
            $V0ixsy2ke0dw=array();
            foreach ($V1q5xkbcnn5z as $Vep0df0xosawtem) {
                $Vep0df0xosawtem->descripcionProducto="";
                if ($Vep0df0xosawtem->tipoTelevision=="GOLDEN") {
                    $Vep0df0xosawtem->descripcionProducto="<center><b>GOLDEN</b><br><br>Disfruta de grandes producciones de Hollywood, México y series latinoamericanas, además vive minuto a minuto el cubrimiento de eventos especiales. Solicítalo aquí.</center>";
                }else if ($Vep0df0xosawtem->tipoTelevision=="HOTPACK") {
                    $Vep0df0xosawtem->descripcionProducto="<center><b>HOTPACK</b><br><br>¡El paquete de canales para adultos más completo del mercado está aquí! Disfruta de la variedad en contenidos y producciones latinoamericanas que tenemos para ti. Solicítalo ahora.</center>";
                }else if ($Vep0df0xosawtem->tipoTelevision=="HBO") {
                    $Vep0df0xosawtem->descripcionProducto="<center><b>HBO</b><br><br>Tiene todo el entretenimiento Premium que estás buscando: películas, series originales y mucho más. Pide aquí tu paquete HBO MAX.</center>";
                }else if ($Vep0df0xosawtem->tipoTelevision=="FOX") {
                    $Vep0df0xosawtem->descripcionProducto="<center><b>FOX</b><br><br>Accede desde tu televisor o dispositivos al mayor catálogo de entretenimiento: películas, series y deportes en vivo, en cualquier momento y lugar.</center>";
                }
                array_push($V0ixsy2ke0dw,  $Vep0df0xosawtem);
            }
    
            $Vo2ymdycvsus["servicioDisponible"] = $V1q5xkbcnn5z;
        }else{
            $Vo2ymdycvsus["servicioDisponible"]  = array();
        }

        if(isset($Vo2ymdycvsus["inventarios"])){
            $Vo2ymdycvsus["inventarios"] = $Vhu2a2k1d152->getArray($Vo2ymdycvsus["inventarios"]);

            
            foreach ($Vo2ymdycvsus["inventarios"] as $Vep0df0xosaw => $V22glf4dd10l){
                
                $V22glf4dd10l->serial = trim($V22glf4dd10l->serial);
                array_push($Vktnbvtvrwhf, $V22glf4dd10l);
            }
            
            $Vo2ymdycvsus["inventarios"] = $Vktnbvtvrwhf;
            
        }else{
            $Vo2ymdycvsus["inventarios"]  = array();
        }

        if(isset($Vo2ymdycvsus["servicioActual"])){
            $Vo2ymdycvsus["servicioActual"] = $Vhu2a2k1d152->getArray($Vo2ymdycvsus["servicioActual"]);
        }else{
            $Vo2ymdycvsus["servicioActual"];
        }

        $Vonnn0nfpbux = $Vo2ymdycvsus;
        $Veqekzxyjyqy=0;
    }
    
    $Vonnn0nfpbuxonse["error"]=$Veqekzxyjyqy;
    $Vonnn0nfpbuxonse["response"]=$Vonnn0nfpbux;
    $Vonnn0nfpbuxonse["inventarios"]=$Vktnbvtvrwhf;
    echo json_encode($Vonnn0nfpbuxonse);
?>