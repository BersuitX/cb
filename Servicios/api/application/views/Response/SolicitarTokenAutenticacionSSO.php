<?php

	$Vpa2qbhtxuyd["response"] = "No ha sido posible obtener el token para continuar";
	$Vpa2qbhtxuyd["error"]=1;

	if(isset($Veqekzxyjyqy) && $Veqekzxyjyqy == 1 ){
		$Vpa2qbhtxuyd["response"] = $Vpa2qbhtxuyd;
	}else if(!isset($Vqvk2zpccgcv)){
		$Vpa2qbhtxuyd["response"] = "No ha sido posible obtener el token para continuar";
		$Vpa2qbhtxuyd["error"]=1;
	}else{
		$Vpa2qbhtxuyd["error"]=0;
		$Vpa2qbhtxuyd["response"]=array(

			"fecha"=>( ( isset($Vqvk2zpccgcv["afecha"]) ) ? $Vqvk2zpccgcv["afecha"] : "" ),

			"autenticacion"=>((isset($Vqvk2zpccgcv["atokenAutenticacion"]))?$Vqvk2zpccgcv["atokenAutenticacion"]:""),

			"validacion"=>((isset($Vqvk2zpccgcv["atokenValidacion"]))?$Vqvk2zpccgcv["atokenValidacion"]:"")
			);
	}

    echo json_encode($Vpa2qbhtxuyd);

?>