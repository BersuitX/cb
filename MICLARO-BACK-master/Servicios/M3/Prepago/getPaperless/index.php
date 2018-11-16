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

        
        $V4kfh5akqyzi = "ns2getPaperlessResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

           
           $Vpsm42ro4mkq=(($VqhzkfsafzrcRes->AcknowledgementIndicator=="SUCCESS")?0:1);

            if (($Vpsm42ro4mkq==1)){
            $Vlfwkhon2bz0["error"]=1;
            $Vlfwkhon2bz0["response"]="Error al realizar la operación.";
            }else{
             $Vlfwkhon2bz0["error"]=0;


            if(isset($V3aybe52clk2)){
                $Vgixzqpkiqhx=json_encode($V3aybe52clk2, true);

                if(json_last_error()==JSON_ERROR_NONE){
                    $Vgixzqpkiqhx=json_decode($Vgixzqpkiqhx);
        
                    if( is_array($Vgixzqpkiqhx)){
                        $V3aybe52clk2="";
                    }
                }
             }
    
         if(isset($Vhazrpyu0tzi) && !is_numeric($Vhazrpyu0tzi) ){
                $Vgixzqpkiqhx=json_encode($Vhazrpyu0tzi, true);
        
            if(json_last_error()==JSON_ERROR_NONE){
                $Vgixzqpkiqhx=json_decode($Vgixzqpkiqhx);
            
                if( is_array($Vgixzqpkiqhx)){
                    $Vhazrpyu0tzi="";
                }
            }
    }
    
    if(isset($V3g5mv4ynk11)){
        $Vgixzqpkiqhx=json_encode($V3g5mv4ynk11, true);
        
        if(json_last_error()==JSON_ERROR_NONE){
            $Vgixzqpkiqhx=json_decode($Vgixzqpkiqhx);
    
            if( is_array($Vgixzqpkiqhx)){
                $V3g5mv4ynk11="";
            }
        }
    }

         $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
            if(isset($VqhzkfsafzrcRes["IsPaperless"],$VqhzkfsafzrcRes["ActivationDate"],
                $VqhzkfsafzrcRes["UserMobileNumberforPaperless"],$VqhzkfsafzrcRes["UserEmailforPaperless"])){
                $Vvdbn30afvf4 = $VqhzkfsafzrcRes["IsPaperless"];
                $V3aybe52clk2 = $VqhzkfsafzrcRes["ActivationDate"];
                $Vhazrpyu0tzi = $VqhzkfsafzrcRes["UserMobileNumberforPaperless"];
                $V3g5mv4ynk11 = $VqhzkfsafzrcRes["UserEmailforPaperless"];
            }

    $Vlfwkhon2bz0["response"]=array(
        "IsPaperless"=>((isset($Vvdbn30afvf4) && $Vvdbn30afvf4=="true")?"1":"0"),
        "ActivationDate"=>$V3aybe52clk2,
        "UserMobileNumberforPaperless"=>$Vhazrpyu0tzi,
        "UserEmailforPaperless"=>$V3g5mv4ynk11);
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