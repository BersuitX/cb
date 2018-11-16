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

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->DocumentNumber=$Vd10ichsd3g5->DocumentNumber;
        $Vqhzkfsafzrc->codigoTipoDocumento=$Vd10ichsd3g5->DocumentType;


    
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/validarUsuarioCliente\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ValidarUsuarioClienteResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            


        
           $Vpsm42ro4mkq=0;
           $Vtssepikoezf = array("asociado"=>false,"registradoCliente"=>false,"registradoUsuario"=>false,"correoAsociado"=>"");

           $V2hiqjnk010n = (array)$VqhzkfsafzrcRes->ValidacionUsuarioCliente;
           
            if(isset($V2hiqjnk010n,$V2hiqjnk010n["aesClienteAsociadoUsuario"],$V2hiqjnk010n["aesClienteRegistrado"],$V2hiqjnk010n["aesUsuarioRegistrado"],$V2hiqjnk010n["ausuarioAsociadoCliente"])){



                $Vlpstrancuf5=($V2hiqjnk010n["aesClienteAsociadoUsuario"]=='true')?true:false;
                $V5yqpdshyaxe=($V2hiqjnk010n["aesClienteRegistrado"]=='true')?true:false;
                $Vmfdu3ruyzzu=($V2hiqjnk010n["aesUsuarioRegistrado"]=='true')?true:false;
                $V21drm34mugr=$this->curlWigi->arrayToString($V2hiqjnk010n["ausuarioAsociadoCliente"]);

                if ($Vmfdu3ruyzzu && !$V5yqpdshyaxe) {
                    $Vpsm42ro4mkq=1;
                    $Vtssepikoezf="El correo eléctronico ya se encuentra registrado";
                }else if ($Vmfdu3ruyzzu && $V5yqpdshyaxe){
                    $Vpsm42ro4mkq=1;
                    $Vtssepikoezf="El correo eléctronico ya tiene una cuenta asociada. Por favor intente ingresar o recuperar clave.";
                }else{

                    $V5rogjxzyuku=true; 

                    
                    if (!$Vmfdu3ruyzzu && !$V5yqpdshyaxe) {
                      $V5rogjxzyuku=false;
                    }

                    if (intval($Vd10ichsd3g5->DocumentType) != 1 && intval($Vd10ichsd3g5->DocumentType) != 5 && intval($Vd10ichsd3g5->DocumentType) != 2){
                      $V5rogjxzyuku=false;
                    }

                    $Vpsm42ro4mkq=0;
                    $Vtssepikoezf = array(
                       "asociado"=>$Vlpstrancuf5,
                       "registradoCliente"=>$V5yqpdshyaxe,
                       "registradoUsuario"=>$Vmfdu3ruyzzu,
                       "correoAsociado"=>$V21drm34mugr,
                       "validarSeguridad"=>$V5rogjxzyuku
                    );
                }

            }

            $Vlfwkhon2bz0["error"]=$Vpsm42ro4mkq;
            $Vlfwkhon2bz0["response"]=$Vtssepikoezf;
        }
    }
    else {
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }
    
    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');

     }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }


});


$V0ojkog2p2jp->run();