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
       
        $Vvkwvjdx1mcb = json_decode($Vyvmmv0t5uw2->getBody());
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->LineOfBusiness=$Vcw3r1lhk5bx->LineOfBusiness;
    
        $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
        $this->curlWigi->URL=$this->urlServicio;
        $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
        
        $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/consultarPlanesPospago\"";
        
        $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

       
        if($VqhzkfsafzrcRes["error"] == 0){

            
            $V4kfh5akqyzi = "ConsultarPlanesPospagoResponse";

            $Vlfwkhon2bz0 = array();
            $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
            $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


            if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
                $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

                $Vpsm42ro4mkq= 1;
                $Vzvarhvycpzi = "Temporalmente este módulo no se encuentra disponible";
        
                if(isset($VqhzkfsafzrcRes->PlanLines,$VqhzkfsafzrcRes->PlanLines->aPlanLines) && sizeof($VqhzkfsafzrcRes->PlanLines->aPlanLines) > 0){
                    $Vpsm42ro4mkq= 0;
                    $Velg44izwv1o = $this->curlWigi->getArray($VqhzkfsafzrcRes->PlanLines,$VqhzkfsafzrcRes->PlanLines->aPlanLines);
                    $Vzvarhvycpzi = array();

                    foreach ($VqhzkfsafzrcRes->PlanLines->aPlanLines as $Virsew13xpli) {

                        $Vvixtdbdmv2g = isset($Velg44izwv1o["aplanAmount"])?$Velg44izwv1o["aplanAmount"]:0;

                        if(isset($Vvnmihjmkaad["valorPlan"])){
                            $Vvnmihjmkaad["valorPlan"] = str_replace('$','',$Vvnmihjmkaad["valorPlan"]);
                            $Vvnmihjmkaad["valorPlan"] = str_replace('.','',$Vvnmihjmkaad["valorPlan"]);
                        }else{
                            $Vvnmihjmkaad["valorPlan"] = 0;
                        }
                
                        if(intval($Vvixtdbdmv2g) >= intval($Vvnmihjmkaad["valorPlan"])){

                            $Virsew13xpli = (array)$Virsew13xpli;

                            $Vuz2tqweebiu=array(
                                "PlanID"=>$Virsew13xpli["aplanID"]?$Virsew13xpli["aplanID"]:"",
                                "IsOpen"=>$Virsew13xpli["aisOpen"]?$Virsew13xpli["aisOpen"]:"",
                                "PlanName"=>$Virsew13xpli["aplanName"]?$Virsew13xpli["aplanName"]:"",
                                "PlanDescription"=>$Virsew13xpli["aplanDescription"]?$Virsew13xpli["aplanDescription"]:"",
                                "PlanCode"=>$Virsew13xpli["aplanCode"]?$Virsew13xpli["aplanCode"]:"",
                                "PlanAmount"=>$Virsew13xpli["aplanAmount"]?$Virsew13xpli["aplanAmount"]:"",
                                "PlanVoiceUnit"=>$Virsew13xpli["aplanVoiceUnit"]?$Virsew13xpli["aplanVoiceUnit"]:"",
                                "FrequentNumbersAllowed"=>$Virsew13xpli["afrequentNumbersAllowed"]?$Virsew13xpli["afrequentNumbersAllowed"]:"",
                                "IsSharedDataPlan"=>$Virsew13xpli["aisSharedDataPlan"]?$Virsew13xpli["aisSharedDataPlan"]:"",
                                "PlanLines"=>array()
                            );
                    
                            if(isset($Virsew13xpli["afeatures"]->aFeature)){

                                foreach ($Virsew13xpli["afeatures"]->aFeature as $Virsew13xpli2) {
                                    $Virsew13xpli2 = (array)$Virsew13xpli2;
                                    $Vuz2tqweebiu2=array(
                                        "FeatureID"=>$Virsew13xpli2["afeatureID"]?$Virsew13xpli2["afeatureID"]:"",
                                        "FeatureName"=>$Virsew13xpli2["afeatureName"]?$Virsew13xpli2["afeatureName"]:"",
                                        "Quantity"=>$Virsew13xpli2["aquantity"]?$Virsew13xpli2["aquantity"]:"",
                                        "Unit"=>$Virsew13xpli2["aunit"]?$Virsew13xpli2["aunit"]:""
                                    );
                                  array_push($Vuz2tqweebiu["PlanLines"], $Vuz2tqweebiu2);
                                }
                            
                            }
                        
                            array_push($Vzvarhvycpzi, $Vuz2tqweebiu);
                       
                        }

                    }

                }

                $Vlfwkhon2bz0["error"]=$Vpsm42ro4mkq;
                $Vlfwkhon2bz0["response"]=$Vzvarhvycpzi;

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