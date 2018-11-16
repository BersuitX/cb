<?php
	   
	$Vpa2qbhtxuyd["error"]=0;

	
	if(isset($Vfycqhs04lfs)){
		$Vpa2qbhtxuyd["error"]=(int)($Vfycqhs04lfs!='true');
		
	}
	

	$Vpa2qbhtxuyd["response"] = ($Vpa2qbhtxuyd["error"]?"No ha sido posible redimir el código.":"El código se ha redimido correctamente.");
	$Vpa2qbhtxuyd["data"] = $Vfycqhs04lfs;

	

    echo json_encode($Vpa2qbhtxuyd);
?>