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
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    	$Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    	$Vqhzkfsafzrc->numeroCuenta=$Vcw3r1lhk5bx->AccountId;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/validarRegistroCuentaClienteFija\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    

	
	if($VqhzkfsafzrcRes["error"] == 0){

		
		$V4kfh5akqyzi = "ValidarRegistroCuentaClienteFijaResponse";

		$Vlfwkhon2bz0 = array();
		$Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
		$Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


		if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
			$VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
			
	

	if (intval($VqhzkfsafzrcRes->informacionCuentaClienteFija->error)==0) {
		   $Vlfwkhon2bz0["error"]=0;   
		   $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
		  
    	if(isset($VqhzkfsafzrcRes["informacionCuentaClienteFija"])){
    		$Vp22j2ioyz1e = (array)$VqhzkfsafzrcRes["informacionCuentaClienteFija"];
    	}
    
                $Vd10ichsd3g5["aapellidos"]=isset($Vp22j2ioyz1e["aapellidos"])?$Vp22j2ioyz1e["aapellidos"]:"";
                $Vd10ichsd3g5["aesClienteAsociadoCuenta"]=isset($Vp22j2ioyz1e["aesClienteAsociadoCuenta"])?$Vp22j2ioyz1e["aesClienteAsociadoCuenta"]:"";
                $Vd10ichsd3g5["aesCuentaValida"]=isset($Vp22j2ioyz1e["aesCuentaValida"])?$Vp22j2ioyz1e["aesCuentaValida"]:"";
                $Vd10ichsd3g5["aestadoCuenta"]=isset($Vp22j2ioyz1e["aestadoCuenta"])?$Vp22j2ioyz1e["aestadoCuenta"]:"";
                $Vd10ichsd3g5["anombre"]=isset($Vp22j2ioyz1e["anombre"])?$Vp22j2ioyz1e["anombre"]:"";
                $Vd10ichsd3g5["anumeroCuenta"]=isset($Vp22j2ioyz1e["anumeroCuenta"])?$Vp22j2ioyz1e["anumeroCuenta"]:"";
                $Vd10ichsd3g5["LineOfBusiness"]=isset($Vp22j2ioyz1e["atipoCuentaID"])?$Vp22j2ioyz1e["atipoCuentaID"]:"";


                 $Vlfwkhon2bz0["response"]=$Vd10ichsd3g5;
                }
                else{
                $Vlfwkhon2bz0["error"]=1;
                $Vlfwkhon2bz0["response"]="No se encontró información de esta cuenta.";
                }
               
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