<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class GetCMDataAccount extends REST_Controller {

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

    	$V4qunois5ie2=$this->curl->simple_post('https://miclaroapp.com.co/api/index.php/v1/soap/getCMDataAccount.json', array("data"=>$Vfeinw1hsfej));
    	$V4qunois5ie2=json_decode(((isset($V4qunois5ie2))?$V4qunois5ie2:array()));


        if (intVal($V4qunois5ie2->error)==1) {

            $Vfeinw1hsfej=array("numeroCuenta"=>$Vfeinw1hsfej["AccountId"],"canal"=>"hogar");


            $Vfkyhaby4hvj=$this->curl->simple_post('https://miclaroapp.com.co/api/v1/rest/getCustomerProducts.json', array("data"=>$Vfeinw1hsfej));
            $Vfkyhaby4hvj=json_decode(((isset($Vfkyhaby4hvj))?$Vfkyhaby4hvj:array()));

            

            header('Content-Type: application/json');
            echo json_encode($V4qunois5ie2);

        }else{
            

            header('Content-Type: application/json');
            echo json_encode($V4qunois5ie2);
        }


        
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
