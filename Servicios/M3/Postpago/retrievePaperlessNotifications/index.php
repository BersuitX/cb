<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.35.240/SelfServiceMobile_Project/Services/Proxy_Pipelines/BillingManagement_PS?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

   $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    	$Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    	$Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
    	$Vqhzkfsafzrc->LineOfBusiness=$Vcw3r1lhk5bx->LineOfBusiness;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
    
        

        
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns2retrievePaperlessNotificationsResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];



        
        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            
            if($VqhzkfsafzrcRes->AcknowledgementIndicator->error==1){
                $Vlfwkhon2bz0["error"]=1;
                $Vlfwkhon2bz0["response"]="No se encontró información disponible.";
            }else{
                $Vlfwkhon2bz0["error"]=0;
                $Vw10cior02ni = array();


                 if(isset($VqhzkfsafzrcRes->NotificationList) && sizeof($VqhzkfsafzrcRes->NotificationList) > 0){

		            foreach ($VqhzkfsafzrcRes->NotificationList as $Virsew13xpli){

		                $Virsew13xpli = (array)$Virsew13xpli;
		                $Vuz2tqweebiu=array("SendingDate"=>$Virsew13xpli["SendingDate"]?$Virsew13xpli["SendingDate"]:"",                 
		                "NotificationType"=>$Virsew13xpli["NotificationType"]?$Virsew13xpli["NotificationType"]:0,
		                "MobileNumber"=>$Virsew13xpli["MobileNumber"]?$Virsew13xpli["MobileNumber"]:0,
		                "Invoice"=>$Virsew13xpli["Invoice"]?$Virsew13xpli["Invoice"]:"",
		                "InvoiceDate"=>$Virsew13xpli["InvoiceDate"]?$Virsew13xpli["InvoiceDate"]:"",
		                "InvoiceValue"=>$Virsew13xpli["InvoiceValue"]?$Virsew13xpli["InvoiceValue"]:"",
		                "DueDate"=>$Virsew13xpli["DueDate"]?$Virsew13xpli["DueDate"]:"");
            			array_push($Vw10cior02ni,$Vuz2tqweebiu);
		        	}
		        	$Vlfwkhon2bz0["response"]=$Vw10cior02ni;
		   		}else{
				     $Vlfwkhon2bz0["error"]=0;
				     $Vlfwkhon2bz0["response"]=array();
			 	}
                
            }

    }
    else{
	        $Vlfwkhon2bz0["error"]=1;
			$Vlfwkhon2bz0["response"]="Intentelo de nuevo mas tarde";
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