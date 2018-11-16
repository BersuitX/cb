<?php
    $Veqekzxyjyqy= 1;
    $Vonnn0nfpbux = "Temporalmente este módulo no se encuentra disponible";
    
    if(isset($Valrtd4np4p5,$Valrtd4np4p5["aPlanLines"])){
         
      $Veqekzxyjyqy= 0;
        $Vxysmern3ugr = $Vhu2a2k1d152->getArray($Valrtd4np4p5["aPlanLines"]);
        $Vonnn0nfpbux = array();

        for ($Vep0df0xosaw=0; $Vep0df0xosaw < sizeof($Vxysmern3ugr); $Vep0df0xosaw++) {

          $V5ozzo11urso = $Vxysmern3ugr[$Vep0df0xosaw];

          $Vcnpu22u3frv = isset($V5ozzo11urso->aplanAmount)?$V5ozzo11urso->aplanAmount:0;

          if(isset($Vtpnxepmpisq["valorPlan"])){
            $Vtpnxepmpisq["valorPlan"] = str_replace('$','',$Vtpnxepmpisq["valorPlan"]);
            $Vtpnxepmpisq["valorPlan"] = str_replace('.','',$Vtpnxepmpisq["valorPlan"]);
          }else{
            $Vtpnxepmpisq["valorPlan"] = 0;
          }
           

          if(intval($Vcnpu22u3frv) >= intval($Vtpnxepmpisq["valorPlan"]) ){
            
            $Vep0df0xosawtem = array();
            $Vep0df0xosawtem["PlanID"] = isset($V5ozzo11urso->aplanID)?$V5ozzo11urso->aplanID:'';
            $Vep0df0xosawtem["IsOpen"] = isset($V5ozzo11urso->IsOpen)?$V5ozzo11urso->IsOpen:'';
            $Vep0df0xosawtem["PlanName"] = isset($V5ozzo11urso->aplanName)?$V5ozzo11urso->aplanName:'';
            $Vep0df0xosawtem["PlanDescription"] = isset($V5ozzo11urso->aplanDescription)?$V5ozzo11urso->aplanDescription:'';
            $Vep0df0xosawtem["PlanCode"] = isset($V5ozzo11urso->aplanCode)?$V5ozzo11urso->aplanCode:'';
            $Vep0df0xosawtem["PlanAmount"] = isset($V5ozzo11urso->aplanAmount)?$V5ozzo11urso->aplanAmount:'';
            $Vep0df0xosawtem["PlanVoiceUnit"] = isset($V5ozzo11urso->aplanVoiceUnit)?$V5ozzo11urso->aplanVoiceUnit:'';
            $Vep0df0xosawtem["FrequentNumbersAllowed"] = isset($V5ozzo11urso->afrequentNumbersAllowed)?$V5ozzo11urso->afrequentNumbersAllowed:'';
            $Vep0df0xosawtem["IsSharedDataPlan"] = isset($V5ozzo11urso->aisSharedDataPlan)?(is_string($V5ozzo11urso->aisSharedDataPlan)?$V5ozzo11urso->aisSharedDataPlan:''):'';

            $Vep0df0xosawtem["PlanLines"] = array();
            
            if(isset($V5ozzo11urso->afeatures,$V5ozzo11urso->afeatures->aFeature)){
               
               $V2o1cm4mflyh = $Vhu2a2k1d152->getArray($V5ozzo11urso->afeatures->aFeature);
               
               for ($Vv3o4gn4ugio=0; $Vv3o4gn4ugio < sizeof($V2o1cm4mflyh); $Vv3o4gn4ugio++) {
                  $Vud13bcbbxbv = $V2o1cm4mflyh[$Vv3o4gn4ugio];

                  $Vep0df0xosawtem2 = array();
                  $Vep0df0xosawtem2["FeatureID"] = isset($Vud13bcbbxbv->afeatureID)?$Vud13bcbbxbv->afeatureID:'';
                  $Vep0df0xosawtem2["FeatureName"] = isset($Vud13bcbbxbv->afeatureName)?$Vud13bcbbxbv->afeatureName:'';
                  $Vep0df0xosawtem2["Quantity"] = isset($Vud13bcbbxbv->aquantity)?$Vud13bcbbxbv->aquantity:'';
                  $Vep0df0xosawtem2["Unit"] = isset($Vud13bcbbxbv->aunit)?$Vud13bcbbxbv->aunit:'';
                  array_push($Vep0df0xosawtem["PlanLines"], $Vep0df0xosawtem2);
               }
            }

            array_push($Vonnn0nfpbux, $Vep0df0xosawtem);
          }



        }
    }
    
    $Vonnn0nfpbuxonse["error"]=$Veqekzxyjyqy;
    $Vonnn0nfpbuxonse["response"]=$Vonnn0nfpbux;

    echo json_encode($Vonnn0nfpbuxonse);
?>