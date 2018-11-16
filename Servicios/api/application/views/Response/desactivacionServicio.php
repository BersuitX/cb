<?php

    if (intval($Vffrfba3dmuq["codigo"])==1){
      $Vpa2qbhtxuyd["error"]=0;
      $Vpa2qbhtxuyd["response"]=$Vffrfba3dmuq["mensaje"];
    }else{
      $Vpa2qbhtxuyd["error"]=1;
      $Vpa2qbhtxuyd["response"]="No puedes desactivar tu paquete en este momento.";
    }
    echo json_encode($Vpa2qbhtxuyd);
?>