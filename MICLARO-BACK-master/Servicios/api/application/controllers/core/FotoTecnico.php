<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class FotoTecnico extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
        
    }
    
    function index_get()
    {
		
		$Vdrzyozqxvbr = $this->get('idTecnico');
		
		if($Vdrzyozqxvbr != null ){
			
			$V3lefstrzfrx = array(
				"Content-type: application/json;charset=\"utf-8\"",
				"Accept: application/octet-stream",
				"Cache-Control: no-cache",
				"Pragma: no-cache",
				"Authorization: Basic c29hcEBhbXgtcmVzLWNvOlNvYXAuMjAxMw=="
			);

			$V3hff1jxbuyi = curl_init();
			$V3ywm1rolk3z = "https://api.etadirect.com/rest/ofscCore/v1/resources/".$Vdrzyozqxvbr."/resource_photo";
			$V3ywm1rolk3z = utf8_decode(rawurldecode($V3ywm1rolk3z));
			
			
			curl_setopt($V3hff1jxbuyi, CURLOPT_URL, $V3ywm1rolk3z);
			curl_setopt($V3hff1jxbuyi, CURLOPT_CONNECTTIMEOUT, 0);
			curl_setopt($V3hff1jxbuyi, CURLOPT_TIMEOUT,        0);
			curl_setopt($V3hff1jxbuyi, CURLOPT_RETURNTRANSFER, true );
			curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($V3hff1jxbuyi, CURLOPT_HTTPHEADER,     $V3lefstrzfrx);
			$Vnb2hggtfonp = curl_exec($V3hff1jxbuyi);
			
			
			$Vyotgbgs03ci = json_encode($Vnb2hggtfonp);
			$Vvncjr3mb1h5 = gettype($Vyotgbgs03ci);
			
			
			if($Vvncjr3mb1h5 == "string"){
				$Vnb2hggtfonp = file_get_contents('https://miclaroapp.com.co/api/content/img/tecnicos/tecnico.png', true);
				
				
				
			}
			
			
			
			
				
					
			
			header("Content-type: image/png"); 
			header("Content-Disposition: attachment; filename=fotoTecnico.png"); 
			echo $Vnb2hggtfonp;
			
			
			
			

		}
		else{
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
        
		$this->index_get();
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
