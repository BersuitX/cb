<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://192.168.18.76:8090/telmex/MTservice?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
   
      $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vqhzkfsafzrc->numeroCuenta=$Vcw3r1lhk5bx->AccountId;
        
        $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
        
        
        $this->curlWigi->URL=$this->urlServicio;
        $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
        
        $Vy5yyyefdntg = array();
        
        $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    
       if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ns2consultaSerClienteResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
        
        
            $Vpsm42ro4mkq=1;    
            $Vzvarhvycpzi = "En el momento no cuentas con servicios disponibles";
            $Vrjnch0n3pcr = array();
            $Vhvpgpholvzx = array();
            $Vs4nw03sqcam = array();
            $Vled5ckxgvvr=array();

        

        if(isset($VqhzkfsafzrcRes->consultaSerCliente) && sizeof($VqhzkfsafzrcRes->consultaSerCliente) > 0){

            if(isset($VqhzkfsafzrcRes->consultaSerCliente->inventarios)){
                foreach ($VqhzkfsafzrcRes->consultaSerCliente->inventarios as $Virsew13xpli){    
                    $Virsew13xpli = (array)$Virsew13xpli;
                    $Virsew13xpli["serial"] = trim($Virsew13xpli["serial"]); 
                    array_push($Vhvpgpholvzx,$Virsew13xpli);
                }

            }
            

            if(isset($VqhzkfsafzrcRes->consultaSerCliente->servicioActual)){
                foreach ($VqhzkfsafzrcRes->consultaSerCliente->servicioActual as $Virsew13xpli){     
                    array_push($Vs4nw03sqcam,$Virsew13xpli);
                }

            }

            

        if(isset($VqhzkfsafzrcRes->consultaSerCliente->servicioDisponible)){
                $Vv254onxg3w0 = (array)$VqhzkfsafzrcRes->consultaSerCliente;
                $Vv254onxg3w0["servicioDisponible"] =  $this->curlWigi->getArray($Vv254onxg3w0["servicioDisponible"]);
            foreach ($Vv254onxg3w0["servicioDisponible"] as $Vxja1abp34yq => $Virsew13xpli){    
                   $Virsew13xpli = (array)$Virsew13xpli;
                if($Virsew13xpli["categoria"]=="3"){
                    foreach ($Virsew13xpli as $V5kfw3q1o1vh => $Vesnpsejyhuw) {
                        if($V5kfw3q1o1vh == "valor"){
                            $Vv254onxg3w0["servicioDisponible"][$Vxja1abp34yq]->$V5kfw3q1o1vh = str_replace(",00","", $Vesnpsejyhuw);
                        }
                    }
                  
                }
                 array_push($Vrjnch0n3pcr, $Vv254onxg3w0["servicioDisponible"][$Vxja1abp34yq]);
            }

           
            foreach ($Vrjnch0n3pcr as $Virsew13xpli) {
                $Virsew13xpli = (array)$Virsew13xpli;
                $Virsew13xpli["descripcionProducto"]="";
                if ($Virsew13xpli["tipoTelevision"]=="GOLDEN") {
                    $Virsew13xpli["descripcionProducto"]="<center><b>GOLDEN</b><br><br>Podrás disfrutar películas de Hollywood, mexicanas y grandes series latinoamericanas, además de tener acceso al cubrimiento de eventos especiales.</center>";
                }else if ($Virsew13xpli["tipoTelevision"]=="HOTPACK") {
                    $Virsew13xpli["descripcionProducto"]="<center><b>HOTPACK</b><br><br>Disfruta del paquete de canales para adultos más completo del mercado, variedad de contenidos y producciones latinoamericanas. Solicítalo aquí.</center>";
                }else if ($Virsew13xpli["tipoTelevision"]=="HBO") {
                    $Virsew13xpli["descripcionProducto"]="<center><b>HBO</b><br><br>Tiene todo el entretenimiento Premium que estás buscando: películas, series originales y mucho más. Pide aquí tu paquete HBO MAX.</center>";
                }else if ($Virsew13xpli["tipoTelevision"]=="FOX") {
                    $Virsew13xpli["descripcionProducto"]="<center><b>FOX</b><br><br>Accede desde tu televisor o dispositivos al mayor catálogo de entretenimiento: películas, series y deportes en vivo, en cualquier momento y lugar.</center>";
                }
                array_push($Vled5ckxgvvr,$Virsew13xpli);
            }

        }


                $Vwrq2ueuxkkr = $VqhzkfsafzrcRes->consultaSerCliente->mensajeRespuesta;
                $Vsvtppuwnavi = $VqhzkfsafzrcRes->consultaSerCliente->tipoRespuesta;
                $VesnpsejyhuworRenta = $VqhzkfsafzrcRes->consultaSerCliente->valorRenta;


                $Vesnpsejyhuwor = str_replace(".00","", ((array)$VesnpsejyhuworRenta)[0]);
 
                $Vzvarhvycpzi = array("inventarios"=>$Vhvpgpholvzx,"mensajeRespuesta"=>((array)$Vwrq2ueuxkkr)[0],
                    "servicioActual"=>$Vs4nw03sqcam,"servicioDisponible"=>$Vled5ckxgvvr,
                    "tipoRespuesta"=>((array)$Vsvtppuwnavi)[0],
                    "valorRenta"=>((array)$Vesnpsejyhuwor)[0]);
                $Vpsm42ro4mkq=0;
            
            
            $Vlfwkhon2bz0["error"]=$Vpsm42ro4mkq;
            $Vlfwkhon2bz0["response"]=$Vzvarhvycpzi;
            $Vlfwkhon2bz0["inventarios"]=$Vhvpgpholvzx;

        }
            
    
            
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