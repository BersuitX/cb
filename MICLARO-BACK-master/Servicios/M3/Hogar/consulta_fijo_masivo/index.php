<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.22.84.4:8080/AmigoClaroFijoWS/AmigoClaroFijo?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

      $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
    	$Vqhzkfsafzrc->lineaFija=$Vcw3r1lhk5bx->AccountId;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
        if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns2consulta_fijo_masivoResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            
            
    $Vlfwkhon2bz0["error"]=0;
    $Vw10cior02ni = array();
    
    if(isset($VqhzkfsafzrcRes->return)){
        if(sizeof($VqhzkfsafzrcRes->return) == 3){
            $Vefg3z2drv15 = $VqhzkfsafzrcRes->return[2];
            $Vsdsotjnphcl = explode('|', $Vefg3z2drv15);

            $Vz1gkvk0n5xn = sizeOf($Vsdsotjnphcl);
            if($Vz1gkvk0n5xn > 1){
                unset($Vsdsotjnphcl[$Vz1gkvk0n5xn-1]);
                foreach ($Vsdsotjnphcl as $Vnqybw355ld1){
                    $Virsew13xpli = explode(',', $Vnqybw355ld1);
                    if(strlen($Virsew13xpli[0]) == 10){
                        array_push($Vw10cior02ni, $Virsew13xpli[0]);
                    }else{
                        $Vlfwkhon2bz0["data"] = "El numero no contiene los caracteres válidos";    
                        $Vlfwkhon2bz0["num"] = $Virsew13xpli[0];   
                    }
                }
                $Vlfwkhon2bz0["lista"] = $Vsdsotjnphcl;
            }else{
                $Vlfwkhon2bz0["data"] = "El usuario no tiene elegidos";    
            }
        }else{
            $Vlfwkhon2bz0["data"] = "Falló el tamaño del atributo return"; 
        }
    }else{
        $Vlfwkhon2bz0["data"] = "No existe el atributo return";
    }

    $Vzvarhvycpzi = array("linea"=>$Vw10cior02ni);
    $Vlfwkhon2bz0["response"]=$Vzvarhvycpzi;

        }
    }
    else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }

    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json'); 
        
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }

    
});


$V0ojkog2p2jp->run();