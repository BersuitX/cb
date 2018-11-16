<?php
    if ($Voxep3jgmgpg=="SUCCESS"){
      $Vpa2qbhtxuyd["error"]=0;

      $Vpa2qbhtxuyd["response"]="Registro eliminado exitosamente.";
    }else{
      $Vpa2qbhtxuyd["error"]=1;

      if (isset($Vmbf2mvssbll) && $Vmbf2mvssbll) {
      	$V3iiokxda3xw=$Vhu2a2k1d152->arrayToString($Vmbf2mvssbll);

      	if ($V3iiokxda3xw!="") {
      		$Vpa2qbhtxuyd["response"]=$V3iiokxda3xw;
      	}else{
      		$Vpa2qbhtxuyd["response"]="No fue posible realizar la operación en este momento. Inténtalo de nuevo";
      	}
      }else{
      	$Vpa2qbhtxuyd["response"]="No fue posible realizar la operación en este momento. Inténtalo de nuevo";
      }

    }


    echo json_encode($Vpa2qbhtxuyd);
?>