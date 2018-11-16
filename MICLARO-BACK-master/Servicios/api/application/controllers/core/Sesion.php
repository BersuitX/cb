<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Sesion extends REST_Controller {

    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, authorization, X-SESSION-ID");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


        
        parent::__construct();
            
        
        $this->lang->load("app","spanish");
        $this->app=$this->config->item('app');
        $this->load->library('GibberishAES');
        $this->load->library('curl');

        
    }

    public function index_options() {
        return $this->response(NULL, REST_Controller::HTTP_OK);
    }
    
 
    public function index_post()
    {

        $Vfeinw1hsfej=$this->post("data");

        if ($Vfeinw1hsfej!=NULL && $Vfeinw1hsfej["accion"]== "dec") {
            $Vfeinw1hsfej=$this->gibberishaes->dec($Vfeinw1hsfej["token"],$this->app["AES"]);
            $Vfeinw1hsfejDec = $Vfeinw1hsfej;
            $Vfeinw1hsfej=json_decode($Vfeinw1hsfej, true);

            if (json_last_error()==JSON_ERROR_NONE && $Vfeinw1hsfej!= NULL) {


                $Vtqszebh5hyi=$this->curl->simple_post('https://miclaroapp.com.co/api/index.php/v1/soap/ConsultarInformacionCuentaMovil.json', array("data"=>array("numeroCuenta"=>$Vfeinw1hsfej["cuenta"]["AccountId"])));
                $Vtqszebh5hyi=json_decode(((isset($Vtqszebh5hyi))?$Vtqszebh5hyi:'{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));

                $Vfeinw1hsfej["cuenta"]["informacion"]=$Vtqszebh5hyi->response;

                $this->response( array("error"=>0,"response"=>$Vfeinw1hsfej ) );
            }else{
                $this->response( array("error"=>1,"response"=>"No se puede conectar al servidor.","data"=>$Vfeinw1hsfejDec ) );
            }
        }else if ($Vfeinw1hsfej["accion"]== "enc") {
            $Vfeinw1hsfej=$this->gibberishaes->enc(json_encode($Vfeinw1hsfej["info"]),$this->app["AES"]);
            $this->response( array("error"=>0,"response"=>$Vfeinw1hsfej ) );
        }else{
            $this->response( array("error"=>1,"response"=>"No se puede conectar." ) );
        }

        
    }

}
