<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class LogTimeOut extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
    }
    
    function index_get()
    {

    	$this->load->library('curl');

		$this->load->helper('file');
		$Vcmaitbcbmmk='/var/www/miclaroapp.com.co/public_html/archivos/historial/';
		$V22l3ub11oll = get_filenames($Vcmaitbcbmmk);

		$V1q5xkbcnn5z=array();
		foreach($V22l3ub11oll as $Vligofq0fb34)
	    { 
	    	$Vxgpowef4o2f = read_file($Vcmaitbcbmmk.$Vligofq0fb34);
	    	$Vutaiebycwbq = json_decode($Vxgpowef4o2f);
	    	array_push($V1q5xkbcnn5z,$Vutaiebycwbq);
	    }
		delete_files($Vcmaitbcbmmk, TRUE);



		$this->response(array('error' => '0','request'=>$V1q5xkbcnn5z));
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
