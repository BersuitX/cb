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


$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$V0ojkog2p2jp->map(['GET'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
    
    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    
    $Vmytwkjekqec = 1;
    $Vzvarhvycpzi = "No ha sido posible validar tu cuenta";
    
    if(isset($V5y2wgq24k1v,$V5y2wgq24k1v["HTTP_X_UP_SUBNO"])){
        if(sizeof($V5y2wgq24k1v["HTTP_X_UP_SUBNO"]) == 1){
            $Vmytwkjekqec = 0;
            $Vavqdssoj31n = $V5y2wgq24k1v["HTTP_X_UP_SUBNO"][0];
            $Vavqdssoj31n = substr($Vavqdssoj31n,2,10);
            $Vwmgafxuvzgd = "2";
        }
    }

    if($Vmytwkjekqec){
        $Vwmgafxuvzgd = $Vyvmmv0t5uw2->getParam("tipo");
        if(isset($Vwmgafxuvzgd) && $Vwmgafxuvzgd != null && ( $Vwmgafxuvzgd == 2 || $Vwmgafxuvzgd == 3)){
            $Vmytwkjekqec = 0;
            $Vavqdssoj31nsPre = array("3213293319","3128042748");
            $Vavqdssoj31nsPos = array("3219060614","3104766060");
            if($Vwmgafxuvzgd == 2){
                $Vavqdssoj31n = $Vavqdssoj31nsPre[array_rand($Vavqdssoj31nsPre,1)];
            }
            
            if($Vwmgafxuvzgd == 3){
                $Vavqdssoj31n = $Vavqdssoj31nsPos[array_rand($Vavqdssoj31nsPos,1)];
            }

        }else{
            $Vzvarhvycpzi = "No es posible obtener el tipo de cuenta";
        }
    }


    if(!$Vmytwkjekqec){

        $Vhmcfk3lapma=array("data"=>array("AccountId"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd));
        $Vps5z0ox3giw = "https://www.miclaroapp.com.co/api/index.php/v1/core/web/Sesion.json";
        $Vtssepikoezf=$this->curlWigi->simple_post($Vps5z0ox3giw,$Vhmcfk3lapma);
        $Vtssepikoezf = json_decode($Vtssepikoezf);
        

        
        


        
        $Vqj2tipjf2zw = array("usuario"=>array("nombre"=>"Jairo","apellido"=>"Rodriguez","UserProfileID"=>"jairo.rodriguezm@claro.com.co"),"cuenta"=>array("AccountId"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd));
        $Vhmcfk3lapma=array("data"=>array("accion"=>"enc","info"=>$Vqj2tipjf2zw));
        $Vps5z0ox3giw = "https://www.miclaroapp.com.co/api/index.php/v1/core/web/Sesion.json";
        $Vtssepikoezf=$this->curlWigi->simple_post($Vps5z0ox3giw,$Vhmcfk3lapma);
        $Vtssepikoezf = json_decode($Vtssepikoezf);
        
        if(isset($Vtssepikoezf->error,$Vtssepikoezf->response) && $Vtssepikoezf->error == 0){
            $Vzvarhvycpzi = array("AccountId"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd,"token"=>$Vtssepikoezf->response);
        }else{
            $Vmytwkjekqec = 1;
            $Vzvarhvycpzi=array("r"=>$Vtssepikoezf,"linea"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd); 
        }
        
        $Vzvarhvycpzi=array("response"=>$Vtssepikoezf,"linea"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd);
        
    
    }
    
    $Vzvarhvycpziuesta  = array();
    $Vzvarhvycpziuesta["error"]=$Vmytwkjekqec;
    
    $Vzvarhvycpziuesta["response"]=$Vzvarhvycpzi;
    $Vzvarhvycpziuesta["headers"]=$V5y2wgq24k1v;
  
    
    return $Vvcjkdrakwx3->withJson($Vzvarhvycpziuesta)->withHeader('Content-type', 'application/json');
    
});


$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
    
    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    $Vmytwkjekqec = 1;
    
    $Vzvarhvycpzi = $V5y2wgq24k1v;


    
    if(isset($V5y2wgq24k1v,$V5y2wgq24k1v["HTTP_X_UP_SUBNO"])){
        if(sizeof($V5y2wgq24k1v["HTTP_X_UP_SUBNO"]) == 1){
            $Vmytwkjekqec = 0;
            $Vavqdssoj31n = $V5y2wgq24k1v["HTTP_X_UP_SUBNO"][0];
            $Vavqdssoj31n = substr($Vavqdssoj31n,2,10);
            $Vwmgafxuvzgd = "2";
        }
    }

    $Vzvarhvycpzi = array("AccountId"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd);
    
    $Vzvarhvycpziuesta  = array();
    $Vzvarhvycpziuesta["error"]=$Vmytwkjekqec;
    
    $Vzvarhvycpziuesta["response"]=$Vzvarhvycpzi;
    
  
    
    return $Vvcjkdrakwx3->withJson($Vzvarhvycpziuesta)->withHeader('Content-type', 'application/json');
    
});


$V0ojkog2p2jp->run();