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


$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
    
    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();
    
    $Vmytwkjekqec = 1;
    $Vzvarhvycpzi = "No ha sido posible validar tu cuenta";
    
    $Vqhzkfsafzrc = json_decode($Vyvmmv0t5uw2->getBody());
    
    
    if(isset($Vqhzkfsafzrc,$Vqhzkfsafzrc->lineas,$Vqhzkfsafzrc->segmento,$Vqhzkfsafzrc->destino,$Vqhzkfsafzrc->mensaje,$Vqhzkfsafzrc->token)) {
        $Vmytwkjekqec = 0;
        $Vzvarhvycpzi = "Notificación enviada correctamente";
    }else{
        $Vzvarhvycpzi = "Debes ingresar todos los parametros requeridos";
    }
    
    
    $Vzvarhvycpziuesta  = array();
    $Vzvarhvycpziuesta["error"]=err;
    $Vzvarhvycpziuesta["response"]=$Vzvarhvycpzi;
  
    
    return $Vvcjkdrakwx3->withJson($Vzvarhvycpziuesta)->withHeader('Content-type', 'application/json');
    
});


$V0ojkog2p2jp->run();