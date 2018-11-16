<?php


require __DIR__ . '/../../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/GetDataSharedConsumption/v1.0/"; 

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
      $V4kfh5akqyzi = "tnsgetDataSharedConsumptionResponse";
        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;


    if($VqhzkfsafzrcRes->_responseStatus->code=="FS_ESB_0"){
        $Vlfwkhon2bz0["error"]=0; 
        $Vautxf03llyt = array();
        $Vvjqpupyftaq = 0;
        $Vqqevzkg50oy = 0;


        $Vyakq0xinkc5 = $this->curlWigi->getArray($VqhzkfsafzrcRes->beneficiary);
        $Vd0zsvx114ss = $this->curlWigi->getArray($VqhzkfsafzrcRes->mainSubscriber);


        foreach ($Vd0zsvx114ss as $Virsew13xpli) {
            $Virsew13xpli = (array)$Virsew13xpli;
            $Vwygjm3q4ab4 = $Virsew13xpli["subscriberNumber"];
            $V5mlu1ykrbu5 = strlen($Vwygjm3q4ab4)-2;
            $Vswrqic01o1e = substr($Vwygjm3q4ab4,2,$V5mlu1ykrbu5);
            $Vwysqb24hcm3 = array("msisdn"=>$Vswrqic01o1e,"member_consumption"=>$Virsew13xpli["consumption"]->unit,
                "member_assigned_quota"=>$Virsew13xpli["InitialAmount"]->unit);

            $Vvjqpupyftaq = $Vvjqpupyftaq + intval($Virsew13xpli["InitialAmount"]->unit);
            $Vqqevzkg50oy = $Vqqevzkg50oy + intval($Virsew13xpli["consumption"]->unit);

            array_push($Vautxf03llyt, $Vwysqb24hcm3);
        }

        foreach ($Vyakq0xinkc5 as $Virsew13xpli2) {
            $Virsew13xpli2 = (array)$Virsew13xpli2; 
            $Vwygjm3q4ab4 = $Virsew13xpli2["msisdn"];
            $V5mlu1ykrbu5 = strlen($Vwygjm3q4ab4)-2;
            $Vswrqic01o1e = substr($Vwygjm3q4ab4,2,$V5mlu1ykrbu5);
            $Vvzim3uoyykn = array("msisdn"=>$Vswrqic01o1e,"member_consumption"=>$Virsew13xpli2["consumption"]->unit,
                "member_assigned_quota"=>$Virsew13xpli2["InitialAmount"]->unit);

            $Vvjqpupyftaq = $Vvjqpupyftaq + intval($Virsew13xpli2["InitialAmount"]->unit);
            $Vqqevzkg50oy = $Vqqevzkg50oy + intval($Virsew13xpli2["consumption"]->unit);

            array_push($Vautxf03llyt, $Vvzim3uoyykn);
        }

        $Vlfwkhon2bz0["response"]=array("members"=>$Vautxf03llyt,"total_quota"=>$Vvjqpupyftaq,"community_consumption"=>$Vqqevzkg50oy);
        
        
        
    }else{
        $Vlfwkhon2bz0["error"]=1; 
        $Vlfwkhon2bz0["response"] = "Ha ocurrido un error. Intenta de nuevo.";
    }
}else{
        $Vlfwkhon2bz0["error"]=1; 
        $Vlfwkhon2bz0["response"] = "Ha ocurrido un error. Intenta de nuevo.";
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