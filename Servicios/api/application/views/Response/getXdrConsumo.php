<?php
    $Veqekzxyjyqy=0;
    if(intval($Vwa00m3pezrc["statusCode"])!=1){
        $Veqekzxyjyqy=1;
    }else if(isset($Vfbxmbgrb3ry) && count($Vfbxmbgrb3ry)>0){
        $Vfbxmbgrb3ry=$Vfbxmbgrb3ry[0];
        $Vfbxmbgrb3ry=$Vfbxmbgrb3ry["values"];
        $Vpa2qbhtxuyd["prueba"]=$Vfbxmbgrb3ry;

        $V1q5xkbcnn5z=array();
        foreach($Vfbxmbgrb3ry["mapArrayValues"] as $Vutaiebycwbq){
            $Vep0df0xosaw=0;
            foreach($Vfbxmbgrb3ry["mapArrayColumns"] as $Vgyipw3mhujb){
                $Vm1av2iahduc[$Vgyipw3mhujb]=$Vutaiebycwbq["registro"][$Vep0df0xosaw];
                $Vep0df0xosaw++;
            }
            array_push($V1q5xkbcnn5z,$Vm1av2iahduc);
        }
    }else{
        $Veqekzxyjyqy=1;
    }
?>
{
    "error":"<?=$Veqekzxyjyqy?>",
    "response":<?=(($Veqekzxyjyqy==0)?json_encode($V1q5xkbcnn5z):"No se encontró información.")?>
}