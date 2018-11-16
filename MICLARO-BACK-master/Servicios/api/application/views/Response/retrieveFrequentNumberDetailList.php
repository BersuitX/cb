<?php

    $Vpa2qbhtxuyd["error"]=0;
    $Vzrfuqqa3k0y=array();

    if(isset($Vdrnohbwinab)){

        $V1q5xkbcnn5z=$Vhu2a2k1d152->getArray($Vdrnohbwinab);
        foreach($V1q5xkbcnn5z as $Vutaiebycwbq){
            
            $Vutaiebycwbq->PhoneNumber=(string)$Vutaiebycwbq->PhoneNumber;
            if (strlen($Vutaiebycwbq->PhoneNumber)==9) {
                $Vutaiebycwbq->PhoneNumber="0".$Vutaiebycwbq->PhoneNumber;
            }else{
                $Vutaiebycwbq->PhoneNumber="".$Vutaiebycwbq->PhoneNumber;
            }
            $Vutaiebycwbq->Name="";
            array_push($Vzrfuqqa3k0y,$Vutaiebycwbq);
        }
    }

    $Vpa2qbhtxuyd["response"]=$Vzrfuqqa3k0y;

    echo json_encode($Vpa2qbhtxuyd);
?>