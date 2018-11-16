<?php

    $V1ulgisc25xy["nombre"]=ucwords(strtolower($Vhu2a2k1d152->arrayToString($Vqh13f3s4mwv["anombreCliente"])));
    $V1ulgisc25xy["apellido"]=ucwords(strtolower($Vhu2a2k1d152->arrayToString($Vqh13f3s4mwv["aapellidoCliente"])));
    $V1ulgisc25xy["UserProfileID"]=$Vhu2a2k1d152->arrayToString($Vqh13f3s4mwv["anombreUsuario"]);
    $V1ulgisc25xy["DocumentNumber"]=$Vqh13f3s4mwv["adocumento"];
    $V1ulgisc25xy["DocumentType"]=$Vqh13f3s4mwv["atipoDocumentoID"];
    $V1ulgisc25xy["claveTemporal"]=(($Vqh13f3s4mwv["aesContraseñaTemporal"]=="true")?1:0);

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

    $Vhu2a2k1d152->load->library('GibberishAES');
    $Vhu2a2k1d152->load->helper('cookie');

    $Vekqypogv5tb=array();
    foreach ($Vkpo2zsyvg1k as $Vutaiebycwbq) {

        $V5sjkgyvdnsq=date("Y-m-d H:i:s");
        $V4tefnlwskas=$Vhu2a2k1d152->gibberishaes->enc($V5sjkgyvdnsq,$Vhu2a2k1d152->app["AES"]);

        $Vfeinw1hsfejEncrip["usuario"]=$V1ulgisc25xy;
        $Vfeinw1hsfejEncrip["cuenta"]=$Vutaiebycwbq;
        $Vfeinw1hsfejEncrip["inicio"]=$V5sjkgyvdnsq;
        $Vfeinw1hsfejEncrip["hash"]=$V4tefnlwskas;
        $Vutaiebycwbq["token"]=$Vhu2a2k1d152->gibberishaes->enc(json_encode($Vfeinw1hsfejEncrip),$Vhu2a2k1d152->app["AES"]);

        $Vhoedufkmgxw= array(
               'name'   => '_wgVisitor',
               'value'  => $V4tefnlwskas,
               'expire' => '7200',
               'secure' => TRUE, 
               'httponly' => TRUE, 
               'domain' => 'miclaroapp.com.co'
           );

        $Vhu2a2k1d152->input->set_cookie($Vhoedufkmgxw);

        array_push($Vekqypogv5tb,$Vutaiebycwbq);
    }

    $Vpa2qbhtxuyd["error"]=0;
    $Vpa2qbhtxuyd["response"]=array("usuario"=>$V1ulgisc25xy,"cuentas"=>$Vekqypogv5tb);

    echo json_encode($Vpa2qbhtxuyd);
?>