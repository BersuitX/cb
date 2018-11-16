<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->nombreUsuario=$Vd10ichsd3g5->UserProfileID;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/consultarCupones\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
        
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ConsultarCuponResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        
        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

    $Vlfwkhon2bz0["error"]=0; 

   if(isset($VqhzkfsafzrcRes->listCupones,$VqhzkfsafzrcRes->listCupones->aCupon) && sizeof($VqhzkfsafzrcRes->listCupones->aCupon) > 0){

         foreach ($VqhzkfsafzrcRes->listCupones->aCupon as $Virsew13xpli){
            $Virsew13xpli = (array)$Virsew13xpli;
            $Vlfwkhon2bz0["response"]=array("numeroCupon"=>$Virsew13xpli["anumeroCupon"],"tipoCupon"=>$Virsew13xpli["atipoCupon"]);
        }
         
    }
    else{
             $Vlfwkhon2bz0["error"]=1; 
            $Vlfwkhon2bz0["response"]= "No tienes un código de cupón disponible para compartir";    
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