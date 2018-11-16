<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class RegistrarPedido extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
        
        $this->load->helper('cookie');
        

        
        $this->load->database();
    }
    
    function index_get()
    {
        $this->response(NULL,403);
    }
 
    function index_post()
    {
        
        $Vv45n35bu4pt = $this->post('estadoPago');
        $V4wm1yh1hmzr = $this->post('fechaPago');
        $Vvpxhbre4bm1 = $this->post('metodoPago');
        $Vtthnrev0w1r = $this->post('numeroPedido');
        $V1r2vhm4ehua = $this->post('idPedido');

        if($Vv45n35bu4pt != null && $V4wm1yh1hmzr != null && $Vvpxhbre4bm1 != null && $Vtthnrev0w1r != null && $V1r2vhm4ehua != null){
            try{
                


                $Vfeinw1hsfej = array("estadoPagoProductoID"=>$Vv45n35bu4pt,"fechaRecepcionPago"=>$V4wm1yh1hmzr,"metodoPagoID"=>$Vvpxhbre4bm1,"esPagoRegistrado"=>1);
                
                $V1adbtdzy1mi = $this->db->where(array('pedidoProductoID' => $V1r2vhm4ehua))->update('repos_pedidoProducto_v1',$Vfeinw1hsfej);
                
                
                
                if($V1adbtdzy1mi){
                    $this->response(array('error' => '0','response'=>"Pedido actualizado correctamente"));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible actualizar el pedido."));
                }
            }catch(Exception $Veengl4bqqud){
                $this->response(array('error' => '1','response'=> "No ha sido posible actualziar el producto","errData"=>$Veengl4bqqud));
            }
            
        }else{
            $V5pcwmdxd5sw = array($Vv45n35bu4pt,$V4wm1yh1hmzr,$Vvpxhbre4bm1,$Vtthnrev0w1r,$V1r2vhm4ehua);
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata'),'errData'=>$V5pcwmdxd5sw));
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
