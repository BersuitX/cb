<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../../Core/vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/CustomerAccount/v2.0/?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 


$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

     $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;

    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    $Vy5yyyefdntg = array();
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
   

   if($VqhzkfsafzrcRes["error"] == 0){
      $V4kfh5akqyzi = "tnsgetSubscriberPackagesResponse";
        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

        if($VqhzkfsafzrcRes->responseStatus->code=="FS_ESB_0"){
            $Vlfwkhon2bz0["error"]=0;
            
            $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
            if(isset($VqhzkfsafzrcRes["customer"])){
                $Vgnvp52vmbfj = (array)$VqhzkfsafzrcRes["customer"];
            }else{
                $Vgnvp52vmbfj["documentNumber"] = "";
                $Vgnvp52vmbfj["documentType"] = "";
                $Vgnvp52vmbfj["firstName"] = "";
                $Vgnvp52vmbfj["lastName"] = "";
            }
        
            $Vd10ichsd3g5 = array("LineOfBusiness"=>"3",
                "AccountId"=>$Vqhzkfsafzrc->AccountId,
                "DocumentNumber"=>$Vgnvp52vmbfj["documentNumber"],
                "DocumentType"=>$Vgnvp52vmbfj["documentType"],
                "nombreCliente"=>$Vgnvp52vmbfj["firstName"],
                "apellidoCliente"=>$Vgnvp52vmbfj["lastName"],
                "legalizar"=>0
            );
            
            $Vlfwkhon2bz0["response"]=$Vd10ichsd3g5;
            

            
            
        }
        else{
            $Vlfwkhon2bz0["error"]=1; 
            $Vpsm42ro4mkq = (array)$VqhzkfsafzrcRes->responseStatus;
            $Vlfwkhon2bz0["response"]= $Vpsm42ro4mkq["message"];
        }

        }else{
            $Vlfwkhon2bz0["error"]=1; 
            $Vlfwkhon2bz0["response"] = "No ha sido posible, realizar la operación por el momento.";
        }
    }else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }

    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
    
});


$V0ojkog2p2jp->run();