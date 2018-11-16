<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class TiposVisitas extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
		
		
        $this->load->model('tiposVisitas_model');
        
    }
    
    function index_get()
    {		
		
		$Vfvggg0pmnws = array("eliminado"=>0);
        $Vnb2hggtfonp = $this->tiposVisitas_model
                ->as_array()
                ->where($Vfvggg0pmnws)
                ->get_all();
	
		$Vnb2hggtfonp = ($Vnb2hggtfonp)?$Vnb2hggtfonp:array();
	
		$this->response(array('error' => '0','response'=>$Vnb2hggtfonp));
		
    }
 
    function index_post()
    {
        $Vfeinw1hsfej = $this->post('data');
        if ($Vfeinw1hsfej !=NULL) {
            $Vdrzyozqxvbr=$this->tiposVisitas_model->insert($Vfeinw1hsfej);
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line("error_nodata")));
        }
         
    }
 
    function index_put()
    {
        $Vfeinw1hsfej = $this->put('data');
        if ($Vfeinw1hsfej !=NULL && $Vfeinw1hsfej["idTipoVisita"]>0) {
            
            $this->tiposVisitas_model->update($Vfeinw1hsfej,$Vfeinw1hsfej["idTipoVisita"]);
            
            $Vfvggg0pmnws=array("idTipoVisita"=>$Vfeinw1hsfej["idTipoVisita"]);
            $Vutaiebycwbq = $this->tiposVisitas_model
                            ->as_object()
                            ->where($Vfvggg0pmnws)
                            ->get();
                            
            $this->response(array('error' => '0','response'=>$Vutaiebycwbq));
            
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line("error_nodata")));
        }
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
