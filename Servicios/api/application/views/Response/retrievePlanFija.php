<?php
	$Vpa2qbhtxuyd["error"]=1;
	$Vpa2qbhtxuyd["response"]="En este momento no se encuentra disponible este módulo";
	if(isset($Voxep3jgmgpg,$Vyejrpiwledb,$Vyejrpiwledb["PlanCategories"]) && $Voxep3jgmgpg=="SUCCESS"){
		
		$Vsajzwxgsb1j = "TELEFONIA";

		$Vzrfuqqa3k0y = array();
		foreach ($Vyejrpiwledb["PlanCategories"] as $Vyh1bbs1ghno){
			if($Vyh1bbs1ghno["CategoryName"] == $Vsajzwxgsb1j){
				if(!empty($Vyh1bbs1ghno["CategoryDetailList"]["CategoryId"])){
					
					array_push($Vzrfuqqa3k0y,$Vyh1bbs1ghno["CategoryDetailList"]["CategoryId"]);
				}
			}
		}


		$Vonnn0nfpbux = array("linea"=>$Vzrfuqqa3k0y);
		$Vpa2qbhtxuyd["error"]=0;
		$Vpa2qbhtxuyd["response"]=$Vonnn0nfpbux;
	}else{
		
		isset($Voxep3jgmgpg)?$Vpa2qbhtxuyd["indicator"] = $Voxep3jgmgpg:false;
		isset($Vkiotg2espw2)?$Vpa2qbhtxuyd["code"] = $Vkiotg2espw2:false;
		isset($Vmbf2mvssbll)?$Vpa2qbhtxuyd["desc"] = $Vmbf2mvssbll:false;
	}

    echo json_encode($Vpa2qbhtxuyd);
?>