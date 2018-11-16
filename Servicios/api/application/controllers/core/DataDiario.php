<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataDiario extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");     

        
        

        
        $this->load->database();

        
    }
    
    function index_get()
    {

        $Vcm40vhd0uag = $this->get('i');
        $Vhnlldubqdl3 = $this->get('f');
        $Vzytermn2vu2 = $this->get('t');
        
        if($Vcm40vhd0uag == null){
            $Vcm40vhd0uag = date("Y/m/d",strtotime("-1 day"));
            
        }
        if($Vhnlldubqdl3 == null){
            
            $Vhnlldubqdl3 = date('Y/m/d',(strtotime ( '+1 day' , strtotime ( $Vcm40vhd0uag) ) ));
        }
        
            
        try{

            
            
            $Voziw1j4vegw = "select m.*,h.descripcion,h.accion,h.tipo from app_data_metodos_dia as m  inner join app_data_metodos_homologacion as h on h.metodo = m.metodo where m.fecha between '".$Vcm40vhd0uag."' and '".$Vhnlldubqdl3."'";
            if($Vzytermn2vu2 != null){
                $Voziw1j4vegw = $Voziw1j4vegw." and tipo='".$Vzytermn2vu2."'";
            }
            $Voziw1j4vegw = $Voziw1j4vegw.";";

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
