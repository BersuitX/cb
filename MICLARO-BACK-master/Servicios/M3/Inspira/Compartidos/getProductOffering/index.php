<?php


require __DIR__ . '/../../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/CustomerProduct/v1.0"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

     if($VqhzkfsafzrcRes["error"] == 0){
      $V4kfh5akqyzi = "tnsgetProductOfferingResponse";
        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;


    if($VqhzkfsafzrcRes->_responseStatus->code=="FS_ESB_0"){
     $Vw10cior02ni = array();
        if(isset($VqhzkfsafzrcRes->productOfferingList)&& sizeof($VqhzkfsafzrcRes->productOfferingList)>0){
             $Vlfwkhon2bz0["error"]=0; 
           
             foreach ($VqhzkfsafzrcRes->productOfferingList as $Virsew13xpli) {
                $Virsew13xpli = (array)$Virsew13xpli;        
                $Vpfs1kkzy45w = array();
                $Vbniaokhm02f = array();
                if(isset($VqhzkfsafzrcRes->productOfferingList,$VqhzkfsafzrcRes->productOfferingList->versions)){
                    $Vzqixmthnyoe = array();
                    $Vpfs1kkzy45w = (array)$VqhzkfsafzrcRes->productOfferingList->versions->item;
                    $Vhizdilpvymg = (array)$VqhzkfsafzrcRes->productOfferingList->versions->productOfferingPrices->versions->price->productRate;
                    $Vbxe4aotwpht = (array)$VqhzkfsafzrcRes->productOfferingList->versions->productOfferingPrices->versions->price;
                    $Vdtmy5i11sru  = $this->curlWigi->getArray($VqhzkfsafzrcRes->productOfferingList->productOfferingPrices);

                $Vuz2tqweebiu = array("PlanID"=>$Virsew13xpli["id"],"IsOpen"=>"","PlanName"=>$Vpfs1kkzy45w["name"],
                    "PlanDescription"=>$Vpfs1kkzy45w["description"],"PlanCode"=>$Vhizdilpvymg["code"],
                    "PlanAmount"=>$Vbxe4aotwpht["amount"],"PlanVoiceUnit"=>"","FrequentNumbersAllowed"=>"",
                    "IsSharedDataPlan"=>"","PlanLines"=>array());
                 array_push($Vw10cior02ni, $Vuz2tqweebiu);

             }
             }
        }

        $Vlfwkhon2bz0["response"]= $Vw10cior02ni;
        $Vlfwkhon2bz0["data"]= $VqhzkfsafzrcRes;
        

    }
    else{
        $Vlfwkhon2bz0["error"]=1; 
        $Vpsm42ro4mkq = (array)$VqhzkfsafzrcRes->_responseStatus;
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

     }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();