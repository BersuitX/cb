<?php

function getTag($Vhvi1dr4hg0a){
    $Vhvi1dr4hg0as=array(
        "CONSUMOCOMCEL"=>"Consumidos A Móviles Claro",
        "CONSUMOOTROS"=>"A Otros Operadores",
        "CONSUMOFIJO"=>"A Fijos",
        "CONSUMOELEGIDOS"=>"Consumidos a Elegidos",
        "CONSUMOELEGFIJO"=>"Consumidos a Elegidos Fijo",
        "CONSUMOTOTAL"=>"Consumo total",
        "CONSUMOLDI"=>"Consumo Larga Distancia Internacional",
        "CONSUMOAMIFIJO"=>"Consumo a Amigo Fijo",
        "CONSUMOPASAMINUTOS"=>"Consumo a Pasa Minutos",
        "CONSUMOPROMOCION"=>"Consumo promoción",
        "DISPPASAMINUTOS"=>"Disponible Pasa Minutos",
        "COMSUMOVIDEOLLAM"=>"Consumo video llamada",
        "CONSUMOSMS"=>"SMS consumidos",
        "CONSUMOSMSMULT"=>"SMS multimedia consumidos",
        "CONSUMOSSMSPROMO"=>"SMS promoción",
        "Datos"=>"Datos",
        "Paquetes"=>"Paquetes"
    );

    return $Vhvi1dr4hg0as[$Vhvi1dr4hg0a];
}

$Vnimxctytzqe=array("CONSUMOELEGFIJO","CONSUMOAMIFIJO","CONSUMOPROMOCION","COMSUMOVIDEOLLAM","CONSUMOSSMSPROMO","CONSUMOELEGIDOS");


$Veqekzxyjyqy=(($Voxep3jgmgpg=="WARNING")?0:(($Voxep3jgmgpg=="SUCCESS")?0:1));

