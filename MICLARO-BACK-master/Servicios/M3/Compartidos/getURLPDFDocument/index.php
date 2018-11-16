<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://facturasclaro.paradigma.com.co/ebpTelmex/Pages/Services/ServiceAppClaro.aspx/getURLPDFDocument"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz){

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode($Vyvmmv0t5uw2->getBody());
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->numeroCuenta=$Vcw3r1lhk5bx->AccountId;
        
        $VqhzkfsafzrcEncrip = "";
        if(isset($Vqhzkfsafzrc->numeroCuenta)){
            $Vn23rkoype3i = $Vqhzkfsafzrc->numeroCuenta;
            $VqhzkfsafzrcEncrip =  encrypt($Vn23rkoype3i,false);
        }

        $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $VqhzkfsafzrcEncrip]);
       
        $this->curlWigi->URL=$this->urlServicio;
        $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
        
        $Vy5yyyefdntg=array();
        
        $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true,false);
    
        if($VqhzkfsafzrcRes["error"] == 0 && isset($VqhzkfsafzrcRes["response"]->d)){
            $Vlfwkhon2bz0 = array();
            $Vlfwkhon2bz0["error"] = 1;
            $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
            $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

            $VqhzkfsafzrcJson = json_decode($VqhzkfsafzrcRes["response"]->d);

            if (json_last_error() == JSON_ERROR_NONE){
                $Vlfwkhon2bz0["error"] = 0;

                if(isset($VqhzkfsafzrcJson->error)){
                    if($VqhzkfsafzrcJson->error->isError){
                        $Vlfwkhon2bz0["response"] = $VqhzkfsafzrcJson->error->msg;                    
                    }else{
                        unset($VqhzkfsafzrcJson->error);
                        $Vlfwkhon2bz0["response"] = $VqhzkfsafzrcJson;
                    }
                }else{
                    $Vlfwkhon2bz0["response"] = $VqhzkfsafzrcJson;
                }

                
            }else{
                $Vlfwkhon2bz0["response"] = "Ha ocurrido un error al codificar la respuesta";
            }

           return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
        }
        return $Vvcjkdrakwx3->withJson($VqhzkfsafzrcRes)->withHeader('Content-type', 'application/json');
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();