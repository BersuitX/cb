<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class CaracteristicasProducto extends REST_Controller {

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
		
        
        $this->load->model('Caracteristicas_Producto_model');

        
        $this->load->database();
    }
    
    function index_get()
    {
        try{
            $Vdrzyozqxvbr = $this->query('id');
            $Vwwjn4rkgrz3 = "select * from repos_ProductoCaracteristicas";
            if(isset($Vdrzyozqxvbr) && $Vdrzyozqxvbr != NULL){
                $Vwwjn4rkgrz3 .= " WHERE `productoID` = ".$Vdrzyozqxvbr;
                $Vfvggg0pmnws = $this->db->query($Vwwjn4rkgrz3);
                $Ve2pnzw21kc1 = $Vfvggg0pmnws->result();
                if(count($Ve2pnzw21kc1) > 0) {
                    $this->response(array('error' => '0','response'=>$Ve2pnzw21kc1));
                }else{
                    $this->response(array('error' => '0','response'=>array()));
                }
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
                $Vyerf2ssqz5a = "Característica creadas correctamente: ";
                $Vwkoa0jn1ymj = "No ha sido posible crear las siguientes características: ";
                $V3ngbtoumuxa = 0;
                $Veengl4bqqudrrorcl = 0;
                foreach ($Vfeinw1hsfej as $Vtqupt03qolj) {
                    $Vdrzyozqxvbr = $this->Caracteristicas_Producto_model->insert($Vtqupt03qolj);
                    if($Vdrzyozqxvbr > 0){
                        if($V3ngbtoumuxa == 0){
                            $Vyerf2ssqz5a .= $Vtqupt03qolj["nombre"];    
                        }else{
                            $Vyerf2ssqz5a .= ",".$Vtqupt03qolj["nombre"];
                        }
                        $V3ngbtoumuxa++;
                    }else{
                        if($Veengl4bqqudrrorcl == 0){
                            $Vwkoa0jn1ymj .= $Vtqupt03qolj["nombre"];    
                        }else{
                            $Vwkoa0jn1ymj .= ",".$Vtqupt03qolj["nombre"];
                        }
                        $Veengl4bqqudrrorcl++;
                    }
                }

                if($V3ngbtoumuxa > 0){
                    $Vpa2qbhtxuyd = $Vyerf2ssqz5a;
                    if($Veengl4bqqudrrorcl > 0){
                        $Vpa2qbhtxuyd .= " ".$Vwkoa0jn1ymj;
                    }
                    $this->response(array('error' => '0','response'=>$Vpa2qbhtxuyd));
                }else{
                    $this->response(array('error' => '1','response'=>$Vwkoa0jn1ymj));
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
                $V1adbtdzy1mi = $this->db->where(array('productoCaracteristicaID' => $Vfeinw1hsfej["productoCaracteristicaID"]))->update('repos_ProductoCaracteristicas',$Vfeinw1hsfej);
                if($V1adbtdzy1mi){
                    $this->response(array('error' => '0','response'=>"Característica editado correctamente","id"=>$Vfeinw1hsfej["productoCaracteristicaID"]));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible editar la característica."));
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
            $Vdrzyozqxvbr = $this->query('productoCaracteristicaID');
            if(isset($Vdrzyozqxvbr) && $Vdrzyozqxvbr != NULL){
                $Veengl4bqqudliminadores = $this->db->where('productoCaracteristicaID', $Vdrzyozqxvbr)->delete('repos_ProductoCaracteristicas');
                if($Veengl4bqqudliminadores){
                    $this->response(array('error' => '0','response'=>"Característica eliminada correctamente","id"=>$Vdrzyozqxvbr));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible eliminar la característica."));
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
