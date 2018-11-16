<?php
require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

     $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;
        $Vco4iqxznewb=$Vqhzkfsafzrc->clave;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->nombreUsuario=$Vd10ichsd3g5->UserProfileID;
        $Vqhzkfsafzrc->clave=$Vco4iqxznewb->clave;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/solicitarTokenAutenticacionSSO\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
        if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "SolicitarTokenAutenticacionSSOResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

            
            
            $Vlfwkhon2bz0datos["response"] = "No ha sido posible obtener el token para continuar";
            $Vlfwkhon2bz0datos["error"]=1;

    if(isset($VqhzkfsafzrcRes->error) && $VqhzkfsafzrcRes->error == 1 ){
        $Vlfwkhon2bz0["response"] = $Vlfwkhon2bz0datos;
    }else if(!isset($VqhzkfsafzrcRes->tokenAutenticacionSSO)){
        $Vlfwkhon2bz0["response"] = "No ha sido posible obtener el token para continuar";
        $Vlfwkhon2bz0["error"]=1;
    }else{
        $Vlfwkhon2bz0["error"]=0;
        
        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;

        if(isset($VqhzkfsafzrcRes["tokenAutenticacionSSO"])){
            $Vra34fl3ukqa = (array)$VqhzkfsafzrcRes["tokenAutenticacionSSO"];
        }
        
        
        
        $Vqhzkfsafzrcrespuesta["fecha"]=isset($Vra34fl3ukqa["afecha"])?$Vra34fl3ukqa["afecha"]:"";
        $Vqhzkfsafzrcrespuesta["autenticacion"]=isset($Vra34fl3ukqa["atokenAutenticacion"])?$Vra34fl3ukqa["atokenAutenticacion"]:"";
        $Vqhzkfsafzrcrespuesta["validacion"]=isset($Vra34fl3ukqa["atokenValidacion"])?$Vra34fl3ukqa["atokenValidacion"]:"";
        
      
        $Vlfwkhon2bz0["response"]=$Vqhzkfsafzrcrespuesta;
   
   
    }
    
    
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