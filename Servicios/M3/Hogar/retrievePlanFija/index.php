<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.35.240:8080/SelfServiceFixed_Project/Services/Proxy_Pipelines/ServiceManagement_PS"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

     $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vqhzkfsafzrc=$Vqhzkfsafzrc->cuenta;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/retrievePlan\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

    
     if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns2retrievePlanResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

         
        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

            

    $Vlfwkhon2bz0["error"]=0; 
    $Vw10cior02ni = array();

   if(isset($VqhzkfsafzrcRes->Plan,$VqhzkfsafzrcRes->Plan->PlanCategories) && sizeof($VqhzkfsafzrcRes->Plan->PlanCategories) > 0){

    $Vk2kny1ct1iz = "TELEFONIA";

         foreach ($VqhzkfsafzrcRes->Plan->PlanCategories as $Virsew13xpli){
          
            $Virsew13xpli = (array)$Virsew13xpli;
            if(isset($Virsew13xpli["CategoryDetailList"])){
                $Vwcfco3irjhy = (array)$Virsew13xpli["CategoryDetailList"];
            }
           if($Virsew13xpli["CategoryName"] == $Vk2kny1ct1iz){
                if(!empty($Vwcfco3irjhy["CategoryId"])){
                    array_push($Vw10cior02ni,$Vwcfco3irjhy["CategoryId"]); 
                }
            }
        }
                $Vzvarhvycpzi = array("linea"=>$Vw10cior02ni);
                $Vlfwkhon2bz0["error"]=0;
                $Vlfwkhon2bz0["response"]=$Vzvarhvycpzi;
       
    }else{
        $Vlfwkhon2bz0["error"]=1; 
        $Vlfwkhon2bz0["response"]= "En este momento no se encuentra disponible este módulo";    
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