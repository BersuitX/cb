<?php


   if (intval($Via43vbvg01c["CODIGO_RESPUESTA"])==1) {

	$Vpa2qbhtxuyd["error"]=0;
	$V1q5xkbcnn5z=$Vhu2a2k1d152->getArray($Via43vbvg01c["PARAMETROS"]);

	if (count($V1q5xkbcnn5z)>0) {
		$V1q5xkbcnn5z=$Vhu2a2k1d152->getArray($V1q5xkbcnn5z[0]->PARAMETRO);
	}

	$Vpa2qbhtxuyd["response"]=array("activo"=>0);
	foreach ($V1q5xkbcnn5z as $Vutaiebycwbq) {
		if (intval($Vutaiebycwbq->Name) == 510) {
			$Vpa2qbhtxuyd["response"]=array("activo"=>1);
			break;
		}
	}

   }else{
      $Vpa2qbhtxuyd["error"]=1;
      $Vpa2qbhtxuyd["response"]=$Via43vbvg01c["DESCRIPCION"];
   }

	echo json_encode($Vpa2qbhtxuyd);
?>