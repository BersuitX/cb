<?php
$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);

if (($Veqekzxyjyqy==1)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="Error al realizar la operación.";
}else{
    $Vpa2qbhtxuyd["error"]=0;

    $V1q5xkbcnn5z=array();

    if(isset($Vwlyxetaeswi)){
        $Vwlyxetaeswi = $Vhu2a2k1d152->getArray($Vwlyxetaeswi);
        
        foreach($Vwlyxetaeswi as $Vutaiebycwbq){

            $Vcnpu22u3frv = $Vhu2a2k1d152->esArray($Vutaiebycwbq->PlanAmount)?"":$Vutaiebycwbq->PlanAmount;
            $Vtpnxepmpisq["valorPlan"] = isset($Vtpnxepmpisq["valorPlan"])?$Vtpnxepmpisq["valorPlan"]:0;

            if(intval($Vcnpu22u3frv) > intval($Vtpnxepmpisq["valorPlan"]) ){
                $Vm1av2iahduc["PlanID"]=$Vhu2a2k1d152->esArray($Vutaiebycwbq->PlanID)?"":$Vutaiebycwbq->PlanID;
                $Vm1av2iahduc["IsOpen"]=$Vhu2a2k1d152->esArray($Vutaiebycwbq->IsOpen)?"":$Vutaiebycwbq->IsOpen;
                $Vm1av2iahduc["PlanName"]=$Vhu2a2k1d152->esArray($Vutaiebycwbq->PlanName)?"":$Vutaiebycwbq->PlanName;
                $Vm1av2iahduc["PlanDescription"]=$Vhu2a2k1d152->esArray($Vutaiebycwbq->PlanDescription)?"":$Vutaiebycwbq->PlanDescription;
                $Vm1av2iahduc["PlanCode"]=$Vhu2a2k1d152->esArray($Vutaiebycwbq->PlanCode)?"":$Vutaiebycwbq->PlanCode;
                $Vm1av2iahduc["PlanAmount"]=$Vhu2a2k1d152->esArray($Vutaiebycwbq->PlanAmount)?"":$Vutaiebycwbq->PlanAmount;
                $Vm1av2iahduc["PlanVoiceUnit"]=$Vhu2a2k1d152->esArray($Vutaiebycwbq->PlanVoiceUnit)?"":$Vutaiebycwbq->PlanVoiceUnit;

                $Vm1av2iahduc["FrequentNumbersAllowed"]=isset($Vutaiebycwbq->FrequentNumbersAllowed)?$Vhu2a2k1d152->esArray($Vutaiebycwbq->FrequentNumbersAllowed)?"":$Vutaiebycwbq->FrequentNumbersAllowed:'';
                $Vm1av2iahduc["IsSharedDataPlan"]=isset($Vutaiebycwbq->IsSharedDataPlan)?$Vhu2a2k1d152->esArray($Vutaiebycwbq->IsSharedDataPlan)?"":$Vutaiebycwbq->IsSharedDataPlan:'';
                
                if($Vtpnxepmpisq["LineOfBusiness"]!=2){
                    $Valrtd4np4p5=$Vhu2a2k1d152->getArray($Vutaiebycwbq->PlanLines);
                    foreach($Valrtd4np4p5 as $Vkyrcrjxbscu){
                        unset($Vkyrcrjxbscu->FeatureCode);
                    }
                    $Vm1av2iahduc["PlanLines"]=$Valrtd4np4p5;
                }

                array_push($V1q5xkbcnn5z,$Vm1av2iahduc);
            }
                
        }

        $Vpa2qbhtxuyd["response"]=$V1q5xkbcnn5z;

        
        
    }else{
        $Vpa2qbhtxuyd["response"]=array();
    }
}

echo json_encode($Vpa2qbhtxuyd);
?>