<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataHomologacion extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");     

        
        

        
        $this->load->database();

        
    }
    
    function index_get()
    {        
            
        try{
            $Voziw1j4vegw = "select * from app_data_metodos_homologacion order by metodo;";
            $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw)->result();
            $this->response(array('error' => '0','response'=>$Vyotgbgs03ci));
        }catch(Exception  $Veengl4bqqud){
            $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
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
