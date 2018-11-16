<?php

    if($Vbez2rdvqreu["tnsindicator"]=="SUCCESS"){
        
        $Vhclqh5314gx=false;
        if(sizeof($Vr4tg5fgl5hy) == 2){
            foreach ($Vr4tg5fgl5hy as &$V03w3zf5vwpf) {
                if(intval($Vtpnxepmpisq["type"]) == intval($V03w3zf5vwpf["tnscommunity_type"])){
                    $V0ncgzt0gi1w=$V03w3zf5vwpf;
                    $Vhclqh5314gx=true;
                }
            }
        }        
        $Vhclqh5314gx?$Vr4tg5fgl5hy=$V0ncgzt0gi1w:'';


        $Vb3yo04z2jaw = ((intval($Vtpnxepmpisq["type"])==1)?"Datos Compartidos":"Familia y Amigos");
        
        if (intval($Vtpnxepmpisq["type"])==intval($Vr4tg5fgl5hy["tnscommunity_type"])) {

            $Vpa2qbhtxuyd["error"]=0;
            $Vyx1tdl2pb1r=$Vhu2a2k1d152->getArray($Vr4tg5fgl5hy["tnsmembers"]["tnsmember"]);

            $Vpa2qbhtxuyd["response"]=$Vyx1tdl2pb1r;

            
            $Vanwdf4v5lkq=array();
            
            $V013metwpvxc = false;
            foreach ($Vyx1tdl2pb1r as $Vutaiebycwbq) {
                $Vm1av2iahduc=array(
                    "msisdn"=>$Vutaiebycwbq->tnsmsisdn,
                    "member_type"=>$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->tnsmember_type),
                    "state"=>$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->tnsstate)
                );

                
                if($Vtpnxepmpisq["AccountId"] == $Vutaiebycwbq->tnsmsisdn && $Vhu2a2k1d152->arrayToString($Vutaiebycwbq->tnsmember_type) == "ADMIN"){
                    $V013metwpvxc = true;
                }
                

                array_push($Vanwdf4v5lkq,$Vm1av2iahduc);
            }

            
            

            if($V013metwpvxc){
                $V4wm1yh1hmzr=$Vr4tg5fgl5hy["tnscreation_date"];

                if (isset($Vr4tg5fgl5hy["tnscreation_date"])) {
                    $V4wm1yh1hmzr = explode("T", $Vr4tg5fgl5hy["tnscreation_date"]);
                    if (count($V4wm1yh1hmzr)>0) {
                        $V4wm1yh1hmzr=$V4wm1yh1hmzr[0];
                    }
                }

                $Vtfrr3f3wp5j = $Vhu2a2k1d152->arrayToString($Vr4tg5fgl5hy["tnstotal_quota"]);
                $Vtfrr3f3wp5j = isset($Vtfrr3f3wp5j)?intval($Vtfrr3f3wp5j):0;
                if(isset($Vtpnxepmpisq["SO"]) && $Vtpnxepmpisq["SO"]=="android"){
                    
                }

                if(intval($Vtpnxepmpisq["type"])==1){
                    $Vhu2a2k1d152->load->library('curl');
                    $Vfeinw1hsfej=array("AccountId"=>$Vtpnxepmpisq["AccountId"],"community_id"=>$Vr4tg5fgl5hy["tnscommunity_id"]);
                    $Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/getCommunityConsumption.json', array("data"=>$Vfeinw1hsfej));
                    $Vnb2hggtfonp=json_decode($Vnb2hggtfonp);

                    if(isset($Vnb2hggtfonp->error,$Vnb2hggtfonp->response) && $Vnb2hggtfonp->error == 0){
                        $Vnb2hggtfonppConsumo = $Vnb2hggtfonp->response;
                    }
                }


                $Vpa2qbhtxuyd["response"]=array(
                    "members"=>$Vanwdf4v5lkq,
                    "type"=>$Vr4tg5fgl5hy["tnscommunity_type"],
                    "id"=>$Vr4tg5fgl5hy["tnscommunity_id"],
                    "creation_date"=>$V4wm1yh1hmzr,
                    "state"=>$Vr4tg5fgl5hy["tnsstate"],
                    "members_current"=>$Vhu2a2k1d152->arrayToString($Vr4tg5fgl5hy["tnscount_members_current"]),
                    "members_allowed"=>$Vhu2a2k1d152->arrayToString($Vr4tg5fgl5hy["tnscount_members_allowed"]),
                    "total_quota"=>$Vtfrr3f3wp5j,
                    "offerTerms"=>array(
                        "service_id"=>$Vr4tg5fgl5hy["tnsofferTerms"]["tnsservice_id"],
                        "service_type"=>$Vr4tg5fgl5hy["tnsofferTerms"]["tnsservice_type"],
                        "name"=>$Vhu2a2k1d152->arrayToString($Vr4tg5fgl5hy["tnsofferTerms"]["tnsname"]),
                        "description"=>$Vhu2a2k1d152->arrayToString($Vr4tg5fgl5hy["tnsofferTerms"]["tnsdescription"])
                    )
                );

                
                if(isset($Vnb2hggtfonppConsumo)){
                    $Vtdzywua5abn = array();
                    $Vpa2qbhtxuyd["response"]["consumoComunidad"]=$Vnb2hggtfonppConsumo;
                    if(isset($Vnb2hggtfonppConsumo->total_quota,$Vnb2hggtfonppConsumo->community_consumption)){
                        
                        $Vpfawx1ym10g = 1024*1024*1024;

                        $V2vps4uaencl = $Vnb2hggtfonppConsumo->total_quota/$Vpfawx1ym10g;
                        $V2uxpkfuoz5e = $Vnb2hggtfonppConsumo->community_consumption/$Vpfawx1ym10g;
                        $Vnb2hggtfonptante = $V2vps4uaencl-$V2uxpkfuoz5e;
                        

                        $Vs5xkcnkhy1l = 0;
                        foreach($Vnb2hggtfonppConsumo->members as $Vlnkcet4wpd0){
                            if($Vtpnxepmpisq["AccountId"] == $Vlnkcet4wpd0->msisdn){
                                $Vs5xkcnkhy1l = $Vlnkcet4wpd0->member_consumption/$Vpfawx1ym10g;
                                
                                
                            }
                        }


                        $V2uxpkfuoz5e = $V2uxpkfuoz5e - $Vs5xkcnkhy1l;

                        
                        $V2vps4uaenclTxt = number_format($V2vps4uaencl, 2, ',', '')." GB";
                        $V2uxpkfuoz5eTxt = number_format($V2uxpkfuoz5e, 2, ',', '')." GB";
                        $Vnb2hggtfonptanteTxt = number_format($Vnb2hggtfonptante, 2, ',', '')." GB";
                        $Vs5xkcnkhy1lTxt = number_format($Vs5xkcnkhy1l, 2, ',', '')." GB";
                        


                        $Vtdzywua5abn = array(
                            "total"=>$V2vps4uaencl,
                            "totalTxt"=>$V2vps4uaenclTxt,
                            "consumoComunidad"=>$V2uxpkfuoz5e,
                            "consumoComunidadTxt"=>$V2uxpkfuoz5eTxt,
                            "consumoPersonal"=>$Vs5xkcnkhy1l,
                            "consumoPersonalTxt"=>$Vs5xkcnkhy1lTxt,
                            "restante"=>$Vnb2hggtfonptante,
                            "restanteTxt"=>$Vnb2hggtfonptanteTxt
                        );
                    }
                    $Vpa2qbhtxuyd["response"]["totales"] = $Vtdzywua5abn;
                }else if(intval($Vtpnxepmpisq["type"])!=2){
                    $Vpa2qbhtxuyd["error"]=1;
                    $Vpa2qbhtxuyd["response"]="No cuentas con sonsumo de datos compartidos.";
                }
            }else{
                $Vpa2qbhtxuyd["error"]=1;
                $Vpa2qbhtxuyd["response"]="Actualmente perteneces a una comunidad de ".$Vb3yo04z2jaw.", si deseas gestionar algún cambio comunícate con la línea administradora.";
            }
        }else{
            $Vpa2qbhtxuyd["error"]=1;
            $Vpa2qbhtxuyd["response"]="La línea que intentas consultar no pertenece al servicio de ".$Vb3yo04z2jaw.".";
            
        }
        
        
    }else{
        $Vpa2qbhtxuyd["error"]=1;

        $Vnb2hggtfonpTx=$Vbez2rdvqreu["tnsmessage"];

        
        $Vnb2hggtfonpTx=$Vbez2rdvqreu["tnsmessage"];
        if(isset($Vnb2hggtfonpTx) && $Vnb2hggtfonpTx == 'Pending transaction'){
            $Vnb2hggtfonpTx = "La transacción se encuentra pendiente";
        }else if(isset($Vnb2hggtfonpTx) && $Vnb2hggtfonpTx == 'The member not complies with the conditions'){
            $Vnb2hggtfonpTx = "Ésta línea no cumple con las condiciones";
        }else if(isset($Vnb2hggtfonpTx) && $Vnb2hggtfonpTx == 'The member is already associated with another community'){
            $Vnb2hggtfonpTx = "Ésta línea ya se encuentra asociada a otra comunidad";
        }else if(isset($Vnb2hggtfonpTx) && $Vnb2hggtfonpTx == 'Member not found'){
            $Vnb2hggtfonpTx = "La línea no se encuentra en esta comunidad";
        }else if(isset($Vnb2hggtfonpTx) && $Vnb2hggtfonpTx == 'Quota Invalid'){
            $Vnb2hggtfonpTx = "Cuota invalida";
        }else if(isset($Vnb2hggtfonpTx) && $Vnb2hggtfonpTx == 'Community not found'){
            $Vnb2hggtfonpTx = "La línea que intentas consultar no pertenece al servicio de ".((intval($Vtpnxepmpisq["type"])==1)?"Datos Compartidos.":"Familia y Amigos.");
        }else if(isset($Vnb2hggtfonpTx) && $Vnb2hggtfonpTx == 'The member not complies with the conditions'){
            $Vnb2hggtfonpTx = "La línea no cumple las condiciones necesarias para agregarla a la comunidad";
        }
        $Vpa2qbhtxuyd["response"]=$Vnb2hggtfonpTx;
    }

    echo json_encode($Vpa2qbhtxuyd);
?>