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

		
		$V4kfh5akqyzi = "tnsgetCommunityInformationResponse";

		$Vlfwkhon2bz0 = array();
		$Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
		$Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


		if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
			$VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
			
			
	       if($VqhzkfsafzrcRes->tnsacknowledgment->tnsindicator=="SUCCESS"){
                $V4leehmgllkx=false;
                if(sizeof($VqhzkfsafzrcRes->tnscommunity_info) == 2){
                    foreach ($VqhzkfsafzrcRes->tnscommunity_info as $Vea520hgvpf2) {
                        if(intval($Vqhzkfsafzrc->type) == intval($VqhzkfsafzrcRes->comunidad->tnscommunity_type)){
                            $Vqjd2gokuyk4=$Vea520hgvpf2;
                            $V4leehmgllkx=true;
                        }
                    }
                }        
                $V4leehmgllkx?$Vyettkfditge=$Vqjd2gokuyk4:'';
                
               

                $Va51xjcyh1tk = ((intval($Vqhzkfsafzrc->type)==1)?"Datos Compartidos":"Familia y Amigos");
        
                $Viazor1gcog3 = array();
                $Vyuw2t3mntax = false;
                $Vlfwkhon2bz0["error"]=0;   
                if(isset($VqhzkfsafzrcRes->tnscommunity_info,$VqhzkfsafzrcRes->tnscommunity_info->tnsmembers) && sizeof($VqhzkfsafzrcRes->tnscommunity_info->tnsmembers) > 0){
                    
                    foreach ($VqhzkfsafzrcRes->tnscommunity_info->tnsmembers->tnsmember as $Virsew13xpli) {
                        $Virsew13xpli = (array)$Virsew13xpli;
                        if(isset($Virsew13xpli["tnsmsisdn"],$Virsew13xpli["tnsmember_type"],$Virsew13xpli["tnsstate"])){
                            $V4jx5gsooz0z = $Virsew13xpli["tnsmsisdn"];
                            $Vgd2tgirtvto = $Virsew13xpli["tnsmember_type"];
                            $Vowbybgdr0ze = $Virsew13xpli["tnsstate"];
                        }

                        $Vuz2tqweebiu=array(
                            "msisdn"=>$Virsew13xpli["tnsmsisdn"],
                            "member_type"=>$Virsew13xpli["tnsmember_type"],
                            "state"=>$Virsew13xpli["tnsstate"]);

                        if($Vqhzkfsafzrc->AccountId == $Virsew13xpli["tnsmsisdn"] && $this->curlWigi->arrayToString($Virsew13xpli["tnsmember_type"]) == "ADMIN"){
                            $Vyuw2t3mntax = true;
                        }


                        array_push($Viazor1gcog3,$Vuz2tqweebiu);
                    }


    
        if($Vyuw2t3mntax){

             $Vjav010uhv5a=$VqhzkfsafzrcRes->tnscommunity_info->tnscreation_date;

                if (isset($VqhzkfsafzrcRes->tnscommunity_info->tnscreation_date)) {
                    $Vjav010uhv5a = explode("T", $VqhzkfsafzrcRes->tnscommunity_info->tnscreation_date);
                    if (count($Vjav010uhv5a)>0) {
                        $Vjav010uhv5a=$Vjav010uhv5a[0];
                    }
                }

            $VqhzkfsafzrcInfo = (array)$VqhzkfsafzrcRes->tnscommunity_info;
            $VqhzkfsafzrcInfoTerms = (array)$VqhzkfsafzrcRes->tnscommunity_info->tnsofferTerms;

            $VqhzkfsafzrcQuota = $this->curlWigi->arrayToString($VqhzkfsafzrcInfo["tnstotal_quota"]);
            if($VqhzkfsafzrcQuota == ""){ $VqhzkfsafzrcQuota = 0; }

            $Vlfwkhon2bz0["response"]=array(
                    "members"=>$Viazor1gcog3,
                    "type"=> $VqhzkfsafzrcInfo["tnscommunity_type"],
                    "id"=> $VqhzkfsafzrcInfo["tnscommunity_id"],
                    "creation_date"=>$Vjav010uhv5a,
                    "state"=> $VqhzkfsafzrcInfo["tnsstate"],
                    "members_current"=> $this->curlWigi->arrayToString($VqhzkfsafzrcInfo["tnscount_members_current"]),
                    "members_allowed"=> $this->curlWigi->arrayToString($VqhzkfsafzrcInfo["tnscount_members_allowed"]),
                    "total_quota"=> $VqhzkfsafzrcQuota,
                    "offerTerms"=>array(
                        "service_id"=>$VqhzkfsafzrcInfoTerms["tnsservice_id"],
                        "service_type"=>$VqhzkfsafzrcInfoTerms["tnsservice_type"],
                        "name"=>$this->curlWigi->arrayToString($VqhzkfsafzrcInfoTerms["tnsname"]),
                        "description"=>$this->curlWigi->arrayToString($VqhzkfsafzrcInfoTerms["tnsdescription"])
                    )
                        
                );
   
}else{
                $Vlfwkhon2bz0["error"]=1;
                $Vlfwkhon2bz0["response"]="Actualmente perteneces a una comunidad de ".$Va51xjcyh1tk.", si deseas gestionar algún cambio comunícate con la línea administradora.";
            }
        }
        else{
            $Vlfwkhon2bz0["error"]=1;
            $Vlfwkhon2bz0["response"]="La línea que intentas consultar no pertenece al servicio de ".$Va51xjcyh1tk.".";
          
        }

}else{

      $Vlfwkhon2bz0["error"]=1;
        
        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
        $Vvu22isen3ff='';
        if(isset($VqhzkfsafzrcRes["tnsacknowledgment"])){
            $Vvu22isen3ff = (array)$VqhzkfsafzrcRes["tnsacknowledgment"]->tnsmessage;
            $Vvu22isen3ff = $Vvu22isen3ff[0];
        }


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
            }
        
        $Vlfwkhon2bz0["response"]=$Vvu22isen3ff;


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