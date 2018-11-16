<?php


   if ($Vy0cfv1ojhmo=="success") {

    if(isset($Vjxsk4yvoxpt)){

      $Vjxsk4yvoxpt=$Vhu2a2k1d152->getArray($Vjxsk4yvoxpt);

      if (count($Vjxsk4yvoxpt)>0) {
        $Vjxsk4yvoxpt=$Vjxsk4yvoxpt[0];
         $Vug2fq1vpv1u="";
         
         foreach ($Vjxsk4yvoxpt->field as $Vutaiebycwbq) {
          if (is_string($Vutaiebycwbq)) {
            if (strpos($Vutaiebycwbq, 'http') !== false) {
              $Vug2fq1vpv1u=$Vutaiebycwbq;
            }
          }
         }

       
        $Vhu2a2k1d152->load->library('curl');

        $Vug2fq1vpv1u = str_replace("https://gestordocumental.comcel.com.co", "https://172.24.35.242",$Vug2fq1vpv1u);
        $Vfeinw1hsfej=array("url"=>$Vug2fq1vpv1u);

        $Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/codificacionContrato.json', array("data"=>$Vfeinw1hsfej));

        $Vnb2hggtfonp=json_decode($Vnb2hggtfonp);
        if ($Vnb2hggtfonp->error==1) {
          $Vm4k4kmdlbv0=1;
        }else{
          $Vnb2hggtfonpponse=$Vnb2hggtfonp;
        }


      }else{
        $Vm4k4kmdlbv0=1;
      }
    }else{
      $Vm4k4kmdlbv0=1;
     }
   }else{
      $Vm4k4kmdlbv0=1;
   }


   if (isset($Vm4k4kmdlbv0)) {

        $Vhu2a2k1d152->load->library('curl');
        $Vfeinw1hsfej=array("AccountId"=>$Vtpnxepmpisq["AccountId"],"LineOfBusiness"=>$Vtpnxepmpisq["LineOfBusiness"]);
        $Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/RegistrarConsultaContrato.json', array("data"=>$Vfeinw1hsfej));
     
       $Vnb2hggtfonpponse["error"]=1;
       $Vnb2hggtfonpponse["response"]="Estamos procesando tu solicitud, en 72 Horas hábiles podrás acceder a tu contrato por este medio.";
   }

    echo json_encode($Vnb2hggtfonpponse);
?>