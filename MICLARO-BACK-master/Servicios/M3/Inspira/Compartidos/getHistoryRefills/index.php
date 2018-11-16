<?php


require __DIR__ . '/../../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/CustomerRefillAction/v1.0/"; 

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

    $Vlfwkhon2bz0 = array();
    $Vlfwkhon2bz0["data"]=$VqhzkfsafzrcRes;


     if($VqhzkfsafzrcRes["error"] == 0){
      $V4kfh5akqyzi = "ns0getHistoryRefillsResponse";
        

        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;


    if($VqhzkfsafzrcRes->responseStatus->code=="FS_ESB_0"){
        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
       
       if(isset($VqhzkfsafzrcRes["refills"]->refill)&& sizeof($VqhzkfsafzrcRes["refills"]->refill)>0){
        
            $V4rh2k5yogu4 = (array)$VqhzkfsafzrcRes["refills"];
            $Vy4n1gwk0cl4 = (array)$V4rh2k5yogu4["refill"];
            $Vautxf03llyt = array(); 
            foreach ($Vy4n1gwk0cl4 as $Virsew13xpli) {
               $Virsew13xpli = (array)$Virsew13xpli;

                $Vjav010uhv5a=explode('T', $Virsew13xpli["date"]);
                $V0w3jgdi00hx = str_replace("-", "/", $Vjav010uhv5a);
                $Vjav010uhv5afinal=$V0w3jgdi00hx[0];

                $Vjav010uhv5a2=explode('T', $Virsew13xpli["date"]);
                $Vjav010uhv5afinal2=$Vjav010uhv5a2[1];
                $V0w3jgdi00hx2 = explode('-', $Vjav010uhv5afinal2);
                $V0w3jgdi00hxFinal = $V0w3jgdi00hx2[0];

                $Vjav010uhv5aTotal = $Vjav010uhv5afinal." ".$V0w3jgdi00hxFinal;

                $Vjav010uhv5a=explode('T', $Virsew13xpli["endDate"]);
                $V0w3jgdi00hx = str_replace("-", "/", $Vjav010uhv5a);
                $Vjav010uhv5afinal=$V0w3jgdi00hx[0];

                $Vjav010uhv5a2=explode('T', $Virsew13xpli["endDate"]);
                $Vjav010uhv5afinal2=$Vjav010uhv5a2[1];
                $V0w3jgdi00hx2 = explode('-', $Vjav010uhv5afinal2);
                $V0w3jgdi00hxFinal = $V0w3jgdi00hx2[0];

                $Vjav010uhv5aVencimiento = $Vjav010uhv5afinal." ".$V0w3jgdi00hxFinal;

               $Vpfs1kkzy45w = array("FECHA_RECARCA"=>isset($Vjav010uhv5aTotal)?$Vjav010uhv5aTotal:"",
                "VALOR_RECARGA"=>isset($Virsew13xpli["amount"])?$Virsew13xpli["amount"]:"",
                "VENCIMIENTO_RECARGA"=>isset($Vjav010uhv5aVencimiento)?$Vjav010uhv5aVencimiento:"",
                "DESCRIPCION_RECARGA"=>isset($Virsew13xpli["type"])?$Virsew13xpli["type"]:"");
               array_push($Vautxf03llyt, $Vpfs1kkzy45w);
            }

            $Vlfwkhon2bz0["error"]=0; 
            $Vlfwkhon2bz0["response"]=$Vautxf03llyt;

        }

    }
    else{
        $Vlfwkhon2bz0["error"]=1; 
        $Vlfwkhon2bz0["response"] = "No ha sido posible, realizar la operación por el momento.";

    }
        
    }
    else{
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