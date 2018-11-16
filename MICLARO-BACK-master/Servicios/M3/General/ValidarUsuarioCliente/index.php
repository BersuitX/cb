<?php


require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['requestTemplate']="request.php";




$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?wsdl"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    
    $Vpsm42ro4mkq=0;
    $Vtssepikoezf = array(
       "asociado"=>false,
       "registradoCliente"=>false,
       "registradoUsuario"=>false,
       "correoAsociado"=>"",
       "validarSeguridad"=>false
    );

    $Vtssepikoezfpuesta["error"]=$Vpsm42ro4mkq;
    $Vtssepikoezfpuesta["response"]=$Vtssepikoezf;
    return $Vvcjkdrakwx3->withJson($Vtssepikoezfpuesta)->withHeader('Content-type', 'application/json');


});


$V0ojkog2p2jp->run();