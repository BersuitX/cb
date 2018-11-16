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
	if(strpos(strtolower($Vtpnxepmpisq["OldPlanPlanName"]),'prepago control') !== false){
	    $Vnb2hggtfonpponse["error"]= 1;
	    
	    $Vnb2hggtfonpponse["response"]='Actualmente ya tienes activo el Plan Prepago Control. <br /><br /> Ahora solo tienes que disfrutar porque en el Plan Prepago Control podrás navegar solo cuando compras tus paquetes favoritos y no tendrás cobros sorpresivos.';
	}else{
		$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);

		if (($Veqekzxyjyqy==1)){
		    $Vnb2hggtfonpponse["error"]=1;
		    $Vnb2hggtfonpponse["response"]=$Vmbf2mvssbll;
		}else{
			if (intval($Vtpnxepmpisq["LineOfBusiness"])==2) {
			    $Vnb2hggtfonpponse["error"]=0;
			    $Vnb2hggtfonpponse["response"]="El cambio de plan se realizó exitosamente, El cambio se verá reflejado en 24 horas.";
			}else{
			    $Vnb2hggtfonpponse["error"]=0;
			    $Vnb2hggtfonpponse["response"]="El cambio de plan se vera reflejado en tu próxima fecha de corte.";

			}
		}
	}
}
	
	echo json_encode($Vnb2hggtfonpponse);

?>