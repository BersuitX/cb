<?php


if (!isset($Vnerge3octhv)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="Error al realizar la operación.";
}else{
    $Vpa2qbhtxuyd["error"]=0;
    $Vpa2qbhtxuyd["response"]=array("estadoCuenta"=>((isset($Vnerge3octhv["ns2state"]))?$Vnerge3octhv["ns2state"]:"S"));
}

echo json_encode($Vpa2qbhtxuyd);
?>