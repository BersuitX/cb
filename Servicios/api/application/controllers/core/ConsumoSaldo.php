<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ConsumoSaldo extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
    	$this->load->library('curl');

        
    }
    
    function index_get()
    {
		
		$this->response(NULL,403);
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
    	$Vfeinw1hsfej=$this->post("data");
        $Vgnguexdjvna = microtime(true);

    	$Vtrszrng5kk0=$this->curl->simple_post('https://miclaroapp.com.co/api/index.php/v1/soap/retrieveBalances.json', array("data"=>$Vfeinw1hsfej));
    	$Vtrszrng5kk0=json_decode(((isset($Vtrszrng5kk0))?$Vtrszrng5kk0:'{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));



    	$Vf3hfg2nhkqy=$this->curl->simple_post('https://miclaroapp.com.co/api/index.php/v1/rest/getXdrResumenPrepago.json', array("data"=>$Vfeinw1hsfej));
    	$Vf3hfg2nhkqy=json_decode(((isset($Vf3hfg2nhkqy))?$Vf3hfg2nhkqy:'{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));

    	$Vnb2hggtfonp=array(
				"retrieveBalances"=>$Vtrszrng5kk0,
				"getXdrResumenPrepago"=>$Vf3hfg2nhkqy
    		);

        $Vswcifil4f1s = new DateTime();
        $V0wdm0aemnf1 = microtime(true) - $Vgnguexdjvna;
        $Vspi1bqfrhmf = intval($V0wdm0aemnf1);
        $Vg5o1alqj055 = $V0wdm0aemnf1 - $Vspi1bqfrhmf;
        $Vep4ncm02uco = strftime('%T', mktime(0, 0, $Vspi1bqfrhmf)) . str_replace('0.', '.', sprintf('%.4f', $Vg5o1alqj055));
        $Vspi1bqfrhmfs = $Vep4ncm02uco;


        $this->response(array("error"=>0,"response"=>$Vnb2hggtfonp, "secs"=> $Vspi1bqfrhmfs));
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
