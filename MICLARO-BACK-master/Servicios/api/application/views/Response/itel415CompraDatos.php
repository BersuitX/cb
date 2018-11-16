<?php
	if (intval($Via43vbvg01c["CODIGO_RESPUESTA"])==1) {
		$Vpa2qbhtxuyd["error"]=0;
    	
   }else{
		$Vpa2qbhtxuyd["error"]=1;
		
   }


	$Vkjeqxxuqqru = strtolower($Via43vbvg01c["DESCRIPCION"]);

	if($Vkjeqxxuqqru == "transaction successful"){
		$Vkjeqxxuqqru = "Operación exitosa.";
	}else if($Vkjeqxxuqqru == "error database"){
		$Vkjeqxxuqqru = "Ha ocurrido un error. Intenta de nuevo.";
	}else if($Vkjeqxxuqqru == "insufficient funds"){
		$Vkjeqxxuqqru = "Saldo insuficiente";
	}else if($Vkjeqxxuqqru == "expired account"){
		$Vkjeqxxuqqru = "Tu cuenta está inactiva.";
	}else if($Vkjeqxxuqqru == "service is not active"){
		$Vkjeqxxuqqru = "Ha ocurrido un error. Intenta de nuevo.";
	}else{
		$Vkjeqxxuqqru = $Via43vbvg01c["DESCRIPCION"];
	}

	


	$Vpa2qbhtxuyd["error"]=1;
	$Vpa2qbhtxuyd["response"]=$Vkjeqxxuqqru;



	echo json_encode($Vpa2qbhtxuyd);
?>