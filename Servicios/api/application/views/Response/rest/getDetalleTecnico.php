<?php
	
	if(isset($Vvjmv0osqcis) && is_numeric($Vvjmv0osqcis)){
		$Vnb2hggtfonp["error"]=0;
		$Vnb2hggtfonpponse = array("nombre"=>$Vaclaigdbtoo,"documento"=>$Vvjmv0osqcis,"telefono"=>$Vk3bqhwsuplj,"carne"=>$V0elz010ra1h,"foto"=>"https://miclaroapp.com.co/api/index.php/v1/core/movil/fotoTecnico.json?idTecnico=".$Vvjmv0osqcis);

		foreach ($Vnb2hggtfonpponse as &$Vyotgbgs03ci) {
			$Vyotgbgs03ci = isset($Vyotgbgs03ci)?$Vyotgbgs03ci:'';
		}

		$Vnb2hggtfonp["response"] = $Vnb2hggtfonpponse;
	}else{
		$Vnb2hggtfonp["error"]=1;
		$Vnb2hggtfonp["response"] = "No hemos encontrado informaci�n para esta visita";
		$Vnb2hggtfonp["errData"] = "Error al consumir getDetalleTecnico";
	}
    
    echo json_encode($Vnb2hggtfonp);
?>