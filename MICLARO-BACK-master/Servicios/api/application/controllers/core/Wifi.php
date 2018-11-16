<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Wifi extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
		
        
    }

    
    
    function index_get()
    {
		$Vkpumbzgjysd = $this->get('idUsuario');
		
		if($Vkpumbzgjysd != null){
            $V3hff1jxbuyi = curl_init();
            curl_setopt($V3hff1jxbuyi, CURLOPT_URL, "http://172.31.228.201/pollerWs_test/services/DiagResService?wsdl");
            
            curl_setopt($V3hff1jxbuyi, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($V3hff1jxbuyi, CURLOPT_TIMEOUT,        0);
            curl_setopt($V3hff1jxbuyi, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYHOST, false);
            $Vnb2hggtfonp = curl_exec($V3hff1jxbuyi);

            if(!$Vnb2hggtfonp) {
                $Vnb2hggtfonp = 'Error: ' . curl_error($V3hff1jxbuyi);
                curl_close($V3hff1jxbuyi);
                return array("error"=>1,"response"=>$Vnb2hggtfonp);

            } else {
                curl_close($V3hff1jxbuyi);
                $this->response(array('error' => '0','response'=>"hola".$Vnb2hggtfonp));
            }

			
		}else{
			$this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
		}
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
        $this->index_get(true);
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
