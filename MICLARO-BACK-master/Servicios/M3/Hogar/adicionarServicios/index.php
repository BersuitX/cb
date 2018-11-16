<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://192.168.18.76:8090/telmex/MTservice?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
    
    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    	$Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    	$Vqhzkfsafzrc->numeroCuenta=$Vcw3r1lhk5bx->AccountId;
        
        $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
        
        
        $this->curlWigi->URL=$this->urlServicio;
        $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
        
        $Vy5yyyefdntg = array();
        
        $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
        if($VqhzkfsafzrcRes["error"] == 0){
    
            $V4kfh5akqyzi = "ns2adicionarServiciosResponse";
    
            $Vlfwkhon2bz0 = array();
            $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
            $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];
    
        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            
            $Vpsm42ro4mkq= 1;
            $Vzvarhvycpzi= "Temporalmente este módulo no se encuentra disponible";


		    if(isset($VqhzkfsafzrcRes->adicionarServicios,$VqhzkfsafzrcRes->adicionarServicios->codigoError)){
		         
		        if($VqhzkfsafzrcRes->adicionarServicios->codigoError == "0"){
		            $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
		            $Vpsm42ro4mkq = 0;
		        if(isset($VqhzkfsafzrcRes["adicionarServicios"])){
		            $Vql3q2hrbb2u = (array)$VqhzkfsafzrcRes["adicionarServicios"];
		        }
		            $Vzvarhvycpzi = $Vql3q2hrbb2u["mensajeError"];
		        }else{
		            if(isset($VqhzkfsafzrcRes->adicionarServicios->mensajeError)){
		                if($VqhzkfsafzrcRes->adicionarServicios->mensajeError == "No se creo OT,Ya tiene Servicio"){
		                    $Vzvarhvycpzi = "No se completó el proceso. Este servicio ya se encuentra activo.";
		                }else{
		                    $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
		                     if(isset($VqhzkfsafzrcRes["adicionarServicios"])){
		                     $Vql3q2hrbb2u = (array)$VqhzkfsafzrcRes["adicionarServicios"];
		                        }
		                    $Vzvarhvycpzi = $Vql3q2hrbb2u["mensajeError"];    
		                }
		            }else{
		                $Vzvarhvycpzi = "Por el momento no ha sido posible realizar esta acción";
		            }
		        }
		    }
		    
			    $Vlfwkhon2bz0["error"]=$Vpsm42ro4mkq;
			    $Vlfwkhon2bz0["response"]=$Vzvarhvycpzi;
        }
    }
    else{
        $Vlfwkhon2bz0=$VqhzkfsafzrcRes;
    }

        return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json'); 
        
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
    
   
});


$V0ojkog2p2jp->run();