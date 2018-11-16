<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ColoresProducto extends REST_Controller {

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
		
        
        $this->load->model('Colores_producto_model');

        
        $this->load->database();
    }
    
    function index_get()
    {
        try{
            $Vfvggg0pmnws = $this->db->query("select * from repos_ProductoColor");
            $Ve2pnzw21kc1 = $Vfvggg0pmnws->result();
            if(count($Ve2pnzw21kc1) > 0) {
                $this->response(array('error' => '0','response'=>$Ve2pnzw21kc1));
            }else{
                $this->response(array('error' => '0','response'=>array()));
            }
        }catch(Exception $Veengl4bqqud){
          $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
        }
    }
 
    function index_post()
    {
        try{ 
            $Vfeinw1hsfej = $this->post('data');
            if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej != NULL){
                $Vh2d53swjbl1 = "Colores creado correctamente: ";
                $Vslblbjvlsts = "No ha sido posible crear los siguientes colores: ";
                $V3ngbtoumuxa = 0;
                $Veengl4bqqudrrorcl = 0;
                foreach ($Vfeinw1hsfej as $Vnaykagdgs0l) {
                    $Vdrzyozqxvbr = $this->Colores_producto_model->insert($Vnaykagdgs0l);
                    if($Vdrzyozqxvbr > 0){
                        if($V3ngbtoumuxa == 0){
                            $Vh2d53swjbl1 .= $Vnaykagdgs0l["nombre"];    
                        }else{
                            $Vh2d53swjbl1 .= ",".$Vnaykagdgs0l["nombre"];
                        }
                        $V3ngbtoumuxa++;
                    }else{
                        if($Veengl4bqqudrrorcl == 0){
                            $Vslblbjvlsts .= $Vnaykagdgs0l["nombre"];    
                        }else{
                            $Vslblbjvlsts .= ",".$Vnaykagdgs0l["nombre"];
                        }
                        $Veengl4bqqudrrorcl++;
                    }
                }

                if($V3ngbtoumuxa > 0){
                    $Vpa2qbhtxuyd = $Vh2d53swjbl1;
                    if($Veengl4bqqudrrorcl > 0){
                        $Vpa2qbhtxuyd .= " ".$Vslblbjvlsts;
                    }
                    $this->response(array('error' => '0','response'=>$Vpa2qbhtxuyd));
                }else{
                    $this->response(array('error' => '1','response'=>$Vslblbjvlsts));
                }
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
            }
        }catch(Exception $Veengl4bqqud){
          $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
        }

    }
 
    function index_put()
    {
        try{
            $Vfeinw1hsfej = $this->put('data');
            if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej != NULL){
                $V1adbtdzy1mi = $this->db->where(array('productoColorID' => $Vfeinw1hsfej["productoColorID"]))->update('repos_ProductoColor',$Vfeinw1hsfej);
                if($V1adbtdzy1mi){
                    $this->response(array('error' => '0','response'=>"Color editado correctamente","id"=>$Vfeinw1hsfej["productoColorID"]));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible editar el color."));
                }
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
            }
        }catch(Exception $Veengl4bqqud){
          $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
        }
    }
    
 
    function index_delete()
    {   
        try{
            $Vdrzyozqxvbr = $this->query('productoColorID');
            if(isset($Vdrzyozqxvbr) && $Vdrzyozqxvbr != NULL){
                $Veengl4bqqudliminadores = $this->db->where('productoColorID', $Vdrzyozqxvbr)->delete('repos_ProductoColor');
                if($Veengl4bqqudliminadores){
                    $this->response(array('error' => '0','response'=>"Color eliminado correctamente","id"=>$Vdrzyozqxvbr));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible eliminar el color."));
                }
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
            }
        }catch(Exception $Veengl4bqqud){
          $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
        }
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