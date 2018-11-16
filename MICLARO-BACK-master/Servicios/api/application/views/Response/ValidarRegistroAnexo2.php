<?php
$Vpa2qbhtxuyd["error"]=1;
$Vpa2qbhtxuyd["response"] = "No fue posible validar el imei, intentelo de nuevo más tarde.";

if(isset($Vqjnx0lrpelw) && $Vqjnx0lrpelw == "104"){
   $Vpa2qbhtxuyd["error"]= 0;
   

	$Vwiobsww4mo1 = array("ciudad"=>"","direccion"=>"");
	if(isset($Vhu2a2k1d152,$Vhu2a2k1d152->sessionUsuario,$Vhu2a2k1d152->sessionUsuario["cuenta"])){
		$Vhu2a2k1d152->load->library('curl');
        $Vfeinw1hsfej=array("AccountId"=>$Vhu2a2k1d152->sessionUsuario["cuenta"]["AccountId"],"LineOfBusiness"=>$Vhu2a2k1d152->sessionUsuario["cuenta"]["LineOfBusiness"]);
        $Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/retrieveCustomerData.json', array("data"=>$Vfeinw1hsfej));
        $Vnb2hggtfonp=json_decode($Vnb2hggtfonp);
        
        if(isset($Vnb2hggtfonp,$Vnb2hggtfonp->error,$Vnb2hggtfonp->response) && $Vnb2hggtfonp->error == 0){
        	$Vwiobsww4mo1["ciudad"] = isset($Vnb2hggtfonp->response->City)?$Vnb2hggtfonp->response->City:"";
        	$Vwiobsww4mo1["direccion"] = isset($Vnb2hggtfonp->response->Address)?$Vnb2hggtfonp->response->Address:"";
        }
	}

	$Vpa2qbhtxuyd["response"]= array("registrarIMEI"=>1,"ubicacion"=>$Vwiobsww4mo1);
   
}else if(isset($Vqwcx0gvxqv2) && $Vqwcx0gvxqv2 != ""){
	$Vpa2qbhtxuyd["response"]= $Vqwcx0gvxqv2;
}



echo json_encode($Vpa2qbhtxuyd);
?>  
