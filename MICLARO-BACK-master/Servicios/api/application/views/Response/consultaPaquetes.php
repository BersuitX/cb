<?php

    if (intval($Vxct2m1te0v4["codigo"])==1){
      $Vpa2qbhtxuyd["error"]=0;
      $Vpa2qbhtxuyd["response"]=$Vxct2m1te0v4["mensaje"];
    }else{
      $Vpa2qbhtxuyd["error"]=1;
      $Vpa2qbhtxuyd["response"]="No tienes suscripciones activas en este momento.";
    }


    echo json_encode($Vpa2qbhtxuyd);
?>