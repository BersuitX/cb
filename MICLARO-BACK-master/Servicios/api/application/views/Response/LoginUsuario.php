<?php

    $V1ulgisc25xy["nombre"]=ucwords(strtolower($Vhu2a2k1d152->arrayToString($Vqh13f3s4mwv["anombreCliente"])));
    $V1ulgisc25xy["apellido"]=ucwords(strtolower($Vhu2a2k1d152->arrayToString($Vqh13f3s4mwv["aapellidoCliente"])));
    $V1ulgisc25xy["UserProfileID"]=$Vhu2a2k1d152->arrayToString($Vqh13f3s4mwv["anombreUsuario"]);
    
    $V1ulgisc25xy["DocumentNumber"]=((isset($Vqh13f3s4mwv["adocumento"])?$Vhu2a2k1d152->arrayToString($Vqh13f3s4mwv["adocumento"]):""));
    
    $V1ulgisc25xy["DocumentType"]=((isset($Vqh13f3s4mwv["atipoDocumentoID"])?$Vhu2a2k1d152->arrayToString($Vqh13f3s4mwv["atipoDocumentoID"]):""));
    $V1ulgisc25xy["claveTemporal"]=(($Vqh13f3s4mwv["aesContraseñaTemporal"]=="true")?1:0);
    $V1ulgisc25xy["esUsuarioInspira"] = isset($Vqh13f3s4mwv["aesUsuarioInspira"]) && $Vqh13f3s4mwv["aesUsuarioInspira"] == 'true'?1:0;
    $V1ulgisc25xy["esSolicitarRegistro"] = isset($Vqh13f3s4mwv["aesSolicitarRegistro"]) && $Vqh13f3s4mwv["aesSolicitarRegistro"] == 'true'?1:0;



    $Vkpo2zsyvg1k=array();
    
    
    
    if(isset($Vqbbvbbhds1v["aCuenta"])){
        if(!isset($Vqbbvbbhds1v["aCuenta"]["atipoCuentaID"])){
            foreach($Vqbbvbbhds1v["aCuenta"] as $Vutaiebycwbq){
                $Vm1av2iahduc["LineOfBusiness"]=((isset($Vutaiebycwbq["atipoCuentaID"])?$Vutaiebycwbq["atipoCuentaID"]:"0"));
                $Vm1av2iahduc["AccountId"]=((isset($Vutaiebycwbq["anumeroCuenta"])?$Vutaiebycwbq["anumeroCuenta"]:"0"));
                $Vm1av2iahduc["alias"]=((isset($Vutaiebycwbq["aalias"])?$Vhu2a2k1d152->arrayToString($Vutaiebycwbq["aalias"]):""));

                if ($Vm1av2iahduc["alias"]=="") {
                    $Vm1av2iahduc["alias"]=$Vm1av2iahduc["AccountId"];
                }

                array_push($Vkpo2zsyvg1k,$Vm1av2iahduc);
            }
        }else{
            $Vm1av2iahduc["LineOfBusiness"]=((isset($Vqbbvbbhds1v["aCuenta"]["atipoCuentaID"])?$Vqbbvbbhds1v["aCuenta"]["atipoCuentaID"]:"0"));
            $Vm1av2iahduc["AccountId"]=((isset($Vqbbvbbhds1v["aCuenta"]["anumeroCuenta"])?$Vqbbvbbhds1v["aCuenta"]["anumeroCuenta"]:"0"));
            $Vm1av2iahduc["alias"]=((isset($Vqbbvbbhds1v["aCuenta"]["aalias"])?$Vhu2a2k1d152->arrayToString($Vqbbvbbhds1v["aCuenta"]["aalias"]):""));
            if ($Vm1av2iahduc["alias"]=="") {
                $Vm1av2iahduc["alias"]=$Vm1av2iahduc["AccountId"];
            }

            array_push($Vkpo2zsyvg1k,$Vm1av2iahduc);
        }

        $Vfeinw1hsfej = array("data" => array("LineOfBusiness"=>$Vkpo2zsyvg1k[0]["LineOfBusiness"],"AccountId"=>$Vkpo2zsyvg1k[0]["AccountId"]));                                                                    
        $Vfeinw1hsfej_string = json_encode($Vfeinw1hsfej);
    }


    
    if(sizeof($Vkpo2zsyvg1k) == 0){
    
        $Vm1av2iahduc = array();
        $Vm1av2iahduc["LineOfBusiness"]="";
        $Vm1av2iahduc["AccountId"]="";
        $Vm1av2iahduc["custcode"]="";
        $Vm1av2iahduc["accountIdHEader"]="";
        $Vm1av2iahduc["alias"]="";
        if ($Vm1av2iahduc["alias"]=="") {
            $Vm1av2iahduc["alias"]=$Vm1av2iahduc["AccountId"];
        }

        array_push($Vkpo2zsyvg1k,$Vm1av2iahduc);
    }
    


    $Vhu2a2k1d152->load->library('GibberishAES');

    $V5sjkgyvdnsq=date("Y-m-d H:i:s");
    $Vekqypogv5tb=array();
    $Vnwdgngo1q13=$V1ulgisc25xy;
    $Vnwdgngo1q13["clave"]=$Vtpnxepmpisq["clave"];
    
    foreach ($Vkpo2zsyvg1k as $Vutaiebycwbq) {
        $Vfeinw1hsfejEncrip["usuario"]=$Vnwdgngo1q13;
        $Vfeinw1hsfejEncrip["cuenta"]=$Vutaiebycwbq;
        $Vfeinw1hsfejEncrip["inicio"]=$V5sjkgyvdnsq;
        $Vutaiebycwbq["token"]=$Vhu2a2k1d152->gibberishaes->enc(json_encode($Vfeinw1hsfejEncrip),$Vhu2a2k1d152->app["AES"]);
        array_push($Vekqypogv5tb,$Vutaiebycwbq);
    }

    $Vpa2qbhtxuyd["error"]=0;
    $Vpa2qbhtxuyd["response"]=array("usuario"=>$V1ulgisc25xy,"cuentas"=>$Vekqypogv5tb);

    echo json_encode($Vpa2qbhtxuyd);
?>