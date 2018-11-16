<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../Core/vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
     if(isset($Vvkwvjdx1mcb,$Vvkwvjdx1mcb->data)){
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/consultarPaquetes\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    

    
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ConsultarPaquetesResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

           $Vw10cior02ni = array();
           $Vlfwkhon2bz0["error"]=0;   
            if(isset($VqhzkfsafzrcRes->paquetes,$VqhzkfsafzrcRes->paquetes->aPaquete) && sizeof($VqhzkfsafzrcRes->paquetes->aPaquete) > 0){

            foreach ($VqhzkfsafzrcRes->paquetes->aPaquete as $Virsew13xpli){

                $Virsew13xpli = (array)$Virsew13xpli;

                $Vuz2tqweebiu=array("codigo"=>isset($Virsew13xpli["acodigoPaquete"])?$Virsew13xpli["acodigoPaquete"]:"",                 
                "descripcion"=>isset($Virsew13xpli["adescripcion"])?$Virsew13xpli["adescripcion"]:"",
                "nombre"=>isset($Virsew13xpli["anombre"])?$Virsew13xpli["anombre"]:"",
                "id"=>isset($Virsew13xpli["apaqueteID"])?$Virsew13xpli["apaqueteID"]:"",
                "precio"=>isset($Virsew13xpli["aprecio"])?$Virsew13xpli["aprecio"]:"",
                "tipo"=>isset($Virsew13xpli["atipoPaqueteID"])?$Virsew13xpli["atipoPaqueteID"]:"");

            array_push($Vw10cior02ni,$Vuz2tqweebiu);
        
        }
        }

         $Vlfwkhon2bz0["response"]=$Vw10cior02ni;
                        
        }
    }
    else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }
}

    else{
       $Vlfwkhon2bz0["error"]=1;
       $Vlfwkhon2bz0["response"]="Los parámetros enviados no son validos";
    }

    
  
    
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
});


$V0ojkog2p2jp->run();