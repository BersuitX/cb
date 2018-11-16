<?php



require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['requestTemplate']="request.php";




$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?wsdl"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
 $Vntfxjbklxpl=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vntfxjbklxpl->error)){
        
        $Vcw3r1lhk5bx=$Vntfxjbklxpl->cuenta;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->destino=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->tipoCuentaID=$Vcw3r1lhk5bx->LineOfBusiness;

    
       

        $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
        
        
        $this->curlWigi->URL=$this->urlServicio;
        $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
        
        $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/validacionRegistroUsuario\"";
        
        $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

        $Vi21ketkuwin="PIN:".$Vcw3r1lhk5bx->AccountId;

        if($VqhzkfsafzrcRes["error"] == 0){

            $V4kfh5akqyzi = "ValidacionRegistroUsuarioResponse";

            $Vlfwkhon2bz0 = array();
            $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
            $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


            if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
                $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

                $Vpsm42ro4mkq=((isset($VqhzkfsafzrcRes->otp) && intval($VqhzkfsafzrcRes->otp)>0)?0:1);
                
                $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
                if(isset($VqhzkfsafzrcRes["otp"])){
                    $Vajxrifbdmso = $VqhzkfsafzrcRes["otp"];
                }


                if (!isset($VqhzkfsafzrcRes["otp"]) || $VqhzkfsafzrcRes["otp"]=="" || $VqhzkfsafzrcRes["otp"]==0 || $VqhzkfsafzrcRes["otp"]==NULL) {
                    $Vi21ketkuwin="ERROR-".$Vi21ketkuwin;
                }

                $Vlfwkhon2bz0["error"]=$Vpsm42ro4mkq;
                
                $Vlfwkhon2bz0["response"]=isset($Vajxrifbdmso)?$Vajxrifbdmso:"Error al enviar el PIN, inténtalo nuevamente.";
            }

        }else {
            $Vi21ketkuwin="ERRORSERVIDOR-".$Vi21ketkuwin;
            $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
        }


        $Va4njuxc5kxm["xmlRequest"]=$Vupuf2xu3fof;
        $Va4njuxc5kxm["response"]=$VqhzkfsafzrcRes;
        $Va4njuxc5kxm["token"]=$Vntfxjbklxpl;
        $Vi21ketkuwin .= "-USUARIO:".$Vqhzkfsafzrc->nombreUsuario;

        guardarSesion($Va4njuxc5kxm,$Vi21ketkuwin);
    
    
        return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
     }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();