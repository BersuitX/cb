<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class BannersList extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
        
        
        $this->load->model('banner_model');

        
    }
    
    function index_get($Voqpgbqac5km)
    {
        $Vkpumbzgjysd = $this->get('tab');
        
        if($Vkpumbzgjysd != null){
                
                $Vpnok2rn1keq = $_SERVER['SERVER_NAME'];
                $Vdn1njwmplrr = isset($_SERVER['HTTPS'])?'s':'';
                $Vmxohjw5kehj = 'http'.$Vdn1njwmplrr.'://'.$Vpnok2rn1keq;
                
                $Vcmaitbcbmmk = '/api/content/img/banners/';
                $Vcmaitbcbmmk .= $Voqpgbqac5km ? 'movil/':'web/';
                $Vcmaitbcbmmk = $Vmxohjw5kehj.$Vcmaitbcbmmk;
                
                $Vfvggg0pmnws = array("isActive"=>1,"idSection"=>$Vkpumbzgjysd,"isMobile"=>$Voqpgbqac5km);
                $Vvmmc4l0apkl =  $this->banner_model
                            ->as_object()
                            ->where($Vfvggg0pmnws)
                            ->get();
                
                if($Vvmmc4l0apkl){

                    $Vlohihuilo2j = $Vcmaitbcbmmk.$Vvmmc4l0apkl->name;
                    $Vlohihuilo2j = $Vlohihuilo2j."?v=".date('Ymd');


                    $V3zljh1vyslw = array_change_key_case($this->input->request_headers(), CASE_UPPER);
                      


                    


                    $Vuglld5kowvv = $Vkpumbzgjysd == 1?'hog':($Vkpumbzgjysd == 2?'pre':'pos');

                    $Vnb2hggtfonp = array('target'=>$Vvmmc4l0apkl->url,'image'=>$Vlohihuilo2j,'esInterno'=>false,'modulo'=>$Vuglld5kowvv.'_detalle_plan');
                    $Vnb2hggtfonp = array($Vnb2hggtfonp);
                    $this->response(array('error' => '0','response'=>$Vnb2hggtfonp));
                }else{
                    $Vnb2hggtfonp = $this->lang;
                    $this->response(array('error' => '1','response'=>$Vnb2hggtfonp));
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
       $this->response(NULL,403);
    }
    
 
    function index_delete()
    {   
        $this->response(NULL,403);
    }
    
    
    
    
    function movil_get()
    {
        $this->index_get(true);
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
