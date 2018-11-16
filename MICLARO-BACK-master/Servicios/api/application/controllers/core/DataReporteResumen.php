<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataReporteResumen extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");     

        
        

        
        $this->load->database();

        
    }
    
    function index_get()
    {        
        
        $Vdnd2gkbxytv = $this->get('v');

        if($Vdnd2gkbxytv == "all"){
            try{
                $Voziw1j4vegw = "select sum(cant) as cant,fecha from vw_app_data_reporte_resumen group by fecha";
                $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw)->result();
                $this->response(array('error' => '0','response'=>$Vyotgbgs03ci));
            }catch(Exception  $Veengl4bqqud){
                $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
            }
        }else{
            $Vs0rc3ntdd0m = $this->get('d');
            $Vu0ysz5e2s3l = $this->get('y');
            $Vosrev0dmm3y = $this->get('m');
            $Vgccumsgxxsz = $this->get('w');

            if($Vs0rc3ntdd0m != null){

                ($Vu0ysz5e2s3l == null)?$Vu0ysz5e2s3l = '':false;
                ($Vosrev0dmm3y == null)?$Vosrev0dmm3y = '':false;
                ($Vgccumsgxxsz == null)?$Vgccumsgxxsz = '':false;

                try{
                    $Voziw1j4vegw = "call sp_app_data_reporte_resumen('".$Vs0rc3ntdd0m."','".$Vu0ysz5e2s3l."','".$Vosrev0dmm3y."','".$Vgccumsgxxsz."')";
                    
                    $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw)->result();
                    $this->response(array('error' => '0','response'=>$Vyotgbgs03ci));
                }catch(Exception  $Veengl4bqqud){
                    $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
                }
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
            }
        }   
        
    }
 
    function index_post()
    {
        $this->response(NULL,403);   
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
