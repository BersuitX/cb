<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class RetrieveElectronicDocumentPDF extends MY_Controller {

    function __construct()
    {
        
        parent::__construct();

        $this->load->library('curl');

    }
    
    function index_get()
    {
        $this->response(NULL,404);
    }
 
    function index_post()
    {
        $Vfeinw1hsfej = $this->get_data('post','data');

        $Vfeinw1hsfej=array("data"=>array("numeroCuenta"=>$Vfeinw1hsfej["AccountId"],"canal"=>"hogar"));

        
        $Vnb2hggtfonp=$this->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/rest/getURLPDFDocument.json', $Vfeinw1hsfej);
        $Vnb2hggtfonp=json_decode($Vnb2hggtfonp, true);

        $Veqekzxyjyqy=$Vnb2hggtfonp["response"]["error"];
        


        if (!$Veqekzxyjyqy["isError"]) {
            $Vnb2hggtfonp["error"]=0;
            $Vnb2hggtfonp["response"]=array("PDFStream"=>$Vnb2hggtfonp["response"]["url"]);
        }else{
            $Vnb2hggtfonp["error"]=1;
            $Vnb2hggtfonp["response"]="En este momento no se encuentra disponible tu factura eléctronica.";
        }

        $this->return_data($Vnb2hggtfonp);
    }

    function filtrosServicios($Vfeinw1hsfej){
        $this->response(NULL,404);

    }

    function retrievePlans($Vfeinw1hsfej){
        $this->response(NULL,404);
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
