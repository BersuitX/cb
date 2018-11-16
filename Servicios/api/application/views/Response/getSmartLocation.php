<?php

	$Vpa2qbhtxuyd["response"] = "No ha sido posible localizar el técnico";
	$Vpa2qbhtxuyd["error"]=1;
	$Vpa2qbhtxuyd["data"]=$Vonggw1m1ldp; 

	if(isset($Vbbxs45zbnif)){
		$Vpa2qbhtxuyd["errData"]= $V3ekboyqrtzr;
	}else if(isset($V2aluydoaxch) && $V2aluydoaxch != "0"){
		$Vpa2qbhtxuyd["errData"]= $V11dpqpkcbtz;
	}else if( isset($V2aluydoaxch) && $V2aluydoaxch == "0" && isset($Vonggw1m1ldp) ){
		if(isset($Vonggw1m1ldp["latitude"]) && isset($Vonggw1m1ldp["longitude"])){
			$Vyotgbgs03ci = array("lat"=>$Vonggw1m1ldp["latitude"],"lng"=>$Vonggw1m1ldp["longitude"]);
			$Vpa2qbhtxuyd["error"]=0;
			$Vpa2qbhtxuyd["response"]=$Vyotgbgs03ci;
		}else{
			$Vpa2qbhtxuyd["errData"]= "No hay posiciones disponibles para este técnico";
		}
	}else{
		$Vpa2qbhtxuyd["errData"]= "Error undefinido";
	}
    echo json_encode($Vpa2qbhtxuyd);

?>