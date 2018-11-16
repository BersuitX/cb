<?php


   if (intval($Via43vbvg01c["CODIGO_RESPUESTA"])==1) {

	$Vpa2qbhtxuyd["error"]=0;
    $Vpa2qbhtxuyd["response"]=$Via43vbvg01c["DESCRIPCION"];

   }else{
      $Vpa2qbhtxuyd["error"]=1;
      $Vpa2qbhtxuyd["response"]=$Via43vbvg01c["DESCRIPCION"];
   }

	echo json_encode($Vpa2qbhtxuyd);
?>