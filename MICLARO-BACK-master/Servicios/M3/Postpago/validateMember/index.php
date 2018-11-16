<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../Core/vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.35.235:80/CommunityServiceApplication_SBProject/Proxies/CommunityValidationWS_PS?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    if(isset($Vvkwvjdx1mcb,$Vvkwvjdx1mcb->data)){
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);


    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "tnsvalidateMemberResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            
            
        
    if($VqhzkfsafzrcRes->tnsacknowledgment->tnsindicator=="SUCCESS"  && $this->curlWigi->arrayToString($VqhzkfsafzrcRes->tnsisMemberValidate)=="0"){
        $Vlfwkhon2bz0["error"]=0;
        $Vlfwkhon2bz0["response"]=array("isMemberValidate"=>1);
    }else{
        $Vlfwkhon2bz0["error"]=1;
        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
        $Vvu22isen3ff='';
        if(isset($VqhzkfsafzrcRes["tnsreason"])){
           $Vvu22isen3ff = $VqhzkfsafzrcRes["tnsreason"];
           
        }

        if(is_string($Vvu22isen3ff)){
            if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'Pending transaction'){
                $Vvu22isen3ff = "La transacción se encuentra pendiente";
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'The member not complies with the conditions'){
                $Vvu22isen3ff = "Ésta línea no cumple con las condiciones";
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'The member is already associated with another community'){
                $Vvu22isen3ff = "Ésta línea ya se encuentra asociada a otra comunidad";
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'Member not found'){
                $Vvu22isen3ff = "La línea no se encuentra en esta comunidad";
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'Quota Invalid'){
                $Vvu22isen3ff = "Cuota invalida";
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'Community not found'){
               $Vvu22isen3ff = "La línea que intentas consultar no pertenece al servicio de ".((intval($Vqhzkfsafzrc->type)==1)?"Datos Compartidos.":"Familia y Amigos.");
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'The member not complies with the conditions'){
                $Vvu22isen3ff = "La línea no cumple las condiciones necesarias para agregarla a la comunidad";
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'Member is in another operator'){
                $Vvu22isen3ff = "Recuerda que solo podrás compartir tus datos con móviles  Claro postpago, la línea registrada pertenece a otro operador móvil.";
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'User is not postpaid'){
                $Vvu22isen3ff = "Recuerda que solo podrás compartir tus datos con móviles  Claro postpago. La línea que intentas registrar es Prepago.";
            }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'Offer type(INHOUSE) invalid for member'){
                $Vvu22isen3ff = "Recuerda que solo podrás compartir tus datos con móviles  Claro postpago que no sean líneas  Inhouse";
            }
        }else{
            $Vvu22isen3ff = "La línea no se encuentra en esta comunidad";
        }
            
        $Vlfwkhon2bz0["response"]=$Vvu22isen3ff;
    }


        }
      else{
        $Vlfwkhon2bz0["error"]=1;
        $Vlfwkhon2bz0["response"]="Los parámetros enviados no son validos";
     }


    }
    else {
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }}
    else{
       $Vlfwkhon2bz0["error"]=1;
       $Vlfwkhon2bz0["response"]="Los parámetros enviados no son validos";
    }
    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
});


$V0ojkog2p2jp->run();