<?php
	
	
	if(isset($Vaa4urpbqino)){
		$Vnb2hggtfonp["error"]=0;

		$Vb00j42bn41v = date('Y-m-d h:i:s',strtotime("+1 hour"));

		if(isset($Vkbv5sjmic1s)){
			list($V4wm1yh1hmzr, $Vyxp2dhcvnlx) = explode(' ',$Vkbv5sjmic1s);

			if(isset($Vyxp2dhcvnlx) && $Vyxp2dhcvnlx =! null){
				$Vb00j42bn41v = $Vkbv5sjmic1s;
			}else{
				$Vb00j42bn41v = $V4wm1yh1hmzr." 23:59:59";
			}
		}

		$Vnb2hggtfonpponse = array("direccion"=>$Vpzgnbowwr4g,"lat"=>$V4gybmh0wxzs,"long"=>$Vaoxlxlervzp,"hora"=>$Vb00j42bn41v,"id"=>$Vaa4urpbqino);

		foreach ($Vnb2hggtfonpponse as &$Vyotgbgs03ci) {
			$Vyotgbgs03ci = isset($Vyotgbgs03ci)?$Vyotgbgs03ci:'';
		}

		$Vnb2hggtfonp["response"] = $Vnb2hggtfonpponse;
	}else{
		$Vnb2hggtfonp["error"]=1;
		$Vnb2hggtfonp["response"] = "No hemos encontrado datos para esta visita";
		$Vnb2hggtfonp["errData"] = "Error al consumir getDetalleVisita";;
	}
    
    echo json_encode($Vnb2hggtfonp);
?>