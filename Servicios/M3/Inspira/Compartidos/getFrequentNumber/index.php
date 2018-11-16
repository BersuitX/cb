<?php



require __DIR__ . '/../../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/GetFrequentNumber/v1.0/"; 

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
      $V4kfh5akqyzi = "ns0getFrequentNumberResponse";
        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;


    if($VqhzkfsafzrcRes->_responseStatus->code=="FS_ESB_0"){
        $Vautxf03llyt = array();
        $Vlfwkhon2bz0["error"]=0; 
       
            foreach ($VqhzkfsafzrcRes->frequentNumberDetails as $Virsew13xpli) {
               $Virsew13xpli = (array)$Virsew13xpli;

               $Vn040lxu341n = $Virsew13xpli["frequentNumber"];
               $V5mlu1ykrbu5 = strlen($Vn040lxu341n)-2;
               $Vswrqic01o1e = substr($Vn040lxu341n,2,$V5mlu1ykrbu5);

               $Vy31ylug2zod = array("FrequentNumberType"=>"C","PhoneNumber"=>isset($Vswrqic01o1e)?$Vswrqic01o1e:"","Name"=>"");
               array_push($Vautxf03llyt, $Vy31ylug2zod);
                

            }
            $Vlfwkhon2bz0["response"]= $Vautxf03llyt; 
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