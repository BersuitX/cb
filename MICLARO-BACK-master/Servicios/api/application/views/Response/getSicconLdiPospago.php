<?php
    $Veqekzxyjyqy=0;
    $V2vps4uaencl = 0;

    if(intval($Vwa00m3pezrc["statusCode"])!=1){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]=isset($Vwa00m3pezrc["statusMessage"])?$Vwa00m3pezrc["statusMessage"]:"Error al intentar obtener la información. Intentelo mas tarde.";
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
                            $Vm1av2iahduc[$Vgyipw3mhujb]=(( strpos($Vutaiebycwbq["registro"][$Vep0df0xosaw], ',') !== false )?floatval($Vutaiebycwbq["registro"][$Vep0df0xosaw]):$Vutaiebycwbq["registro"][$Vep0df0xosaw]);
                            $Vep0df0xosaw++;
                        }

                        $V2vps4uaencl = $V2vps4uaencl + intval($Vm1av2iahduc["DURACION_LLAMADA"]);
                        $Vm1av2iahduc["DURACION_LLAMADA"] = $Vm1av2iahduc["DURACION_LLAMADA"]." Min";
                        array_push($Ve0t45zgsjhg,$Vm1av2iahduc);
                    }
                }

                $Vxc3fkadiyly[$Vaclaigdbtoo] = $Ve0t45zgsjhg;

                array_push($V1q5xkbcnn5z,$Vxc3fkadiyly);

            }
            
            $Vswcifil4f1s = DateTime::createFromFormat('U.u', microtime(true));
            $Vcusgarqg30y = $Vswcifil4f1s->format("d/m/Y");

            $Vpa2qbhtxuyd["error"]=0;
            $Vpa2qbhtxuyd["response"]=$Vxc3fkadiyly;
            $Vpa2qbhtxuyd["response"]["total"]= $V2vps4uaencl." Minutos";
            $Vpa2qbhtxuyd["response"]["fecha"]= $Vcusgarqg30y;
            
        }else{
            $Vpa2qbhtxuyd["error"]=1;
            $Vpa2qbhtxuyd["response"]="No se encontró información.";
        }
    }


echo json_encode($Vpa2qbhtxuyd);
?>