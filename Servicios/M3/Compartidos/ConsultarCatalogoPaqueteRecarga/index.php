<?php

require __DIR__ . '/../../Core/vendor/autoload.php';
require_once __DIR__ . '/../../Core/config.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$V0ojkog2p2jp = new \Slim\App();
$Vb1jhtbuqbys = $V0ojkog2p2jp->getContainer();
$Vb1jhtbuqbys['view'] = new \Slim\Views\PhpRenderer(__DIR__.'/template/');

$Vb1jhtbuqbys['curlWigi'] = new \wigilabs\curlWigiM3\curlWigi();


$Vb1jhtbuqbys['urlServicio']="http://190.85.248.31/SelfCare/SelfCareManagementService.svc?wsdl"; 

$Vb1jhtbuqbys['requestTemplate']="request.php"; 



$V0ojkog2p2jp->map(['POST'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {

    $Vqhzkfsafzrc=validarSeguridad($Vyvmmv0t5uw2->getHeaders());
    if(!isset($Vqhzkfsafzrc->error)){
        
        $Vcw3r1lhk5bx=$Vqhzkfsafzrc->cuenta;
        $Vd10ichsd3g5=$Vqhzkfsafzrc->usuario;
        $Vqhzkfsafzrc->AccountId=$Vcw3r1lhk5bx->AccountId;
        $Vqhzkfsafzrc->UserProfileID=$Vd10ichsd3g5->UserProfileID;
    
    $Vupuf2xu3fof = $this->view->fetch($this->requestTemplate, ['data' => $Vqhzkfsafzrc]);
    
    
    $this->curlWigi->URL=$this->urlServicio;
    $this->curlWigi->POSTFIELDS=$Vupuf2xu3fof;
    
    $Vy5yyyefdntg[]="SOAPAction: \"Claro.SelfCareManagement.Services.Entities.Contracts/SelfCareManagementService/consultarCatalogoPaqueteRecarga\"";
    
    $VqhzkfsafzrcRes=$this->curlWigi->soap($Vy5yyyefdntg,true);
    
    

	if($VqhzkfsafzrcRes["error"] == 0){

		
		$V4kfh5akqyzi = "ConsultarCatalogoPaqueteRecargaResponse";

		$Vlfwkhon2bz0 = array();
		$Vlfwkhon2bz0["secs"] = $VqhzkfsafzrcRes["secs"];
		$Vlfwkhon2bz0["tiempo"] = $VqhzkfsafzrcRes["tiempo"];


		if(isset($VqhzkfsafzrcRes["response"],$VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi)){
			$VqhzkfsafzrcRes = $VqhzkfsafzrcRes["response"]->$V4kfh5akqyzi;
			
		

    $Vlfwkhon2bz0["error"]=1;
    $Vlfwkhon2bz0["response"] = "Temporalmente este módulo no se encuentra disponible";


      $Vzvarhvycpzi = array();
     
       $Vzvarhvycpzi["picoPlaca"] = ((array)$VqhzkfsafzrcRes->aplicaPicoPlacaRecarga)[0];
       $Vzvarhvycpzi["numeroCuenta"] = ((array)$VqhzkfsafzrcRes->numeroCuentaAprovisionar)[0];
    

      $Vehlujuftdvk = (array)$VqhzkfsafzrcRes->CatalogoPaqueteRecarga;
      $V0kmkslajbuo= (array)$VqhzkfsafzrcRes->CatalogoPaqueteRecarga->acatalogoCategoriasPaquete;
      $Vehlujuftdvks = (array)$VqhzkfsafzrcRes->CatalogoPaqueteRecarga->acatalogoRecargas;
      $Vcnszld4olgj = (array)$VqhzkfsafzrcRes->CatalogoPaqueteRecarga->acatalogoPaquetes;

      
 

        if(isset($Vehlujuftdvk,$V0kmkslajbuo["aCatalogoCategoriaPaquete"])){
            $Vdhjktx3cmeu = $this->curlWigi->getArray($V0kmkslajbuo["aCatalogoCategoriaPaquete"]);
             foreach ($Vdhjktx3cmeu as $Vojnsu0ourck => $Vuvvkm1baslr) {
                foreach ($Vuvvkm1baslr as $Vlpbz5aloxqt => $Vcptarsq5qe4){
                    
                    if($Vlpbz5aloxqt == "anombre"){
                       $Vdhjktx3cmeu[$Vojnsu0ourck]->nombre = $Vcptarsq5qe4;
                        unset($Vdhjktx3cmeu[$Vojnsu0ourck]->$Vlpbz5aloxqt);
                    }
                    if($Vlpbz5aloxqt == "acategoriaPaqueteID"){
                        $Vdhjktx3cmeu[$Vojnsu0ourck]->idCategoria = $Vcptarsq5qe4;
                        unset($Vdhjktx3cmeu[$Vojnsu0ourck]->$Vlpbz5aloxqt);
                    }

                  
                }
            }
            $Vzvarhvycpzi["listaCatalogo"]["categorias"] = $Vdhjktx3cmeu;
           array_push($Vzvarhvycpzi["listaCatalogo"]["categorias"],array("idCategoria"=>"-1","nombre"=>"Recargas"));
        }


        if(isset($Vehlujuftdvk,$Vehlujuftdvks["aCatalogoRecarga"])){
            $Vmqeiqvgojtt = $this->curlWigi->getArray($Vehlujuftdvks["aCatalogoRecarga"]);
             foreach ($Vmqeiqvgojtt as $Vojnsu0ourck => $Vuvvkm1baslr) {
                foreach ($Vuvvkm1baslr as $Vlpbz5aloxqt => $Vcptarsq5qe4){
                    
                    if($Vlpbz5aloxqt == "acatalogoRecargaID"){
                       $Vmqeiqvgojtt[$Vojnsu0ourck]->idRecarga = $Vcptarsq5qe4;
                        unset($Vmqeiqvgojtt[$Vojnsu0ourck]->$Vlpbz5aloxqt);
                    }
                    if($Vlpbz5aloxqt == "avalor"){
                        $Vmqeiqvgojtt[$Vojnsu0ourck]->valor = $Vcptarsq5qe4;
                        unset($Vmqeiqvgojtt[$Vojnsu0ourck]->$Vlpbz5aloxqt);
                    }

                  
                }
            }
            $Vzvarhvycpzi["listaCatalogo"]["recargas"] = $Vmqeiqvgojtt;
        }

        $Vpjzzrehgalf = array();
        if(isset($Vehlujuftdvk,$Vcnszld4olgj["aCatalogoPaquete"])){
            $Vqvptqn0odca = $this->curlWigi->getArray($Vcnszld4olgj["aCatalogoPaquete"]);
             foreach ($Vqvptqn0odca as $Vojnsu0ourck => $Vuvvkm1baslr) {
                foreach ($Vuvvkm1baslr as $Vlpbz5aloxqt => $Vcptarsq5qe4){
                    $Vuoe5lg50ect = substr($Vlpbz5aloxqt,1);
                    $Vpjzzrehgalf[$Vojnsu0ourck][$Vuoe5lg50ect] = $Vcptarsq5qe4;
                    unset($Vqvptqn0odca[$Vojnsu0ourck]->$Vlpbz5aloxqt);
                }
            }

            $Vzvarhvycpzi["listaCatalogo"]["paquetes"] = $Vpjzzrehgalf;
        }

        $Vlfwkhon2bz0["error"]=0; 
        $Vlfwkhon2bz0["response"]=$Vzvarhvycpzi;
    
		}
	}


	else {
		$Vlfwkhon2bz0 = $VqhzkfsafzrcRes;
	}
	
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json'); 
        
    }else{
        return $Vvcjkdrakwx3->withJson($Vqhzkfsafzrc)->withHeader('Content-type', 'application/json');
    }
});


$V0ojkog2p2jp->run();