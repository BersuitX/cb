<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admins extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$Vek3kicoh5l4his->lang->load("app","spanish");
		
		
        $Vek3kicoh5l4his->load->model('admins_model');
		
		$Vek3kicoh5l4his->load->database();
        
    }
    
    function index_get()
    {
		
		$Vek3kicoh5l4his->response(NULL,403);
    }
 
    function index_post()
    {
        $Vfeinw1hsfej = $Vek3kicoh5l4his->post('data');
        if ($Vfeinw1hsfej !=NULL) {
			if(isset($Vfeinw1hsfej["correo"]) && isset($Vfeinw1hsfej["pass"])){
				
				$Vfvggg0pmnws=$Vfeinw1hsfej;
				$Vfvggg0pmnws["eliminado"] = 0;
				
				$Vzfoovobxzbx = $Vek3kicoh5l4his->admins_model
						->as_object()
						->where($Vfvggg0pmnws)
						->get();
				
				if($Vzfoovobxzbx && $Vzfoovobxzbx->idAdmin){
					$Vnb2hggtfonp = $Vzfoovobxzbx;
					unset($Vzfoovobxzbx->pass);
					$Vq1szs1wn52y = $Vek3kicoh5l4his->db->query("CALL getAdminMenu(".$Vzfoovobxzbx->idAdmin.")")->result();
					$Vnb2hggtfonp->menu = $Vq1szs1wn52y;
				}else{
					$Vnb2hggtfonp = array();
				}
				
				
				$Vnb2hggtfonp = ($Vnb2hggtfonp)?$Vnb2hggtfonp:array();
			
				$Vek3kicoh5l4his->response(array('error' => '0','response'=>$Vnb2hggtfonp));
			}else{
				$Vek3kicoh5l4his->response(array('error' => '1','response'=>$Vek3kicoh5l4his->lang->line('error_nodata')));
			}
		}else{
			$Vek3kicoh5l4his->response(array('error' => '1','response'=>$Vek3kicoh5l4his->lang->line('error_nodata')));
		}
    }
 
    function index_put()
    {
        $Vfeinw1hsfej = $Vek3kicoh5l4his->put('data');
       if(isset($Vfeinw1hsfej)){
            if(isset($Vfeinw1hsfej["correo"]) && isset($Vfeinw1hsfej["pass"]) && isset($Vfeinw1hsfej["key"])){
                $Vek3kicoh5l4 = $Vfeinw1hsfej["correo"].$Vfeinw1hsfej["pass"].$Vfeinw1hsfej["key"];
                $Vqtrwdgbny00 = $Vek3kicoh5l4his->db->query($Vek3kicoh5l4)->result();
                $Vek3kicoh5l4his->response(array('error' => '0','response'=>$Vqtrwdgbny00,"q"=>$Vek3kicoh5l4));
            }else{
                $Vek3kicoh5l4his->response(array('error' => '1','response'=>$Vek3kicoh5l4his->lang->line('error_nodata')));
            }
        }else{
            $Vek3kicoh5l4his->response(array('error' => '1','response'=>$Vek3kicoh5l4his->lang->line('error_nodata')));
        }
    }
    
 
    function index_delete()
    {   
        $Vek3kicoh5l4his->response(NULL,403);
    }
    
    
    
    
    function movil_get()
    {
		$Vek3kicoh5l4his->response(NULL,403);
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
