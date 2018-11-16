<?php
	
	
   	$Vzrfuqqa3k0y = array();
	if(isset($Vfb4ihbdv1aj)){
		foreach($Vfb4ihbdv1aj as $Vutaiebycwbq){
			$V4asx0ody05s = array();
			$V4asx0ody05s["numeroCupon"] = $Vutaiebycwbq["anumeroCupon"];
			$V4asx0ody05s["tipoCupon"] = $Vutaiebycwbq["atipoCupon"];
			array_push($Vzrfuqqa3k0y,$V4asx0ody05s);
		}
	}


	$Vpa2qbhtxuyd["error"]=(int)!(sizeof($Vzrfuqqa3k0y)>0);
	$Vpa2qbhtxuyd["response"] = sizeof($Vzrfuqqa3k0y)>0?$Vzrfuqqa3k0y[0]:"No tienes un código de cupón disponible para compartir";
   
	
	

    echo json_encode($Vpa2qbhtxuyd);
?>