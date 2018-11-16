<?php


   if ($Vshutuswofhp=="true") {
       $Vpa2qbhtxuyd["error"]=0;
       $Vpa2qbhtxuyd["response"]="Cuenta desasociada exitosamente.";
   }else{
       $Vpa2qbhtxuyd["error"]=1;
       $Vpa2qbhtxuyd["response"]="No es posible desasociar tu cuenta en este momento.";
   }
    echo json_encode($Vpa2qbhtxuyd);
?>