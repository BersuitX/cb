<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://itelnn.comcel.com.co:9999/ITEL/Core/Proxies/ejecutarTramaEspecifica_PS?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
   
        $Vqhzkfsafzrc=$Vqhzkfsafzrc->cuenta;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
	if($VqhzkfsafzrcRes["error"] == 0){

		
		$V4kfh5akqyzi = "ejecWS_Result";

		$Vlfwkhon2bz0 = array();
		$Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
		$Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


		if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
			$VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
			
		
    $Vlfwkhon2bz0["error"]=1;
    $Vx1rxn501yba = strtolower($VqhzkfsafzrcRes->MENSAJE->DESCRIPCION);

    if($Vx1rxn501yba == "transaction successful"){
        if(isset($VqhzkfsafzrcRes->MENSAJE->PARAMETROS,$VqhzkfsafzrcRes->MENSAJE->PARAMETROS->PARAMETRO)){
            $Vdgaj5zam5hd = $VqhzkfsafzrcRes->MENSAJE->PARAMETROS->PARAMETRO;

            $Vfdmertywwbw = array();
            foreach ($Vdgaj5zam5hd as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
                $V3jv1il2hqc3 = (array)$V3jv1il2hqc3;
                if($V3jv1il2hqc3["NOMBRE"] == "Cobrar_Ipc"){
                    $Vfdmertywwbw = $V3jv1il2hqc3;
                }
            }

            $Vfdmertywwbw = $Vdgaj5zam5hd->VALOR;
            $V3jv1il2hqc3al = $Vfdmertywwbw["VALOR"];

            if(intval($V3jv1il2hqc3al) == 0){
                $Vlfwkhon2bz0["error"]=0;
            }else{
                $Vx1rxn501yba = "El costo del ipoconsumo excede al permitido";
            }

        }
    }else if($Vx1rxn501yba == "error database"){
        $Vx1rxn501yba = "Ha ocurrido un error. Intenta de nuevo.";
    }else if($Vx1rxn501yba == "insufficient funds"){
        $Vx1rxn501yba = "Saldo insuficiente";
    }else if($Vx1rxn501yba == "expired account"){
        $Vx1rxn501yba = "Tu cuenta está inactiva.";
    }else if($Vx1rxn501yba == "service is not active"){
        $Vx1rxn501yba = "Ha ocurrido un error. Intenta de nuevo.";
    }else{
        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
        if(isset($VqhzkfsafzrcRes["MENSAJE"])){
            $V2twuswf1nsu["DESCRIPCION"] = $VqhzkfsafzrcRes["MENSAJE"];
        }
        $Vx1rxn501yba = $V2twuswf1nsu["DESCRIPCION"];
    }


    $Vlfwkhon2bz0["response"]=$Vx1rxn501yba;


		}
	}
	else {
		$Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
	}
	
    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
        
        
        
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();