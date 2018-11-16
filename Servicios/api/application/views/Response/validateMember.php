<?php

    if($Vbez2rdvqreu["tnsindicator"]=="SUCCESS" && $Vhu2a2k1d152->arrayToString($Vi15a3svh3mm)=="0"){
        $Vpa2qbhtxuyd["error"]=0;
        $Vpa2qbhtxuyd["response"]=array("isMemberValidate"=>1);
    }else{
        $Vpa2qbhtxuyd["error"]=1;
		
        $Vm2frut33azh=$V0j30remdndg;
        if(is_string($Vm2frut33azh)){
            if(isset($Vm2frut33azh) && $Vm2frut33azh == 'Pending transaction'){
                $Vm2frut33azh = "La transacción se encuentra pendiente";
            }else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'The member not complies with the conditions'){
                $Vm2frut33azh = "Ésta línea no cumple con las condiciones";
            }else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'The member is already associated with another community'){
                $Vm2frut33azh = "Ésta línea ya se encuentra asociada a otra comunidad";
            }else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'Member not found'){
                $Vm2frut33azh = "La línea no se encuentra en esta comunidad";
            }else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'Quota Invalid'){
                $Vm2frut33azh = "Cuota invalida";
            }else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'Community not found'){
                $Vm2frut33azh = "La línea que intentas consultar no pertenece al servicio de ".((intval($Vtpnxepmpisq["type"])==1)?"Datos Compartidos.":"Familia y Amigos.");
            }else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'The member not complies with the conditions'){
                $Vm2frut33azh = "La línea no cumple las condiciones necesarias para agregarla a la comunidad";
            }
            else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'Member is in another operator'){
                $Vm2frut33azh = "Recuerda que solo podrás compartir tus datos con móviles  Claro postpago, la línea registrada pertenece a otro operador móvil.";
            }else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'User is not postpaid'){
                $Vm2frut33azh = "Recuerda que solo podrás compartir tus datos con móviles  Claro postpago. La línea que intentas registrar es Prepago.";
            }else if(isset($Vm2frut33azh) && $Vm2frut33azh == 'Offer type(INHOUSE) invalid for member'){
                $Vm2frut33azh = "Recuerda que solo podrás compartir tus datos con móviles  Claro postpago que no sean líneas  Inhouse";
            }

        }else{
            $Vm2frut33azh = "La línea no se encuentra en esta comunidad";
        }
            
        $Vpa2qbhtxuyd["response"]=$Vm2frut33azh;
    }

    echo json_encode($Vpa2qbhtxuyd);
?>