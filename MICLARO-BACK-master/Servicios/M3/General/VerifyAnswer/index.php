<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="https://portalpagos.claro.com.co/Poliedro/PointPoliedro.svc?singleWsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 


$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody());
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->DocumentNumber=$Vd10ichsd3g5->DocumentNumber;
        $Vqhzkfsafzrc->DocumentTypeId=$Vd10ichsd3g5->DocumentType;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"http://tempuri.org/ISPoliedro/VerifyAnswer\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "VerifyAnswerResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


    if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
        $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

        $Vsf0xytdte51 = (array)$VqhzkfsafzrcRes->VerifyAnswerResult;

        if(isset($Vsf0xytdte51) && sizeof($Vsf0xytdte51)>0){

                $Vuz2tqweebiu = array("Result"=>$Vsf0xytdte51["aResult"]?$Vsf0xytdte51["aResult"]:"",
                    "Approval"=>$Vsf0xytdte51["aApproval"]?$Vsf0xytdte51["aApproval"]:"",
                    "AlQuestionAnswerid"=>$Vsf0xytdte51["aAlQuestionAnswerid"]?$Vsf0xytdte51["aAlQuestionAnswerid"]:"",
                    "ResultadoConfrontacion"=>$Vsf0xytdte51["aResultadoConfrontacion"],
                    "NumeroAciertos"=>$Vsf0xytdte51["aNumeroAciertos"],
                    "ResultadoScore"=>$Vsf0xytdte51["aResultadoScore"],
                    "RespuestaProcesoId"=>$Vsf0xytdte51["aRespuestaProcesoId"]?$Vsf0xytdte51["aRespuestaProcesoId"]:"",
                    "RespuestaProceso"=>$Vsf0xytdte51["aRespuestaProceso"]?$Vsf0xytdte51["aRespuestaProceso"]:"",
                    "ClaveCIFIN"=>$Vsf0xytdte51["aClaveCIFIN"]);
                
                $Vlfwkhon2bz0["error"]=0;
                $Vlfwkhon2bz0["response"]=$Vuz2tqweebiu;

        }else{
           
            $Vlfwkhon2bz0["error"]=1;
            $Vlfwkhon2bz0["response"]="Ha ocurrido un error al codificar la respuesta.";

        }

    }

    }else{
         
         if($VqhzkfsafzrcRes["response"]=="Input string was not in a correct format."){
            $VqhzkfsafzrcRes["response"]="Por favor responde la pregunta.";
         }
         $Vlfwkhon2bz0=$VqhzkfsafzrcRes;
    }
    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();