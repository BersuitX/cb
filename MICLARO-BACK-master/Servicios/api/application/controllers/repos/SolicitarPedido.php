<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
error_reporting(E_ALL);



class SolicitarPedido extends REST_Controller {

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

        $this->load->database();
        
    }
    
    function index_get()
    {
		$this->response(NULL,403);
    }

    function validarCampos($Vfeinw1hsfej,$Vgk2cjz23lau){
        $Vpmdrem44rjo = isset($Vfeinw1hsfej[$Vgk2cjz23lau]);
        return array("valid"=>$Vpmdrem44rjo,"campo"=>$Vgk2cjz23lau);
    }
 
    function index_post()
    {

        $Vfeinw1hsfej = $this->post('data');
        if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej != NULL){

            if(isset($Vfeinw1hsfej["origen"]) && $Vfeinw1hsfej["origen"] == "externo"){
                $Vnk5113ubxsw = true;
            }else{
                $Vnk5113ubxsw = false;
            }

            $Vpmdrem44rjo = $this->validarCampos($Vfeinw1hsfej,"productoID");
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"productoColorID"):$Vpmdrem44rjo;
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"precio"):$Vpmdrem44rjo;
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"impuesto"):$Vpmdrem44rjo;
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"ciudad"):$Vpmdrem44rjo;
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"departamento"):$Vpmdrem44rjo;
            
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"direccion"):$Vpmdrem44rjo;
            
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"nombreUsuario"):$Vpmdrem44rjo;
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"AccountId"):$Vpmdrem44rjo;
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"metodoPagoID"):$Vpmdrem44rjo;
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"DocumentType"):$Vpmdrem44rjo;
            $Vpmdrem44rjo = $Vpmdrem44rjo["valid"]?$this->validarCampos($Vfeinw1hsfej,"DocumentNumber"):$Vpmdrem44rjo;
            
            if($Vpmdrem44rjo["valid"]){
                try{

                    $Vfeinw1hsfej["municipio"] = $Vfeinw1hsfej["ciudad"];
                    $Vfeinw1hsfej["telefonoContacto"] = $Vfeinw1hsfej["AccountId"];
                    $Vu0ysz5e2s3l = date("Y",strtotime("-5 hour"));
                    $Vosrev0dmm3y = date("m",strtotime("-5 hour"));
                    $Veoeds0ryrie = date("d",strtotime("-5 hour"));
                    $Vb00j42bn41v = date("His",strtotime("-5 hour"));
                    list($Vihn3dxycmfq, $Vspi1bqfrhmf) = explode(" ", microtime());

                    $Vihn3dxycmfq = substr(str_replace(".", "RPS", $Vihn3dxycmfq),0,8);

                    $Vscddvvdvlhb = 'abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                    $Vewnuspo2miv = rand(100,999).$Vihn3dxycmfq.$Vb00j42bn41v.$Vosrev0dmm3y.$Veoeds0ryrie.substr(str_shuffle($Vscddvvdvlhb),10,5).$Vu0ysz5e2s3l.substr(str_shuffle($Vscddvvdvlhb),0,5).rand(100,999);
                    $Vfeinw1hsfej["numeroPedido"] = $Vewnuspo2miv;


                    unset($Vfeinw1hsfej["token"]);
                    unset($Vfeinw1hsfej["header"]);


                    $Vdrzyozqxvbr = $this->Pedidos_model->insert($Vfeinw1hsfej);
                    if($Vdrzyozqxvbr > 0){
                        
                        if($Vnk5113ubxsw){
                            $Vnb2hggtfonp = array('mensaje'=>"¡Tu solicitud de renovación de Smartphone se ha realizado exitosamente!<br/><br/>Uno de nuestros asesores se comunicará contigo.","id"=>$Vdrzyozqxvbr);
                        }else{
                            $Vnb2hggtfonp = array('mensaje'=>"¡Tu solicitud de compra se ha realizado con éxito!<br/><br/>Recuerda que uno de nuestros asesores confirmará tu compra.","id"=>$Vdrzyozqxvbr);
                        }
                        $this->response(array('error' => '0',"response"=>$Vnb2hggtfonp));
                    }else{
                        $this->response(array('error' => '1','response'=>"No ha sido posible crear la solicitud."));
                    }
                }catch(Exception $Veengl4bqqud){
                  $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
                }
            }else{
                $this->response(array('error' => '1','response'=>'Para continuar debes completar el campo '.$Vpmdrem44rjo["campo"].'.'));
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
