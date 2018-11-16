<?php
    if($Vaugjh3k4n3n==0){
        $Vpa2qbhtxuyd["error"]=0;


        

        $Vcdsxekhgavl = date("Y-m-d", strtotime("-1 day", strtotime($Vdqcmm4p5ofg)));

        $Vpa2qbhtxuyd["response"]=array(
            "transactionId"=>$V251k3setn3g,
            "datetime"=>str_replace("T", " ", $Vsuvcvyfbhu0),
            "lastUpdated"=>str_replace("T", " ", $Vgfu5a25hnns),
            "activeProductName"=>$V0pcrdgxqlqt,
            "includedMB"=>number_format((float)$Vxclxd4pus20, 2, '.', ''),
            "availableMB"=>number_format((float)$Vdmo1fay4b5p, 2, '.', ''),
            "usedMB"=>number_format((float)$Vqmk33yrbiws, 2, '.', ''),
            "usedPercentage"=>$Vu2s41nmd2is,
            "activationDate"=>str_replace("T", " ", $V52cyfronqu4),
            "expirationDate"=>$Vcdsxekhgavl." 00:00:00",
            "showBuyButton"=>$Vfq4xkzs2uwj,
            "buyURL"=>((isset($Vbg5cxwqxplb)?$Vbg5cxwqxplb:"")),
            "history"=>$Vttueuabm3cj
        );
    }else if($Vaugjh3k4n3n==7){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="Solo se permiten consultas de lineas postpago.";
    }else if($Vaugjh3k4n3n==4){
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="Operador no identificado.";
    }else{
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="No se encontró información.";
    }

    
    echo json_encode($Vpa2qbhtxuyd);
?>