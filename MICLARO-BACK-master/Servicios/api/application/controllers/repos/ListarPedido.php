<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
error_reporting(E_ALL);



class ListarPedido extends REST_Controller {

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
        
        $this->load->helper('cookie');

        $this->load->model('Pedidos_model');
        $this->load->model('Estados_pedidos_model');

        $this->load->database();
        
    }
    
    function index_get()
    {   
        
        $Vnk5113ubxsw = $this->get('fuente');

        if(isset($Vnk5113ubxsw) && $Vnk5113ubxsw != NULL){
            try{

                $Voziw1j4vegw = "select * from vw_repos_pedidos where origen =".$Vnk5113ubxsw." and fechaPago > '2018-10-20' and idCategoria = 1 order by fechaPago desc";
                
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
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
        }
        
    }
 
    function index_post()
    {
        $this->response(NULL,403);
    }

    function index_put()
    {
       
       $Vfeinw1hsfej = $this->put('data');

       $Vdrzyozqxvbr = $this->Estados_pedidos_model->insert($Vfeinw1hsfej);

       if($Vdrzyozqxvbr > 0){
            if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej != NULL && isset($Vfeinw1hsfej["pedidoProductoID"]) ){
                try{
                    $Voziw1j4vegw = "update repos_pedidoProducto_v1 set esActivo = ".$Vfeinw1hsfej["esActivo"]."  where pedidoProductoID =".$Vfeinw1hsfej["pedidoProductoID"];
                    $Voziw1j4vegwuery = $this->db->query($Voziw1j4vegw);
                    
                    
                    if($Voziw1j4vegwuery) {
                        $this->response(array('error' => '0','response'=>"Se cambio correctamente el estado"));
                    }else{
                        $this->response(array('error' => '1','response'=>'No ha sido posible actualizar el producto'));
                    }
                }catch(Exception $Veengl4bqqud){
                  $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
                }
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata'),"data"=>$Vfeinw1hsfej ) );
            }
        }else{
            $this->response(array('error' => '1','response'=> "No se actualizó el estado"));
        }
        
        
    }
    
 
    function index_delete()
    {   
        $Vdrzyozqxvbr = $this->query('id');
        if(isset($Vdrzyozqxvbr) && $Vdrzyozqxvbr != NULL){
            try{

                $Voziw1j4vegw = "delete from repos_pedidoProducto_v1 where pedidoProductoID = ".$Vdrzyozqxvbr;
                
                $Voziw1j4vegwuery = $this->db->query($Voziw1j4vegw);

                if($Voziw1j4vegwuery) {
                    $this->response(array('error' => '0','response'=>"Eliminado correctamente"));
                }else{
                    $this->response(array('error' => '0','response'=>array()));
                }
            }catch(Exception $Veengl4bqqud){
              $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
            }
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
        }
    }
    
    
    
    
    function movil_get()
    {
        

        $Vqyer42dqoug = 'Detalle de Transacciones';
        $Veengl4bqqudxt = "csv";


        $Vnk5113ubxsw = $this->get('origen');

        if(isset($Vnk5113ubxsw) && $Vnk5113ubxsw != NULL){
            try{

                
                if($Vnk5113ubxsw == "app"){
                    $Voziw1j4vegw = "select * from vw_repos_pedidos where origen = 'app' and fechaPago > '2018-10-20' and idCategoria = 1";
                }else{
                    $Voziw1j4vegw = "select * from vw_repos_pedidos where origen <> 'app' and fechaPago > '2018-10-20' and idCategoria = 1";
                }

                
                $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw);

                $Vu0ysz5e2s3l = date("Y",strtotime("-7 hour"));
                $Vosrev0dmm3y = date("m",strtotime("-7 hour"));
                $Veoeds0ryrie = date("d",strtotime("-7 hour"));
                $Vb00j42bn41v = date("H_i_s",strtotime("-7 hour"));
                list($Vihn3dxycmfq, $Vspi1bqfrhmf) = explode(" ", microtime());

                $Vb13cwxhoi04 = $Vqyer42dqoug."_".$Vu0ysz5e2s3l.$Vosrev0dmm3y.$Veoeds0ryrie.$Vb00j42bn41v.".".$Veengl4bqqudxt;

                $this->load->helper('csv');
                echo query_to_csv($Vyotgbgs03ci,TRUE,$Vb13cwxhoi04);
            }catch(Exception  $Veengl4bqqud){
                $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
            }
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
        }
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
