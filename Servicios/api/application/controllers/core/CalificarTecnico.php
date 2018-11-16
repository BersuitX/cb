<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class CalificarTecnico extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
        
        
        $this->load->model('gpsCalificaciones_model');
    }
    
    function index_get()
    {
        
        $this->response(NULL,403);
    }
 
    function index_post()
    {
        $Vfeinw1hsfej = $this->post('data');
        if ($Vfeinw1hsfej !=NULL) {
            if( isset($Vfeinw1hsfej["calificacion"]) && isset($Vfeinw1hsfej["mejora"]) && isset($Vfeinw1hsfej["orden"]) ) {
                 
                $Voziw1j4vegw = array("orden"=>$Vfeinw1hsfej["orden"]);
                $Vutaiebycwbq = $this->gpsCalificaciones_model
                                ->as_object()
                                ->where($Voziw1j4vegw)
                                ->get();
                if($Vutaiebycwbq){
                    $this->response(array('error' => '1','response'=>"Ya se ha realizado una calificación para esta visita."));
                }else{
                    $V2cu50jdoruc = array("calificacion" => $Vfeinw1hsfej["calificacion"],"mejora"=>$Vfeinw1hsfej["mejora"],"orden"=>$Vfeinw1hsfej["orden"]);
                    $Vdrzyozqxvbr=$this->gpsCalificaciones_model->insert($V2cu50jdoruc);
                
                    if ($Vdrzyozqxvbr>0){
                        $this->response(array('error' => '0','response'=>"Gracias por calificar tu visita, estamos mejorando para ti","id"=>$Vdrzyozqxvbr));
                    }else{
                        $this->response(array('error' => '1','response'=>"No ha sido posible enviar la calificación."));
                        
                    }
                }
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
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
