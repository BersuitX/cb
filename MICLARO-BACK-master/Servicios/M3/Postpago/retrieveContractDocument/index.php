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


$Vb1jhtbuqbys['urlServicio']="http://172.24.35.240/SelfServiceMobile_Project/Services/Proxy_Pipelines/ContractManagement_PS?WSDL";

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg= array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);


    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns1retrieveContractDocumentResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];

         
        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

    $Vpsm42ro4mkq=(($VqhzkfsafzrcRes->AcknowledgementIndicator=="SUCCESS")?0:1);

if (($Vpsm42ro4mkq==1)){


     $Vqhzkfsafzrc2=array("data"=>array("AccountId"=>$Vqhzkfsafzrc->AccountId,"LineOfBusiness"=>$Vqhzkfsafzrc->LineOfBusiness));
     $Vnwlngxwnesf = "https://miclaroapp.com.co/api/index.php/v1/soap/RegistrarConsultaContrato.json";
     $Vtssepikoezf=$this->curlWigi->simple_post($Vnwlngxwnesf,$Vqhzkfsafzrc2);

    $Vlfwkhon2bz0["error"]=1;
    $Vlfwkhon2bz0["response"]="Estamos procesando tu solicitud, en 72 Horas hábiles podrás acceder a tu contrato por este medio.";
}else{
    $Vlfwkhon2bz0["error"]=0;
        $Vnwlngxwnesf='http://miclaroapp.com.co/archivos/documentos/'.$Vly4x0xpkhs5.$Vcrgaw1qdmft;
        $Vwulga4ztj2o='/var/www/miclaroapp.com.co/public_html/archivos/documentos/'.$Vly4x0xpkhs5.$Vcrgaw1qdmft;


    if(!file_exists($Vwulga4ztj2o)){
        $Vkfruzhhxzu4 = fopen( $Vwulga4ztj2o, 'wb' ); 
        fwrite($Vkfruzhhxzu4, base64_decode($Vsvhrxwwbvbi));
        fclose($Vkfruzhhxzu4); 

        if (file_exists($Vwulga4ztj2o)) {
            $Vlfwkhon2bz0["error"]=0;
            $Vlfwkhon2bz0["response"]=array(
                "DocumentExtension"=>$Vcrgaw1qdmft,
                "DocumentStream"=>$Vnwlngxwnesf
            );
        }else{

            $Vqhzkfsafzrc3=array("data"=>array("AccountId"=>$Vqhzkfsafzrc->AccountId,"LineOfBusiness"=>$Vqhzkfsafzrc->LineOfBusiness));
            $Vnwlngxwnesf = "https://miclaroapp.com.co/api/index.php/v1/soap/RegistrarConsultaContrato.json";
            $Vtssepikoezf=$this->curlWigi->simple_post($Vnwlngxwnesf,$Vqhzkfsafzrc3);
            
            $Vlfwkhon2bz0["error"]=1;
            $Vlfwkhon2bz0["response"]="Estamos procesando tu solicitud, en 72 Horas hábiles podrás acceder a tu contrato por este medio..";
            $Vlfwkhon2bz0["f"]=$Vwulga4ztj2o;
        }
    }else{
        $Vlfwkhon2bz0["response"]=array(
            "DocumentExtension"=>$Vcrgaw1qdmft,
            "DocumentStream"=>$Vnwlngxwnesf
        );
    }

}
        }
    }
    else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }
    
   
  
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
});


$V0ojkog2p2jp->run();