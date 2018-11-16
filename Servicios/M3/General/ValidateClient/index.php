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
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->DocumentNumber=$Vd10ichsd3g5->DocumentNumber;
        $Vqhzkfsafzrc->codigoTipoDocumento=$Vd10ichsd3g5->DocumentType;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"http://tempuri.org/ISPoliedro/ValidateClient\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ValidateClientResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

            $V5kst25xi2eb=json_encode($VqhzkfsafzrcRes->ValidateClientResult);
            $V5kst25xi2eb=json_decode($V5kst25xi2eb, true);

            if( isset($V5kst25xi2eb) ){

                $V3ioleqfhkc2=$V5kst25xi2eb["aErrordetail"];

                if (isset($V3ioleqfhkc2) && intval($V3ioleqfhkc2["aCode"])==1 ) {

                    $Vuz2tqweebiu=array();
                    $Vuz2tqweebiu["IdCuestionario"]=$this->curlWigi->arrayToString($V5kst25xi2eb["aIdCuestionario"]);
                    $Vuz2tqweebiu["FormId"]=$this->curlWigi->arrayToString($V5kst25xi2eb["aFormId"]);
                    $Vuz2tqweebiu["SecuenciaCuestionario"]=$this->curlWigi->arrayToString($V5kst25xi2eb["aSecuenciaCuestionario"]);
                    $Vuz2tqweebiu["ValidationResultMessage"]=$this->curlWigi->arrayToString($V5kst25xi2eb["aValidationResultMessage"]);
                    $Vuz2tqweebiu["InternalProcessResult"]=$this->curlWigi->arrayToString($V5kst25xi2eb["aInternalProcessResult"]);
                    $Vuz2tqweebiu["Registry"]=$this->curlWigi->arrayToString($V5kst25xi2eb["aRegistry"]);
                    $Vuz2tqweebiu["CentralRiesgo"]=$this->curlWigi->arrayToString($V5kst25xi2eb["aCentralRiesgo"]);
                    $Vuz2tqweebiu["ClientNames"]=$this->curlWigi->arrayToString($V5kst25xi2eb["aClientName"]);


                    $Vcsn3klr2ros=array();

                    if ( isset($V5kst25xi2eb["aPreguntas"]) && isset($V5kst25xi2eb["aPreguntas"]["bQuestion"])){
                        $Vcsn3klr2ros = $V5kst25xi2eb["aPreguntas"]["bQuestion"];
                    }

                    $Vizqa2qh5xko=array();
                    foreach ($Vcsn3klr2ros as $Vopwgrorwazd) {
                        $Vp5oxls1r0i3=array();
                        $Vp5oxls1r0i3["text"]=$Vopwgrorwazd["bText"];
                        $Vp5oxls1r0i3["QuestionId"]=$Vopwgrorwazd["bQuestionId"];

                        $Vlfwkhon2bz0s=array();

                        if ( isset($Vopwgrorwazd["bPossibleAnswer"]) && isset($Vopwgrorwazd["bPossibleAnswer"]["bPossibleAnswer"]) ){
                            $Vlfwkhon2bz0s = $Vopwgrorwazd["bPossibleAnswer"]["bPossibleAnswer"];
                        }

                        $Vxfjbpfd0o4a=array();
                        foreach ($Vlfwkhon2bz0s as $Vlfwkhon2bz0Obj) {
                            $Vfmh3q1r5qrd=array();
                            $Vfmh3q1r5qrd["AnswerId"]=$Vlfwkhon2bz0Obj["bAnswerId"];
                            $Vfmh3q1r5qrd["text"]=$Vlfwkhon2bz0Obj["bAnswerText"];
                            array_push($Vxfjbpfd0o4a, $Vfmh3q1r5qrd);
                        }

                        $Vp5oxls1r0i3["respuestas"]=$Vxfjbpfd0o4a;

                        array_push($Vizqa2qh5xko, $Vp5oxls1r0i3);
                    }

                    $Vuz2tqweebiu["preguntas"]=$Vizqa2qh5xko;
                    
                    $Vlfwkhon2bz0["error"]=0;
                    $Vlfwkhon2bz0["response"]=$Vuz2tqweebiu;
                    $Vlfwkhon2bz0["server"]=$VqhzkfsafzrcRes;
                }else{
                    $Vlfwkhon2bz0["error"]=1;
                    $Vvr34dlcwg1h = false;
                    if (strpos($V3ioleqfhkc2["aMessage"], 'validaci¿n') !== false) {
                        $Vvr34dlcwg1h = true;
                    }
                    if(strpos($V3ioleqfhkc2["aMessage"], 'Excedi') !== false || $Vvr34dlcwg1h == true){
                        $Vlfwkhon2bz0["response"]= "Has excedido el límite de intentos del día.";
                    }else{
                        $Vlfwkhon2bz0["response"]=$V3ioleqfhkc2["aMessage"];
                    }
                    
                    
                }
            }else{
                $Vlfwkhon2bz0["error"]=1;
                $Vlfwkhon2bz0["response"]="Ha ocurrido un error al codificar la respuesta.";

            }
        }else{
                $Vlfwkhon2bz0["error"]=1;
                $Vlfwkhon2bz0["response"]="Ha ocurrido un error al codificar la respuesta.";
        }

    }else{    
        if($VqhzkfsafzrcRes["response"] == "El servidor no pudo procesar la solicitud debido a un error interno. Para obtener más información acerca del error, active IncludeExceptionDetailInFaults (desde ServiceBehaviorAttribute o desde el comportamiento de configuración de <serviceDebug>) en el servidor para enviar la información de la excepción al cliente, o active la traza según las instrucciones de la documentación de Microsoft .NET Framework SDK y consulte los registros de seguimiento del servidor."){

            $VqhzkfsafzrcRes["response"] = "En este momento no es posible procesar tu solicitud. Por favor intenta más tarde.";
        }    
        $Vlfwkhon2bz0=$VqhzkfsafzrcRes;
    }
    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();