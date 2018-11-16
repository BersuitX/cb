<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vvkwvjdx1mcb = json_decode($Vyvmmv0t5uw2->getBody());
     if(isset($Vvkwvjdx1mcb,$Vvkwvjdx1mcb->data)){
    $Vqhzkfsafzrc = $Vvkwvjdx1mcb->data;
    
    
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
        
        }else{
            $Vlfwkhon2bz0["error"]=1;
            
        }

            $Vlfwkhon2bz0["error"]=0;
            
            $Vx1rxn501yba = strtolower($VqhzkfsafzrcRes->MENSAJE->DESCRIPCION);

            if($Vx1rxn501yba == "transaction successful"){
                $Vx1rxn501yba = "Operación exitosa.";
            }else if($Vx1rxn501yba == "error database"){
                $Vx1rxn501yba = "Ha ocurrido un error. Intenta de nuevo.";
            }else if($Vx1rxn501yba == "insufficient funds"){
                $Vx1rxn501yba = "Saldo insuficiente";
            }else if($Vx1rxn501yba == "expired account"){
                $Vx1rxn501yba = "Tu cuenta está inactiva.";
            }else if($Vx1rxn501yba == "service is not active"){
                $Vx1rxn501yba = "Ha ocurrido un error. Intenta de nuevo.";
            }
            else{
               $Vlfwkhon2bz0["error"]=1;
               $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;

                if(isset($VqhzkfsafzrcRes["MENSAJE"])){
                    $V2twuswf1nsu = (array)$VqhzkfsafzrcRes["MENSAJE"];
                }
                $Vlfwkhon2bz0["response"] = $V2twuswf1nsu["DESCRIPCION"];
            }
            
            $Vlfwkhon2bz0["response"]=$Vx1rxn501yba;
            
        }


    }
    else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }  }
    else{
       $Vlfwkhon2bz0["error"]=1;
       $Vlfwkhon2bz0["response"]="Los parámetros enviados no son validos";
    }
    
    
     return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json'); 
        

});


$V0ojkog2p2jp->run();