<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?WSDL"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;

        $Vvkwvjdx1mcb = json_decode($Vyvmmv0t5uw2->getBody());
    	$Vqhzkfsafzrc=$Vvkwvjdx1mcb->data;
    	$Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->nombreUsuario=$Vd10ichsd3g5->UserProfileID;
    	
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/consultarProductos\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    

    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ConsultarProductosResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            


    $Vpsm42ro4mkq=1;    
    $Vzvarhvycpzi = "Temporalmente este módulo no se encuentra disponible";


    if(isset($VqhzkfsafzrcRes->aplicaRenovacionEquipo)){
        

            if(!isset($VqhzkfsafzrcRes->listProductos,$VqhzkfsafzrcRes->listProductos->aProducto)){
                $Vgan344z2x3o = array("aProducto"=>array());}

            $V2bpoh5hagzp = '/var/www/miclaroapp.com.co/public_html/archivos/fotosRepos/';
            $Vivgwezhf4vs = "https://www.miclaroapp.com.co/archivos/fotosRepos";
            $Vgan344z2x3o = $this->curlWigi->getArray($VqhzkfsafzrcRes->listProductos->aProducto);
            $Vw10cior02ni = array();
            foreach($Vgan344z2x3o as $Vxja1abp34yq => $V4epriidtjfx){
                foreach ($V4epriidtjfx as $Vyiw1hdwmjmw => $V3jv1il2hqc3){
                    if($Vyiw1hdwmjmw=="alistInventarioProducto"){



                        $V4epriidtjfx = (array)$V4epriidtjfx;
                        
                        $Vxja1abp34yqdProd = $V4epriidtjfx["aproductoID"];
                        $Vfjnulyykchv = new FilesystemIterator($V2bpoh5hagzp.$Vxja1abp34yqdProd);
                        $Vz1gkvk0n5xn = iterator_count($Vfjnulyykchv);

                        $Vxja1abp34yqmgs = array();
                        
                        for ($Voozl3vb2soz=1; $Voozl3vb2soz <= $Vz1gkvk0n5xn; $Voozl3vb2soz++) {
                            $V5ru233vk5vv =  $Vivgwezhf4vs."/".$Vxja1abp34yqdProd."/".$Voozl3vb2soz.".jpg";
                            array_push($Vxja1abp34yqmgs,$V5ru233vk5vv);
                        }
                        
                        $V4epriidtjfx[$Vyiw1hdwmjmw] = $V4epriidtjfx[$Vyiw1hdwmjmw] = $this->curlWigi->getArray($V3jv1il2hqc3->aInventarioProducto); ;
                        $V4epriidtjfx["envioGratis"] = "true";
                        $V4epriidtjfx["costoEnvio"] = "0";
                        $V4epriidtjfx["imagenes"] = $Vxja1abp34yqmgs;
                    }


                   
                }
                array_push($Vw10cior02ni, $V4epriidtjfx);
            }



              $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;
            if(isset($VqhzkfsafzrcRes["aplicaPagoFactura"])){
                $Vlvauvrtbvgw = $VqhzkfsafzrcRes["aplicaPagoFactura"];
                
            }

            $Vzvarhvycpzi = array("aplicaPagoFactura"=>$Vlvauvrtbvgw,"productos"=>$Vw10cior02ni);
            $Vpsm42ro4mkq=0;
        
    }
    
    $Vlfwkhon2bz0["error"]=$Vpsm42ro4mkq;
    $Vlfwkhon2bz0["response"]=$Vzvarhvycpzi;

   
        }
    }
    else{
        $Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
    }

     return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json'); 
        
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
    
  
});


$V0ojkog2p2jp->run();