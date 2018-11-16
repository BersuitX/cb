<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataReporteTipos extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $Vek3kicoh5l4his->lang->load("app","spanish");     

        
        

        
        $Vek3kicoh5l4his->load->database();

        
    }
    
    function index_get(){   

        $Vjpw3hpilc3x=$Vek3kicoh5l4his->get("dispositivo");
        $Vqthdlsgdszy=$Vek3kicoh5l4his->get("segmento");
        $Vek3kicoh5l4=$Vek3kicoh5l4his->get("tipo");
        $Vud13bcbbxbv=$Vek3kicoh5l4his->get("yy");
        $Vlnkcet4wpd0=$Vek3kicoh5l4his->get("mm");

        try{
            $Voziw1j4vegw = "select * from vw_app_data_reporte_log where segmento = '".$Vqthdlsgdszy."' and dispositivo = '".$Vjpw3hpilc3x."' and tipo = '".$Vek3kicoh5l4."' and yy = ".$Vud13bcbbxbv." and mm = ".$Vlnkcet4wpd0." group by metodo";
            $Vyotgbgs03ci = $Vek3kicoh5l4his->db->query($Voziw1j4vegw)->result();
            $Vek3kicoh5l4his->response(array('error' => '0','response'=>$Vyotgbgs03ci));
        }catch(Exception  $Veengl4bqqud){
            $Vek3kicoh5l4his->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
        }
    }
 
    function index_post()
    {
        
    }
 
    function index_put()
    {
       $Vek3kicoh5l4his->response(NULL,403);
    }
    
 
    function index_delete()
    {   
        $Vek3kicoh5l4his->response(NULL,403);
    }
    
    
    
    
    function movil_get()
    {
        

        $Vqyer42dqoug = 'Detalle de Transacciones';
        $Veengl4bqqudxt = "csv";

        try{
            $Voziw1j4vegw = "select dispositivo,segmento,tipo,cantidad,fecha from app_data_tipos";
            $Vyotgbgs03ci = $Vek3kicoh5l4his->db->query($Voziw1j4vegw);

            $Vu0ysz5e2s3l = date("Y",strtotime("-7 hour"));
            $Vlnkcet4wpd0es = date("m",strtotime("-7 hour"));
            $Vjpw3hpilc3xia = date("d",strtotime("-7 hour"));
            $Vb00j42bn41v = date("H_i_s",strtotime("-7 hour"));
            list($Vihn3dxycmfq, $Vqthdlsgdszyec) = explode(" ", microtime());

            $Vb13cwxhoi04 = $Vqyer42dqoug."_".$Vu0ysz5e2s3l.$Vlnkcet4wpd0es.$Vjpw3hpilc3xia.$Vb00j42bn41v.".".$Veengl4bqqudxt;

            $Vek3kicoh5l4his->load->helper('csv');
            echo query_to_csv($Vyotgbgs03ci,TRUE,$Vb13cwxhoi04);
        }catch(Exception  $Veengl4bqqud){
            $Vek3kicoh5l4his->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
        }
    }
 
    function movil_post()
    {
        $Vek3kicoh5l4his->response(NULL,403);
    }
 
    function movil_put()
    {
        $Vek3kicoh5l4his->response(NULL,403);
    }
 
    function movil_delete()
    {
        $Vek3kicoh5l4his->response(NULL,403);
    }

}
