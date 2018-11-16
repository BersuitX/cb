<?php
    $Veqekzxyjyqy=0;
    $Vpa2qbhtxuyd["fechaIni"] = $Vtpnxepmpisq;
    $Vpa2qbhtxuyd["data"] = $Vfbxmbgrb3ry;
    if(intval($Vwa00m3pezrc["statusCode"])!=1){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="Error al intentar obtener la información. Intentelo mas tarde.";
    }else{
        if(isset($Vfbxmbgrb3ry) && count($Vfbxmbgrb3ry)>0){
            $Vfbxmbgrb3ry=$Vfbxmbgrb3ry[1];
            $Vfbxmbgrb3ry=$Vfbxmbgrb3ry["values"];
            
            $V1q5xkbcnn5z=array();
            foreach($Vfbxmbgrb3ry["mapArrayValues"] as $Vutaiebycwbq){
                $Vep0df0xosaw=0;
                foreach($Vfbxmbgrb3ry["mapArrayColumns"] as $Vgyipw3mhujb){
                    $Vm1av2iahduc[$Vgyipw3mhujb]=(( strpos($Vutaiebycwbq["registro"][$Vep0df0xosaw], ',') !== false )?floatval($Vutaiebycwbq["registro"][$Vep0df0xosaw]):$Vutaiebycwbq["registro"][$Vep0df0xosaw]);
                    $Vep0df0xosaw++;
                }

                $Vm1av2iahduc["RECARGA_PAQUETE"] = 0;
                $Vm1av2iahduc["CONSUMOS"] = 0;
                $Vm1av2iahduc["OTROS_SALDOS"] = 0;
                $Vm1av2iahduc["SALDO_CUENTA_BONOS_CAMPANAS"] = 0;

                array_push($V1q5xkbcnn5z,$Vm1av2iahduc);
            }

            $Vpa2qbhtxuyd["error"]=0;


            $Vpa2qbhtxuyd["response"]=$V1q5xkbcnn5z;
        }else{
            $Vpa2qbhtxuyd["error"]=1;
            $Vpa2qbhtxuyd["response"]="No se encontró información.";
        }
    }



echo json_encode($Vpa2qbhtxuyd);
?>