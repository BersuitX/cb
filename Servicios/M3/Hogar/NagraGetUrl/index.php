<?php


error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();


$V0ojkog2p2jp->map(['GET'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vmytwkjekqec = 1;
    $Vzvarhvycpzi = "Debes iniciar sesión para ingresar a este módulo";

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        

        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        
        $Vqhzkfsafzrc->DocumentNumber=$Vd10ichsd3g5->DocumentNumber;
        $Vqhzkfsafzrc->codigoTipoDocumento=$Vd10ichsd3g5->DocumentType;

        if(isset($Vcw3r1lhk5bx->AccountId) && $Vcw3r1lhk5bx->AccountId != null){

            $Vytloalzkulw = substr($Vcw3r1lhk5bx->AccountId,0,1);
            if(intval($Vytloalzkulw) == 0){
                $Vcw3r1lhk5bx->AccountId = substr($Vcw3r1lhk5bx->AccountId,1);
            }

            $Vfrjid4vr3ci = md5($Vcw3r1lhk5bx->AccountId);
            
            $Vnwlngxwnesf = "https://enigma.cable.net.co/apps/browser/nmp.html?";
            $Vnwlngxwnesf = $Vnwlngxwnesf."nagrarb=".$Vcw3r1lhk5bx->AccountId."&hash=".$Vfrjid4vr3ci;

            $Vmytwkjekqec = 0;
            $Vzvarhvycpzi = $Vnwlngxwnesf;
        }

    }else{
        $Vqhzkfsafzrc->bebe = $Vyvmmv0t5uw2->getHeaders();
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
    
    $VqhzkfsafzrcRes=array("error"=>$Vmytwkjekqec,"response"=>$Vnwlngxwnesf,"cuenta"=>$Vcw3r1lhk5bx->AccountId,"amor"=>$Vyvmmv0t5uw2->getHeaders());
    
    
    return $Vvcjkdrakwx3->withJson($VqhzkfsafzrcRes)->withHeader('Content-type', 'application/json');
});


$V0ojkog2p2jp->run();