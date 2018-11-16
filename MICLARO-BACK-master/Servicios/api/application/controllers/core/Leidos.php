<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Leidos extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
        
        
        $this->load->model('Mensajes_model');
        
        $this->load->model('Leidos_model');
    }
    
    function index_get()
    {
        $this->response(NULL,403);
    }
 
    function index_post()
    {
        
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

        if($Vyqp2uhxmqu3 != null){
            try {
                $Vmgfnu2lnukj = array("cuenta"=>$Vyqp2uhxmqu3);
                $Vfvggg0pmnws = array("eliminado" => 0);
                $Vmbfnsoweevq =  $this->Mensajes_model
                            ->as_array()
                            ->where($Vfvggg0pmnws)
                            
                            ->get_all();

                if(!$Vmbfnsoweevq){
                    $Vmbfnsoweevq =array();
                }
                $Vn2ycfau434s = 0;

                if(sizeof($Vmbfnsoweevq) > 0){
                    $Vmbfnsoweevqleidos =  $this->Leidos_model
                    ->as_array()
                    ->where($Vmgfnu2lnukj)
                    
                    ->get_all();

                    if(!$Vmbfnsoweevqleidos){$Vmbfnsoweevqleidos=array();}

                    $Vn2ycfau434s = sizeof($Vmbfnsoweevq) - sizeof($Vmbfnsoweevqleidos);
                }

                if($Vn2ycfau434s > 9){
                    $Vn2ycfau434s = "9+";
                }

                if($Vn2ycfau434s <= 0 || $Vn2ycfau434s == -1){
                    $Vn2ycfau434s = "";
                }

                $this->response(array('error' => '0','response'=>$Vn2ycfau434s));

            } catch (Exception $Veengl4bqqud) {
                $Vn2ycfau434s = "";
                $this->response(array('error' => '0','response'=>$Vn2ycfau434s));
            }
            
            
        }
        else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
        }
    }
 
    function movil_post()
    {
        $Vfeinw1hsfej = $this->post('data');
        if ($Vfeinw1hsfej !=NULL) {
            if( isset($Vfeinw1hsfej["id_mensaje"]) && isset($Vfeinw1hsfej["nombreUsuario"])) {
                $Vfvggg0pmnws=array("id_mensaje" => $Vfeinw1hsfej["id_mensaje"],"cuenta" => $Vfeinw1hsfej["nombreUsuario"]);
                
                $Vmbfnsoweevq =  $this->Leidos_model
                ->as_array()
                ->where($Vfvggg0pmnws)
                
                ->get_all();

                if(!$Vmbfnsoweevq){
                    $Vdrzyozqxvbr=$this->Leidos_model->insert($Vfvggg0pmnws);
                    if ($Vdrzyozqxvbr > 0){
                        
                        $Vnb2hggtfonp = "El mensaje leído guardado correctamente.";
                    }else{
                        
                        $Vnb2hggtfonp = "No se ha podido marcar el mensaje como leído";
                    }
                }else{
                    
                    $Vnb2hggtfonp = "El mensaje ya estaba leído";
                }

                $this->response(array('error' => '0','response'=> $Vnb2hggtfonp));
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
            }
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
        }
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
