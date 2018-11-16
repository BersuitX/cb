<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Direcciones extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
    }
    
    function index_get()
    {
        
        $Vrzibbqajdvj = array();
        $Vxcnqqebtkry = file_get_contents("https://www.miclaroapp.com.co/archivos/direcciones.json");
        $Vrzibbqajdvj = json_decode($Vxcnqqebtkry, true);
        
        $this->response(array('error' => '0','response'=> $Vrzibbqajdvj));
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