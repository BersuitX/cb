<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataSeguimiento extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");     

        
        

        
        $this->load->database();

        
    }
    
    function index_get()
    {        
        
        $V41frh24rd1z = $this->get('l');
        $V1z2mx2pwvvz = $this->get('c');
        $Vl5yxwgs0g3v = $this->get('d');


        try{
            $Voziw1j4vegw = "select * from app_data_small_log ";

            if($V41frh24rd1z != null){
                $Vmbfoybsvfud = "where linea = '".$V41frh24rd1z."' ";
            }

            if($V1z2mx2pwvvz != null){
                if(isset($Vmbfoybsvfud)){
                    $Vmbfoybsvfud = $Vmbfoybsvfud."and correo = '".$V1z2mx2pwvvz."' ";
                }else{
                    $Vmbfoybsvfud = "where correo = '".$V1z2mx2pwvvz."' ";       
                }
            }

            if($Vl5yxwgs0g3v != null){
                if(isset($Vmbfoybsvfud)){
                    $Vmbfoybsvfud = $Vmbfoybsvfud."and dispositivo = '".$Vl5yxwgs0g3v."' ";
                }else{
                    $Vmbfoybsvfud = "where dispositivo = '".$Vl5yxwgs0g3v."' ";       
                }
            }

            $Voziw1j4vegw = $Voziw1j4vegw.$Vmbfoybsvfud.";";
            $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw)->result();
            $this->response(array('error' => '0','response'=>$Vyotgbgs03ci));
        }catch(Exception  $Veengl4bqqud){
            $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
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
