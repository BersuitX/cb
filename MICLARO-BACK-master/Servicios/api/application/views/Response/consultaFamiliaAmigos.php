<?php
	

	$Vpa2qbhtxuyd["error"]=1;
	if(isset($Vwbbqvatahll,$Vwbbqvatahll["acodigo"],$Vwbbqvatahll["aconsulta"]) && $Vwbbqvatahll["acodigo"]=="0"){
		 $V2t0k3veu1et = $Vwbbqvatahll["aconsulta"];
		 if(isset($V2t0k3veu1et["afacturable"],$V2t0k3veu1et["aservInstalado"],$V2t0k3veu1et["avalorConIva"])){

         	setlocale(LC_MONETARY, 'es_CO');

			$Vpa2qbhtxuyd["error"]=0;
			$Vyaokhicghg4 = array();
			$Vyaokhicghg4["facturable"] = (int)($V2t0k3veu1et["afacturable"]=="S");
			$Vyaokhicghg4["instalado"] = (int)($V2t0k3veu1et["aservInstalado"]=="S");
			$Vyaokhicghg4["valor"] = money_format("$%!.0n IVA incluido.",$V2t0k3veu1et["avalorConIva"]);
			$Vyaokhicghg4["servicio"] = $V2t0k3veu1et["asnCode"];
			$Vyaokhicghg4["paquete"] = $V2t0k3veu1et["aspCode"];


			
			
				$Vhu2a2k1d152->load->library('curl');
				$Vfeinw1hsfej=array("AccountId"=>$Vtpnxepmpisq["AccountId"],"type"=>"2");
				$Vnb2hggtfonp=$Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/getCommunityInformation.json', array("data"=>$Vfeinw1hsfej));

		        $Vnb2hggtfonp=json_decode($Vnb2hggtfonp);
		        $Vyaokhicghg4["getCommunityInformation"] = $Vnb2hggtfonp;
			

			$Vpa2qbhtxuyd["response"] = $Vyaokhicghg4;

			
			if(isset($Vyaokhicghg4["getCommunityInformation"]) && $Vyaokhicghg4["instalado"] == 1 ){
				
				if( $Vyaokhicghg4["getCommunityInformation"]->error == 1 ){
					$Vpa2qbhtxuyd["response"] = "En este momento tu solicitud se encuentra en proceso.";
					$Vpa2qbhtxuyd["error"]=1;
				}

				if($Vyaokhicghg4["getCommunityInformation"]->error == 1){
					$Vpa2qbhtxuyd["error"] = 1;
					$Vpa2qbhtxuyd["response"] = $Vyaokhicghg4["getCommunityInformation"]->response; 
				}
				
			}else{
				if(isset($Vyaokhicghg4["getCommunityInformation"])){
					unset($Vpa2qbhtxuyd["response"]["getCommunityInformation"]);
				}else{
					$Vpa2qbhtxuyd["error"] = 1;
					$Vpa2qbhtxuyd["response"] = "Temporalmente el servicio no se encuentra disponible";
				}
			}

			
		}else{
			$Vpa2qbhtxuyd["consulta"] = $V2t0k3veu1et;
			$Vpa2qbhtxuyd["response"] = "Temporalmente el servicio no se encuentra disponible";
		}
	}else{
      $Vpa2qbhtxuyd["consulta"] = $Vwbbqvatahll;
		$Vpa2qbhtxuyd["response"] = isset($Vwbbqvatahll["adescripcion"])?$Vwbbqvatahll["adescripcion"]:'Temporalmente el servicio no se encuentra disponible';
	}

    echo json_encode($Vpa2qbhtxuyd);
?>