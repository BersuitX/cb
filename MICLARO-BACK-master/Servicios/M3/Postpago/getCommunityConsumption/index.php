<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.35.235:80/CommunityServiceApplication_SBProject/Proxies/CommunityInformationWS_PS?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

     $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    

	if($VqhzkfsafzrcRes["error"] == 0){

		
		$V4kfh5akqyzi = "tnsgetCommunityConsumptionResponse";

		$Vlfwkhon2bz0 = array();
		$Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
		$Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


		if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
			$VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

        	if($VqhzkfsafzrcRes->tnsacknowledgment->tnsindicator=="SUCCESS"){
                $Vlfwkhon2bz0["error"]=0;
                $Viazor1gcog3=array();

                
                if(isset($VqhzkfsafzrcRes->tnsmembers)){
                    $Vd1nfshtsrd5 = $this->curlWigi->getArray($VqhzkfsafzrcRes->tnsmembers); 
                    foreach ($VqhzkfsafzrcRes->tnsmembers->tnsmember as $Virsew13xpli) {
                        $Virsew13xpli = (array)$Virsew13xpli;
                        
                        
                        
                        
                        $Vuz2tqweebiu=array(
                            "msisdn"=>$Virsew13xpli["tnsmsisdn"],
                            "member_consumption"=>(($Virsew13xpli["tnsmember_consumption"]!="")?$Virsew13xpli["tnsmember_consumption"]:"0"),
                            "member_assigned_quota"=>(($Virsew13xpli["tnsmember_assigned_quota"]!="")?$Virsew13xpli["tnsmember_assigned_quota"]:"0"),
                            );

                        array_push($Viazor1gcog3,$Vuz2tqweebiu);
                      
                    }

                    $VqhzkfsafzrcInfo = (array)$VqhzkfsafzrcRes->tnscommunity_info;

                    $VqhzkfsafzrcQuota = $this->curlWigi->arrayToString($VqhzkfsafzrcInfo["tnscommunity_total_quota"]);
                    if($VqhzkfsafzrcQuota == ""){ $VqhzkfsafzrcQuota = 0; }

                    $Vlfwkhon2bz0["response"]=array(
                        "members"=>$Viazor1gcog3,
                        "total_quota"=>$VqhzkfsafzrcQuota,
                        "community_consumption"=>$this->curlWigi->arrayToString($VqhzkfsafzrcInfo["tnscommunity_consumption"])
                    );
                }else{
                    $Vlfwkhon2bz0["error"]=1;
                    
                    $Vlfwkhon2bz0["response"]=$VqhzkfsafzrcRes;

                }
            }else{
         $Vlfwkhon2bz0["error"]=1;
        
        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
        
         if(isset($VqhzkfsafzrcRes["tnsacknowledgment"])){
            $Vqss4dnehkmb = (array)$VqhzkfsafzrcRes["tnsacknowledgment"];
            
        }
        $Vlfwkhon2bz0["response"]=$Vqss4dnehkmb["tnsmessage"];


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