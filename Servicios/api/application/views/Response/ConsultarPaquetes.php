<?php
    
   $Vpa2qbhtxuyd["error"]=0;
   
   $Vzrfuqqa3k0y = array();
   if(isset($Vqthw2sfug3p,$Vqthw2sfug3p["aPaquete"]) && sizeof($Vqthw2sfug3p["aPaquete"]) > 0){
		
		foreach ($Vqthw2sfug3p["aPaquete"] as $Vutaiebycwbq){
			$Vm1av2iahduc=array(
				"categoria"=>$Vutaiebycwbq["acategoriaPaquete"],
			    "codigo"=>$Vutaiebycwbq["acodigoPaquete"],
			    "descripcion"=>$Vutaiebycwbq["adescripcion"],
			    "nombre"=>$Vutaiebycwbq["anombre"],
			    "id"=>$Vutaiebycwbq["apaqueteID"],
			    "precio"=>$Vutaiebycwbq["aprecio"],
			    "tipo"=>$Vutaiebycwbq["atipoPaqueteID"]
			);

			array_push($Vzrfuqqa3k0y,$Vm1av2iahduc);
		}
		
   }

   
   $Vpa2qbhtxuyd["response"]=$Vzrfuqqa3k0y;

    echo json_encode($Vpa2qbhtxuyd);
?>