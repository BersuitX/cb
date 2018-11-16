<?php
   if (intval($Via43vbvg01c["CODIGO_RESPUESTA"])==1) {
	$Vpa2qbhtxuyd["error"]=0;
	$V0aohjdngkhs=$Vhu2a2k1d152->getArray($Via43vbvg01c["PARAMETROS"]);

	if (count($V0aohjdngkhs)>0) {
		$Viheqjajca5m=$V0aohjdngkhs[0]->PARAMETRO;

		if (isset($Viheqjajca5m->VALOR) && isset($Viheqjajca5m->VALOR->PAQUETE) ) {
			$Vzrfuqqa3k0y=$Vhu2a2k1d152->getArray($Viheqjajca5m->VALOR->PAQUETE);

			$Vqp44orrpo5r=array();

			foreach ($Vzrfuqqa3k0y as $Vutaiebycwbq) {
				$Vm1av2iahduc["TIPO"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->TIPO);
				$Vm1av2iahduc["NOMBRE"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->NOMBRE);
				$Vm1av2iahduc["CAPACIDAD"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->CAPACIDAD);
				$Vm1av2iahduc["CONSUMO"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->CONSUMO);
				$Vm1av2iahduc["FECHAEXPIRACION"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->FECHAEXPIRACION);
				$Vm1av2iahduc["FECHAACTIVACION"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->FECHAACTIVACION);

				if ($Vm1av2iahduc["TIPO"] !="" && ($Vm1av2iahduc["TIPO"] == "MIN" || $Vm1av2iahduc["TIPO"] == "SMS" || $Vm1av2iahduc["TIPO"] == "DATOS" ) ) { 



					$Vm1av2iahduc["CAPACIDAD"] = str_replace(' MB', '', $Vm1av2iahduc["CAPACIDAD"]);
					$Vm1av2iahduc["CONSUMO"] = str_replace(' MB', '', $Vm1av2iahduc["CONSUMO"]);

					if (intval($Vm1av2iahduc["CONSUMO"]) > intval($Vm1av2iahduc["CAPACIDAD"])) {
						$Vm1av2iahduc["CONSUMO"]=$Vm1av2iahduc["CAPACIDAD"];
					}

					$Vm1av2iahduc["CAPACIDAD"] == ""?$Vm1av2iahduc["CAPACIDAD"]="0":null;
					$Vm1av2iahduc["CONSUMO"] == ""?$Vm1av2iahduc["CONSUMO"]="0":null;

					$Vm1av2iahduc["FECHAEXPIRACION"]=explode(' ',$Vm1av2iahduc["FECHAEXPIRACION"]);
            		$Vm1av2iahduc["FECHAEXPIRACION"]=((count($Vm1av2iahduc["FECHAEXPIRACION"]))?$Vm1av2iahduc["FECHAEXPIRACION"][0]:"No disponible");

            		$Vmhvrtikjoya = date("Y");

            		

            		$Vm1av2iahduc["PORCENTAJE"] = 0;
            		if(intval($Vm1av2iahduc["CAPACIDAD"] > 0)){
            			$Vm1av2iahduc["PORCENTAJE"] = floor($Vm1av2iahduc["CONSUMO"] * 100/ $Vm1av2iahduc["CAPACIDAD"]);
            		}

					$Vm1av2iahduc["FECHAACTIVACION"]=explode(' ',$Vm1av2iahduc["FECHAACTIVACION"]);
            		$Vm1av2iahduc["FECHAACTIVACION"]=((count($Vm1av2iahduc["FECHAACTIVACION"]))?$Vm1av2iahduc["FECHAACTIVACION"][0]:"No disponible");

      
						
      

            		if (explode('-',$Vm1av2iahduc["FECHAEXPIRACION"])[0] != $Vmhvrtikjoya) {
						$Vm1av2iahduc["FECHAEXPIRACION"]="No disponible";
            		}

            		if (explode('-',$Vm1av2iahduc["FECHAACTIVACION"])[0] != $Vmhvrtikjoya) {
						$Vm1av2iahduc["FECHAACTIVACION"]="No disponible";
            		}

            		if ( (strpos( strtoupper($Vm1av2iahduc["NOMBRE"]) , strtoupper('refill') ) === false) && (strpos( strtoupper($Vm1av2iahduc["NOMBRE"]) , strtoupper('resolucion') ) === false)  ) {
						array_push($Vqp44orrpo5r, $Vm1av2iahduc);
            		}
				}
			}

			$Vpa2qbhtxuyd["error"]=0;
	    	$Vpa2qbhtxuyd["response"]=$Vqp44orrpo5r;
		}else{
			$Veqekzxyjyqy=1;
		}
	}else{
		$Veqekzxyjyqy=1;
	}
   }else{
   	$Veqekzxyjyqy=1;
   }

   if (isset($Veqekzxyjyqy)) {
		$Vpa2qbhtxuyd["error"]=1;
    	$Vpa2qbhtxuyd["response"]="No se encontraron paquetes de datos activos.";
   }

	echo json_encode($Vpa2qbhtxuyd);
?>