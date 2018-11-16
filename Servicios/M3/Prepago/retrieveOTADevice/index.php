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
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->LineOfBusiness=$Vcw3r1lhk5bx->LineOfBusiness;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
       if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns4retrieveOTADeviceResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        
        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;


        
        if($VqhzkfsafzrcRes->AcknowledgementIndicator=="SUCCESS") {

        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
        if(isset($VqhzkfsafzrcRes["Device"])){$Vzb25ex11kda = (array)$VqhzkfsafzrcRes["Device"];}


            $Vlfwkhon2bz0["error"]=0;
            $Vqhzkfsafzrcrespuesta["IMEINumber"]=isset($Vzb25ex11kda["IMEINumber"])?$Vzb25ex11kda["IMEINumber"]:"";
            $Vqhzkfsafzrcrespuesta["IsSuspended"]=isset($Vzb25ex11kda["IsSuspended"])?$Vzb25ex11kda["IsSuspended"]:"";
            $Vlfwkhon2bz0["response"]=$Vqhzkfsafzrcrespuesta;
               
        }
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