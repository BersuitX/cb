<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class PagoHogar extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
        $this->app=$this->config->item('app');

    }
    
    
    function movil_post()
    {
        $Vfeinw1hsfej=$this->post("data");

        if(isset($Vfeinw1hsfej["numeroFactura"])){
            $Vatefswofi4t=$this->fnEncrypt($Vfeinw1hsfej["numeroFactura"],$this->app["AES_paradigma"]); 

		    $this->response(array('error' => '0','response'=>
                array(
                    "urlPago"=>"http://facturasclarocert.paradigma.com.co/ebpTelmex/Pages/Request/Request.aspx?data=".$Vatefswofi4t."&option=7"
                    )
            ));

        }else{
		    $this->response(array('error' => '1','response'=>"No se recibió la información" ));
        }


    }

    function fnEncrypt($Vxgpowef4o2f, $V2xim30qek4u)
    {
        $Vauxee4pek3h = 'AES-128-ECB';
        $Vhocrmt3naax = openssl_random_pseudo_bytes(openssl_cipher_iv_length($Vauxee4pek3h));
        $Vzxix2pqoztx = openssl_encrypt($Vxgpowef4o2f, $Vauxee4pek3h, $V2xim30qek4u, 0, $Vhocrmt3naax);
        

        return $Vzxix2pqoztx;
    }
 
}
