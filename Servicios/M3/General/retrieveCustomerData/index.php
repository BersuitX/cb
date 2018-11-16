<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.35.240/SelfServiceMobile_Project/Services/Proxy_Pipelines/AccountManagement_PS?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
    
    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        
        
        
        
        $Vqhzkfsafzrc=$Vqhzkfsafzrc->cuenta;
        
        $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
        
        
        $this->curlWigi->URL=$this->urlServicio;
        $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
        
        $Vy5yyyefdntg = array();
        
        $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
          if($VqhzkfsafzrcRes["error"] == 0){
    
            $V4kfh5akqyzi = "ns2retrieveCustomerDataResponse";
    
            $Vlfwkhon2bz0 = array();
            $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
            $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];
    
    
            if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
                $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
          
    
        $Vvnmihjmkaad=(($VqhzkfsafzrcRes->AcknowledgementIndicator=="ERROR")?$VqhzkfsafzrcRes->AcknowledgementDescription:"");
    
        if($VqhzkfsafzrcRes->AcknowledgementIndicator=="SUCCESS"){
            $Vlfwkhon2bz0["error"]=0;
    
            $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
            if(isset($VqhzkfsafzrcRes["CustomerData"])){
                $V2sopdecqfo5 = (array)$VqhzkfsafzrcRes["CustomerData"];
            }
    
            $Vqhzkfsafzrcrespuesta["DocumentType"]=isset($V2sopdecqfo5["DocumentType"])?$V2sopdecqfo5["DocumentType"]:"";
            $Vqhzkfsafzrcrespuesta["DocumentNumber"]=isset($V2sopdecqfo5["DocumentNumber"])?$V2sopdecqfo5["DocumentNumber"]:"";
            $Vqhzkfsafzrcrespuesta["CustomerId"]=isset($V2sopdecqfo5["CustomerId"])?$V2sopdecqfo5["CustomerId"]:"";
            $Vqhzkfsafzrcrespuesta["Name"]=isset($V2sopdecqfo5["Name"])?$V2sopdecqfo5["Name"]:"";
            $Vqhzkfsafzrcrespuesta["LastName"]=isset($V2sopdecqfo5["LastName"])?$V2sopdecqfo5["LastName"]:"";
            
           
    
            $Vlfwkhon2bz0["response"]=$Vqhzkfsafzrcrespuesta; 
    
        }else{
            $Vlfwkhon2bz0["error"]=1;
            $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
            if(isset($VqhzkfsafzrcRes["AcknowledgementDescription"])){
                $Vxecysgizhzd = $VqhzkfsafzrcRes["AcknowledgementDescription"];
            }
            $Vlfwkhon2bz0["response"]=$Vxecysgizhzd;
        }
            }
    
        }else{
          $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
        }

        return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
        
        
        
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
    
   
});


$V0ojkog2p2jp->run();