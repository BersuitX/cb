<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

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
    $Vvkwvjdx1mcb = json_decode($Vyvmmv0t5uw2->getBody());
    if(isset($Vvkwvjdx1mcb->data)){
       $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;

    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/loginUsuario\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);

    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "LoginUsuarioResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


    if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;

          

    
        $Vd10ichsd3g5 = (array)$VqhzkfsafzrcRes->usuario; 

        $Vkt3iyamkjlm["nombre"]=ucwords(strtolower($this->curlWigi->arrayToString(isset($Vd10ichsd3g5["anombreCliente"])?$Vd10ichsd3g5["anombreCliente"]:"")));
        $Vkt3iyamkjlm["apellido"]=ucwords(strtolower($this->curlWigi->arrayToString(isset($Vd10ichsd3g5["aapellidoCliente"])?$Vd10ichsd3g5["aapellidoCliente"]:"")));
        $Vkt3iyamkjlm["UserProfileID"]=$this->curlWigi->arrayToString(isset($Vd10ichsd3g5["anombreUsuario"])?$Vd10ichsd3g5["anombreUsuario"]:"");
        $Vkt3iyamkjlm["DocumentNumber"]=isset($Vd10ichsd3g5["adocumento"])?$Vd10ichsd3g5["adocumento"]:"";
        $Vkt3iyamkjlm["DocumentType"]=isset($Vd10ichsd3g5["atipoDocumentoID"])?$Vd10ichsd3g5["atipoDocumentoID"]:"";
        $Vkt3iyamkjlm["claveTemporal"]=(($Vd10ichsd3g5["aesContraseñaTemporal"]=="true")?1:0);

        $Vind2djl2ge1=array();

    
        $Voccv25blbdr = (array)$VqhzkfsafzrcRes->listCuentas;
        
        
        if(isset($Voccv25blbdr["aCuenta"])){
           if(!isset($Voccv25blbdr["aCuenta"]->atipoCuentaID)){
                foreach($Voccv25blbdr["aCuenta"] as $Virsew13xpli){
                    $Virsew13xpli = (array)$Virsew13xpli;

                $Vuz2tqweebiu["LineOfBusiness"]=((isset($Virsew13xpli["atipoCuentaID"])?$Virsew13xpli["atipoCuentaID"]:"0"));
                $Vuz2tqweebiu["AccountId"]=((isset($Virsew13xpli["anumeroCuenta"])?$Virsew13xpli["anumeroCuenta"]:"0"));
                $Vuz2tqweebiu["alias"]=((isset($Virsew13xpli["aalias"])?$this->curlWigi->arrayToString($Virsew13xpli["aalias"]):""));

                if ($Vuz2tqweebiu["alias"]=="") {
                    $Vuz2tqweebiu["alias"]=$Vuz2tqweebiu["AccountId"];
                }

                    array_push($Vind2djl2ge1,$Vuz2tqweebiu);
             }
            }else{

            $Vqn0ri3olsl2 = (array)$VqhzkfsafzrcRes->listCuentas->aCuenta;
           
            $Vuz2tqweebiu["LineOfBusiness"]=((isset($Vqn0ri3olsl2["atipoCuentaID"])?$Vqn0ri3olsl2["atipoCuentaID"]:"0"));
            $Vuz2tqweebiu["AccountId"]=((isset($Vqn0ri3olsl2["anumeroCuenta"])?$Vqn0ri3olsl2["anumeroCuenta"]:"0"));
            $Vuz2tqweebiu["alias"]=((isset($Vqn0ri3olsl2["aalias"])?$this->curlWigi->arrayToString($Vqn0ri3olsl2["aalias"]):""));
            if ($Vuz2tqweebiu["alias"]=="") {
                $Vuz2tqweebiu["alias"]=$Vuz2tqweebiu["AccountId"];
            }


                array_push($Vind2djl2ge1,$Vuz2tqweebiu);
            }

            
            
            
        }


        
        $Vi2njftet5do=date("Y-m-d H:i:s");
        $Vjagjip0iuza=array();
        $Vegmzlqvye5v=$Vkt3iyamkjlm;
        $Vegmzlqvye5v["clave"]=$Vqhzkfsafzrc->clave;
        
        foreach ($Vind2djl2ge1 as $Virsew13xpli) {
            $VqhzkfsafzrcEncrip["usuario"]=$Vegmzlqvye5v;
            $VqhzkfsafzrcEncrip["cuenta"]=$Virsew13xpli;
            $VqhzkfsafzrcEncrip["inicio"]=$Vi2njftet5do;
            $Virsew13xpli["token"]=encrypt(json_encode($VqhzkfsafzrcEncrip));
    
            array_push($Vjagjip0iuza,$Virsew13xpli);
        }


   
        $Vlfwkhon2bz0["error"]= 0;
        $Vlfwkhon2bz0["response"]= array("usuario"=>$Vkt3iyamkjlm,"cuentas"=>$Vjagjip0iuza);


        }
    }
    else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }
    
     }
    else{
        $Vlfwkhon2bz0["error"] = 1;
        $Vlfwkhon2bz0["response"] = "Los parámetros enviados no son validos";
    }


    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
});


$V0ojkog2p2jp->run();