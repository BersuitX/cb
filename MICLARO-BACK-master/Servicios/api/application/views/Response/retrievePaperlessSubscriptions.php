<?php
$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);

if (($Veqekzxyjyqy==1)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="Error al realizar la operación.";
}else{
    $Vpa2qbhtxuyd["error"]=0;
    if(isset($Vqx03dwmpl0l)){
        $V1q5xkbcnn5z=$Vhu2a2k1d152->getArray($Vqx03dwmpl0l);
        if(count($V1q5xkbcnn5z)>0){
            $Vnb2hggtfonp=array();
            foreach($V1q5xkbcnn5z as $Vutaiebycwbq){
                $Vm1av2iahduc=array();
                $Vm1av2iahduc["EmailAddress"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->EmailAddress);
                $Vm1av2iahduc["MobileNumber"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->MobileNumber);
                $Vm1av2iahduc["NotificationId"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->NotificationId);
                $Vm1av2iahduc["NotificationType"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->NotificationType);
                $Vm1av2iahduc["SendingDate"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->SendingDate);
                $Vm1av2iahduc["UserProfileID"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->UserProfileID);
                array_push($Vnb2hggtfonp,$Vm1av2iahduc);
            }
            $Vpa2qbhtxuyd["response"]=$Vnb2hggtfonp;
        }else{
            $Vpa2qbhtxuyd["error"]=0;
            $Vpa2qbhtxuyd["response"]=array();
        }
    }else{
        $Vpa2qbhtxuyd["error"]=0;
        $Vpa2qbhtxuyd["response"]=array();
    }
}

echo json_encode($Vpa2qbhtxuyd);
?>