<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataReporteLog extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");     

        
        

        
        $this->load->database();

        
    }
    
    function index_get()
    {  
        try{
            $Voziw1j4vegw = "select * from app_data_tipos order by dispositivo";
            $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw)->result();
            $this->response(array('error' => '0','response'=>$Vyotgbgs03ci));
        }catch(Exception  $Veengl4bqqud){
            $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
        }
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
        

        $Vqyer42dqoug = 'Detalle de Transacciones';
        $Veengl4bqqudxt = "csv";

        try{
            $Voziw1j4vegw = "select dispositivo,segmento,tipo,cantidad,fecha from app_data_tipos";
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
