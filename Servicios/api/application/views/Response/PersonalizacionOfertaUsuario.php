<?php
	$Vpa2qbhtxuyd["error"]= 1;
	$Vfgzj2e2dv5n = array();
	$Vcpo5d5lzgig = 0;
  $Vpa2qbhtxuyd["response"] = "No se pudo actualizar oferta de datos perzonalizado";
  if(isset($Vttjtj4hv5mg,$Vttjtj4hv5mg["descripcion"],$Vttjtj4hv5mg["desSal"])){
    if($Vttjtj4hv5mg["descripcion"] != "OK"){
			$Vpa2qbhtxuyd["response"] = $Vttjtj4hv5mg["descripcion"];
		}elseif ($Vttjtj4hv5mg["desSal"] != "OK") {
			$Vpa2qbhtxuyd["response"] = $Vttjtj4hv5mg["desSal"];
		}else{
			if(isset($Vtpnxepmpisq,$Vtpnxepmpisq["soluciones"])){
				foreach ($Vtpnxepmpisq["soluciones"] as $Vcnpu22u3frv) {
					if(intval($Vcnpu22u3frv["newInstalada"]) == 1 && $Vcpo5d5lzgig == 0){
						$Vfgzj2e2dv5n = $Vcnpu22u3frv;
						$Vcpo5d5lzgig = 1;
					}
				}
			}
			if($Vcpo5d5lzgig == 1){
				$Vhu2a2k1d152->load->library('curl');
				$Vfeinw1hsfej=array("codigoContrato"=>$Vtpnxepmpisq["codigoContrat"],"customerID"=>$Vtpnxepmpisq["imsi"],"AccountId"=>$Vtpnxepmpisq["AccountId"],"nombrePaquete"=>$Vfgzj2e2dv5n["solucionDesc"],"valor"=>$Vfgzj2e2dv5n["costoIva"]);
				
				$Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/NotificarCompraPaqueteElegible.json', array("data"=>$Vfeinw1hsfej));
			}
			$Vpa2qbhtxuyd["error"]= 0;
			
			$Vpa2qbhtxuyd["response"] = "Oferta de datos perzonalizado actualizado correctamente";  
		}
  }
    echo json_encode($Vpa2qbhtxuyd);
?>