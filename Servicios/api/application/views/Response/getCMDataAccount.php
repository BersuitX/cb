<?php
$Vktnbvtvrwhf=$Vhu2a2k1d152->getArray($Vcdjt2pn4qx0);

$Vzrfuqqa3k0y=array();
foreach ($Vktnbvtvrwhf as $V22glf4dd10l) {

	foreach ($V22glf4dd10l as $V2xim30qek4u => $Vcnwqsowvhom) {
	    $Vm1av2iahduc[$V2xim30qek4u]=$Vhu2a2k1d152->esArray($Vcnwqsowvhom)?"":$Vcnwqsowvhom;
	}

	if ($Vm1av2iahduc["brand"]!="" && $Vm1av2iahduc["model"] !="") {
		array_push($Vzrfuqqa3k0y,$Vm1av2iahduc);
	}
}

$Vpa2qbhtxuyd=array("error"=>0,"response"=>$Vzrfuqqa3k0y);
echo json_encode($Vpa2qbhtxuyd);
?>
