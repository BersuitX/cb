<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
error_reporting(E_ALL);



class ConsultarDetalleProducto extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
		
        $this->load->helper('cookie');
        $this->load->database();
        
    }
    
    function index_get()
    {
		$this->response(NULL,403);
    }
 
    function index_post()
    {

        $Vfeinw1hsfej = $this->post('data');
        if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej != NULL && isset($Vfeinw1hsfej["productoID"]) && intval($Vfeinw1hsfej["productoID"])>0){

            
            $Vfvggg0pmnws = $this->db->query("select descripcion as 'adescripcion',nombre as 'anombre' from repos_ProductoCaracteristicas where productoID =".$Vfeinw1hsfej["productoID"]);
            $Ve2pnzw21kc1 = $Vfvggg0pmnws->result();
            if(count($Ve2pnzw21kc1) > 0) {
                $this->response(array('error' => '0','response'=>$Ve2pnzw21kc1));
            }else{
                $this->response(array('error' => '0','response'=>array()));
            }
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
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
       $this->response(NULL,403);
    }
 
    function movil_post()
    {
        $this->index_post();
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
