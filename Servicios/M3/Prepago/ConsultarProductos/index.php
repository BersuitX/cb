<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://itelnn.comcel.com.co:9999/IntegradorSubscriptionManager/consultarProductos_PS?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
    
        
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "conConsultarProductosResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

        
        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            
            
    if ($VqhzkfsafzrcRes->descripcion=="SUCCESS"){
      $Vlfwkhon2bz0["error"]=0;

    
      $Vw10cior02ni=explode("|", $VqhzkfsafzrcRes->productos);
  
      $Vgan344z2x3o=array();
      
      foreach ($Vw10cior02ni as $Virsew13xpli) {
         $V2uuzbocrj51=explode(";", $Virsew13xpli);

         if (strpos(strtoupper( ((isset($V2uuzbocrj51[1]))?$V2uuzbocrj51[1]:"") ), 'BLACKBERRY') === false) {

          if (intval( ((isset($V2uuzbocrj51[3]))?$V2uuzbocrj51[3]:0) ) >0 ) {
             $Vuz2tqweebiu["codPaq"]=((isset($V2uuzbocrj51[0]))?$V2uuzbocrj51[0]:"");
             $Vuz2tqweebiu["nombre"]=((isset($V2uuzbocrj51[1]))?$V2uuzbocrj51[1]:"");
             $Vuz2tqweebiu["descripcion"]=$Vuz2tqweebiu["nombre"];
             $Vuz2tqweebiu["valor"]=((isset($V2uuzbocrj51[3]))?$V2uuzbocrj51[3]:"");
             $Vuz2tqweebiu["temp"]=((isset($V2uuzbocrj51[4]))?$V2uuzbocrj51[4]:"");

             array_push($Vgan344z2x3o, $Vuz2tqweebiu);
          }

         }

      }

      $Vlfwkhon2bz0["response"]=$Vgan344z2x3o;
    }else{
      $Vlfwkhon2bz0["error"]=1;
      $Vlfwkhon2bz0["response"]="No se encontraron Planes disponibles";
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