if (($Veqekzxyjyqy==1)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="Error al realizar la operación.";
}else{
    $Vpa2qbhtxuyd["error"]=0;


    $V1q5xkbcnn5z=$Vhu2a2k1d152->getArray($Vamg4t2uzrhw);
    



    $V1q5xkbcnn5z_productos=array();

    foreach($V1q5xkbcnn5z as $Vutaiebycwbq){

        $V33cbrzompkj=explode('T',$Vutaiebycwbq->ServiceUsagePeriod->StartDate);
        $V33cbrzompkj=((count($V33cbrzompkj))?$V33cbrzompkj[0]:"No disponible");

        $Vnmwtpaqdyce=explode('T',$Vutaiebycwbq->ServiceUsagePeriod->EndDate);
        $Vnmwtpaqdyce=((count($Vnmwtpaqdyce))?$Vnmwtpaqdyce[0]:"No disponible");
    
        $Vfis540xelqi=array(
            "StartDate"=>$V33cbrzompkj,
            "EndDate"=>$Vnmwtpaqdyce
        );


        if (isset($Vutaiebycwbq->ServiceFeatureUsage)) {

            $V1q5xkbcnn5z_ServiceFeatureUsage=$Vhu2a2k1d152->getArray($Vutaiebycwbq->ServiceFeatureUsage);


            foreach($V1q5xkbcnn5z_ServiceFeatureUsage as $V0ebkmfsmsis){

                if( (array()!=$V0ebkmfsmsis->ServiceFeatureSubType) && ($V0ebkmfsmsis->ServiceFeatureType=="Datos" || $V0ebkmfsmsis->ServiceFeatureType=="V" || $V0ebkmfsmsis->ServiceFeatureType=="Voz"|| $V0ebkmfsmsis->ServiceFeatureType=="S") ) {

                    $Vm1av2iahduc["ServiceType"]=$Vutaiebycwbq->ServiceType;
                    $Vm1av2iahduc["ServiceFeatureType"]=$V0ebkmfsmsis->ServiceFeatureType;

                    $V0ebkmfsmsis->FeatureUsage->Quantity=$Vhu2a2k1d152->arrayToString($V0ebkmfsmsis->FeatureUsage->Quantity);
                    if ($V0ebkmfsmsis->FeatureUsage->Quantity=="NO" || $V0ebkmfsmsis->FeatureUsage->Quantity==""){
                        $V0ebkmfsmsis->FeatureUsage->Quantity="0";
                    }

                    if ($Vm1av2iahduc["ServiceFeatureType"] == "V"){
                        if ($V0ebkmfsmsis->FeatureUsage->Unit=="Net"){
                            $V0ebkmfsmsis->FeatureUsage->Unit="";
                        }
                    }

                    $Vm1av2iahduc["FeatureUsage"]=$V0ebkmfsmsis->FeatureUsage;
                    
                    if (!in_array($V0ebkmfsmsis->ServiceFeatureSubType, $Vnimxctytzqe)) {

                        if($Vutaiebycwbq->ServiceType=="Postpago"){
                            $Vm1av2iahduc["ServiceFeatureSubType"]=getTag($V0ebkmfsmsis->ServiceFeatureSubType);
                        }else{
                            $Vm1av2iahduc["ServiceFeatureSubType"]=$V0ebkmfsmsis->ServiceFeatureSubType;
                        }

                        array_push($V1q5xkbcnn5z_productos,$Vm1av2iahduc);
                    }

                }
            }
            
        }


        if($Vutaiebycwbq->ServiceType=='ROAMING'){
            $Vn3vzzdr2m1a["roaming"]=$Vfis540xelqi;
        }else if($Vutaiebycwbq->ServiceType=='Postpago'){
            $Vn3vzzdr2m1a["postpago"]=$Vfis540xelqi;
            $Vn3vzzdr2m1a["sms"]=$Vfis540xelqi;
        }
    }

    function toMegas($Vutaiebycwbq){
        $Va4zo0rltynr = 0;
        if($Vutaiebycwbq->Quantity != "0"){
            if($Vutaiebycwbq->Unit == "Kilobytes"){
                $Vol0ybi5lnvu = array(" ", "KB");
                $Vutaiebycwbq->Quantity = str_replace($Vol0ybi5lnvu, "", $Vutaiebycwbq->Quantity);
                $Va4zo0rltynr = floatval($Vutaiebycwbq->Quantity) / 1024;
            }else if($Vutaiebycwbq->Unit == "Megabytes"){
                $Vol0ybi5lnvu = array(" ", "MB");
                $Vutaiebycwbq->Quantity = str_replace($Vol0ybi5lnvu, "", $Vutaiebycwbq->Quantity);
                $Va4zo0rltynr = floatval($Vutaiebycwbq->Quantity) / 2048;
            }
        }

        return $Va4zo0rltynr;
    }

    $V1q5xkbcnn5z_voz = array();
    $V1q5xkbcnn5z_datos = array();
    $Vemsvz5njqe1 = 0;
    $V0xdwe0p05os = 0;
    foreach ($V1q5xkbcnn5z_productos as $Vutaiebycwbq) {
        if($Vutaiebycwbq["ServiceType"] == 'ROAMING'){
            if($Vutaiebycwbq["ServiceFeatureType"] == "Voz"){
                $V0xdwe0p05os = $V0xdwe0p05os + intval($Vutaiebycwbq["FeatureUsage"]->Quantity);
                array_push($V1q5xkbcnn5z_voz,$Vutaiebycwbq);
            }else if($Vutaiebycwbq["ServiceFeatureType"] == "Datos"){
                $Vemsvz5njqe1 = $Vemsvz5njqe1 + toMegas($Vutaiebycwbq["FeatureUsage"]);
                array_push($V1q5xkbcnn5z_datos,$Vutaiebycwbq);
            }
        }
    }



    $Vn3vzzdr2m1a["historial"]=$V1q5xkbcnn5z_productos;
    $Vn3vzzdr2m1a["datos"]= $V1q5xkbcnn5z_datos;
    $Vn3vzzdr2m1a["totalVoz"]= $V0xdwe0p05os." Min";
    $Vn3vzzdr2m1a["totalDatos"]= $Vemsvz5njqe1." B";
    $Vn3vzzdr2m1a["voz"]= $V1q5xkbcnn5z_voz;
    
    $Vpa2qbhtxuyd["response"]=$Vn3vzzdr2m1a;

    
}

echo json_encode($Vpa2qbhtxuyd);


?>
