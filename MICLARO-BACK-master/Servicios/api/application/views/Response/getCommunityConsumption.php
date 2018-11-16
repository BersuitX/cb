<?php

    if($Vbez2rdvqreu["tnsindicator"]=="SUCCESS"){
        $Vpa2qbhtxuyd["error"]=0;
        $Vyx1tdl2pb1r= ((isset($V0afj2ggpgwl) && isset($V0afj2ggpgwl["tnsmember"]) )? $Vhu2a2k1d152->getArray($V0afj2ggpgwl["tnsmember"]) : array() );
        $Vanwdf4v5lkq=array();

        foreach ($Vyx1tdl2pb1r as $Vutaiebycwbq) {

            $V5aslautzlt5=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->tnsmember_consumption);

            $Vqitdmhhbo0r=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->tnsmember_assigned_quota);
            $Vqitdmhhbo0r = isset($Vqitdmhhbo0r)?intval($Vqitdmhhbo0r):0;
            if(isset($Vtpnxepmpisq["SO"]) && $Vtpnxepmpisq["SO"]=="android"){
                
            }

            $Vm1av2iahduc=array(
                "msisdn"=>$Vutaiebycwbq->tnsmsisdn,
                "member_consumption"=>(($V5aslautzlt5!="")?$V5aslautzlt5:"0"),
                "member_assigned_quota"=>(($Vqitdmhhbo0r!="")?$Vqitdmhhbo0r:"0"),
                );

            array_push($Vanwdf4v5lkq,$Vm1av2iahduc);
        }

        $Vtfrr3f3wp5j = $Vhu2a2k1d152->arrayToString($Vr4tg5fgl5hy["tnscommunity_total_quota"]);
        $Vtfrr3f3wp5j = isset($Vtfrr3f3wp5j)?intval($Vtfrr3f3wp5j):0;
        if(isset($Vtpnxepmpisq["SO"]) && $Vtpnxepmpisq["SO"]=="android"){
            
        }

        $Vpa2qbhtxuyd["response"]=array(
            "members"=>$Vanwdf4v5lkq,
            "total_quota"=>$Vtfrr3f3wp5j,
            "community_consumption"=>$Vhu2a2k1d152->arrayToString($Vr4tg5fgl5hy["tnscommunity_consumption"])
            );
    }else{
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]=$Vbez2rdvqreu["tnsmessage"];
    }

    echo json_encode($Vpa2qbhtxuyd);
?>