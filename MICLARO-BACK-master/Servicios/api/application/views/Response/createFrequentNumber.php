<?php
if ($Voxep3jgmgpg=="ERROR"){
    $Vpa2qbhtxuyd["error"]=1;


    if (!$Vhu2a2k1d152->esArray($Vmbf2mvssbll)) {
    	$Vpa2qbhtxuyd["response"]=$Vmbf2mvssbll;
    }else{
    	$Vpa2qbhtxuyd["response"]="Ya tienes la cantidad máxima de elegidos para este plan.";
    }
    

}else{
    $Vpa2qbhtxuyd["error"]=0;
    $Vpa2qbhtxuyd["response"]="Elegido agregado exitosamente.";
}
echo json_encode($Vpa2qbhtxuyd);
?>