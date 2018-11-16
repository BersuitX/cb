<?php
	$Vpa2qbhtxuyd["error"]=1;
	
	if(isset($Vb5hjbk2mbwk["codigoRespuesta"],$Vb5hjbk2mbwk["elegidoTO"]) && $Vb5hjbk2mbwk["codigoRespuesta"]=="0"){
		
		$Vzrfuqqa3k0y = array();
		if(isset($Vb5hjbk2mbwk["elegidoTO"]["listaElegidos"])){
			if($Vhu2a2k1d152->esArray($Vb5hjbk2mbwk["elegidoTO"]["listaElegidos"])){
				$Vzrfuqqa3k0y = $Vb5hjbk2mbwk["elegidoTO"]["listaElegidos"];
			}else{
				array_push($Vzrfuqqa3k0y, $Vb5hjbk2mbwk["elegidoTO"]["listaElegidos"]);
			}
		}

		$Vpa2qbhtxuyd["error"]=0;
		$Vpa2qbhtxuyd["response"] = $Vzrfuqqa3k0y;
	}else{
		$Vpa2qbhtxuyd["response"]=isset($Vb5hjbk2mbwk["mensaje"])?$Vb5hjbk2mbwk["mensaje"]:"En este momento no podemos atender tu solicitud";
		$Vpa2qbhtxuyd["data"] = $Vb5hjbk2mbwk;
	}

    echo json_encode($Vpa2qbhtxuyd);
?>