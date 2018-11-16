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
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);


        if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns1retrieveConsumptionDetailInformationResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

    $Vy3senayax03=array("CONSUMOELEGFIJO","CONSUMOAMIFIJO","CONSUMOPROMOCION","COMSUMOVIDEOLLAM","CONSUMOSSMSPROMO","CONSUMOELEGIDOS");

   $Vpsm42ro4mkq=(($VqhzkfsafzrcRes->AcknowledgementIndicator=="WARNING")?0:(($VqhzkfsafzrcRes->AcknowledgementIndicator=="SUCCESS")?0:1));

    if (($Vpsm42ro4mkq==0)){
    $Vlfwkhon2bz0["error"]=0;    

    $Vautxf03llyt = $this->curlWigi->getArray($VqhzkfsafzrcRes->ServiceUsage);
    $Vautxf03llyt_productos=array();
       

    foreach ($Vautxf03llyt as $Virsew13xpli){
        $Vamjl2freiof=explode('T',$Virsew13xpli->ServiceUsagePeriod->StartDate);
        $Vamjl2freiof=((count($Vamjl2freiof))?$Vamjl2freiof[0]:"No disponible");

        $Vv2sictytigu=explode('T',$Virsew13xpli->ServiceUsagePeriod->EndDate);
        $Vv2sictytigu=((count($Vv2sictytigu))?$Vv2sictytigu[0]:"No disponible");

        $Val5yimua5b2=array(
            "StartDate"=>$Vamjl2freiof,
            "EndDate"=>$Vv2sictytigu
        );


        if(isset($Virsew13xpli->ServiceFeatureUsage)) {
            $Vautxf03llyt_ServiceFeatureUsage=$this->curlWigi->getArray($Virsew13xpli->ServiceFeatureUsage);
            foreach($Vautxf03llyt_ServiceFeatureUsage as $V4epriidtjfx){
        
          if( (array()!=$V4epriidtjfx->ServiceFeatureSubType) && ($V4epriidtjfx->ServiceFeatureType=="Datos" || $V4epriidtjfx->ServiceFeatureType=="V" || $V4epriidtjfx->ServiceFeatureType=="Voz"|| $V4epriidtjfx->ServiceFeatureType=="S")) {
            
                    $Vuz2tqweebiu["ServiceType"]=$Virsew13xpli->ServiceType;
                    $Vuz2tqweebiu["ServiceFeatureType"]=$V4epriidtjfx->ServiceFeatureType;

                    $V4epriidtjfx->FeatureUsage->Quantity=$this->curlWigi->arrayToString($V4epriidtjfx->FeatureUsage->Quantity);
                    if ($V4epriidtjfx->FeatureUsage->Quantity=="NO" || $V4epriidtjfx->FeatureUsage->Quantity==""){
                        $V4epriidtjfx->FeatureUsage->Quantity="0";
                    }

                    if ($Vuz2tqweebiu["ServiceFeatureType"] == "V"){
                        if ($V4epriidtjfx->FeatureUsage->Unit=="Net"){
                            $V4epriidtjfx->FeatureUsage->Unit="";
                        }
                    }

                    $Vuz2tqweebiu["FeatureUsage"]=$V4epriidtjfx->FeatureUsage;
                    

                    if (!in_array($V4epriidtjfx->ServiceFeatureSubType, $Vy3senayax03)) {

                        if($Virsew13xpli->ServiceType=="Postpago"){
                            $Vuz2tqweebiu["ServiceFeatureSubType"]=getTag($V4epriidtjfx->ServiceFeatureSubType);
                        }else{
                            $Vuz2tqweebiu["ServiceFeatureSubType"]=$V4epriidtjfx->ServiceFeatureSubType;
                        }

                        array_push($Vautxf03llyt_productos,$Vuz2tqweebiu);
                    }
            
            }

        }
    }
    
    

     if($Virsew13xpli->ServiceType=='ROAMING'){
            $V00h2hmbvay3["roaming"]=$Val5yimua5b2;
        }else if($Virsew13xpli->ServiceType=='Postpago'){
            $V00h2hmbvay3["postpago"]=$Val5yimua5b2;
            $V00h2hmbvay3["sms"]=$Val5yimua5b2;
        }
    }

    $V00h2hmbvay3["historial"]=$Vautxf03llyt_productos;
    $Vlfwkhon2bz0["response"]=$V00h2hmbvay3;

}else{
    $Vlfwkhon2bz0["error"]=1;
    $Vlfwkhon2bz0["response"]="Error al realizar la operación.";
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