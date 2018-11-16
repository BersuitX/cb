<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.35.240/SelfServiceMobile_Project/Services/Proxy_Pipelines/ServiceManagement_PS?WSDL";  


$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;

    	$Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
    	$Vqhzkfsafzrc->LineOfBusiness=$Vcw3r1lhk5bx->LineOfBusiness;
        
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns2retrievePlanResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            

            $Vpfs1kkzy45w="0";
            $Vvxulomxkjci="0";
            $Vsboquut5140="0";

           

            $Vpsm42ro4mkq=(($VqhzkfsafzrcRes->AcknowledgementIndicator=="SUCCESS")?0:1);

            if (($Vpsm42ro4mkq==1)){
                $Vlfwkhon2bz0["error"]=1;
                $Vlfwkhon2bz0["response"]=isset($Vxecysgizhzd)?$Vxecysgizhzd:"Error al realizar la operación.";
            }else{
                $Vlfwkhon2bz0["error"]=0;
            if(isset($VqhzkfsafzrcRes->Plan,$VqhzkfsafzrcRes->Plan->PlanLines)){
                    setlocale(LC_MONETARY, 'es_CO');
                    foreach($VqhzkfsafzrcRes->Plan->PlanLines as $Vavqdssoj31n){
                        $Vvixtdbdmv2g="0";

                        $Vqhzkfsafzrclinea = (array)$Vavqdssoj31n->UsageLimit;
                        if(isset($Vqhzkfsafzrclinea["Quantity"]) && is_numeric($Vqhzkfsafzrclinea["Quantity"])){
                            $Vvixtdbdmv2g=$Vqhzkfsafzrclinea["Quantity"];
                        }
                        $Vavqdssoj31n = (array)$Vavqdssoj31n;
                        if($Vavqdssoj31n["FeatureName"]=="Datos"){
                            $Vpfs1kkzy45w=$Vvixtdbdmv2g;
                        }else if($Vavqdssoj31n["FeatureName"]=="SMS"){
                            $Vvxulomxkjci=$Vvixtdbdmv2g;
                        }else if($Vavqdssoj31n["FeatureName"]=="Voz"){
                            $Vsboquut5140=$Vvixtdbdmv2g;
                        }
                    }
                }

                
               

                $Vurxi1gtw1mx = array(array("NAME"=>"Roam","TIPO"=>"Datos","TXT"=>"Roaming Internacional"),array("NAME"=>"LDI","TIPO"=>"Voz","TXT"=>"Larga distancia internacional"),array("NAME"=>"SMS","TIPO"=>"SMS","TXT"=>"SMS Recurrente"));

                $V4k1jlqly0l0 = array();
                $VqhzkfsafzrcPackage = (array)$VqhzkfsafzrcRes->Plan;

                for ($Vxja1abp34yq=0; $Vxja1abp34yq < sizeof($Vurxi1gtw1mx) ; $Vxja1abp34yq++) { 
                    $Vgpjmw221p0b = "PackageRecurrent".$Vurxi1gtw1mx[$Vxja1abp34yq]["NAME"];

                    if(isset($VqhzkfsafzrcPackage[$Vgpjmw221p0b],$VqhzkfsafzrcPackage["PackageRecurrentLDI"])){
                    $VqhzkfsafzrcPackage[$Vgpjmw221p0b] = $this->curlWigi->getArray($VqhzkfsafzrcPackage[$Vgpjmw221p0b]); 

                        for ($V5kfw3q1o1vh=0; $V5kfw3q1o1vh < sizeof($VqhzkfsafzrcPackage[$Vgpjmw221p0b]); $V5kfw3q1o1vh++) { 
               
                        $Vxja1abp34yqtem = array();
                        $Vxja1abp34yqtem["tipo"] = $Vurxi1gtw1mx[$Vxja1abp34yq]["TIPO"];
                        $Vxja1abp34yqtem["txt"] = $Vurxi1gtw1mx[$Vxja1abp34yq]["TXT"];
                        $Vxja1abp34yqtem["Code"] = isset($VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Spcode)?$VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Spcode:$VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Code;
                        $Vxja1abp34yqtem["Name"] = isset($VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Name)?$VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Name:$VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->NamePackage;
                        $Vxja1abp34yqtem["Description"] = $VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Description;
                        $Vxja1abp34yqtem["Value"] = $VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Value;
                        $Vjav010uhv5a = "";

                        if(isset($VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Validity)){
                            $Vjav010uhv5a = explode("T", $VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->Validity)[0];
                        }else{
                            if(isset($VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->State)){
                                $Vjav010uhv5a = substr($VqhzkfsafzrcPackage[$Vgpjmw221p0b][$V5kfw3q1o1vh]->State,0,-1);
                                $Vm31p3rcwdy5 = substr($Vjav010uhv5a,0,2);
                                $Vubpn3do4h5m = substr($Vjav010uhv5a,2,2);
                                $Vwupwmauckmg = substr($Vjav010uhv5a,4,2);
                                $Vjav010uhv5a = '20'.$Vwupwmauckmg."-".$Vubpn3do4h5m."-".$Vm31p3rcwdy5;
                            }
                        }

                        $Vxja1abp34yqtem["Fecha"] = $Vjav010uhv5a;
                        array_push($V4k1jlqly0l0, $Vxja1abp34yqtem);
                    }
                }
            }



                $VqhzkfsafzrcPlan = (array)$VqhzkfsafzrcRes->Plan;
                $VqhzkfsafzrcPlan2 = (array)$VqhzkfsafzrcRes->Plan->FrequentNumbersAllowed;

                $Vxrxcdobmuag=array("Text"=>"0","Call"=>"0","Free"=>"0");

                if ($VqhzkfsafzrcPlan["FrequentNumbersAllowed"]) {
                    $Vxrxcdobmuag["Text"]=($this->curlWigi->esArray($VqhzkfsafzrcPlan2["Text"]))?0:$VqhzkfsafzrcPlan2["Text"];
                    $Vxrxcdobmuag["Call"]=($this->curlWigi->esArray($VqhzkfsafzrcPlan2["Call"]))?0:$VqhzkfsafzrcPlan2["Call"];
                    $Vxrxcdobmuag["Free"]=($this->curlWigi->esArray($VqhzkfsafzrcPlan2["Free"]))?0:$VqhzkfsafzrcPlan2["Free"];
               }


                $Vp4g0ix5tfem="$0";

                if (isset($VqhzkfsafzrcPlan["PlanAmount"])) {
                    if ($VqhzkfsafzrcPlan["PlanAmount"]==-1) {
                        $Vp4g0ix5tfem="ilimitado";
                    }else{
                        $Vp4g0ix5tfem="$".number_format($VqhzkfsafzrcPlan["PlanAmount"], 0, ",", ".");
                    }
                }

                $Vqhzkfsafzrc=array(
                    "planesRecurrentes"=>$V4k1jlqly0l0,
                    "datos"=>(($Vpfs1kkzy45w==-1)?"ilimitado":$Vpfs1kkzy45w),
                    "sms"=>(($Vvxulomxkjci==-1)?"ilimitado":$Vvxulomxkjci),
                    "voz"=>(($Vsboquut5140==-1)?"ilimitado":$Vsboquut5140),
                    "PlanID"=>isset($VqhzkfsafzrcPlan["PlanID"])?$VqhzkfsafzrcPlan["PlanID"]:"",
                    "PlanName"=>isset($VqhzkfsafzrcPlan["PlanName"])?$VqhzkfsafzrcPlan["PlanName"]:"",
                    "PlanCode"=>isset($VqhzkfsafzrcPlan["PlanCode"])?$VqhzkfsafzrcPlan["PlanCode"]:"",
                    "PlanAmount"=>$Vp4g0ix5tfem,
                    "PlanDescription"=>isset($VqhzkfsafzrcPlan["PlanDescription"])?$VqhzkfsafzrcPlan["PlanDescription"]:"",
                    "SocialNetworks"=>isset($VqhzkfsafzrcPlan["SocialNetworks"])?1:0,
                    "PlanVoiceUnit"=>isset($VqhzkfsafzrcPlan["PlanVoiceUnit"])?$VqhzkfsafzrcPlan["PlanVoiceUnit"]:"",
                    "FrequentNumbersAllowed"=>$Vxrxcdobmuag);
   
                $Vlfwkhon2bz0["response"]=$Vqhzkfsafzrc;
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