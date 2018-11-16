<?php
	 
	 if($Vviif1ikgcqz==0){
		$Vpa2qbhtxuyd["error"]=0;
		$Vpa2qbhtxuyd["response"] = array();
	 }else if(isset($Vschrm24dzkm)){
		$Vpa2qbhtxuyd["error"]=0;
		$Vpa2qbhtxuyd["response"] = $Vschrm24dzkm;
	 }else{
		$Vpa2qbhtxuyd["error"]=1;
		$Vpa2qbhtxuyd["response"] = "No hemos encontrado informaci�n para esta visita";
		$Vpa2qbhtxuyd["errData"] = "Error al consumir getActivities";
	 }
    
    echo json_encode($Vpa2qbhtxuyd);
?>