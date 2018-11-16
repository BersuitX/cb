<?php

	$Vpa2qbhtxuyd["error"]=1;
	$Vvswcdxzz04m = $Vtpnxepmpisq["accion"]=="d";
	if(isset($Vyll5gxufmrr,$Vyll5gxufmrr["acodigo"]) && $Vyll5gxufmrr["acodigo"]=="0"){
			$Vpa2qbhtxuyd["error"]=0;
			$Vi3ex0x5a4sl=$Vvswcdxzz04m?"desactivado":"activado";
			$Vpa2qbhtxuyd["response"] = "Tu servicio de familia y amigos se ha ".$Vi3ex0x5a4sl." correctamente";
	}else{
		$Vi3ex0x5a4sl=$Vvswcdxzz04m?"desactivar":"activar";
		$Vpa2qbhtxuyd["response"] = "No ha sido posible ".$Vi3ex0x5a4sl." tu servicio de familia y amigos";
	}

	$Vpa2qbhtxuyd["data"] = $Vyll5gxufmrr;

    echo json_encode($Vpa2qbhtxuyd);
?>