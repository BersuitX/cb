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
	$Va2jtgbtbymm =  $Vyvmmv0t5uw2->getParam('tab');
	$V2pj2ebq5afb =  $Vyvmmv0t5uw2->getParam('web');
		
		if($Va2jtgbtbymm != null){	
			
			$Vpoigbqt5gug = $_SERVER['SERVER_NAME'];
			$Vocipgvijquz = isset($_SERVER['HTTPS'])?'s':'';
			$Votmxko4hrhx = 'http'.$Vocipgvijquz.'://'.$Vpoigbqt5gug;
			$V2bpoh5hagzp = '/api/content/img/banners/';
			$V2bpoh5hagzp .= $V2pj2ebq5afb?'web/':'movil/';
			$Vd3ix4cydurz = $V2pj2ebq5afb?'0':'1';
			$V2bpoh5hagzp = $Votmxko4hrhx.$V2bpoh5hagzp;

			

			$Vxt4rpyz0vlv=ConexDB('SELECT * FROM Banners where isActive=1 AND idSection='.$Va2jtgbtbymm.' AND isMobile ='.$Vd3ix4cydurz.'');
			
			

			 if (isset($Vxt4rpyz0vlv)) {
			 	foreach ($Vxt4rpyz0vlv as $Virsew13xpli) {
					$Virsew13xpli = (array)$Virsew13xpli;
				
				
				
				
				

			 		$Vqfboqlvdawn = $V2bpoh5hagzp.$Virsew13xpli["name"];
	        		$Vqfboqlvdawn = $Vqfboqlvdawn."?v=".date('Ymd');

	        		$Vtssepikoezf=array("target"=>$Virsew13xpli["url"],"image"=>$Vqfboqlvdawn);

		        	$Vlfwkhon2bz0["error"]=0;
					$Vlfwkhon2bz0["response"]=$Vtssepikoezf;
			 	}
	        	
        	}else{
        		$Vlfwkhon2bz0["error"]=1;
				$Vlfwkhon2bz0["response"]="No fue posible realizar la operación en este momento. Inténtalo de nuevo";
        	}
			
		}else{
			$Vlfwkhon2bz0["error"]=1;
			$Vlfwkhon2bz0["response"]="No fue posible realizar la operación en este momento. Inténtalo de nuevo";
		}
    
    
	
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
    
});


$V0ojkog2p2jp->run();