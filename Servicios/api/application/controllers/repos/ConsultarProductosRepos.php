<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
error_reporting(E_ALL);



class ConsultarProductosRepos extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
        
        $this->load->helper('cookie');
        $this->load->database();
        
        $this->load->library('curl');
    }
    
    function index_get()
    {
        $this->response(NULL,403);
    }
 
    function index_post()
    {

        $Vfeinw1hsfej = $this->post('data');
        

        $Vfcughmysbun = (isset($Vfeinw1hsfej) && $Vfeinw1hsfej != NULL && isset($Vfeinw1hsfej["AccountId"]));
        


            
            $Vfvggg0pmnws = $this->db->query("select * from vw_repos_listaProductos where idCategoria = 1");
            $Ve2pnzw21kc1 = $Vfvggg0pmnws->result();
            if(count($Ve2pnzw21kc1) > 0) {


                
                $Vcmaitbcbmmk = '/var/www/miclaroapp.com.co/public_html/archivos/fotosReposNew/';
                $Vt4hipms1i3k = "https://www.miclaroapp.com.co/archivos/fotosReposNew";

                $V5bl3u22kt0w = array();
                $V52bc0tkaq5q = array();
                $Vlz0zt1go4sb = array();
                
                
                
                for($Vep0df0xosaw=0;$Vep0df0xosaw<count($Ve2pnzw21kc1);$Vep0df0xosaw++){
                    if(isset($Ve2pnzw21kc1[$Vep0df0xosaw]->aproductoID)){
                        if(!in_array($Ve2pnzw21kc1[$Vep0df0xosaw]->aproductoID,$Vlz0zt1go4sb)){
                            array_push($V5bl3u22kt0w,$Ve2pnzw21kc1[$Vep0df0xosaw]);
                            array_push($Vlz0zt1go4sb,$Ve2pnzw21kc1[$Vep0df0xosaw]->aproductoID);
                        }

                        $Vep0df0xosawnvXprod = array("acodigo"=>$Ve2pnzw21kc1[$Vep0df0xosaw]->acodigo,"aproductoColorID"=>$Ve2pnzw21kc1[$Vep0df0xosaw]->aproductoColorID,"aproductoID"=>$Ve2pnzw21kc1[$Vep0df0xosaw]->aproductoID,"askuProducto"=>$Ve2pnzw21kc1[$Vep0df0xosaw]->askuProducto,"askuProductoPrepago"=>$Ve2pnzw21kc1[$Vep0df0xosaw]->askuProductoPrepago);
                        array_push($V52bc0tkaq5q,$Vep0df0xosawnvXprod);
                    }
                }

                
                for($Vv3o4gn4ugio=0;$Vv3o4gn4ugio<sizeof($V5bl3u22kt0w);$Vv3o4gn4ugio++){
                    unset($V5bl3u22kt0w[$Vv3o4gn4ugio]->acodigo); 
                    unset($V5bl3u22kt0w[$Vv3o4gn4ugio]->aproductoColorID);
                    unset($V5bl3u22kt0w[$Vv3o4gn4ugio]->askuProducto);
                    $V5bl3u22kt0w[$Vv3o4gn4ugio]->alistInventarioProducto = array();
                    
                    
                    for($Vwyse0flpyxh=0;$Vwyse0flpyxh<sizeof($V52bc0tkaq5q);$Vwyse0flpyxh++){
                        if($V52bc0tkaq5q[$Vwyse0flpyxh]["aproductoID"] == $V5bl3u22kt0w[$Vv3o4gn4ugio]->aproductoID){
                            array_push($V5bl3u22kt0w[$Vv3o4gn4ugio]->alistInventarioProducto, $V52bc0tkaq5q[$Vwyse0flpyxh]);
                        }
                    }

                    
                    $Vep0df0xosawdProd=$V5bl3u22kt0w[$Vv3o4gn4ugio]->aproductoID;
                    
                    $Vcm40vhd0uag = new FilesystemIterator($Vcmaitbcbmmk.$Vep0df0xosawdProd);
                    $Vgk4o3dwbfy2 = iterator_count($Vcm40vhd0uag);

                    $Vep0df0xosawmgs = array();
                    
                    
                    for ($V5ozzo11urso=1; $V5ozzo11urso <= $Vgk4o3dwbfy2; $V5ozzo11urso++) {
                       $Vwasjn0sjacj =  $Vt4hipms1i3k."/".$Vep0df0xosawdProd."/".$V5ozzo11urso.".jpg?v=1";
                        array_push($Vep0df0xosawmgs,$Vwasjn0sjacj);
                    }

                    $V5bl3u22kt0w[$Vv3o4gn4ugio]->imagenes = $Vep0df0xosawmgs;
                }

                $Vrdos1yq12ia = false;
                $Vf5ummwstfub = false;
                if($Vfcughmysbun){
                    
                    
                    $Vfvggg0pmnwsFact = $this->db->query("select * from repos_cuentasFactura where cuenta = ".$Vfeinw1hsfej["AccountId"]." and esActivo = 1");
                    $Ve2pnzw21kc1Fact = $Vfvggg0pmnwsFact->result();
                    
                    if(count($Ve2pnzw21kc1Fact) > 0) { $Vrdos1yq12ia = true; }
                    

                    
                    
                    $V15531mn250a = array(
                        "AccountId" => $Vfeinw1hsfej["AccountId"]
                    );
                    $V1urt3egvgve = $this->curl->simple_post('https://miclaroapp.com.co/api/index.php/v1/soap/GetCustomerInformation.json', array("data"=>$V15531mn250a));
                    
                    if(isset($V1urt3egvgve,$V1urt3egvgve->error)){
                        $V1urt3egvgve = json_decode($V1urt3egvgve);
                        if($V1urt3egvgve->error == 0){
                            $Vf5ummwstfub = true;
                        }
                    }
                    
                }
                    




                
                $Vfeinw1hsfejRes = array("aplicaPagoFactura"=>$Vrdos1yq12ia,"aplicaPagoFinanciado"=>$Vf5ummwstfub,"productos"=>$V5bl3u22kt0w,"costoMinimo"=>30000);
                

                $this->response(array('error' => '0','response'=>$Vfeinw1hsfejRes));
            
                
            
        }else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
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
        

        $this->index_post();
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
