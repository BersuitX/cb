<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://itelnn.comcel.com.co:9999/ITEL/Core/Proxies/ejecutarTramaEspecifica_PS?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

   $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
        
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ejecWS_Result";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


    if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

    if (intval($VqhzkfsafzrcRes->MENSAJE->CODIGO_RESPUESTA)==1) {

    $Vlfwkhon2bz0["error"]=0;

    $Vautxf03llyt=$this->curlWigi->getArray($VqhzkfsafzrcRes->MENSAJE->PARAMETROS);

    if (count($Vautxf03llyt)>0) {
    $Vautxf03llyt=$this->curlWigi->getArray($Vautxf03llyt[0]->PARAMETRO);
    }

    $Vlfwkhon2bz0["response"]=array("activo"=>0);
    foreach ($Vautxf03llyt as $Virsew13xpli) {
        $Virsew13xpli = (array)$Virsew13xpli;
        if (intval($Virsew13xpli["Name"]) == 510) {
            $Vlfwkhon2bz0["response"]=array("activo"=>1);
            break;
        }
    }

   }else{
       $Vlfwkhon2bz0["error"]=1;
       $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;

        if(isset($VqhzkfsafzrcRes["MENSAJE"])){
            $V2twuswf1nsu = (array)$VqhzkfsafzrcRes["MENSAJE"];
        }

        $Vlfwkhon2bz0["response"]=$V2twuswf1nsu["DESCRIPCION"];
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