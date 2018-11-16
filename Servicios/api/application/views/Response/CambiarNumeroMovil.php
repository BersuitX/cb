<?php

$Vhu2a2k1d152->load->library('curl');
$Vfeinw1hsfej=array("AccountId"=>$Vtpnxepmpisq["AccountId"]);
$Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/ControlUsuariosPortabilidad.json', array("data"=>$Vfeinw1hsfej));
$V3wz4tbrjbdp = 0;

$Vnb2hggtfonp = json_decode($Vnb2hggtfonp);
if(isset($Vnb2hggtfonp->error) && $Vnb2hggtfonp->error == 0 ){
	$V3wz4tbrjbdp = 1;	
}else{
	$Vnb2hggtfonpponse["error"]= 1;
	$Vnb2hggtfonpponse["response"]=$Vnb2hggtfonp->response;
}

if($V3wz4tbrjbdp == 1){
    $Vnb2hggtfonp["numeroAsignado"]=$Vxsbe4qmiyx5;
    $Vnb2hggtfonpponse["error"]=0;
    $Vnb2hggtfonpponse["response"]=$Vnb2hggtfonp;
}

echo json_encode($Vnb2hggtfonpponse);
?>