<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../Core/vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.35.235:80/CommunityServiceApplication_SBProject/Proxies/CommunityInformationWS_PS?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    if(isset($Vvkwvjdx1mcb,$Vvkwvjdx1mcb->data)){
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    

    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "tnsgetTransactionCostResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

        if($VqhzkfsafzrcRes->tnsacknowledgment->tnsindicator=="SUCCESS"){
        $Vlfwkhon2bz0["error"]=0;

        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
        if(isset($VqhzkfsafzrcRes["tnstransaction_cost_recurrent"],$VqhzkfsafzrcRes["tnstransaction_cost_event"],$VqhzkfsafzrcRes["tnstransaction_cost_type"],
            $VqhzkfsafzrcRes["tnstransaction_cost_limit"])){
            $Vtznpup31t5v = $VqhzkfsafzrcRes["tnstransaction_cost_recurrent"];
            $Vyxjjiwera23 = $VqhzkfsafzrcRes["tnstransaction_cost_event"];
            $Vvhipztthm2s = $VqhzkfsafzrcRes["tnstransaction_cost_type"];
            $Vlrty014tad0 = $VqhzkfsafzrcRes["tnstransaction_cost_limit"];
        }

        $Vlfwkhon2bz0["response"]=array(
            "cost_recurrent"=>(($Vtznpup31t5v!="")?"$".number_format($Vtznpup31t5v, 0, ",", ".") :"$0"),
            "cost_event"=>(($Vyxjjiwera23!="")?"$".number_format($Vyxjjiwera23, 0, ",", ".") :"$0"),
            "cost_type"=>$Vvhipztthm2s,
            "cost_limit"=>$Vlrty014tad0);
    }else{
        $Vlfwkhon2bz0["error"]=1;
        $Vlfwkhon2bz0["response"]="En este momento no podemos atender esta solicitud, intenta nuevamente.";
    }
}
else{
        $Vlfwkhon2bz0["error"]=1;
        $Vlfwkhon2bz0["response"]="En este momento no podemos atender esta solicitud, intenta nuevamente.";
    }

}
    else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }}
    else{
       $Vlfwkhon2bz0["error"]=1;
       $Vlfwkhon2bz0["response"]="Los parámetros enviados no son validos";
    }
    
    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
});


$V0ojkog2p2jp->run();