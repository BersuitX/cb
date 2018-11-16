<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Archivos extends MY_Controller {

    function __construct()
    {
        
        parent::__construct();
    }
    
    function index_get()
    {
        $Vwzmz1dvggot = $this->get_data('get','nombre');

        $Vfeinw1hsfej=array("LineOfBusiness"=>"1","AccountId"=>"3232460988");

        $Vnb2hggtfonp=$this->curl("retrievePlan",$Vfeinw1hsfej);

        $this->return_data( $Vnb2hggtfonp );
    }
 
    function index_post()
    {
        $Vfeinw1hsfej = $this->get_data('post','data');
        $this->return_data( array('error' => '0','response'=>$Vfeinw1hsfej) );
    }
 
    function index_put()
    {
        $this->response(NULL,404);
    }
    
 
    function index_delete()
    {
        $this->response(NULL,404);
    }
    
    
    
    
    function movil_get()
    {
        $this->response(NULL,404);
    }
 
    function movil_post()
    {
        $this->response(NULL,404);
    }
 
    function movil_put()
    {
        $this->response(NULL,404);
    }
    
 
    function movil_delete()
    {
        $this->response(NULL,404);
    }
    
    

}
