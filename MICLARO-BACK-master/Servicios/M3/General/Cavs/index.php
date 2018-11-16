<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();


$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$V0ojkog2p2jp->map(['GET'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
    
	$Vlfwkhon2bz0  = array();

	$V4knq21vcdhc =  $Vyvmmv0t5uw2->getParam('lng');
	$V5gfdtcezhzr =  $Vyvmmv0t5uw2->getParam('lat');
		
	if($V5gfdtcezhzr != null && $V4knq21vcdhc != null){
	
	 	$V0w1kl1swdyj = 0.15;

		$Vautxf03llyt=ConexDB('SELECT * FROM Cavs_Puntos where Latitud > '.($V5gfdtcezhzr - $V0w1kl1swdyj).' AND Latitud < '.($V5gfdtcezhzr + $V0w1kl1swdyj).' AND Longitud < '.($V4knq21vcdhc + $V0w1kl1swdyj).' AND Longitud > '.($V4knq21vcdhc - $V0w1kl1swdyj));
		
		$Vtssepikoezf=array();

        for ($Vxja1abp34yq=0; $Vxja1abp34yq < count($Vautxf03llyt); $Vxja1abp34yq++) { 
        	$Vxja1abp34yqtem = (array)$Vautxf03llyt[$Vxja1abp34yq];
        	$Vuz2tqweebiu=array();
        	$Vuz2tqweebiu["idPunto"] = intval($Vxja1abp34yqtem["idPunto"]);
        	$Vuz2tqweebiu["idCiudad"] = intval($Vxja1abp34yqtem["idCiudad"]);
        	$Vuz2tqweebiu["idCategoria"] = intval($Vxja1abp34yqtem["idCategoria"]);
        	$Vuz2tqweebiu["Latitud"] = doubleval($Vxja1abp34yqtem["Latitud"]);
        	$Vuz2tqweebiu["Longitud"] = doubleval($Vxja1abp34yqtem["Longitud"]);
        	$Vuz2tqweebiu["Nombre"] = $Vxja1abp34yqtem["Nombre"];
        	$Vuz2tqweebiu["Direccion"] = $Vxja1abp34yqtem["Direccion"];

			if(strpos($Vxja1abp34yqtem["Direccion"], '<br>') !== false ) {
				$Vvs0hc5bhqj3 = explode("<br>", $Vxja1abp34yqtem["Direccion"]);
				$Vuz2tqweebiu["Direccion"]=$Vvs0hc5bhqj3[0];
			}

			$Vuz2tqweebiu["Horario"] = $Vxja1abp34yqtem["Horario"];
            array_push($Vtssepikoezf, $Vuz2tqweebiu);
        }

		$Vlfwkhon2bz0["error"]=0;
		$Vlfwkhon2bz0["response"]=$Vtssepikoezf;
	
	}else{
		$Vlfwkhon2bz0["error"]=1;
		$Vlfwkhon2bz0["response"]="No fue posible realizar la operación en este momento. Inténtalo de nuevo";
	}
  
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
    
});


$V0ojkog2p2jp->run();