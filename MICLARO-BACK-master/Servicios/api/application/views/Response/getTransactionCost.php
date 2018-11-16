<?php

    if($Vbez2rdvqreu["tnsindicator"]=="SUCCESS"){
        $Vpa2qbhtxuyd["error"]=0;

        $V02gprmjqsqx=$Vhu2a2k1d152->arrayToString($Vuynhh5fjpqh);
        $V2rxeygi232m=$Vhu2a2k1d152->arrayToString($Vjstrp3qfedc);



        $Vpa2qbhtxuyd["response"]=array(
            "cost_recurrent"=>(($V2rxeygi232m!="")?"$".number_format($V2rxeygi232m, 0, ",", "."):"$0"),
            "cost_event"=>(($V02gprmjqsqx!="")?"$".number_format($V02gprmjqsqx, 0, ",", "."):"$0"),
            "cost_type"=>$Vhu2a2k1d152->arrayToString($V4xlbkvumld2),
            "cost_limit"=>$Vhu2a2k1d152->arrayToString($Vgkq2cqtvbfa)
            );
    }else{
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]=$Vbez2rdvqreu["tnsmessage"];
    }

    echo json_encode($Vpa2qbhtxuyd);
?>