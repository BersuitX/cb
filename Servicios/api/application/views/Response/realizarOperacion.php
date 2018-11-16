<?php
   $Vpa2qbhtxuyd["error"]=1;
   
   if(isset($Vb5hjbk2mbwk["codigoRespuesta"],$Vb5hjbk2mbwk["idTicket"],$Vb5hjbk2mbwk["mensaje"]) && $Vb5hjbk2mbwk["codigoRespuesta"]=="0"){
      
      $Vpa2qbhtxuyd["error"]=0;
      $Vpa2qbhtxuyd["response"]=$Vb5hjbk2mbwk["mensaje"];
   }else{
      $Vpa2qbhtxuyd["response"]=isset($Vb5hjbk2mbwk["mensaje"])?$Vb5hjbk2mbwk["mensaje"]:"En este momento no podemos atender tu solicitud";
      $Vpa2qbhtxuyd["data"] = $Vb5hjbk2mbwk;
   }

    echo json_encode($Vpa2qbhtxuyd);
?>