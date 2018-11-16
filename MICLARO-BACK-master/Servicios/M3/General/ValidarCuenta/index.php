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
    
    $Vvkwvjdx1mcb = json_decode($Vyvmmv0t5uw2->getBody());
     if(isset($Vvkwvjdx1mcb,$Vvkwvjdx1mcb->data)){
    $Vqhzkfsafzrc = $Vvkwvjdx1mcb->data;


       $Vlfwkhon2bz0["headers"]=$Vyvmmv0t5uw2->getHeaders();
    
    $Vmyskdexsdcd = substr($Vqhzkfsafzrc->AccountId, 0, 1);
    $Vlfwkhon2bz0  = array();
    $Vi2njftet5do=date("Y-m-d H:i:s");

    if (strlen($Vqhzkfsafzrc->AccountId) == 8 || (strlen($Vqhzkfsafzrc->AccountId) == 10 && $Vmyskdexsdcd == 2)) {
        $V3jequ00uaxw = $this->curlWigi->getFijoDocType($Vqhzkfsafzrc->codigoTipoDocumento);
        
        $Vqhzkfsafzrc2 = array("data" => array("codigoTipoDocumento" => $V3jequ00uaxw,"documento" => $Vqhzkfsafzrc->DocumentNumber,"numeroCuenta" => $Vqhzkfsafzrc->AccountId));
        $Vnwlngxwnesf = 'https://www.miclaroapp.com.co/api/index.php/v1/soap/ValidarRegistroCuentaClienteFija.json';
        $Vjzxqhsc45ix = $this->curlWigi->simple_post($Vnwlngxwnesf, $Vqhzkfsafzrc2);
        
        if(isset($Vjzxqhsc45ix)){
            $Vjzxqhsc45ix = json_decode($Vjzxqhsc45ix);
        }else{
            $Vjzxqhsc45ix = new \stdClass();
            $Vjzxqhsc45ix->error = 1;
            $Vjzxqhsc45ix->response = "En este momento no podemos atender esta solicitud, intenta nuevamente.";
        }
        
        
        if ($Vjzxqhsc45ix->error == 0) {
            $Vzvarhvycpzi = $Vjzxqhsc45ix->response;
            if (isset($Vzvarhvycpzi->aesCuentaValida, $Vzvarhvycpzi->aesClienteAsociadoCuenta)) {
                
                if ($Vzvarhvycpzi->aesCuentaValida == "true" && $Vzvarhvycpzi->aesClienteAsociadoCuenta == "true") {
                    
                    $Vtssepikoezf = array(
                        "LineOfBusiness" => $Vzvarhvycpzi->LineOfBusiness,
                        "AccountId" => $Vqhzkfsafzrc->AccountId,
                        "DocumentNumber" => $Vqhzkfsafzrc->DocumentNumber,
                        "DocumentType" => $Vqhzkfsafzrc->codigoTipoDocumento,
                        "nombreCliente" => trim($Vzvarhvycpzi->anombre),
                        "apellidoCliente" => trim($Vzvarhvycpzi->aapellidos),
                        "legalizar" => 0
                    );


                    $Vd10ichsd3g5= array(
                        "DocumentNumber"=>$Vtssepikoezf["DocumentNumber"],
                        "DocumentType"=>$Vtssepikoezf["DocumentType"],
                        "nombreCliente"=>$Vtssepikoezf["nombreCliente"],
                        "apellidoCliente"=>$Vtssepikoezf["apellidoCliente"]
                    );

                    $Vcw3r1lhk5bx= array(
                        "LineOfBusiness"=>$Vtssepikoezf["LineOfBusiness"],
                        "AccountId"=>$Vtssepikoezf["AccountId"]
                    );

                    $V05bw4ekjav1=array(
                        "usuario"=>$Vd10ichsd3g5,
                        "cuenta" => $Vcw3r1lhk5bx,
                        "inicio"=>$Vi2njftet5do
                    );

                    $Vtssepikoezf["token"]=encrypt(json_encode($V05bw4ekjav1));

                    
                    
                    
                    $Vlfwkhon2bz0["error"] = 0;
                    $Vlfwkhon2bz0["response"] = $Vtssepikoezf;
                    
                } else if ($Vzvarhvycpzi->aesCuentaValida == "false"){
                    $Vlfwkhon2bz0["error"] = 1;
                    $Vlfwkhon2bz0["response"] = 'El producto que intentas asociar no se encuentra activo.';
                } else {
                    $Vlfwkhon2bz0["error"] = 1;
                    $Vlfwkhon2bz0["response"] = 'El producto que intentas asociar no coincide con tu número de documento.';
                }
                
            } else {
                $Vlfwkhon2bz0["error"] = 1;
                $Vlfwkhon2bz0["response"] = 'Debes ingresar un Número de Cuenta Hogar / Movil Claro válido';
            }
        } else {
            $Vlfwkhon2bz0 = $Vjzxqhsc45ix;
        }
        
    } else if ($Vqhzkfsafzrc->codigoTipoDocumento == 5 ) {
        $Vlfwkhon2bz0["error"] = 1;
        $Vlfwkhon2bz0["response"] = 'Te informamos que tu servicio contratado no permite asociar productos móviles.';
    } else {
        $V3jequ00uaxw = $this->curlWigi->getMovilDocType($Vqhzkfsafzrc->codigoTipoDocumento);
        $Vqhzkfsafzrc3 = array("data" => array("AccountId" => $Vqhzkfsafzrc->AccountId));
        $Vnwlngxwnesf2 = 'https://www.miclaroapp.com.co/api/index.php/v1/soap/validateNumber.json';
        $Vojio0yzk3j4 = $this->curlWigi->simple_post($Vnwlngxwnesf2,$Vqhzkfsafzrc3);
        $Vojio0yzk3j4 = json_decode(((isset($Vojio0yzk3j4))?$Vojio0yzk3j4:
            '{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));
        
        if ($Vojio0yzk3j4->error == 0) {
            $Vzvarhvycpzi = $Vojio0yzk3j4->response;
            
            if (isset($Vzvarhvycpzi->IsValidFlag) && $Vzvarhvycpzi->IsValidFlag == "true") {
                
                if (isset($Vzvarhvycpzi->LineOfBusiness)) {
                    $Vtssepikoezf = array(
                        "LineOfBusiness" => $Vzvarhvycpzi->LineOfBusiness,
                        "AccountId" => $Vqhzkfsafzrc->AccountId);

                    $Vqhzkfsafzrc4 = array("data" => array("LineOfBusiness" => $Vtssepikoezf["LineOfBusiness"],"AccountId" => $Vtssepikoezf["AccountId"]));
                    $Vnwlngxwnesf3 = 'https://www.miclaroapp.com.co/api/index.php/v1/soap/retrieveCustomerData.json';
                    $Vxborz2dyi3a = $this->curlWigi->simple_post($Vnwlngxwnesf3,$Vqhzkfsafzrc4);
                    $Vxborz2dyi3a = json_decode(((isset($Vxborz2dyi3a))?$Vxborz2dyi3a:
                        '{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));
                    
                    if ($Vxborz2dyi3a->error == 0) {
                        $Vzvarhvycpzi = $Vxborz2dyi3a->response;
                        if (isset($Vzvarhvycpzi->DocumentType) && isset($Vzvarhvycpzi->DocumentNumber)) {
                            
                            $Vtssepikoezf["LineOfBusiness"] = $Vtssepikoezf["LineOfBusiness"];
                            $Vtssepikoezf["DocumentNumber"] = $Vqhzkfsafzrc->DocumentNumber;
                            $Vtssepikoezf["DocumentType"] = $Vqhzkfsafzrc->codigoTipoDocumento;
                            $Vtssepikoezf["nombreCliente"] = trim($Vzvarhvycpzi->Name);
                            $Vtssepikoezf["apellidoCliente"] = trim($Vzvarhvycpzi->LastName);
                            $Vtssepikoezf["legalizar"] = 0;
                            
                            if (intval($Vzvarhvycpzi->DocumentType) == intval($V3jequ00uaxw) && intval($Vzvarhvycpzi->DocumentNumber) == intval($Vqhzkfsafzrc->DocumentNumber)) {
                                

                                 $Vd10ichsd3g5= array(
                                    "DocumentNumber"=>$Vtssepikoezf["DocumentNumber"],
                                    "DocumentType"=>$Vqhzkfsafzrc->codigoTipoDocumento,
                                    "nombreCliente"=>$Vtssepikoezf["nombreCliente"],
                                    "apellidoCliente"=>$Vtssepikoezf["apellidoCliente"]
                                );

                                $Vcw3r1lhk5bx= array(
                                    "LineOfBusiness"=>$Vtssepikoezf["LineOfBusiness"],
                                    "AccountId"=>$Vtssepikoezf["AccountId"]
                                );

                                $V05bw4ekjav1=array(
                                    "usuario"=>$Vd10ichsd3g5,
                                    "cuenta" => $Vcw3r1lhk5bx,
                                    "inicio"=>$Vi2njftet5do
                                );


                                $Vtssepikoezf["token"]=encrypt(json_encode($V05bw4ekjav1));

                                
                                
                                

                                
                                
                                
                                $Vlfwkhon2bz0["error"] = 0;
                                $Vlfwkhon2bz0["response"] = $Vtssepikoezf;
                                
                            
                            
                            }else if(intval($Vtssepikoezf["LineOfBusiness"]) == 2 ){    
                                $Vqhzkfsafzrc5 = array("data" => array("AccountId" => $Vtssepikoezf["AccountId"]));
                                $Vnwlngxwnesf4 = 'https://miclaroapp.com.co/api/index.php/v1/soap/esLegalizada.json';
                                $Vmfqbbmweomn = $this->curlWigi->simple_post($Vnwlngxwnesf4,$Vqhzkfsafzrc5);
                                $Vmfqbbmweomn = json_decode(((isset($Vmfqbbmweomn))?$Vmfqbbmweomn:'{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));
                                
                                if ($Vmfqbbmweomn->error == 0) {
                                    $Vzvarhvycpzi = $Vmfqbbmweomn->response;
                                    
                                    if (intval($Vzvarhvycpzi->legalizar) == 1) {
                                        $Vtssepikoezf["legalizar"] = 1;

                                         $Vd10ichsd3g5= array(
                                            "DocumentNumber"=>$Vtssepikoezf["DocumentNumber"],
                                            "DocumentType"=>$Vqhzkfsafzrc->codigoTipoDocumento,
                                            "nombreCliente"=>$Vtssepikoezf["nombreCliente"],
                                            "apellidoCliente"=>$Vtssepikoezf["apellidoCliente"]
                                        );

                                        $Vcw3r1lhk5bx= array(
                                            "LineOfBusiness"=>$Vtssepikoezf["LineOfBusiness"],
                                            "AccountId"=>$Vtssepikoezf["AccountId"]
                                        );

                                        $V05bw4ekjav1=array(
                                            "usuario"=>$Vd10ichsd3g5,
                                            "cuenta" => $Vcw3r1lhk5bx,
                                            "inicio"=>$Vi2njftet5do
                                        );

                                        
                                        $Vtssepikoezf["token"]=encrypt(json_encode($V05bw4ekjav1));

                                        
                                        
                                        
                                        $Vlfwkhon2bz0["error"] = 0;
                                        $Vlfwkhon2bz0["response"] = $Vtssepikoezf;
                                    } else {
                                        $Vlfwkhon2bz0["error"] = 1;
                                        $Vlfwkhon2bz0["response"] = 'El producto que intentas asociar no coincide con tu número de documento.';
                                    }
                                } else {
                                    $Vlfwkhon2bz0 = $Vmfqbbmweomn;
                                }
                                
                            } else {
                                $Vlfwkhon2bz0["error"] = 1;
                                $Vlfwkhon2bz0["response"] = 'El producto que intentas asociar no coincide con tu número de documento.';
                            }
                        } else {
                            $Vlfwkhon2bz0["error"] = 1;
                            $Vlfwkhon2bz0["response"] = 'Error al obtener la información de tu cuenta. Intentalo nuevamente.';
                        }
                    } else {
                        $Vlfwkhon2bz0 = $Vxborz2dyi3a;
                    }
                    
                } else {
                    $Vlfwkhon2bz0["error"] = 1;
                    $Vlfwkhon2bz0["response"] ='La cuenta no es válida.';
                }
            } else {
                $Vlfwkhon2bz0["error"] = 1;
                $Vlfwkhon2bz0["response"] ='Debes ingresar un Número de Cuenta Hogar / Movil Claro válido.';
            }
            
        } else {
            $Vlfwkhon2bz0 = $Vojio0yzk3j4;
            
        }
    }
     }
    else{
       $Vlfwkhon2bz0["error"]=1;
       $Vlfwkhon2bz0["response"]="Los parámetros enviados no son validos";
    }
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');
    
});


$V0ojkog2p2jp->run();