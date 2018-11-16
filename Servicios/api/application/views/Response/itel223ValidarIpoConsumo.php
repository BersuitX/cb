<?php

	
	

	$Vpa2qbhtxuyd["error"]=1;

	$Vkjeqxxuqqru = strtolower($Via43vbvg01c["DESCRIPCION"]);

	if($Vkjeqxxuqqru == "transaction successful"){
		
		if(isset($Via43vbvg01c["PARAMETROS"],$Via43vbvg01c["PARAMETROS"]["PARAMETRO"])){
			$Vschrm24dzkm = $Via43vbvg01c["PARAMETROS"]["PARAMETRO"];

			$Vlnxfuunedzf = array();
			foreach ($Vschrm24dzkm as $Vwyse0flpyxh => $Vxxtccqydhzn) {
				if($Vxxtccqydhzn["NOMBRE"] == "Cobrar_Ipc"){
					$Vlnxfuunedzf = $Vxxtccqydhzn["VALOR"];
				}

				if($Vxxtccqydhzn["NOMBRE"] == "Valor_Ipc"){
					$VlnxfuunedzfValor = $Vxxtccqydhzn["VALOR"];
				}

				if($Vxxtccqydhzn["NOMBRE"] == "Ipc_Actual"){
					$VlnxfuunedzfAct = $Vxxtccqydhzn["VALOR"];
				}				
			}

			

			if(intval($Vlnxfuunedzf) == 0 && intval($VlnxfuunedzfAct) < intval($VlnxfuunedzfValor)){
				$Vpa2qbhtxuyd["error"]=0;
			}else{
				$Vkjeqxxuqqru = "El costo del impoconsumo excede al permitido";
			}

		}
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


	


	
	$Vpa2qbhtxuyd["response"]=$Vkjeqxxuqqru;



	echo json_encode($Vpa2qbhtxuyd);
?>