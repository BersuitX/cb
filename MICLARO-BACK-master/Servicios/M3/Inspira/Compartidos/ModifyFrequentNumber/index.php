<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../../Core/vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/ModifyFrequentNumber/v1.0/"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);


     if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "tnsmodifyFrequentNumberResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
          

        if($VqhzkfsafzrcRes->_responseStatus->code=="FS_ESB_0"){
        $Vlfwkhon2bz0["error"]=0;
        $Vlfwkhon2bz0["response"]="Cuenta actualizada exitosamente.";
        }else{
            $Vlfwkhon2bz0["error"]=1;
            
            $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
            $Vvu22isen3ff='';
            if(isset($VqhzkfsafzrcRes["message"])){
                $Vvu22isen3ff = $VqhzkfsafzrcRes["message"];
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
                    $Vvu22isen3ff = "La línea que intentas consultar no pertenece al servicio de Datos Compartidos.";
                }else if(isset($Vvu22isen3ff) && $Vvu22isen3ff == 'The member not complies with the conditions'){
                    $Vvu22isen3ff = "La línea no cumple las condiciones necesarias para agregarla a la comunidad";
                }
            }else{
                $Vvu22isen3ff = "La línea no se encuentra en esta comunidad";
            }
            
            $Vlfwkhon2bz0["response"]=$Vvu22isen3ff;
        }
}
    }
    else {
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }


    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
});


$V0ojkog2p2jp->run();