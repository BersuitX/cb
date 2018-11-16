<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Test extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
		$this->load->library('curl');
        
    }

    
    
    function index_get()
    {


		
		$V3ywm1rolk3z = $this->get('uri');
		


        $V3lefstrzfrx = array(
            "Content-type: application/json;charset=\"utf-8\"",
            "Accept: application/octet-stream",
			
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic c29hcEBhbXgtcmVzLWNvOlNvYXAuMjAxMw=="
        );

		$V3hff1jxbuyi = curl_init();
		
        
        
        
		
        
		
		
		
		
		$V3ywm1rolk3z =  utf8_decode(rawurldecode($V3ywm1rolk3z));
		curl_setopt($V3hff1jxbuyi, CURLOPT_URL, $V3ywm1rolk3z);
		
		
		
        
         
        

        

        
        
		
        
        

        

        curl_setopt($V3hff1jxbuyi, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($V3hff1jxbuyi, CURLOPT_TIMEOUT,        0);
        curl_setopt($V3hff1jxbuyi, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_HTTPHEADER,     $V3lefstrzfrx);
        $Vnb2hggtfonp = curl_exec($V3hff1jxbuyi);
		
		
		
		
		
		
		
		
		
        if(!$Vnb2hggtfonp) {
            $Vnb2hggtfonp = 'Error: ' . curl_error($V3hff1jxbuyi);
            curl_close($V3hff1jxbuyi);
            return array("error"=>1,"response"=>$Vnb2hggtfonp);

        } else {
            curl_close($V3hff1jxbuyi);
            $this->response(array('error' => '0','response'=>$Vnb2hggtfonp));
        }
		
    }
 
    function index_post()
    {
        $V0rgibksbyqm=$this->query("service");

        

        
        if ($V0rgibksbyqm) {
            header('Content-type: text/xml');
            $this->load->view("Temp/".$V0rgibksbyqm);
            
        }else{
            $this->response(array('error' => '0','response'=>"El servicio no existe" ));
        }

        
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
