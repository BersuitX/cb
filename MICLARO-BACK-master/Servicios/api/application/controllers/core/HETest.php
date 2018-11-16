<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class HETest extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, X-API-KEY,  X-SESION-ID, X-SESSION-ID, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        $V5dsbozs5xhq = $_SERVER['REQUEST_METHOD'];
        if ($V5dsbozs5xhq == "OPTIONS") {
             $this->response( array("error"=>0,"response"=>"" ) );
        }
        
		$this->lang->load("app","spanish");
    }
    
    function index_get()
    {
        
        $Vyxp2dhcvnlx = $this->input->request_headers();
        $this->response(array('error' => '0','response'=>$Vyxp2dhcvnlx,"h"=>$Vyxp2dhcvnlx["Host"]));
    }
 
    function index_post()
    {
        $Vyxp2dhcvnlx = $this->input->request_headers();
        $this->response(array('error' => '0','response'=>$Vyxp2dhcvnlx,"h"=>$Vyxp2dhcvnlx["Host"]));

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