<?php
  

  $Vkoqtpzairgk = 1;
  $Vonnn0nfpbux = "No tienes paquetes para adquirir";
  
    $Vzrfuqqa3k0y = array();
  if(isset($Vqhfmovtjn4b,$Vqhfmovtjn4b["descripcion"],$Vqhfmovtjn4b["desSalPrc1"],$Vqhfmovtjn4b["desSalPrc2"])){

    

    
    if($Vqhfmovtjn4b["descripcion"] != "OK"){
      $Vonnn0nfpbux = $Vqhfmovtjn4b["descripcion"];
    }elseif ($Vqhfmovtjn4b["desSalPrc1"] != "OK") {
      $Vonnn0nfpbux = $Vqhfmovtjn4b["desSalPrc1"];
    }elseif ($Vqhfmovtjn4b["desSalPrc2"] != "OK") {
      $Vonnn0nfpbux = $Vqhfmovtjn4b["desSalPrc2"];
    }else{
      if(isset($Vqhfmovtjn4b["oferta"]) && sizeof($Vqhfmovtjn4b["oferta"]) > 0){
        $Vhu2a2k1d152->load->library('curl');
    $Vfeinw1hsfej=array("AccountId"=>$Vtpnxepmpisq["AccountId"],"LineOfBusiness" => "2");
    $Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/retrievePlan.json', array("data"=>$Vfeinw1hsfej));

      $Vnb2hggtfonp=json_decode($Vnb2hggtfonp);
      $Vnb2hggtfonpPlan = $Vnb2hggtfonp;
      $Vmpbkxmgpkt4 = false;

      if(isset($Vnb2hggtfonpPlan->error,$Vnb2hggtfonpPlan->response,$Vnb2hggtfonpPlan->response->datos) && ($Vnb2hggtfonpPlan->error == 0 && intval($Vnb2hggtfonpPlan->response->datos) > 0) || $Vnb2hggtfonpPlan->error == 1){
        $Vmpbkxmgpkt4 = true;
      }

        $Vzrfuqqa3k0ySi = array();
        $Vzrfuqqa3k0yNo = array();
        $Vzrfuqqa3k0yDatos = array();
        $Vvlm1ib4w2uf = array();
        $Vnb2hggtfonpDatos = array("12552", "12553", "12551");
        foreach ($Vqhfmovtjn4b["oferta"] as $V2xim30qek4u => $Vcnwqsowvhom) {
           $Ve2hzuvsvt0k = true;
           $Vqhfmovtjn4b["oferta"][$V2xim30qek4u]["newInstalada"] = 0;
           if($Vmpbkxmgpkt4 && in_array($Vqhfmovtjn4b["oferta"][$V2xim30qek4u]["snCode"] , $Vnb2hggtfonpDatos)){
            $Vqhfmovtjn4b["oferta"][$V2xim30qek4u]["instalada"] = "N";
            $Ve2hzuvsvt0k = false;
           }

          $Vqhfmovtjn4b["oferta"][$V2xim30qek4u]["habilitado"] = $Ve2hzuvsvt0k;
          
          if(!$Ve2hzuvsvt0k){
            array_push($Vzrfuqqa3k0yDatos, $Vqhfmovtjn4b["oferta"][$V2xim30qek4u]);
          }else{
            if( $Vqhfmovtjn4b["oferta"][$V2xim30qek4u]["instalada"] == "S"){
               array_push($Vzrfuqqa3k0ySi, $Vqhfmovtjn4b["oferta"][$V2xim30qek4u]);
            }else{
               array_push($Vzrfuqqa3k0yNo, $Vqhfmovtjn4b["oferta"][$V2xim30qek4u]);
            }
          }

        }

        $Vvlm1ib4w2uf = array_merge($Vzrfuqqa3k0yDatos,$Vzrfuqqa3k0ySi,$Vzrfuqqa3k0yNo);

        foreach ($Vvlm1ib4w2uf as $V2xim30qek4u => $Vcnwqsowvhom) {
          $Vvlm1ib4w2uf[$V2xim30qek4u]["imagen"] = "https://www.miclaroapp.com.co/archivos/redesIcons/ico_".$Vvlm1ib4w2uf[$V2xim30qek4u]["snCode"].".png";
          $Vvlm1ib4w2uf[$V2xim30qek4u]["solucionDesc"] =  ucfirst(strtolower(str_replace('_', ' ', $Vvlm1ib4w2uf[$V2xim30qek4u]["solucionDesc"])));

        }


        $Vqhfmovtjn4b["oferta"] = $Vvlm1ib4w2uf;
        $Vkoqtpzairgk= 0;
        $Vonnn0nfpbux = $Vqhfmovtjn4b;  
      }
    }
  }else{
    $Vonnn0nfpbux = "No existe descripción para la oferta";
  }

  $Vonnn0nfpbuxonse["error"]= $Vkoqtpzairgk;
  $Vonnn0nfpbuxonse["response"] = $Vonnn0nfpbux;
  $Vonnn0nfpbuxonse["datos"]= isset($Vnb2hggtfonpPlan,$Vnb2hggtfonpPlan->response,$Vnb2hggtfonpPlan->response->datos)?$Vnb2hggtfonpPlan->response->datos:"0";
    echo json_encode($Vonnn0nfpbuxonse);
?>