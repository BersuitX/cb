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


$V0ojkog2p2jp->map(['GET'], '/', function (Request $Vyvmmv0t5uw2, Response $Vvcjkdrakwx3, array $Veox3iprl5oz) {
    
    $Vlfwkhon2bz0  = array();
    $Vlfwkhon2bz0["error"]=1;
    $Vlfwkhon2bz0["response"]="Debe enviar el header de versión";


    
    $V5y2wgq24k1v = $Vyvmmv0t5uw2->getHeaders();

    
    $V5y2wgq24k1v["X-MC-APP-V"]="1.32.0";

    $V3jv1il2hqc3 = "0";
    if(isset($V5y2wgq24k1v) && (isset($V5y2wgq24k1v["X-MC-APP-V"]) || isset($V5y2wgq24k1v["HTTP_X_MC_APP_V"],$V5y2wgq24k1v["HTTP_X_MC_APP_V"][0]) ) ){

        $Vmytwkjekqec = 1;
        $Vzvarhvycpzi = "Versión no permitida";

         


        $V3jv1il2hqc3 = isset($V5y2wgq24k1v["X-MC-APP-V"])?$V5y2wgq24k1v["X-MC-APP-V"]:$V5y2wgq24k1v["HTTP_X_MC_APP_V"][0];
        
        if($V3jv1il2hqc3 == "4.3.9" || $V3jv1il2hqc3 == "1.31.5" || $V3jv1il2hqc3 == "1.31.0" || $V3jv1il2hqc3 == "1.32.0" || $V3jv1il2hqc3 == "4.3.8"  || $V3jv1il2hqc3 == "4.4.0"){
            
            if(isset($V5y2wgq24k1v,$V5y2wgq24k1v["HTTP_X_UP_SUBNO"])){
                if(sizeof($V5y2wgq24k1v["HTTP_X_UP_SUBNO"]) == 1){
                    $Vmytwkjekqec = 0;
                    $Vavqdssoj31n = $V5y2wgq24k1v["HTTP_X_UP_SUBNO"][0];
                    $Vavqdssoj31n = substr($Vavqdssoj31n,2,10);

                    $Vwmgafxuvzgd = "3";
                    
                    $Vannw04qlrk3=array("data"=>array("AccountId"=>$Vavqdssoj31n));
                    $Vlbzklez4tmh = "https://miclaroapp.com.co/api/index.php/v1/soap/validateNumber.json";
                    $Vtssepikoezf=$this->curlWigi->simple_post($Vlbzklez4tmh,$Vannw04qlrk3);
                    $Vtssepikoezf = json_decode($Vtssepikoezf);

                    if(isset($Vtssepikoezf->error,$Vtssepikoezf->response,$Vtssepikoezf->response->LineOfBusiness)){
                        if(!$Vtssepikoezf->error){
                            $Vwmgafxuvzgd = $Vtssepikoezf->response->LineOfBusiness;
                        }
                    }

                    
                }
            }

            
            
            if($Vmytwkjekqec){
                $Vmytwkjekqec = 0;
                $Vavqdssoj31n = "3227355820";
                $Vwmgafxuvzgd = "3";
            }
            
        }



        
        if(!$Vmytwkjekqec){

            
            $V2p4moep5pfe = 0;
            $Vgsr5lm4tsvw=array("data"=>array("AccountId"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd));
            $Vvhrip1md3cr = "https://www.miclaroapp.com.co/M3/Empresas/retrieveBusinessUnit";
            $VtssepikoezfEmp=$this->curlWigi->simple_post($Vvhrip1md3cr,$Vgsr5lm4tsvw);
            $VtssepikoezfEmp = json_decode($VtssepikoezfEmp);

            if($Vwmgafxuvzgd == "2"){
                $V2p4moep5pfe = 1;
            }if(isset($VtssepikoezfEmp->error,$VtssepikoezfEmp->response,$VtssepikoezfEmp->response->esEmpresa) && $VtssepikoezfEmp->error == 0){
                $V2p4moep5pfe = $VtssepikoezfEmp->response->esEmpresa;
            }

            
            $Vrpzml4juh0y = array("usuario"=>array("nombre"=>"","apellido"=>"","UserProfileID"=>""),"cuenta"=>array("AccountId"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd,"esEmpresas"=>$V2p4moep5pfe));
            $Vqj2tipjf2zw=array("data"=>array("accion"=>"enc","info"=>$Vrpzml4juh0y));
            $Vjwth3vhqtq3 = "https://www.miclaroapp.com.co/api/index.php/v1/core/web/Sesion.json";
            $VtssepikoezfTok=$this->curlWigi->simple_post($Vjwth3vhqtq3,$Vqj2tipjf2zw);
            $VtssepikoezfTok = json_decode($VtssepikoezfTok);
            
            
            if(isset($VtssepikoezfTok->error,$VtssepikoezfTok->response) && $VtssepikoezfTok->error == 0){
                $Vzvarhvycpzi = array("AccountId"=>$Vavqdssoj31n,"accountIdHEader"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd,"token"=>$VtssepikoezfTok->response);
            }else{
                $Vmytwkjekqec = 1;
                $Vzvarhvycpzi=array("r"=>$VtssepikoezfTok,"linea"=>$Vavqdssoj31n,"LineOfBusiness"=>$Vwmgafxuvzgd); 
            }

            
            $Vzvarhvycpzi["esEmpresas"] = 1;





            $Vlfwkhon2bz0["error"]=$Vmytwkjekqec;
            $Vlfwkhon2bz0["response"]=$Vzvarhvycpzi;
            
        }

    }


    $Vlfwkhon2bz0["headers"]=$V5y2wgq24k1v;
    return $Vvcjkdrakwx3->withJson($Vlfwkhon2bz0)->withHeader('Content-type', 'application/json');

    
});


$V0ojkog2p2jp->run();