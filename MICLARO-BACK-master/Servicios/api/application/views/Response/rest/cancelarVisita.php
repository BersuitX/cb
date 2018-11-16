<?php
    if(isset($Vsurujypifek) && $Vsurujypifek > 0){
        $Vpa2qbhtxuyd["error"]=1;
		$V1xbw5u31n0q = $Vv3gvm3x3hvm;
		$Vk1lq0v01k4v = "No existe Data ERROR:".$Vsurujypifek;
		if(isset($Vfeinw1hsfej) && sizeof($Vfeinw1hsfej) > 0 && $Vfeinw1hsfej[0] != null){
			$V1xbw5u31n0q = $Vfeinw1hsfej[0];
			$Vk1lq0v01k4v = $Vfeinw1hsfej;
		}
        $Vpa2qbhtxuyd["response"] = $V1xbw5u31n0q;
		$Vpa2qbhtxuyd["errData"]= $Vk1lq0v01k4v;
		$Vpa2qbhtxuyd["idError"]= $Vsurujypifek;
    }else{
		if( isset($Vfeinw1hsfej) && sizeof($Vfeinw1hsfej) > 0 ) {
			$Vpa2qbhtxuyd["error"]=0;
			$Vpa2qbhtxuyd["response"] = $Vfeinw1hsfej[0];
			$Vpa2qbhtxuyd["data"] = $Vfeinw1hsfej;
		}else{
			$Vpa2qbhtxuyd["error"]=0;
			$Vpa2qbhtxuyd["response"] = "Se ha cancelado correctamente tu visita, pronto ver�s reflejado el cambio en tu app";
		}
    }
    
    echo json_encode($Vpa2qbhtxuyd);
	
?>