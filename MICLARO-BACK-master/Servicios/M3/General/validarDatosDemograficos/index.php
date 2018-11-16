<?php




require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://172.22.61.94:8080/WSAutolegalizacion/WSAutolegalizacionService?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        $Vvkwvjdx1mcb = json_decode( $Vyvmmv0t5uw2->getBody() );
        $Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;

        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->DocumentNumber=$Vd10ichsd3g5->DocumentNumber;

        $Vqhzkfsafzrc->LineOfBusiness = $Vcw3r1lhk5bx->LineOfBusiness;

        $Vqhzkfsafzrc->DocumentType="cc";

        if ( intval($Vd10ichsd3g5->DocumentType) == 4) {
            $Vqhzkfsafzrc->DocumentType="ce";
        }
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg=array();
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
   
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns2validarDatosDemograficosResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            
        

        
        if (intval($VqhzkfsafzrcRes->RequestDatosDemograficos->codigo)==1) {

        $Vlfwkhon2bz0["error"]=0;

        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;

        if(isset($VqhzkfsafzrcRes["RequestDatosDemograficos"])){
            $Vnolg14bymod = (array)$VqhzkfsafzrcRes["RequestDatosDemograficos"];
        }
        
        $Vqhzkfsafzrcrespuesta["apellido"]=isset($Vnolg14bymod["apellido"])?$Vnolg14bymod["apellido"]:"";
        $Vqhzkfsafzrcrespuesta["ciudad"]=isset($Vnolg14bymod["ciudad"])?$Vnolg14bymod["ciudad"]:"";
        $Vqhzkfsafzrcrespuesta["departamento"]=isset($Vnolg14bymod["departamento"])?$Vnolg14bymod["departamento"]:"";
        $Vqhzkfsafzrcrespuesta["direccion"]=isset($Vnolg14bymod["direccion"])?$Vnolg14bymod["direccion"]:"";
        $Vqhzkfsafzrcrespuesta["municipio"]=isset($Vnolg14bymod["municipio"])?$Vnolg14bymod["municipio"]:"";
        $Vqhzkfsafzrcrespuesta["nombre"]=isset($Vnolg14bymod["nombre"])?$Vnolg14bymod["nombre"]:"";
        $Vqhzkfsafzrcrespuesta["segundoApellido"]=isset($Vnolg14bymod["segundoApellido"])?$Vnolg14bymod["segundoApellido"]:"";

        
        
        $Vlfwkhon2bz0["response"]=$Vqhzkfsafzrcrespuesta;
               
    }else{
        $Vlfwkhon2bz0["error"]=1;
        $Vlfwkhon2bz0["response"]="Los datos de consulta son invalidos";
    }

        }
    }
    else{
        $Vlfwkhon2bz0=$VqhzkfsafzrcRes;
    }

    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');

    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
    
});


$V0ojkog2p2jp->run();