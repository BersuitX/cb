<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataDispositivos extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");     

        
        

        
        $this->load->database();

        
    }
    
    function index_get()
    {

        $Vs0rc3ntdd0m = $this->get('d');
        $Vwaph4qwsw1c = $this->get('i');
        $Va4jd0bjwgfk = $this->get('f');
        
        $Vs0rc3ntdd0m = $Vs0rc3ntdd0m!=null?$Vs0rc3ntdd0m:'';

        if($Vwaph4qwsw1c != null && $Va4jd0bjwgfk != null){           
            $Voziw1j4vegw = "call dataDispositivos('".$Vs0rc3ntdd0m."','".$Vwaph4qwsw1c."','".$Va4jd0bjwgfk."')";
            $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw)->result();
            $this->response(array('error' => '0','response'=>$Vyotgbgs03ci));
        }
        else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
        }
        
    }
 
    function index_post()
    {
        

        $Vq1krhh2cwas = $this->post('lob');

        $V4wm1yh1hmzr = "2018/03/";
        for ($Vep0df0xosaw = 1; $Vep0df0xosaw <= 26; $Vep0df0xosaw++){
            $Vjpw3hpilc3x = $Vep0df0xosaw;
            $Vjpw3hpilc3x2 = $Vep0df0xosaw+1;
            if($Vjpw3hpilc3x < 9){
                $Vjpw3hpilc3x="0".$Vjpw3hpilc3x;
            }

            if($Vjpw3hpilc3x2 < 9){
                $Vjpw3hpilc3x2="0".$Vjpw3hpilc3x2;
            }



            $Voziw1j4vegw = "select metodo,isError,count(metodo) as 'count','".$V4wm1yh1hmzr.$Vjpw3hpilc3x."' as 'reg' from Logs where (reg between '".$V4wm1yh1hmzr.$Vjpw3hpilc3x."' and '".$V4wm1yh1hmzr.$Vjpw3hpilc3x2."') and request like '%LineOfBusiness\":\"3\"%' group by metodo,isError order by count desc";

            $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw)->result();


            $Vcmaitbcbmmk = '/var/www/miclaroapp.com.co/public_html/archivos/logs/'.$V4wm1yh1hmzr.'/';
            $V04h1wbou5qa = str_replace("/","",$V4wm1yh1hmzr.$Vjpw3hpilc3x).'json';

            if (!file_exists($Vcmaitbcbmmk)) {
                mkdir($Vcmaitbcbmmk, 0777, true);
            }

            if (file_exists($Vcmaitbcbmmk)) {
                $Vo542s0ydvwz=$Vcmaitbcbmmk.'/'.$V04h1wbou5qa;
                $Vep0df0xosawfp = fopen( $Vo542s0ydvwz, 'wb' ); 
                
                fwrite( $Vep0df0xosawfp,json_encode($Vyotgbgs03ci));
                fclose( $Vep0df0xosawfp );
            }


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
