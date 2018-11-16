<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ZonasWifi extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
		
        
        $this->load->model('puntosWifi_model');

        
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
        $Vegjyjq41mrj = $this->get('lat');
		$Vy3q2g4l3klq = $this->get('lng');
		
		if($Vegjyjq41mrj != null && $Vy3q2g4l3klq != null){
		
			$Vguysppnp4hm = 0.01;
			
			$Vfvggg0pmnws=array("Latitud >"=>$Vegjyjq41mrj-$Vguysppnp4hm,"Latitud <"=>$Vegjyjq41mrj+$Vguysppnp4hm,"Longitud >"=>$Vy3q2g4l3klq-$Vguysppnp4hm,"Longitud <"=>$Vy3q2g4l3klq+$Vguysppnp4hm);
			
			
			$Vnb2hggtfonp =  $this->puntosWifi_model
						->with_ciudad()
						->with_categoria()
						->as_array()
						->where($Vfvggg0pmnws)
						->get_all();
						
			
			
			if($Vnb2hggtfonp){
				foreach ($Vnb2hggtfonp as $Vutaiebycwbq => $Vqqmqfvq2pbp ) {
					unset ($Vnb2hggtfonp[$Vutaiebycwbq]['img']);
				}
			}else{
				$Vnb2hggtfonp=array();
			}
			
			$this->response(array('error' => '0','response'=>$Vnb2hggtfonp));
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
