<?php






require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();


$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vmytwkjekqec = 1;
    $Vzvarhvycpzi = "Debes iniciar sesión para ingresar a este módulo";
    $Vzvarhvycpziuesta = array();

    $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
    $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    
    if(isset($Vqhzkfsafzrc,$Vqhzkfsafzrc->remitente,$Vqhzkfsafzrc->asunto,$Vqhzkfsafzrc->texto,$Vqhzkfsafzrc->cuenta)){
        
        $Vfigsgaojuez = "insert into mensajes (de,id_segmento,mensaje,asunto,cuenta,eliminado) values ('".$Vqhzkfsafzrc->remitente."',1,'".$Vqhzkfsafzrc->texto."','".$Vqhzkfsafzrc->asunto."','".$Vqhzkfsafzrc->cuenta."',1)";
        
        ConexDB($Vfigsgaojuez);
        
        $Vmytwkjekqec = 0;
        $Vzvarhvycpzi = "Se ha enviado el mensaje exitosamente";
        
        
        
    }else{
        $Vzvarhvycpzi = "No existen los parámetros necesarios para enviar el mensaje";
    }

    
    

    

    
    
    
    
    $Vzvarhvycpziuesta["error"] = $Vmytwkjekqec;
    $Vzvarhvycpziuesta["response"] = $Vzvarhvycpzi;
    
    return $Vvcjkdrakwx3->withJson($Vzvarhvycpziuesta)->withHeader('Content-type', 'application/json');
});


$V0ojkog2p2jp->run();