<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

     $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->codigoTipoDocumento=$Vd10ichsd3g5->DocumentType;
        $Vqhzkfsafzrc->documento=$Vd10ichsd3g5->DocumentNumber;
        $Vqhzkfsafzrc->nombreUsuario=$Vd10ichsd3g5->UserProfileID;
        $Vqhzkfsafzrc->numeroCuenta=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->tipoCuentaID=$Vcw3r1lhk5bx->LineOfBusiness;


        
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/asociarCuentaUsuario\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    	

        
	if($VqhzkfsafzrcRes["error"] == 0){

		
		$V4kfh5akqyzi = "AsociarCuentaUsuarioResponse";

		$Vlfwkhon2bz0 = array();
		$Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
		$Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


		if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
			$VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

        if(isset($VqhzkfsafzrcRes->esCuentaAsociada)=="true"){
            $Vlfwkhon2bz0["error"]=0;
            $Vlfwkhon2bz0["response"]="Cuenta asociada exitosamente";
        }else{
            $Vlfwkhon2bz0["error"]=1;
            $Vlfwkhon2bz0["response"]="No se pudo asociar la cuenta";
        }	
		}else{
            $Vlfwkhon2bz0["error"]=1;
            $Vlfwkhon2bz0["response"]="No es posible intentarlo en estos momentos";
        }
	}else{
         $Vlfwkhon2bz0=$VqhzkfsafzrcRes;
    }
    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
     }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();