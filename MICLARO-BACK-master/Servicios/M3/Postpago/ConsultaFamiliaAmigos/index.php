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


$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 

$Vb1jhtbuqbys['urlServicioGCI']="http://172.24.35.235:80/CommunityServiceApplication_SBProject/Proxies/CommunityInformationWS_PS?WSDL"; 
$Vb1jhtbuqbys['requestGCITemplate']="GCIrequest.php";



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    if(isset($Vvkwvjdx1mcb,$Vvkwvjdx1mcb->data)){
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/consultaFamiliaAmigos\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);


    if($VqhzkfsafzrcRes["error"] == 0){

        $V4kfh5akqyzi = "consultaFamiliaAmigosResponse";


        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
    if(isset($VqhzkfsafzrcRes->ResponseConsulta,$VqhzkfsafzrcRes->ResponseConsulta->aconsulta) && $VqhzkfsafzrcRes->ResponseConsulta->acodigo=="0"){

      
        $Vkjhukym3hrw = (array)$VqhzkfsafzrcRes->ResponseConsulta->aconsulta;
        if(isset($Vkjhukym3hrw["afacturable"],$Vkjhukym3hrw["aservInstalado"],$Vkjhukym3hrw["avalorConIva"])){
       
        setlocale(LC_MONETARY, 'es_CO');

        $Vqhzkfsafzrcrespuesta =array("facturable"=>(int)($Vkjhukym3hrw["afacturable"]=="S"),
            "instalado"=>(int)($Vkjhukym3hrw["aservInstalado"]=="S"),
            "valor"=>money_format("$%!.0n IVA incluido.",$Vkjhukym3hrw["avalorConIva"]),
            "servicio"=>$Vkjhukym3hrw["asnCode"],
            "paquete"=>$Vkjhukym3hrw["aspCode"]);
    
            
            $Vqhzkfsafzrc2=array("data"=>array("AccountId"=>$Vqhzkfsafzrc->AccountId,"type"=>"2"));
            $Vnwlngxwnesf = "https://miclaroapp.com.co/api/index.php/v1/soap/getCommunityInformation.json";
            $Vtssepikoezf=$this->curlWigi->simple_post($Vnwlngxwnesf,$Vqhzkfsafzrc2);


            $Vtssepikoezf=json_decode($Vtssepikoezf);
    
            $Vqhzkfsafzrcrespuesta["getCommunityInformation"] = $Vtssepikoezf;
         
            $Vlfwkhon2bz0["error"]=0;
            $Vlfwkhon2bz0["response"]=$Vqhzkfsafzrcrespuesta;


            if(isset($Vqhzkfsafzrcrespuesta["getCommunityInformation"]) && $Vqhzkfsafzrcrespuesta["instalado"] == 1){
                
                if($Vqhzkfsafzrcrespuesta["getCommunityInformation"]->error == 1 ){
                    $Vlfwkhon2bz0["response"] = "En este momento tu solicitud se encuentra en proceso.";
                    $Vlfwkhon2bz0["error"]=1;
                }
                

                if($Vqhzkfsafzrcrespuesta["getCommunityInformation"]->error == 1){
                    $Vlfwkhon2bz0["error"] = 1;
                    $Vlfwkhon2bz0["response"] = $Vqhzkfsafzrcrespuesta["getCommunityInformation"]; 
                }
                
            }


            else{
                if(isset($Vqhzkfsafzrcrespuesta["getCommunityInformation"])){
                    unset($Vlfwkhon2bz0["response"]["getCommunityInformation"]);
                }else{
                    $Vlfwkhon2bz0["error"] = 1;
                    $Vlfwkhon2bz0["response"] = "Temporalmente el servicio no se encuentra disponible";
                }
            }
            

            $Vlfwkhon2bz0["response"] = $Vtssepikoezf;

          
  }else{
        $Vlfwkhon2bz0["error"]=1;
        $Vlfwkhon2bz0["consulta"] = $Vkjhukym3hrw;
        $Vlfwkhon2bz0["response"] = "Temporalmente el servicio no se encuentra disponible";
    }
}else{
      $Vxteumemeiut = (array)$VqhzkfsafzrcRes->ResponseConsulta;
      $Vlfwkhon2bz0["error"]=1;
      $Vlfwkhon2bz0["consulta"] = $Vxteumemeiut;
      $Vlfwkhon2bz0["response"] = isset($Vxteumemeiut["adescripcion"])?$Vxteumemeiut["adescripcion"]:'Temporalmente el servicio no se encuentra disponible';
   }

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