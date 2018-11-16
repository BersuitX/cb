<?php

	if (intval($Vxpunv5gozsk["codigo"])==1) {

    	$Vpa2qbhtxuyd["error"]=0;
		$Vfeinw1hsfej["apellido"]=isset($Vxpunv5gozsk["apellido"])?$Vxpunv5gozsk["apellido"]:"";
		$Vfeinw1hsfej["ciudad"]=isset($Vxpunv5gozsk["ciudad"])?$Vxpunv5gozsk["ciudad"]:"";
		$Vfeinw1hsfej["departamento"]=isset($Vxpunv5gozsk["departamento"])?$Vxpunv5gozsk["departamento"]:"";
		$Vfeinw1hsfej["direccion"]=isset($Vxpunv5gozsk["direccion"])?$Vxpunv5gozsk["direccion"]:"";
		$Vfeinw1hsfej["municipio"]=isset($Vxpunv5gozsk["municipio"])?$Vxpunv5gozsk["municipio"]:"";
		$Vfeinw1hsfej["nombre"]=isset($Vxpunv5gozsk["nombre"])?$Vxpunv5gozsk["nombre"]:"";
		$Vfeinw1hsfej["segundoApellido"]=isset($Vxpunv5gozsk["segundoApellido"])?$Vxpunv5gozsk["segundoApellido"]:"";
    	$Vpa2qbhtxuyd["response"]=$Vfeinw1hsfej;

	}else{
    	$Vpa2qbhtxuyd["error"]=1;
    	$Vpa2qbhtxuyd["response"]="Los datos de consulta son invalidos";
	}

    echo json_encode($Vpa2qbhtxuyd);
?>