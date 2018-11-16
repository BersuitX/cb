<?php
    $Veqekzxyjyqy= 1;
    $Vonnn0nfpbux = "Temporalmente este módulo no se encuentra disponible";
    
    if(isset($Vdl2ujpr2n4a,$Vdl2ujpr2n4a["codigoError"])){
        if($Vdl2ujpr2n4a["codigoError"] == "0"){
            $Veqekzxyjyqy = 0;
            $Vonnn0nfpbux = $Vdl2ujpr2n4a;
        }else{
            if(isset($Vdl2ujpr2n4a["mensajeError"])){
                if($Vdl2ujpr2n4a["mensajeError"] == "No se creo OT,Ya tiene Servicio" || $Vdl2ujpr2n4a["mensajeError"] == "No se creo OT,el servicio ya existe"){
                    $Vonnn0nfpbux = "No se completó el proceso. Este servicio ya se encuentra activo.";
                }else{
                    $Vonnn0nfpbux = $Vdl2ujpr2n4a["mensajeError"];    
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