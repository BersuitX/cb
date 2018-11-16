<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://itelnn.comcel.com.co:9999/ITEL/Core/Proxies/ejecutarTramaEspecifica_PS?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

      $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
        
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg = array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
        
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ejecWS_Result";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];
        
        
        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
           
    if (intval($VqhzkfsafzrcRes->MENSAJE->CODIGO_RESPUESTA)==1) {
    $Vlfwkhon2bz0["error"]=0;

    $V4atrtsdokz0=$this->curlWigi->getArray($VqhzkfsafzrcRes->MENSAJE->PARAMETROS);
    
    if (count($V4atrtsdokz0)>0) {
        $Vzfnzolykg1x=$V4atrtsdokz0[0]->PARAMETRO;

        if (isset($Vzfnzolykg1x->VALOR) && isset($Vzfnzolykg1x->VALOR->PAQUETE) ) {
            $Vw10cior02ni=$this->curlWigi->getArray($Vzfnzolykg1x->VALOR->PAQUETE);
           
            $Vr0qw2idfej2=array();

            foreach ($Vw10cior02ni as $Virsew13xpli) {
                $Virsew13xpli = (array)$Virsew13xpli;

                $Vuz2tqweebiu = array();
                $Vuz2tqweebiu["TIPO"] = $Virsew13xpli["TIPO"];
                $Vuz2tqweebiu["NOMBRE"] = $Virsew13xpli["NOMBRE"];
                $Vuz2tqweebiu["CAPACIDAD"] = $Virsew13xpli["CAPACIDAD"];
                $Vuz2tqweebiu["CONSUMO"] = $Virsew13xpli["CONSUMO"];
                $Vuz2tqweebiu["FECHAEXPIRACION"] = $Virsew13xpli["FECHAEXPIRACION"];
                $Vuz2tqweebiu["FECHAACTIVACION"] = $Virsew13xpli["FECHAACTIVACION"];

                if ($Vuz2tqweebiu["TIPO"] !="" && ($Vuz2tqweebiu["TIPO"] == "MIN" || $Vuz2tqweebiu["TIPO"] == "SMS" || $Vuz2tqweebiu["TIPO"] == "DATOS" ) ) { 

                    $Vuz2tqweebiu["CAPACIDAD"] = str_replace(' MB', '', $Vuz2tqweebiu["CAPACIDAD"]);
                    $Vuz2tqweebiu["CONSUMO"] = str_replace(' MB', '', $Vuz2tqweebiu["CONSUMO"]);

                    if (intval($Vuz2tqweebiu["CONSUMO"]) > intval($Vuz2tqweebiu["CAPACIDAD"])) {
                        $Vuz2tqweebiu["CONSUMO"]=$Vuz2tqweebiu["CAPACIDAD"];
                    }

                    $Vuz2tqweebiu["CAPACIDAD"] == ""?$Vuz2tqweebiu["CAPACIDAD"]="0":null;
                    $Vuz2tqweebiu["CONSUMO"] == ""?$Vuz2tqweebiu["CONSUMO"]="0":null;

                    $Vuz2tqweebiu["FECHAEXPIRACION"]=explode(' ',$Vuz2tqweebiu["FECHAEXPIRACION"]);
                    $Vuz2tqweebiu["FECHAEXPIRACION"]=((count($Vuz2tqweebiu["FECHAEXPIRACION"]))?$Vuz2tqweebiu["FECHAEXPIRACION"][0]:"No disponible");

                    $Vuz2tqweebiu["PORCENTAJE"] = 0;
                    if(intval($Vuz2tqweebiu["CAPACIDAD"] > 0)){
                        $Vuz2tqweebiu["PORCENTAJE"] = floor($Vuz2tqweebiu["CONSUMO"] * 100/ $Vuz2tqweebiu["CAPACIDAD"]);
                    }

                    $Vuz2tqweebiu["FECHAACTIVACION"]=explode(' ',$Vuz2tqweebiu["FECHAACTIVACION"]);
                    $Vuz2tqweebiu["FECHAACTIVACION"]=((count($Vuz2tqweebiu["FECHAACTIVACION"]))?$Vuz2tqweebiu["FECHAACTIVACION"][0]:"No disponible");


                    if ( (strpos( strtoupper($Vuz2tqweebiu["NOMBRE"]) , strtoupper('refill') ) === false) && (strpos(strtoupper($Vuz2tqweebiu["NOMBRE"]) , strtoupper('resolucion') ) === false)  ) {
                        array_push($Vr0qw2idfej2, $Vuz2tqweebiu);
                    }
                    
                }
            }

            $Vlfwkhon2bz0["error"]=0;
            $Vlfwkhon2bz0["response"]=$Vr0qw2idfej2;
        }else{
            $Vpsm42ro4mkq=1;
        }
    }else{
        $Vpsm42ro4mkq=1;
    }
   }else{
    $Vpsm42ro4mkq=1;
   }

   if (isset($Vpsm42ro4mkq)) {
        $Vlfwkhon2bz0["error"]=1;
        $Vlfwkhon2bz0["response"]="No se encontraron paquetes de datos activos.";
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