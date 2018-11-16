<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Rest extends MY_Controller {

    function __construct()
    {
        
        parent::__construct();
    }
    
    function index_get()
    {
        $Vfeinw1hsfej = $this->get_data('get','data');

        $Vfeinw1hsfej = str_replace("'", "\"", $Vfeinw1hsfej);

        if (urldecode($Vfeinw1hsfej)!=$Vfeinw1hsfej) {
            $Vfeinw1hsfej= urldecode($Vfeinw1hsfej);
        }
                
        $Vfeinw1hsfej=json_decode($Vfeinw1hsfej);
        $Vfeinw1hsfej=json_decode(json_encode($Vfeinw1hsfej), true);


        if ($Vfeinw1hsfej["canal"]=="citi") {
            $Vnb2hggtfonp=$this->rest_post($Vfeinw1hsfej,$Vfeinw1hsfej["canal"]);
            $this->return_data($Vnb2hggtfonp);
        }else{
            
            $Vnb2hggtfonp=$this->rest_get($Vfeinw1hsfej,$Vfeinw1hsfej["canal"]);
            $this->return_data( $Vnb2hggtfonp );
        }


    }
 
    function index_post()
    {
        $Vfeinw1hsfej = $this->get_data('post','data');
        $Vqchqfzwiwh4 = $Vfeinw1hsfej["canal"];
        
        if(isset($Vqchqfzwiwh4) && $Vqchqfzwiwh4=="hogar"){
            if(isset($Vfeinw1hsfej["numeroCuenta"])){
                $Vgou2fclkytw = $Vfeinw1hsfej["numeroCuenta"];

                if( (isset($Vfeinw1hsfej["custcode"]) &&  $Vfeinw1hsfej["custcode"]!="" &&  $Vfeinw1hsfej["custcode"]!="custcode") && (isset($Vfeinw1hsfej["LineOfBusiness"]) &&  $Vfeinw1hsfej["LineOfBusiness"]!="")  ){
                    if (intval($Vfeinw1hsfej["LineOfBusiness"])==3) {
                        $Vgou2fclkytw=substr($Vfeinw1hsfej["custcode"], 0, 10);
                    }
                }


                if(isset($Vfeinw1hsfej["email"])){
                    $Vgou2fclkytw.="|".$Vfeinw1hsfej["email"];
                }


                
                
                
                $Vgou2fclkytw=$this->fnEncrypt($Vgou2fclkytw,$this->app["AES_paradigma"]);

                $Vnb2hggtfonp=$this->rest_post(array("data"=>$Vgou2fclkytw),$Vqchqfzwiwh4);


            }else{
                $Vnb2hggtfonp=array("error"=>1,"response"=>"no se reconoce el parametro numeroCuenta");
            }
        }else if(isset($Vqchqfzwiwh4) && ($Vqchqfzwiwh4=="xdr"|| $Vqchqfzwiwh4=="xdr_prepago")){
            
            $Vnb2hggtfonp=$this->rest_post($Vfeinw1hsfej,$Vqchqfzwiwh4);
        }else{
            $Vnb2hggtfonp=array("error"=>1,"response"=>"Servicio no disponible.");
        }

        $this->return_data( $Vnb2hggtfonp );
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
