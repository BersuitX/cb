<?php
$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);

if (($Veqekzxyjyqy==1)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="Error al realizar la operación.";
}else{

    if(isset($Vck2heshgnfl)){
        $V1q5xkbcnn5z=$Vhu2a2k1d152->getArray($Vck2heshgnfl);
        if (count($V1q5xkbcnn5z) >0){
            $Vpa2qbhtxuyd["error"]=0;
            $Vpa2qbhtxuyd["response"]=$V1q5xkbcnn5z;
        }else{
            $Vpa2qbhtxuyd["error"]=1;
            $Vpa2qbhtxuyd["response"]="No se encontraron resultados.";
        }
    }else{
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="No se encontraron resultados.";
    }
}

echo json_encode($Vpa2qbhtxuyd);
?>