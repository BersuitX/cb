<?php
    $Veqekzxyjyqy=0;
    if(intval($Vwa00m3pezrc["statusCode"])!=1){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="Error al intentar obtener la información. Intentelo mas tarde.";
    }else{
        if(isset($Vfbxmbgrb3ry) && count($Vfbxmbgrb3ry)>0){
           
            $V1q5xkbcnn5z=array();
            
            foreach($Vfbxmbgrb3ry as $Vdew4d0bndwx){
                $Vmmsgw4jmxss=$Vdew4d0bndwx["values"];
                $Vaclaigdbtoo=$Vmmsgw4jmxss["arrayNameValue"];
                
                $Ve0t45zgsjhg=array();
                $Vxc3fkadiyly=array();
                foreach($Vmmsgw4jmxss["mapArrayValues"] as $Vutaiebycwbq){
                    $Vep0df0xosaw=0;
                    $Vm1av2iahduc=array();
                    if(sizeof($Vmmsgw4jmxss["mapArrayColumns"]) > 0){
                        foreach($Vmmsgw4jmxss["mapArrayColumns"] as $Vgyipw3mhujb){
                            
                            
                            $Vep0df0xosawsFloat = false;
                            $Vep0df0xosawndComma = strpos($Vutaiebycwbq["registro"][$Vep0df0xosaw], ',');

                            if($Vep0df0xosawndComma !== false){
                                $Vutaiebycwbq["registro"][$Vep0df0xosaw] = str_replace(',', '.', $Vutaiebycwbq["registro"][$Vep0df0xosaw]);
                                $Vep0df0xosawsFloat = is_numeric($Vutaiebycwbq["registro"][$Vep0df0xosaw]);
                            }

                            $Vm1av2iahduc[$Vgyipw3mhujb]= $Vep0df0xosawsFloat?floatval($Vutaiebycwbq["registro"][$Vep0df0xosaw]): (string)$Vutaiebycwbq["registro"][$Vep0df0xosaw];
                            
                            $Vep0df0xosaw++;
                        }

                        if($Vaclaigdbtoo != 'return'){
                            array_push($V1q5xkbcnn5z,$Vm1av2iahduc);
                        }
                    }
                }
            }
            

            foreach ($V1q5xkbcnn5z as $Vep0df0xosaw => $Vutaiebycwbq) {
                if($Vutaiebycwbq["COSTO"] == 0){
                    $V1q5xkbcnn5z[$Vep0df0xosaw]["COSTO"] = $Vutaiebycwbq["COSTO_TARJETA"];
                }
            }

            if(sizeof($V1q5xkbcnn5z) == 0){
                $Vpa2qbhtxuyd["error"]= 1;
                $Vpa2qbhtxuyd["response"]= "Actualmente no tienes historial de paquetes.";
            }else{
                $Vpa2qbhtxuyd["error"]= 0;
                $Vpa2qbhtxuyd["response"]=$V1q5xkbcnn5z;
            }
            
        }else{
            $Vpa2qbhtxuyd["error"]=1;
            $Vpa2qbhtxuyd["response"]="No se encontró información.";
        }
    }


    echo json_encode($Vpa2qbhtxuyd);
?>