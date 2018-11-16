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
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();



$Vb1jhtbuqbys['urlServicio']="http://172.24.160.135:8080/CorpMobile_Project/Interfaces/WSDL/CorpMobileService_PS?wsdl";


$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    

    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

    $Vlfwkhon2bz0 = array();
    
    if($VqhzkfsafzrcRes["error"] == 0){
        $V4kfh5akqyzi = "ns2retrieveBusinessUnitResponse";
        
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            
            if(isset($VqhzkfsafzrcRes->BusinessUnit)){
                $Vlfwkhon2bz0["error"]=0; 
                $Vwmgafxuvzgd = strtoupper($VqhzkfsafzrcRes->BusinessUnit);
                
                $Vokcsk5ecfdo = 0;
                if($Vwmgafxuvzgd == "EMPRESAS"){
                    $Vokcsk5ecfdo = 1;
                }
                
                $Vlfwkhon2bz0["response"]= array("esEmpresa"=>$Vokcsk5ecfdo);
 
            }else{
                $Vlfwkhon2bz0["error"]=1; 
                $Vlfwkhon2bz0["response"]= "La información no se encuentra en el formato correcto";
            }
        }else{
            $Vlfwkhon2bz0["error"]=1; 
            $Vlfwkhon2bz0["response"] = "Ha ocurrido un error. Intenta de nuevo.";
        }
    }else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }

    



    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');


});


$V0ojkog2p2jp->run();