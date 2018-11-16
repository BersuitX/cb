<?php



require __DIR__ . '/../../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.24.42.39:8002/UsageSpecification/v1.0/"; 

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
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
$Vlfwkhon2bz0 = array();
     $Vlfwkhon2bz0["data"]=$VqhzkfsafzrcRes;

    
     if($VqhzkfsafzrcRes["error"] == 0){
      $V4kfh5akqyzi = "ns1GetBalanceConsumptionResponse";
       
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;


    if($VqhzkfsafzrcRes->responseStatus->code=="FS_ESB_0"){  
        $VqhzkfsafzrcConsumptions = (array)$VqhzkfsafzrcRes->balanceConsumption->dataConsumptions;
        $Viuln3mhdka5 = (array)$VqhzkfsafzrcRes->balanceConsumption->voiceConsumptions;
        $Viuln3mhdka5total = (array)$VqhzkfsafzrcRes->balanceConsumption->voiceConsumptions->totalConsumptions;
        $Vuvy25hlvk2s = (array)$VqhzkfsafzrcRes->balanceConsumption->messageConsumptions;
        $Vuvy25hlvk2stotal = (array)$VqhzkfsafzrcRes->balanceConsumption->messageConsumptions->totalConsumptions;
        $Vk2t5gjs52vz = (array)$VqhzkfsafzrcRes->balanceConsumption->additionalServicesConsumptions;
        $Vk2t5gjs52vztotal = (array)$VqhzkfsafzrcRes->balanceConsumption->additionalServicesConsumptions->totalConsumptions;
        
        $Vautxf03llyt = array();

        if(isset($VqhzkfsafzrcConsumptions["consumption"])&&sizeof($VqhzkfsafzrcConsumptions["consumption"])>0){
            foreach ($VqhzkfsafzrcConsumptions["consumption"] as $Virsew13xpli) {
                $Virsew13xpli = (array)$Virsew13xpli;
                $Vwmgafxuvzgd = "No tiene tipo";
                $Vwmgafxuvzgduno = $Virsew13xpli["@attributes"];
                if($Vwmgafxuvzgduno["type"]=="120"){
                    $Vwmgafxuvzgd = "Datos";
                }if($Vwmgafxuvzgduno["type"]=="121"){
                    $Vwmgafxuvzgd = "WhatsApp";
                }if($Vwmgafxuvzgduno["type"]=="122"){
                    $Vwmgafxuvzgd = "Facebook";
                }
                $Vpfs1kkzy45w = array("RATING_GROUP"=>"1",
                "RATING_GROUP_DESCRIPTION"=>$Vwmgafxuvzgd,
                "CONSUMO_TOTAL_RATING_GROUP"=>$Virsew13xpli["value"],
                "COSTO_TOTAL_RATING_GROUP_MAIN_ACCOUNT"=>0,
                "COSTO_TOTAL_RATING_GROUP_BONOS"=>0,
                "COSTO_TOTAL_RATING_GROUP"=>$Virsew13xpli["amount"],
                "UNIDAD_CONSUMO"=>"B",
                "tipo"=>"TotalConsumoRatingGroup");
                array_push($Vautxf03llyt, $Vpfs1kkzy45w);
            }

            foreach ($VqhzkfsafzrcConsumptions["consumption"] as $Virsew13xpli) {
                $Virsew13xpli = (array)$Virsew13xpli;
                $Vwmgafxuvzgd = "No tiene tipo";
                $Vwmgafxuvzgduno = $Virsew13xpli["@attributes"];
                if($Vwmgafxuvzgduno["type"]=="120"){
                    $Vwmgafxuvzgd = "Datos";
                }if($Vwmgafxuvzgduno["type"]=="121"){
                    $Vwmgafxuvzgd = "WhatsApp";
                }if($Vwmgafxuvzgduno["type"]=="122"){
                    $Vwmgafxuvzgd = "Facebook";
                }

                $Vjav010uhv5a=explode('T', $Virsew13xpli["date"]);
                $V0w3jgdi00hx = str_replace("-", "/", $Vjav010uhv5a);
                $Vjav010uhv5afinal=$V0w3jgdi00hx[0];

                $Vjav010uhv5a2=explode('T', $Virsew13xpli["date"]);
                $Vjav010uhv5afinal2=$Vjav010uhv5a2[1];
                $V0w3jgdi00hx2 = explode('-', $Vjav010uhv5afinal2);
                $V0w3jgdi00hxFinal = $V0w3jgdi00hx2[0];

                $Vjav010uhv5aTotal = $Vjav010uhv5afinal." ".$V0w3jgdi00hxFinal;

                $Vpfs1kkzy45w = array("TRANSACTION_DATE"=>$Vjav010uhv5aTotal,
                "RATING_GROUP"=>"1",
                "RATING_GROUP_DESCRIPTION"=>$Vwmgafxuvzgd,
                "CONSUMO_TOTAL_RATING_GROUP"=>$Virsew13xpli["value"],
                "COSTO_TOTAL_RATING_GROUP_MAIN_ACCOUNT"=>0,
                "COSTO_TOTAL_RATING_GROUP_BONOS"=>0,
                "COSTO_TOTAL_RATING_GROUP"=>$Virsew13xpli["amount"],
                "UNIDAD_CONSUMO"=>"B",
                "tipo"=>"TotalConsumoRatingGroupDia");
                array_push($Vautxf03llyt, $Vpfs1kkzy45w);

            }
        }

    if(isset($Viuln3mhdka5["consumption"])&&sizeof($Viuln3mhdka5["consumption"])>0){
        foreach ($Viuln3mhdka5["consumption"] as $Virsew13xpli) {

            $Virsew13xpli = (array)$Virsew13xpli;
            $Vhpsqt0br5jp = $Virsew13xpli["target"];
            $V5mlu1ykrbu5 = strlen($Vhpsqt0br5jp)-2;
            $Vswrqic01o1e = substr($Vhpsqt0br5jp,2,$V5mlu1ykrbu5);

            $Vjav010uhv5a=explode('T', $Virsew13xpli["date"]);
            $V0w3jgdi00hx = str_replace("-", "/", $Vjav010uhv5a);
            $Vjav010uhv5afinal=$V0w3jgdi00hx[0];

            $Vjav010uhv5a2=explode('T', $Virsew13xpli["date"]);
            $Vjav010uhv5afinal2=$Vjav010uhv5a2[1];
            $V0w3jgdi00hx2 = explode('-', $Vjav010uhv5afinal2);
            $V0w3jgdi00hxFinal = $V0w3jgdi00hx2[0];


            $Vjav010uhv5aTotal = $Vjav010uhv5afinal." ".$V0w3jgdi00hxFinal;

            $Vmqffvic3cyu = array("FECHA_LLAMADA"=>$Vjav010uhv5aTotal,
            "VALOR_LLAMADA_MAIN_ACCOUNT"=>0,
            "VALOR_LLAMADA_BONOS"=>0,
            "VALOR_LLAMADA"=>$Virsew13xpli["amount"],
            "DESCRICION_LLAMADA"=>"Llamada a ".$Vswrqic01o1e,
            "DURACION_LLAMADA"=>$Virsew13xpli["value"],
            "tipo"=>"DetalleLlamadas");
            array_push($Vautxf03llyt, $Vmqffvic3cyu);
        }

    }

    if(isset($Viuln3mhdka5total["total"])&&sizeof($Viuln3mhdka5total["total"])>0){
        $Vmqffvic3cyutotal = array();
         foreach ($Viuln3mhdka5total["total"] as $Virsew13xpli) {
            $Virsew13xpli = (array)$Virsew13xpli;
            $Vrtphfkkza3o  = $Virsew13xpli["@attributes"];
            if($Vrtphfkkza3o["desc"] =="TVC009"){
                $Vmqffvic3cyutotal["TOTAL_LLAMADAS"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TVC001"){
                $Vmqffvic3cyutotal["TOTAL_SEGUNDOS"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TVC010"){
                $Vmqffvic3cyutotal["TOTAL_VIDEOLLAMADAS"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TVC011"){
                $Vmqffvic3cyutotal["TOTAL"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TVA001"){
                $Vmqffvic3cyutotal["VALOR_TOTAL_LLAMADAS_MAIN_ACCOUNT"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TVA002"){
                $Vmqffvic3cyutotal["VALOR_TOTAL_LLAMADAS_BONOS"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TVA003"){
                $Vmqffvic3cyutotal["VALOR_TOTAL_LLAMADAS"] = $Vrtphfkkza3o["value"];
                $Vmqffvic3cyutotal["VALOR_TOTAL"] = $Vrtphfkkza3o["value"];
            }

            $Vmqffvic3cyutotal["VALOR_TOTAL_VIDEOLLAMADAS_MAIN_ACCOUNT"] = 0;
            $Vmqffvic3cyutotal["VALOR_TOTAL_VIDEOLLAMADAS_BONOS"] = 0;
            $Vmqffvic3cyutotal["VALOR_TOTAL_VIDEOLLAMADAS"] = 0;
            $Vmqffvic3cyutotal["tipo"] = "ResumenLlamadas";
            $Vmqffvic3cyutotal["FechaInicial"] = $Vqhzkfsafzrc->FechaInicial;
            $Vmqffvic3cyutotal["FechaFinal"] = $Vqhzkfsafzrc->FechaFinal;
        }

        array_push($Vautxf03llyt, $Vmqffvic3cyutotal);
    }

   if(isset($Vuvy25hlvk2s["consumption"])&&sizeof($Vuvy25hlvk2s["consumption"])>0){

        foreach ($Vuvy25hlvk2s["consumption"] as $Virsew13xpli) {
            $Virsew13xpli = (array)$Virsew13xpli;

            $Vhpsqt0br5jp = $Virsew13xpli["target"];
            $V5mlu1ykrbu5 = strlen($Vhpsqt0br5jp)-2;
            $Vswrqic01o1e = substr($Vhpsqt0br5jp,2,$V5mlu1ykrbu5);

            $Vjav010uhv5a=explode('T', $Virsew13xpli["date"]);
            $V0w3jgdi00hx = str_replace("-", "/", $Vjav010uhv5a);
            $Vjav010uhv5afinal=$V0w3jgdi00hx[0];

            $Vjav010uhv5a2=explode('T', $Virsew13xpli["date"]);
            $Vjav010uhv5afinal2=$Vjav010uhv5a2[1];
            $V0w3jgdi00hx2 = explode('-', $Vjav010uhv5afinal2);
            $V0w3jgdi00hxFinal = $V0w3jgdi00hx2[0];

            $Vjav010uhv5aTotal = $Vjav010uhv5afinal." ".$V0w3jgdi00hxFinal;

            $Vwmgafxuvzgd = "No tiene tipo";
            $Vwmgafxuvzgduno = $Virsew13xpli["@attributes"];
            if($Vwmgafxuvzgduno["type"]=="117"){
                $Vwmgafxuvzgd = "SMS Nacional";
            }if($Vwmgafxuvzgduno["type"]=="118"){
                $Vwmgafxuvzgd = "SMS Internacional";
            }if($Vwmgafxuvzgduno["type"]=="119"){
                $Vwmgafxuvzgd = "MMS";
            }if($Vwmgafxuvzgduno["type"]=="199"){
                $Vwmgafxuvzgd = "SMS Gratuitos";
            }


            $Vbl4yrmdan1y = array("FECHA_MENSAJE"=>$Vjav010uhv5aTotal,
            "DESCRICION_MENSAJE"=>$Vwmgafxuvzgd." a ".$Vswrqic01o1e,
            "VALOR_MENSAJE_MAIN_ACCOUNT"=>0,
            "VALOR_MENSAJE_BONOS"=>0,
            "VALOR_MENSAJE"=>$Virsew13xpli["amount"],
            "tipo"=>"DetalleMensajes");
            array_push($Vautxf03llyt, $Vbl4yrmdan1y);
        }

    }

    if(isset($Vuvy25hlvk2stotal["total"])&&sizeof($Vuvy25hlvk2stotal["total"])>0){
         $Voj4akfln04c = array();
         foreach ($Vuvy25hlvk2stotal["total"] as $Virsew13xpli) {
            $Virsew13xpli = (array)$Virsew13xpli;
            $Vrtphfkkza3o  = $Virsew13xpli["@attributes"];
            if($Vrtphfkkza3o["desc"] =="TMC006"){
                $Voj4akfln04c["TOTAL_MENSAJE_GRATIS"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TMC001"){
                $Voj4akfln04c["TOTAL_MENSAJE_CON_COSTO"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TMC007"){
                $Voj4akfln04c["TOTAL"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TMA001"){
                $Voj4akfln04c["VALOR_TOTAL_MAIN_ACCOUNT"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TMA002"){
                $Voj4akfln04c["VALOR_TOTAL_BONOS"] = $Vrtphfkkza3o["value"];
            }if($Vrtphfkkza3o["desc"] =="TMA003"){
                $Voj4akfln04c["VALOR_TOTAL"] = $Vrtphfkkza3o["value"];
            }

            $Voj4akfln04c["tipo"] = "ResumenMensajes";
            
        }

        array_push($Vautxf03llyt, $Voj4akfln04c);
    
    }


    if(isset($Vk2t5gjs52vz["consumption"])&&sizeof($Vk2t5gjs52vz["consumption"])>0){
        foreach ($Vk2t5gjs52vz["consumption"] as $Virsew13xpli) {
            $Virsew13xpli = (array)$Virsew13xpli;
            $Vamsrfshv2ep = array("FECHA"=>"",
            "DESCRIPCIÓN"=>"",
            "VENCIMIENTO"=>"",
            "CANTIDAD"=>"",
            "VALOR_VARIOS_MAIN_ACCOUNT"=>"",
            "VALOR_VARIOS_BONOS"=>"",
            "VALOR_TOTAL"=>"",
            "tipo"=>"DetalleVarios");
            array_push($Vautxf03llyt, $Vamsrfshv2ep);
        }
    }    

    if(isset($Vk2t5gjs52vztotal["total"])&&sizeof($Vk2t5gjs52vztotal["total"])>0){

        $Vamsrfshv2epServicestotal = array();
         foreach ($Vk2t5gjs52vztotal["total"] as $Virsew13xpli) {
            $Virsew13xpli = (array)$Virsew13xpli;
            $Vrtphfkkza3o  = $Virsew13xpli["@attributes"];
            if($Vrtphfkkza3o["desc"] =="TAC001"){
                $Vamsrfshv2epServicestotal["TOTAL_VARIOS"] = intval($Vrtphfkkza3o["value"]);
            }if($Vrtphfkkza3o["desc"] =="TAA001"){
                $Vamsrfshv2epServicestotal["VALOR_TOTAL_VARIOS_MAIN_ACCOUNT"] =  intval($Vrtphfkkza3o["value"]);
            }if($Vrtphfkkza3o["desc"] =="TAA002"){
                $Vamsrfshv2epServicestotal["VALOR_TOTAL_VARIOS_BONOS"] = intval($Vrtphfkkza3o["value"]);
            }if($Vrtphfkkza3o["desc"] =="TAA003"){
                $Vamsrfshv2epServicestotal["VALOR_TOTAL_VARIOS"] = intval($Vrtphfkkza3o["value"]);
            }

            $Vamsrfshv2epServicestotal["tipo"] = "ResumenVarios";
        }
        array_push($Vautxf03llyt, $Vamsrfshv2epServicestotal);

    }
        $Vlfwkhon2bz0["error"]=0;  
        $Vlfwkhon2bz0["response"]=$Vautxf03llyt;
      

    }
    else{
        $Vlfwkhon2bz0["error"]=1; 
        $Vpsm42ro4mkq = (array)$VqhzkfsafzrcRes->responseStatus;
        $Vlfwkhon2bz0["response"]= $Vpsm42ro4mkq["message"];

    }
        
    }
    else{
        $Vlfwkhon2bz0["error"]=1; 
        $Vlfwkhon2bz0["response"] = "No ha sido posible, realizar la operación por el momento.";

    }
}else{
    $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
}

    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
     }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();