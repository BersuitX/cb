<?php
	$Vpa2qbhtxuyd["error"]=0;
	$Vzrfuqqa3k0y = array();
	
	if(isset($Vb5hjbk2mbwk)){
		if(sizeof($Vb5hjbk2mbwk) == 3){
			$Vsjhsmw2p3dq = $Vb5hjbk2mbwk[2];
			$Vwtlhd0o1ep0 = explode('|', $Vsjhsmw2p3dq);

			$Vgk4o3dwbfy2 = sizeOf($Vwtlhd0o1ep0);
			if($Vgk4o3dwbfy2 > 1){
				unset($Vwtlhd0o1ep0[$Vgk4o3dwbfy2-1]);
				foreach ($Vwtlhd0o1ep0 as $Vftjaym4uk1n){
					$Vutaiebycwbq = explode(',', $Vftjaym4uk1n);
					if(strlen($Vutaiebycwbq[0]) == 10){
						array_push($Vzrfuqqa3k0y, $Vutaiebycwbq[0]);
					}else{
						$Vpa2qbhtxuyd["data"] = "El numero no contiene los caracteres válidos";	
						$Vpa2qbhtxuyd["num"] = $Vutaiebycwbq[0];	
					}
				}
				$Vpa2qbhtxuyd["lista"] = $Vwtlhd0o1ep0;
			}else{
				$Vpa2qbhtxuyd["data"] = "El usuario no tiene elegidos";	
			}
		}else{
			$Vpa2qbhtxuyd["data"] = "Falló el tamaño del atributo return";	
		}
	}else{
		$Vpa2qbhtxuyd["data"] = "No existe el atributo return";
	}

	$Vonnn0nfpbux = array("linea"=>$Vzrfuqqa3k0y);
	$Vpa2qbhtxuyd["response"]=$Vonnn0nfpbux;

    echo json_encode($Vpa2qbhtxuyd);
?>