<?php
    $Veqekzxyjyqy=0;

    function arrSortObjsByKey($V2xim30qek4u, $Vrw5vvd4vhzk = 'DESC') {
        return function($Vqtrwdgbny00, $Vwkzrpaksezs) use ($V2xim30qek4u, $Vrw5vvd4vhzk) {
            
            if ($Vrw5vvd4vhzk == 'DESC') {
                list($Vqtrwdgbny00, $Vwkzrpaksezs) = array($Vwkzrpaksezs, $Vqtrwdgbny00);
            } 
            
            if (is_numeric($Vqtrwdgbny00[$V2xim30qek4u])) {
                return $Vqtrwdgbny00[$V2xim30qek4u] - $Vwkzrpaksezs[$V2xim30qek4u]; 
            } else {
                return strnatcasecmp($Vqtrwdgbny00[$V2xim30qek4u], $Vwkzrpaksezs[$V2xim30qek4u]); 
            }
        };
    }

    function converToKiloByte($Vcnpu22u3frv,$Vvncjr3mb1h5){

        if ($Vvncjr3mb1h5=="B") {
            return ($Vcnpu22u3frv/1024);
        }else if($Vvncjr3mb1h5=="KB"){
            return $Vcnpu22u3frv;
        }else if($Vvncjr3mb1h5=="MB"){
            return ($Vcnpu22u3frv*1024);
        }
    }
    

    
    if(isset($Vtpnxepmpisq["mesAnterior"]) && $Vtpnxepmpisq["mesAnterior"]){
      $Vosrev0dmm3y = intval(date('m'))-1;
      $Vfkita4q2q55 = 31;

      if($Vosrev0dmm3y == 0){
        $Vosrev0dmm3y = 12;
      }

      if($Vosrev0dmm3y == 2){
        $Vfkita4q2q55 = 28; 
      }else if($Vosrev0dmm3y == 4 || $Vosrev0dmm3y == 6 || $Vosrev0dmm3y == 9 || $Vosrev0dmm3y == 11){
        $Vfkita4q2q55 = 30; 
      }

      if($Vosrev0dmm3y < 10){
        $Vosrev0dmm3y = "0".$Vosrev0dmm3y;
      }


      $Vyndwztzuib5 = date("Y-$Vosrev0dmm3y-$Vfkita4q2q55");
      $Viglz2tv2bvy =  date("Y-$Vosrev0dmm3y-01");
   }


    $Vwbfabbmm5nn = array();
    $Vt0ma1mqcepv = array("ResumenLlamadas","ResumenMensajes","ResumenVarios");

    if(intval($Vwa00m3pezrc["statusCode"])!=1){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]=isset($Vwa00m3pezrc["statusMessage"])?$Vwa00m3pezrc["statusMessage"]:"Error al intentar obtener la información. Intentelo mas tarde.";
    }else{
        if(isset($Vfbxmbgrb3ry) && count($Vfbxmbgrb3ry)>0){
            $Vep3w5j3kzbu=0;
            $V1q5xkbcnn5z=array();
            foreach($Vfbxmbgrb3ry as $Vdew4d0bndwx){
                $Vv3o4gn4ugio=0;
                $Vmmsgw4jmxss=$Vdew4d0bndwx["values"];
                $Vaclaigdbtoo=$Vmmsgw4jmxss["arrayNameValue"];

                $Vqtrwdgbny00ttrs=array();
                $Vxc3fkadiyly=array();
                foreach($Vmmsgw4jmxss["mapArrayValues"] as $Vutaiebycwbq){
                    $Vep0df0xosaw=0;
                    $Vm1av2iahduc=array();
                    if(sizeof($Vmmsgw4jmxss["mapArrayColumns"]) > 0){
                        foreach($Vmmsgw4jmxss["mapArrayColumns"] as $Vgyipw3mhujb){
                            $Vm1av2iahduc[$Vgyipw3mhujb]=(( strpos($Vutaiebycwbq["registro"][$Vep0df0xosaw], ',') !== false )?floatval($Vutaiebycwbq["registro"][$Vep0df0xosaw]):$Vutaiebycwbq["registro"][$Vep0df0xosaw]);
                            $Vep0df0xosaw++;
                        }
                        $Vm1av2iahduc["tipo"]=$Vaclaigdbtoo;
                        
                        if ($Vm1av2iahduc["tipo"]=="DetalleLlamadas") {
                            $Vep3w5j3kzbu+=intval($Vm1av2iahduc["DURACION_LLAMADA"]);
                        }

                        if($Vaclaigdbtoo == "ResumenLlamadas"){
                            $Vm1av2iahduc["FechaInicial"]=$Vyndwztzuib5;
                            $Vm1av2iahduc["FechaFinal"]=$Viglz2tv2bvy;
                            $Vm1av2iahduc["TOTAL_SEGUNDOS"]=$Vep3w5j3kzbu;
                        }

                        array_push($Vqtrwdgbny00ttrs,$Vm1av2iahduc);
                    }


                    if(in_array($Vaclaigdbtoo,$Vt0ma1mqcepv)){
                        array_push($Vwbfabbmm5nn,$Vm1av2iahduc);
                    }else{
                        $V4yqak5kamr2 = 10;
                        if($Vv3o4gn4ugio < $V4yqak5kamr2){
                            
                            array_push($Vwbfabbmm5nn,$Vm1av2iahduc);  
                        }
                    }
                    $Vv3o4gn4ugio++;

                }
            }


            $V1q5xkbcnn5zConsumoDatos=array();
            $Vievjc4nuqog=0;


            foreach ($Vwbfabbmm5nn as $Vutaiebycwbq) {
                if ($Vutaiebycwbq["tipo"] == "TotalConsumoRatingGroup") {
                    
                    if (strpos($Vutaiebycwbq["RATING_GROUP_DESCRIPTION"], 'Consumo ') === false) {
                        $Vm1av2iahduc=array();
                        $Vm1av2iahduc["servicio"]=$Vutaiebycwbq["RATING_GROUP_DESCRIPTION"];
                        $Vm1av2iahduc["consumo"]=$Vutaiebycwbq["CONSUMO_TOTAL_RATING_GROUP"];
                        $Vm1av2iahduc["consumoUniversal"]=(String)converToKiloByte($Vutaiebycwbq["CONSUMO_TOTAL_RATING_GROUP"],$Vutaiebycwbq["UNIDAD_CONSUMO"]); 
                        $Vievjc4nuqog += $Vm1av2iahduc["consumoUniversal"];
                        $Vm1av2iahduc["unidad"]=$Vutaiebycwbq["UNIDAD_CONSUMO"];
                        $Vm1av2iahduc["color"]=array();
                        array_push($V1q5xkbcnn5zConsumoDatos,$Vm1av2iahduc);

                        usort($V1q5xkbcnn5zConsumoDatos ,arrSortObjsByKey('consumoUniversal'));
                    }

                }
            }

         

            $V0wewfh5zyn1=array(
                array('colorR' => '239','colorG' => '56','colorB' => '41','colorHexa' => '#EF3829'),
                array('colorR' => '31','colorG' => '151','colorB' => '174','colorHexa' => '#1F97AE'),
                array('colorR' => '25','colorG' => '197','colorB' => '160','colorHexa' => '#19C5A0'),
                array('colorR' => '251','colorG' => '217','colorB' => '44','colorHexa' => '#FBD92C'),
                array('colorR' => '251','colorG' => '183','colorB' => '31','colorHexa' => '#FBB71F'),
                array('colorR' => '245','colorG' => '132','colorB' => '43','colorHexa' => '#F5842B'),
                array('colorR' => '222','colorG' => '85','colorB' => '28','colorHexa' => '#DE551C'),
                array('colorR' => '176','colorG' => '14','colorB' => '13','colorHexa' => '#B00E0D'),
                array('colorR' => '251','colorG' => '57','colorB' => '125','colorHexa' => '#FB397D'),
                array('colorR' => '194','colorG' => '118','colorB' => '248','colorHexa' => '#C276F8'),
                array('colorR' => '131','colorG' => '107','colorB' => '252','colorHexa' => '#836BFC'),
                array('colorR' => '86','colorG' => '92','colorB' => '229','colorHexa' => '#565CE5'),
                array('colorR' => '82','colorG' => '125','colorB' => '252','colorHexa' => '#527DFC'),
                array('colorR' => '186','colorG' => '203','colorB' => '254','colorHexa' => '#BACBFE'),
                array('colorR' => '222','colorG' => '222','colorB' => '222','colorHexa' => '#DEDEDE'),
                array('colorR' => '235','colorG' => '235','colorB' => '235','colorHexa' => '#EBEBEB')
            );

            $Vqeydsff2x2d=array(
                array('colorR' => '75','colorG' => '75','colorB' => '75','colorHexa' => '#4b4b4b'),
                array('colorR' => '239','colorG' => '56','colorB' => '41','colorHexa' => '#EF3829'),
                array('colorR' => '113','colorG' => '113','colorB' => '113','colorHexa' => '#717171'),
                array('colorR' => '0','colorG' => '150','colorB' => '169','colorHexa' => '#0096a9'),
                array('colorR' => '149','colorG' => '149','colorB' => '149','colorHexa' => '#959595'),
                array('colorR' => '206','colorG' => '206','colorB' => '206','colorHexa' => '#cecece'),
                array('colorR' => '230','colorG' => '230','colorB' => '230','colorHexa' => '#e6e6e6'),
                array('colorR' => '238','colorG' => '238','colorB' => '238','colorHexa' => '#EEEEEE'),
                array('colorR' => '120','colorG' => '144','colorB' => '156','colorHexa' => '#78909c'),
                array('colorR' => '38','colorG' => '50','colorB' => '56','colorHexa' => '#263238'),
                array('colorR' => '0','colorG' => '131','colorB' => '143','colorHexa' => '#00838f'),
                array('colorR' => '13','colorG' => '71','colorB' => '161','colorHexa' => '#0D47A1'),
                array('colorR' => '183','colorG' => '28','colorB' => '28','colorHexa' => '#B71C1C'),
                array('colorR' => '33','colorG' => '150','colorB' => '243','colorHexa' => '#2196F3'),
                array('colorR' => '121','colorG' => '134','colorB' => '203','colorHexa' => '#7986CB'),
                array('colorR' => '0','colorG' => '150','colorB' => '136','colorHexa' => '#009688')
            );

            $Vkvkhb0s0mr4 = $V0wewfh5zyn1;

            if(isset($Vqthdlsgdszy,$Vqthdlsgdszy["cuenta"],$Vqthdlsgdszy["cuenta"]["esEmpresas"])){
                if($Vqthdlsgdszy["cuenta"]["esEmpresas"]){
                    $Vkvkhb0s0mr4 = $Vqeydsff2x2d;
                }
            }

            $V3iiokxda3xw=array();
            for ($Vep0df0xosaw=0; $Vep0df0xosaw < count($V1q5xkbcnn5zConsumoDatos); $Vep0df0xosaw++) { 
                $Vutaiebycwbq=$V1q5xkbcnn5zConsumoDatos[$Vep0df0xosaw];

                $Vnaykagdgs0l=((isset($Vkvkhb0s0mr4[$Vep0df0xosaw]))?$Vkvkhb0s0mr4[$Vep0df0xosaw]:$Vkvkhb0s0mr4[0]);
                $Vutaiebycwbq["color"]=$Vnaykagdgs0l;
                $Vutaiebycwbq["colorHexa"]=$Vnaykagdgs0l["colorHexa"];
                
                array_push($V3iiokxda3xw,$Vutaiebycwbq); 

            }

            array_push($Vwbfabbmm5nn,array("tipo"=>"estadistica","lista"=>$V3iiokxda3xw,"totalConsumo"=>number_format(($Vievjc4nuqog/1024), 2, '.', ' ') ." MB" ));

            $Vpa2qbhtxuyd["error"]=0;
            $Vpa2qbhtxuyd["response"]=$Vwbfabbmm5nn;
            $Vpa2qbhtxuyd["h"]=$Vqthdlsgdszy;
            
            
        }else{
            $Vpa2qbhtxuyd["error"]=1;
            $Vpa2qbhtxuyd["response"]="No se encontró información.";
        }
    }


echo json_encode($Vpa2qbhtxuyd);
?>