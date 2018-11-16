<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


defined('BASEPATH') OR exit('No direct script access allowed');



class Mensajes extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
		
        
        $this->load->model('Mensajes_model');
        
        $this->load->model('Leidos_model');

        $this->load->database();
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
        $Vyqp2uhxmqu3 = $this->get('nombreUsuario');
        $Vyxp2dhcvnlx = $this->input->request_headers();

		if($Vyqp2uhxmqu3 != null){
            $Vmgfnu2lnukj = array("cuenta"=>$Vyqp2uhxmqu3);
            
            $Voziw1j4vegw = "select * from mensajes where eliminado = 0";
            if(isset($Vyxp2dhcvnlx,$Vyxp2dhcvnlx["X-MC-LINE"])){
                $Voziw1j4vegw = $Voziw1j4vegw." or (cuenta = '".$Vyxp2dhcvnlx["X-MC-LINE"]."' or correo = '".$Vyqp2uhxmqu3."')";
            }
            $Voziw1j4vegw = $Voziw1j4vegw." order by id_mensaje desc";
            $Voetc43kt2cr = $this->db->query($Voziw1j4vegw);
            $Vmbfnsoweevq = $Voetc43kt2cr->result();


            
            
                        
			if(!$Vmbfnsoweevq){
				$Vmbfnsoweevq =array();
			}
            $Vn2ycfau434s = 0;
            $Vzrfuqqa3k0y = array();
            if(sizeof($Vmbfnsoweevq) > 0){
                $Vmbfnsoweevqleidos =  $this->Leidos_model
                ->as_array()
                ->where($Vmgfnu2lnukj)
                
                ->get_all();
                

                

                foreach ($Vmbfnsoweevq as $Vihu5jtigs0e) { 
                    $Vihu5jtigs0e->leido = 0;
                    if($Vmbfnsoweevqleidos){
                        foreach ($Vmbfnsoweevqleidos as $Vihu5jtigs0el) { 
                            if($Vihu5jtigs0e->id_mensaje == $Vihu5jtigs0el['id_mensaje']){
                                $Vihu5jtigs0e->leido = 1;
                                
                            }
                        }
                    }
                    array_push($Vzrfuqqa3k0y,$Vihu5jtigs0e);
                }
            }
			
			$this->response(array('error' => '0','response'=>$Vzrfuqqa3k0y));
		}
		else{
			$this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
		}
		
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
