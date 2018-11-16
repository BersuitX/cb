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
        $Vqhzkfsafzrc->numeroCuenta=$Vcw3r1lhk5bx->AccountId;

    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/consultarInformacionCuentaMovil\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
        
    if($VqhzkfsafzrcRes["error"] == 0){

        
        $V4kfh5akqyzi = "ConsultarInformacionCuentaMovilResponse";

        $Vlfwkhon2bz0 = array();
        $Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
        $Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


        if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
            $VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
            
            
    $Vfg0lxzjujst=((isset($VqhzkfsafzrcRes->informacionCuenta->aaplicaPicoPlacaRecarga))? $VqhzkfsafzrcRes->informacionCuenta->aaplicaPicoPlacaRecarga:"");
    $Vfg0lxzjujst=(($Vfg0lxzjujst=="true")?1:0);

    if(isset($VqhzkfsafzrcRes->informacionCuenta->aInformacionPropuestaOferta) && isset($VqhzkfsafzrcRes->informacionCuenta->aInformacionPropuestaOferta->aaplicaBlindaje)){
        $V3iezot1e42f=$VqhzkfsafzrcRes->informacionCuenta->aInformacionPropuestaOferta;
        $V3iezot1e42ferta["tieneBlindaje"]=(($V3iezot1e42f["aaplicaBlindaje"]=="true")?1:0);

        $Vp1z0wv4ipu2=((isset($V3iezot1e42f["avalorBlindajeAdicional"]))?intval($V3iezot1e42f["avalorBlindajeAdicional"]):0);
        if ($Vp1z0wv4ipu2>0) {
            $Vp1z0wv4ipu2=number_format((float)($Vp1z0wv4ipu2/1000), 1, '.', '')." GB";
        }else{
            $Vp1z0wv4ipu2="0 GB";
        }

        $V3iezot1e42ferta["blindaje"]=array(
            "valorBlindajeAdiciona"=>$Vp1z0wv4ipu2,
            "valorBlindajeTotal"=>((isset($V3iezot1e42f["avalorBlindajeTotal"]))?$V3iezot1e42f["avalorBlindajeTotal"]:"")
        );

        $Vvyjmzb3w0u0=array();
        if (isset($V3iezot1e42f["aofertas"]) && isset($V3iezot1e42f["aofertas"]["aOferta"])) {
            $Vautxf03llyt=$Vqas542xn3x5->getArray($V3iezot1e42f["aofertas"]["aOferta"]);

            $Vvyjmzb3w0u0=array();
            foreach ($Vautxf03llyt as $Virsew13xpli) {

                $Vi5ziq4wpwd1=((isset($Virsew13xpli->atotalBeneficio))?intval($Virsew13xpli->atotalBeneficio):0);
                if ($Vi5ziq4wpwd1>0) {
                    $Vi5ziq4wpwd1=number_format((float)($Vi5ziq4wpwd1/1000), 1, '.', '')." GB";
                }else{
                    $Vi5ziq4wpwd1="0 GB";
                }

                $Vuz2tqweebiu["propuestaOfertaID"]=((isset($V3iezot1e42f["apropuestaOfertaID"]))?$V3iezot1e42f["apropuestaOfertaID"]:"0");
                $Vuz2tqweebiu["valorAumentoCargoFijo"]=$Virsew13xpli->avalorAumentoCargoFijo;
                $Vuz2tqweebiu["ofertaID"]=$Virsew13xpli->aOfertaID;
                $Vuz2tqweebiu["cargoFijoMensual"]=$Virsew13xpli->acargoFijoMensual;
                $Vuz2tqweebiu["descripcion"]=$Virsew13xpli->adescripcion;
                $Vuz2tqweebiu["nombre"]=$Virsew13xpli->anombre;
                $Vuz2tqweebiu["totalBeneficio"]=$Virsew13xpli->atotalBeneficio;
                $Vuz2tqweebiu["valorBeneficio"]=$Vi5ziq4wpwd1;
                array_push($Vvyjmzb3w0u0,$Vuz2tqweebiu);
            }
        }
        
        $V3iezot1e42ferta["beneficios"]=$Vvyjmzb3w0u0;

        $Vqhzkfsafzrcrespuesta["tieneBeneficios"]=1;
        $Vqhzkfsafzrcrespuesta["oferta"]=$V3iezot1e42ferta;

    }else{
        $Vqhzkfsafzrcrespuesta["tieneBeneficios"]=0;
        $Vqhzkfsafzrcrespuesta["oferta"]=(Object) array();
    }

        $VqhzkfsafzrcRes = (array)$VqhzkfsafzrcRes;

        if(isset($VqhzkfsafzrcRes["informacionCuenta"])){
            $V25krosixw0r = (array)$VqhzkfsafzrcRes["informacionCuenta"];
        }
        
        $Vqhzkfsafzrcrespuesta["codigoContrat"]=isset($V25krosixw0r["acodigoContrato"])?$V25krosixw0r["acodigoContrato"]:"";
        $Vqhzkfsafzrcrespuesta["custcode"]=isset($V25krosixw0r["acustcode"])?$V25krosixw0r["acustcode"]:"";
        $Vqhzkfsafzrcrespuesta["customerID"]=isset($V25krosixw0r["acustomerID"])?$V25krosixw0r["acustomerID"]:"";
        $Vqhzkfsafzrcrespuesta["esCuentaLegalizada"]=isset($V25krosixw0r["aesCuentaLegalizada"])?$V25krosixw0r["aesCuentaLegalizada"]:"";
        $Vqhzkfsafzrcrespuesta["estadoCuenta"]=isset($V25krosixw0r["aestadoCuenta"])?$V25krosixw0r["aestadoCuenta"]:"";
        $Vqhzkfsafzrcrespuesta["fechaActivacion"]=isset($V25krosixw0r["afechaActivacion"])?$V25krosixw0r["afechaActivacion"]:"";
        $Vqhzkfsafzrcrespuesta["imsi"]=isset($V25krosixw0r["aimsi"])?$V25krosixw0r["aimsi"]:"";
        $Vqhzkfsafzrcrespuesta["numeroCuenta"]=isset($V25krosixw0r["anumeroCuenta"])?$V25krosixw0r["anumeroCuenta"]:"";
        $Vqhzkfsafzrcrespuesta["tipoCuentaID"]=isset($V25krosixw0r["atipoCuentaID"])?$V25krosixw0r["atipoCuentaID"]:"";
        $Vqhzkfsafzrcrespuesta["picoyplaca"]=$Vfg0lxzjujst;


        $V4wxmvnkyv3k="";
        if (isset($V25krosixw0r["afechaFinCorteCiclo"])) {
            $V4wxmvnkyv3k=$this->curlWigi->arrayToString($V25krosixw0r["afechaFinCorteCiclo"]);
        }    
        $Vqhzkfsafzrcrespuesta["fechaFinCorte"]=$V4wxmvnkyv3k;


       $Vcaax5r4vqas="";
       if (isset($V25krosixw0r["afechaInicioCorteCiclo"])) {
           $Vcaax5r4vqas=$this->curlWigi->arrayToString($V25krosixw0r["afechaInicioCorteCiclo"]);
       }
       $Vqhzkfsafzrcrespuesta["fechaInicioCorte"]=$Vcaax5r4vqas;
    
        
        
        $Vlfwkhon2bz0["response"]=$Vqhzkfsafzrcrespuesta;
        $Vlfwkhon2bz0["error"]=0;

        
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