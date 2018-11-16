<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DecAes extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");

        
        $this->load->helper('cookie');
        $this->app=$this->config->item('app');
    }
    
    function index_get()
    {
        
        $Vfeinw1hsfej = $this->get('key');
        $Vonnn0nfpbux = array('error' => '1','response'=>$this->lang->line('error_nodata'));

        try{
            if($Vfeinw1hsfej != null){
                $Vfeinw1hsfej = utf8_decode($Vfeinw1hsfej);
                $Vfeinw1hsfej = str_replace("*SLASH*","/",$Vfeinw1hsfej);
                $Vfeinw1hsfej = str_replace("*MAS*","+",$Vfeinw1hsfej);
                $Vfeinw1hsfej = str_replace("*IGUAL*","=",$Vfeinw1hsfej);

                if ( base64_encode(base64_decode($Vfeinw1hsfej, true)) === $Vfeinw1hsfej){

                    
                    $Vecislziuyfz = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
                    $Vhocrmt3naax =  base64_decode("nHptmGqpKtDT/q8EwMTuSg==");
                    $Vhocrmt3naaxlen = mcrypt_enc_get_iv_size($Vecislziuyfz);
                    $V2xim30qek4u = "B400B30E9F93749A";
                    
                    
                    
                    $Vwezxapgmyke = "{}";
                    
                    if(mcrypt_generic_init($Vecislziuyfz, $V2xim30qek4u, $Vhocrmt3naax) != -1){
                        $Vwezxapgmyke = mdecrypt_generic($Vecislziuyfz, base64_decode($Vfeinw1hsfej));
                        mcrypt_generic_deinit($Vecislziuyfz);
                        mcrypt_module_close($Vecislziuyfz);
                    }
                    
                    $Vkqmdbfyoayd = array("\n","\b","","","","\2","","","","");
                    
                    
                    $Vssdjb5oqaky = str_replace($Vkqmdbfyoayd,"",$Vwezxapgmyke);
                    $Vssdjb5oqakyRep = str_replace($Vkqmdbfyoayd,"",$Vwezxapgmyke);
                    $Vssdjb5oqaky = json_decode($Vssdjb5oqaky);
                    $Vonnn0nfpbux["h"] = $Vssdjb5oqaky->Hora;
                    

                    if($Vssdjb5oqaky && json_last_error()==JSON_ERROR_NONE){
                        
                        $Vonnn0nfpbux["error"] = 0;
                        $Vonnn0nfpbux["response"] = $Vssdjb5oqaky;
                    }else{
                        $Vonnn0nfpbux["data"] = $Vwezxapgmyke;
                        $Vonnn0nfpbux["dataPadding"] = $Vssdjb5oqaky;
                        $Vonnn0nfpbux["remmpl"] = $Vssdjb5oqakyRep;
                        $Vonnn0nfpbux["response"] = "La información no se encuentra en el formato corecto.";
                    }
                }else{
                    $Vonnn0nfpbux = array('error' => '1','response'=>"la información no es válida");
                    $Vonnn0nfpbux["data"] = $Vfeinw1hsfej;
                    $Vonnn0nfpbux["dataDec"] =  base64_decode($Vfeinw1hsfej, true);
                }
                    
            }
        }catch(Exception $Veengl4bqqud){
            $Vonnn0nfpbux = array('error' => '1','response'=>$Veengl4bqqud);
        }

        $this->response($Vonnn0nfpbux);
    }
 
    function index_post()
    {
        $this->response(NULL,403);
    }
 
    function index_put()
    {
       $this->response(NULL,403);
    }
    
 
    function index_delete()
    {   
        $this->response(NULL,403);
    }
    
    
    
    
    function movil_get()
    {
        $this->response(NULL,403);
    }
 
    function movil_post()
    {
        $this->response(NULL,403);
    }
 
    function movil_put()
    {
        $this->response(NULL,403);
    }
 
    function movil_delete()
    {
        $this->response(NULL,403);
    }

}
