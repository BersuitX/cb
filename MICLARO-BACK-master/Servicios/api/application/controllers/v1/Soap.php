<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Soap extends MY_Controller {

    function __construct()
    {
        
        parent::__construct();


    }
    
    function index_get()
    {
        $this->response(NULL,404);
    }
 
    function index_post()
    {
        $Vfeinw1hsfej = $this->get_data('post','data');

        $Vnb2hggtfonp=$this->filtrosServicios($Vfeinw1hsfej);
        if (!$Vnb2hggtfonp) {
            $Vnb2hggtfonp=$this->curl($Vfeinw1hsfej);
        }

        $this->return_data($Vnb2hggtfonp);
    }

    function filtrosServicios($Vfeinw1hsfej){

        if ($this->metodo=="retrievePlans") {
            return $this->retrievePlans($Vfeinw1hsfej);
        }else{
            return false;
        }

    }

    function retrievePlans($Vfeinw1hsfej){
        if (intval($Vfeinw1hsfej["LineOfBusiness"])==2) {

            if (file_exists(APPPATH."views/Constante/".$this->metodo.".php")){

                $Vnb2hggtfonpJSON=json_decode($this->load->view("Constante/".$this->metodo,$Vfeinw1hsfej,true));

                return array("error"=>0,"response"=>$Vnb2hggtfonpJSON,"secs"=>0);

            }else{
                return false;
            }

        }else{
            return false;
        }
    }

 
    function index_put()
    {
        $this->response(NULL,404);
    }
    
 
    function index_delete()
    {
        $this->response(NULL,404);
    }
    
    

}
