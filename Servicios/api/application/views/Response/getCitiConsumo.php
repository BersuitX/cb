<?php
    $Veqekzxyjyqy=0;

    if(intval($Vwa00m3pezrc["statusCode"])!=1){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="En este momento no podemos atender esta solicitud, intenta nuevamente.";
    }else{
        if(isset($Vfbxmbgrb3ry) && count($Vfbxmbgrb3ry)>0){
            
            $V1q5xkbcnn5z=array();
            foreach($Vfbxmbgrb3ry as $Vdew4d0bndwx){
                $Vmmsgw4jmxss=$Vdew4d0bndwx["values"];
                $Vaclaigdbtoo=$Vmmsgw4jmxss["arrayNameValue"];
                
                $Ve0t45zgsjhg=array();
                $Vxc3fkadiyly=array();
                if($Vaclaigdbtoo!="HistorialPaquetes"){
                    foreach($Vmmsgw4jmxss["mapArrayValues"] as $Vutaiebycwbq){
                        $Vep0df0xosaw=0;
                        $Vm1av2iahduc=array();

                        if(sizeof($Vmmsgw4jmxss["mapArrayColumns"]) > 0){
                            foreach($Vmmsgw4jmxss["mapArrayColumns"] as $Vgyipw3mhujb){
                                
                                $Vutaiebycwbq["registro"][$Vep0df0xosaw] = str_replace(",",".",$Vutaiebycwbq["registro"][$Vep0df0xosaw]);
                                
                                
                                $Vm1av2iahduc[$Vgyipw3mhujb]=(( strpos($Vutaiebycwbq["registro"][$Vep0df0xosaw], ',') !== false )?floatval($Vutaiebycwbq["registro"][$Vep0df0xosaw]):$Vutaiebycwbq["registro"][$Vep0df0xosaw]);
                                $Vm1av2iahduc[$Vgyipw3mhujb]=isset($Vm1av2iahduc[$Vgyipw3mhujb])?$Vm1av2iahduc[$Vgyipw3mhujb]:"";

                                if(strpos(strtolower($Vgyipw3mhujb),'fecha') !== false){
                                    list($V4wm1yh1hmzr, $V5ozzo11urso) = explode('T',$Vm1av2iahduc[$Vgyipw3mhujb]);
                                    $Vm1av2iahduc[$Vgyipw3mhujb] = $V4wm1yh1hmzr;
                                }

                                $Vep0df0xosaw++;
                            }
                            array_push($Ve0t45zgsjhg,$Vm1av2iahduc);
                        }
                        

                    }
                    $Vxc3fkadiyly[$Vaclaigdbtoo] = $Ve0t45zgsjhg;
                    array_push($V1q5xkbcnn5z,$Vxc3fkadiyly);
                }
            }



            
            $Vxc3fkadiylyRes = array("transactionId"=>"transactionId","datetime"=>"fechaConsulta","activeProductName"=>"Nombre","lastUpdated"=>"actualizacion","includedMB"=>"MBsIncluidos","availableMB"=>"MBsDisponibles","usedMB"=>"MBsConsumidos","usedPercentage"=>"porcentajeUso","activationDate"=>"fechaActivacion","expirationDate"=>"fechaExpiracion");


            
            

            foreach ($V1q5xkbcnn5z as $Vt2m0cjszt4o){
                foreach ($Vt2m0cjszt4o as $Vxc3wogtferc=>$Vie44ejxcuh2){
                    if($Vxc3wogtferc!="HistorialPaquetes"){
                        
                        foreach ($Vie44ejxcuh2 as $V0llnsf23x0o){
                            foreach ($V0llnsf23x0o as $Vupwbddimcxt => $Vdffjd3ycyyd){
                                foreach($Vxc3fkadiylyRes as $Vihamhhivfan=>$VutaiebycwbqRes){
                                    if($VutaiebycwbqRes == $Vupwbddimcxt){
                                        
                                        if($Vxc3fkadiylyRes[$Vihamhhivfan] == "fechaExpiracion"){
                                            $Vdffjd3ycyyd = date('Y-m-d',strtotime($Vdffjd3ycyyd.' -1 day'));
                                        }

                                        if($Vihamhhivfan == "lastUpdated"){
                                            $V1q5xkbcnn5zFrcha = explode("T", $Vdffjd3ycyyd);
                                            $Vdffjd3ycyyd = $V1q5xkbcnn5zFrcha[0]." ".explode(".", $V1q5xkbcnn5zFrcha[1])[0];
                                        }


                                        
                                        

                                        $Vxc3fkadiylyRes[$Vihamhhivfan] = $Vdffjd3ycyyd;
                                    }    
                                }
                            }
                        }
                    }
                        
                }
            }

            $Vxc3fkadiylyRes["showBuyButton"]=false;
            $Vxc3fkadiylyRes["buyURL"]="";
            $Vxc3fkadiylyRes["history"]=[];
            

            
            $Vhu2a2k1d152->load->library('curl');
            $Vfeinw1hsfej=array("AccountId"=>$Vtpnxepmpisq["AccountId"],"canal"=>"xdr_prepago");
            $Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/rest/getSicconBlindaje.json', array("data"=>$Vfeinw1hsfej));
            $Vnb2hggtfonp=json_decode($Vnb2hggtfonp);
            $Vnb2hggtfonp = isset($Vnb2hggtfonp->response,$Vnb2hggtfonp->error)&&$Vnb2hggtfonp->error==0?$Vnb2hggtfonp->response:0;
            if(sizeof($Vnb2hggtfonp)>0){
                $Vnb2hggtfonp = $Vnb2hggtfonp[0];
            }

            if($Vnb2hggtfonp){
                if(isset($Vnb2hggtfonp->Descripcion) && $Vnb2hggtfonp->Descripcion == "0"){
                    $Vnb2hggtfonp->Descripcion = "";
                }
                $Vxc3fkadiylyRes["blindaje"] = $Vnb2hggtfonp;
            }
            
            $Vpa2qbhtxuyd["error"]=0;

            

            function toGB($Va4zo0rltynr){
                if (floatval($Va4zo0rltynr)>0){
                    return (floatval($Va4zo0rltynr)/1024);
                }else{
                    return 0;
                }
            }

            function formatDate($V3ti2nsbfgt2){
                if (isset($V3ti2nsbfgt2) && $V3ti2nsbfgt2 != null && $V3ti2nsbfgt2 != "" ){
                    $V3ti2nsbfgt2 = explode("T", $V3ti2nsbfgt2);
                    $V3ti2nsbfgt2 = $V3ti2nsbfgt2[0];
                    return $V3ti2nsbfgt2;
                }else{
                    return "";
                }
            }

            $Vfeinw1hsfej = (array)$Vxc3fkadiylyRes;

            $Vxc3fkadiylyPlan = array("total"=>0,"disponible"=>0,"consumido"=>0,"nombre"=>"","colorHexa"=>"#d8291c","colorRGB"=>array("r"=>"217","g"=>"41","b"=>"29"));


            if (floatval($Vfeinw1hsfej["includedMB"])>0) {

                $Vxc3fkadiylyPlan["total"]= toGB($Vfeinw1hsfej["includedMB"]);
                $Vxc3fkadiylyPlan["disponible"]= toGB($Vfeinw1hsfej["availableMB"]);
                $Vxc3fkadiylyPlan["consumido"]= toGB($Vfeinw1hsfej["usedMB"]);

                $Vxc3fkadiylyPlan["nombre"]= $Vfeinw1hsfej["activeProductName"];
            }

            $Vxc3fkadiylyBeneficio = array("total"=>0,"disponible"=>0,"consumido"=>0,"nombre"=>"","fechaInicio"=>"","fechaCorte"=>"","colorHexa"=>"#0097ab","colorRGB"=>array("r"=>"0","g"=>"151","b"=>"171"));

            if (isset($Vfeinw1hsfej["blindaje"]) && $Vfeinw1hsfej["blindaje"] != null) {
                $Vaqfth5cnh1b = floatval($Vfeinw1hsfej["blindaje"]->MBsIncluidos) - floatval($Vfeinw1hsfej["blindaje"]->MBsConsumidos);
                $Vxc3fkadiylyBeneficio["total"]= toGB($Vfeinw1hsfej["blindaje"]->MBsIncluidos);
                $Vxc3fkadiylyBeneficio["disponible"]= toGB($Vaqfth5cnh1b);
                $Vxc3fkadiylyBeneficio["consumido"]= toGB($Vfeinw1hsfej["blindaje"]->MBsConsumidos);


                $Vxc3fkadiylyBeneficio["nombre"]= $Vfeinw1hsfej["blindaje"]->Descripcion;
                $Vxc3fkadiylyBeneficio["fechaInicio"]= formatDate($Vfeinw1hsfej["blindaje"]->fechaActivacion);
                $Vxc3fkadiylyBeneficio["fechaCorte"]= formatDate($Vfeinw1hsfej["blindaje"]->fechaExpiracion);
            }


            $Vxc3fkadiylyTotal = array("total"=>0,"disponible"=>0,"consumido"=>0);

            $Vxc3fkadiylyTotal["total"]= $Vxc3fkadiylyBeneficio["total"] + $Vxc3fkadiylyPlan["total"];
            $Vxc3fkadiylyTotal["consumido"]= $Vxc3fkadiylyBeneficio["consumido"] + $Vxc3fkadiylyPlan["consumido"];
            $Vxc3fkadiylyTotal["disponible"]= $Vxc3fkadiylyTotal["total"] - $Vxc3fkadiylyTotal["consumido"];


            $Vxc3fkadiylyPlan["total"]=number_format($Vxc3fkadiylyPlan["total"], 2, ',', ' ');
            $Vxc3fkadiylyPlan["disponible"]=number_format($Vxc3fkadiylyPlan["disponible"], 2, ',', ' ');
            $Vxc3fkadiylyPlan["consumido"]=number_format($Vxc3fkadiylyPlan["consumido"], 2, ',', ' ');


            $Vxc3fkadiylyBeneficio["total"]=number_format($Vxc3fkadiylyBeneficio["total"], 2, ',', ' ');
            $Vxc3fkadiylyBeneficio["disponible"]=number_format($Vxc3fkadiylyBeneficio["disponible"], 2, ',', ' ');
            $Vxc3fkadiylyBeneficio["consumido"]=number_format($Vxc3fkadiylyBeneficio["consumido"], 2, ',', ' ');


            $Vxc3fkadiylyTotal["total"]=number_format($Vxc3fkadiylyTotal["total"], 2, ',', ' ');
            $Vxc3fkadiylyTotal["disponible"]=number_format($Vxc3fkadiylyTotal["disponible"], 2, ',', ' ');
            $Vxc3fkadiylyTotal["consumido"]=number_format($Vxc3fkadiylyTotal["consumido"], 2, ',', ' ');

            $Vxc3fkadiylyTotal["plan"] = $Vxc3fkadiylyPlan;
            $Vxc3fkadiylyTotal["beneficio"] = $Vxc3fkadiylyBeneficio;

            $Vxc3fkadiylyRes["estadisticas"]=$Vxc3fkadiylyTotal;

            $Vpa2qbhtxuyd["response"]=$Vxc3fkadiylyRes;

        }else{
            $Vpa2qbhtxuyd["error"]=1;
            $Vpa2qbhtxuyd["response"]="No se encontró información.";
        }
    }


echo json_encode($Vpa2qbhtxuyd);
?>