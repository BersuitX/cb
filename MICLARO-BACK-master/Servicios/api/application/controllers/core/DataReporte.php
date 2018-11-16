<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataReporte extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");     

        
        

        
        $this->load->database();

        
    }
    
    function index_get()
    {

        $Vcoqmyjspvx4 = $this->get('s');
        $Vwaph4qwsw1c = $this->get('i');
        $Va4jd0bjwgfk = $this->get('f');

        if($Vwaph4qwsw1c != null && $Va4jd0bjwgfk != null){           
            
            try{
                $Vw0m0k15fojv = date("Y/m/d",strtotime("-1 day"));
                $Vzudngi3iize = date("Y/m/d");
                $Voziw1j4vegw = "select * from app_data_metodos_dia where fecha between '".$Vw0m0k15fojv."' and '".$Vzudngi3iize."';";
                $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw)->result();
                $this->response(array('error' => '0','response'=>$Vyotgbgs03ci));
            }catch(Exception  $Veengl4bqqud){
                $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
            }
            
        }
        else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
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
