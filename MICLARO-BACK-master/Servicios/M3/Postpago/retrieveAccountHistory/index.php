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

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    	$Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    	$Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
    	$Vqhzkfsafzrc->LineOfBusiness=$Vcw3r1lhk5bx->LineOfBusiness;

$Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);


$this->curlWigi->URL=$this->urlServicio;
$this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;

$Vy5yyyefdntg=array();

$VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);



if($VqhzkfsafzrcRes["error"] == 0){

    
    $V4kfh5akqyzi = "ns2retrieveAccountHistoryResponse";

    $Vlfwkhon2bz0 = array();
    $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
    $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


    if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
        $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

    $Vpsm42ro4mkq=(($VqhzkfsafzrcRes->AcknowledgementIndicator=="SUCCESS")?0:1);

if (($Vpsm42ro4mkq==1)){
    $Vlfwkhon2bz0["error"]=1;
    $Vlfwkhon2bz0["response"]="Error al realizar la operación.";
}else{

    if(isset($VqhzkfsafzrcRes->TransactionDetails)){
        $Vautxf03llyt=$this->curlWigi->getArray($VqhzkfsafzrcRes->TransactionDetails);
        if (count($Vautxf03llyt) >0){
            $Vlfwkhon2bz0["error"]=0;
            $Vlfwkhon2bz0["response"]=$Vautxf03llyt;
        }else{
            $Vlfwkhon2bz0["error"]=1;
            $Vlfwkhon2bz0["response"]="No se encontraron resultados.";
        }
    }else{
        $Vlfwkhon2bz0["error"]=1;
        $Vlfwkhon2bz0["response"]="No se encontraron resultados.";
    }
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