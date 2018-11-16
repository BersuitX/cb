<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ProductoInventario extends REST_Controller {

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
		
        
        $this->load->model('Producto_inventario_model');

        
        $this->load->database();
    }
    
    function index_get()
    {
        try{

            $Vdrzyozqxvbr = $this->get("productoID");

            $Voziw1j4vegw = "select * from vw_repos_inventario";
            if(isset($Vdrzyozqxvbr) && $Vdrzyozqxvbr != null && intval($Vdrzyozqxvbr) > 0){
                $Voziw1j4vegw = $Voziw1j4vegw." where productoID = ".$Vdrzyozqxvbr;
            }

            $Voziw1j4vegwuery = $this->db->query($Voziw1j4vegw);


            
            $Ve2pnzw21kc1 = $Voziw1j4vegwuery->result();
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
                $Vdrzyozqxvbr = $this->Producto_inventario_model->insert($Vfeinw1hsfej);
                if($Vdrzyozqxvbr > 0){
                    $this->response(array('error' => '0','response'=>"Inventario creado correctamente","id"=>$Vdrzyozqxvbr));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible crear el inventario."));
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
            
            $Vswcifil4f1s = DateTime::createFromFormat('U.u', microtime(true));
            $V4wm1yh1hmzr = $Vswcifil4f1s->format("Y-m-d H:i:s");

            $Vfeinw1hsfej = $this->put('data');
            if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej != NULL){
                $Vfeinw1hsfej["fechaActualizacion"] = $V4wm1yh1hmzr;
                $V1adbtdzy1mi = $this->db->where(array('productoInventarioID' => $Vfeinw1hsfej["productoInventarioID"]))->update('repos_ProductoInventario',$Vfeinw1hsfej);
                if($V1adbtdzy1mi){
                    $this->response(array('error' => '0','response'=>"Inventario editado correctamente","id"=>$Vfeinw1hsfej["productoInventarioID"]));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible editar el inventario."));
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
            $Vdrzyozqxvbr = $this->query('productoInventarioID');
            if(isset($Vdrzyozqxvbr) && $Vdrzyozqxvbr != NULL){
                $Veengl4bqqudliminadores = $this->db->where('productoInventarioID', $Vdrzyozqxvbr)->delete('repos_ProductoInventario');
                if($Veengl4bqqudliminadores){
                    $this->response(array('error' => '0','response'=>"Inventario eliminado correctamente","id"=>$Vdrzyozqxvbr));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible eliminar el inventario."));
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
