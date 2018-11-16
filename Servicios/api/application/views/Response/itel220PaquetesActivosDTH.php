<?php

function convertirFecha($V4wm1yh1hmzr){
	if ($V4wm1yh1hmzr!="") {
		$V4wm1yh1hmzr =substr($V4wm1yh1hmzr, 0, 8);

		$Vu0ysz5e2s3l=substr($V4wm1yh1hmzr, 0, 4);
		$Vosrev0dmm3y=substr($V4wm1yh1hmzr, 4, 2);
		$Veoeds0ryrie=substr($V4wm1yh1hmzr, 6, 2);

		return $Vu0ysz5e2s3l."-".$Vosrev0dmm3y."-".$Veoeds0ryrie;
	}else{
		return "";
	}
}


   if (intval($Via43vbvg01c["CODIGO_RESPUESTA"])==1) {
	$Vpa2qbhtxuyd["error"]=0;
	$V0aohjdngkhs=$Vhu2a2k1d152->getArray($Via43vbvg01c["PARAMETROS"]);

	if (count($V0aohjdngkhs)>0) {
		$Viheqjajca5m=$V0aohjdngkhs[0]->PARAMETRO;

		if (isset($Viheqjajca5m->VALOR) && isset($Viheqjajca5m->VALOR->PAQUETE) ) {
			$Vzrfuqqa3k0y=$Vhu2a2k1d152->getArray($Viheqjajca5m->VALOR->PAQUETE);

			$Vqp44orrpo5r=array();

			foreach ($Vzrfuqqa3k0y as $Vutaiebycwbq) {
				$Vm1av2iahduc["CODIGO_PAQUETE"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->CODIGO_PAQUETE);
				$Vm1av2iahduc["NOMBRE_PAQUETE"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->NOMBRE_PAQUETE);
				$Vm1av2iahduc["TIPO"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->TIPO);
				$Vm1av2iahduc["FECHA_COMPRA"]=convertirFecha($Vhu2a2k1d152->arrayToString($Vutaiebycwbq->FECHA_COMPRA));
				$Vm1av2iahduc["FECHA_INICIO"]=convertirFecha($Vhu2a2k1d152->arrayToString($Vutaiebycwbq->FECHA_INICIO));
				$Vm1av2iahduc["FECHA_FIN"]=convertirFecha($Vhu2a2k1d152->arrayToString($Vutaiebycwbq->FECHA_FIN));
				$Vm1av2iahduc["ESTADO"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->ESTADO);
				$Vm1av2iahduc["DESCRIPCION_LARGA"]=$Vhu2a2k1d152->arrayToString($Vutaiebycwbq->DESCRIPCION_LARGA);

				array_push($Vqp44orrpo5r, $Vm1av2iahduc);
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
    	$Vpa2qbhtxuyd["response"]="No se encontraron paquetes de televisión activos.";
   }

	echo json_encode($Vpa2qbhtxuyd);
?>