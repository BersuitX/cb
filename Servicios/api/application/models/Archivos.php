<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Archivos extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        
        $this->load->model('archivo_model');
        $this->load->library('encrypt');
    }
    
    function index_get()
    {
        
        $Vvxi5h2p2e2d = $this->get('a');
        if ($Vvxi5h2p2e2d!=NULL) {
            $Vdrzyozqxvbr=substr($Vvxi5h2p2e2d, 0, count($Vvxi5h2p2e2d)-37);
            
            $Vfvggg0pmnws=array("id"=>$Vdrzyozqxvbr);
            $Vgslktdjzwpy = $this->archivo_model
                                ->as_object()
                                ->where($Vfvggg0pmnws)
                                ->get();
                                
            if ($Vgslktdjzwpy) {
                $V15wj1uodklf=$this->encrypt->decode($Vgslktdjzwpy->token);
                
                if ($Vgslktdjzwpy->es_imagen) {
                    header('Content-Type: image/x-png'); 
                    readfile('./../web/files/subidos/'.$V15wj1uodklf);
                    die();
                }else{
                    header("Content-Disposition:attachment;filename='".$Vvxi5h2p2e2d."'");
                    readfile('./../web/files/subidos/'.$V15wj1uodklf);
                    die();
                }
                
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line("error_archivo")));
            }
        }else{
            header('Content-Type: image/x-png'); 
            readfile('./../web/files/subidos/default.jpg');
            die();
        }
        
    }
 
    function index_post()
    {
        if (!empty($_FILES)) {
            
            if (!file_exists('./../web/files/subidos/')) {
                mkdir('./../web/files/subidos/', 0777, true);
            }
            
            $Vnmcm15juye5=array(
                        "upload_path"=>"./../web/files/subidos/",
                        "max_size"=>"0",
                        "max_filename"=>"0",
                        "allowed_types"=>"*",
                        "encrypt_name"=>true,
                        "detect_mime"=>true
                        );
            
            $this->load->library('upload', $Vnmcm15juye5);
        
            $V4oalzimcdms=array();
            $V22l3ub11oll=array();
            
            foreach($_FILES as $Vwji4rxkyw5j => $Vligofq0fb34)
            {
                if($Vligofq0fb34['error'] == 0 )
                {
                    if ($this->upload->do_upload($Vwji4rxkyw5j))
                    {
                        $Vfeinw1hsfej=$this->upload->data();
                        array_push($V22l3ub11oll, $Vfeinw1hsfej);
                    }
                    else
                    {
                        array_push($V4oalzimcdms, $this->upload->display_errors());
                    }
                }
            }
           
           if (count($V4oalzimcdms)>0)
        	{
                $this->response(array('error' => '1','status'=>$V4oalzimcdms));
        	}
        	else
        	{
        	    
        	    $Vdrzyozqxvbrs=array();
        	    foreach($V22l3ub11oll as $Vligofq0fb34){
        	        
        	        $Vm1av2iahduc["es_imagen"]=$Vligofq0fb34["is_image"];
        	        $Vm1av2iahduc["token"]=$this->encrypt->encode($Vligofq0fb34["file_name"]);
        	        
        	        $Vdrzyozqxvbr=$this->archivo_model->insert($Vm1av2iahduc);
        	        
        	        if ($Vdrzyozqxvbr>0) {
        	            $Vnb2hggtfonp=array("file"=>$Vdrzyozqxvbr.md5($Vdrzyozqxvbr).'.dps');
                        $this->response(array('error' => '0','response'=>$Vnb2hggtfonp));
                    }else{
                        $this->response(array('error' => '1','response'=>$this->lang->line("error_insertar")));
                    }
                
        	    }
        	    
                
        	}
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line("error_nofile")));
        }
    }
 
    function index_put()
    {
        $this->response(NULL,404);
    }
    
 
    function index_delete()
    {
        
        $Vdrzyozqxvbr = $this->query('id');
        if ($Vdrzyozqxvbr !=NULL) {
            $Vfeinw1hsfej=array("eliminado"=>"1");
            $this->medico_model->update($Vfeinw1hsfej,$Vdrzyozqxvbr);
            $this->response(array('error' => '0','response'=>$this->lang->line("ok_eliminar")));
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line("error_nodata")));
        }
    }
    
    
    
    
    function movil_get()
    {
        $this->index_get();
    }
 
    function movil_post()
    {
        $this->index_post();
    }
 
    function movil_put()
    {
        $this->response(NULL,404);
    }
    
 
    function movil_delete()
    {
        $this->response(NULL,404);
    }
    
    

}
