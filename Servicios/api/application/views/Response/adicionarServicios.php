<?php
    $Veqekzxyjyqy= 1;
    $Vonnn0nfpbux = "Temporalmente este módulo no se encuentra disponible";
    
    if(isset($Vdylu3d4jjuy,$Vdylu3d4jjuy["codigoError"])){
        if($Vdylu3d4jjuy["codigoError"] == "0"){
            $Veqekzxyjyqy = 0;
            $Vonnn0nfpbux = $Vdylu3d4jjuy;
        }else{
            if(isset($Vdylu3d4jjuy["mensajeError"])){
                if($Vdylu3d4jjuy["mensajeError"] == "No se creo OT,Ya tiene Servicio" || $Vdylu3d4jjuy["mensajeError"] == "No se creo OT,el servicio ya existe"){
                    $Vonnn0nfpbux = "No se completó el proceso. Este servicio ya se encuentra activo.";
                }else{
                    $Vonnn0nfpbux = $Vdylu3d4jjuy["mensajeError"];    
                }
            }else{
                $Vonnn0nfpbux = "Por el momento no ha sido posible realizar esta acción";
            }
        }
    }
    
    $Vonnn0nfpbuxonse["error"]=$Veqekzxyjyqy;
    $Vonnn0nfpbuxonse["response"]=$Vonnn0nfpbux;

    echo json_encode($Vonnn0nfpbuxonse);
?>