<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class GetUltimosPagos extends REST_Controller {

    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, X-API-KEY,  X-SESION-ID, X-SESSION-ID, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        $V5dsbozs5xhq = $_SERVER['REQUEST_METHOD'];
        if ($V5dsbozs5xhq == "OPTIONS") {
             $this->response( array("error"=>0,"response"=>"" ) );
        }
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
        $this->load->library('curl');
    }
    
    function index_get()
    {
        $this->return_data(NULL,403);
    }
 
    function index_post()
    {
        $this->return_data(NULL,403);
    }
 
    function index_put()
    {
       $this->return_data(NULL,403);
    }
    
 
    function index_delete()
    {   
        $this->return_data(NULL,403);
    }
    
    
    
    
    function movil_get()
    {
        $this->return_data(NULL,403);
        
    }

    function return_data($Vfeinw1hsfej){

        
        header('Content-Type: application/json');
        echo json_encode($Vfeinw1hsfej);
        exit;
    }
 
    function movil_post()
    {

        $Vfeinw1hsfej=$this->post("data");

        if (intval($Vfeinw1hsfej["LineOfBusiness"]) == 1) {
            $Vfvggg0pmnws='{"TipoTrans":"FIJO","NumeroCelular": "","NumeroCuenta":"'.$Vfeinw1hsfej["AccountId"].'","Fecha":"'.$Vfeinw1hsfej["fecha"].'"}';
        }else{
            $Vfvggg0pmnws='{"TipoTrans":"MOVIL","NumeroCelular": "'.$Vfeinw1hsfej["AccountId"].'","NumeroCuenta":"","Fecha":"'.$Vfeinw1hsfej["fecha"].'"}';
        }

        $V1iws3tl1n24 = hash ( "sha256", "consultaclaro:".$Vfeinw1hsfej["fecha"]."-ultimospagos" );
        
        
        $Vcukjfkc0wrl='http://portalrecaudo.claro.com.co/phrame.php?action=metodo_ajax&metodo=clienteAjax&clase=claro&metodo_ejec=getUltimosPagos&empresa=claro&Datos='.urlencode($Vfvggg0pmnws);
        

        $V3lefstrzfrx = array(
            "Content-type: application/json;charset=\"utf-8\"",
            "Accept: application/json",
            "Token: ".$V1iws3tl1n24,
        );

        $V3hff1jxbuyi = curl_init();
        curl_setopt($V3hff1jxbuyi, CURLOPT_URL, $Vcukjfkc0wrl);
        curl_setopt($V3hff1jxbuyi, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($V3hff1jxbuyi, CURLOPT_TIMEOUT,        10);
        curl_setopt($V3hff1jxbuyi, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_HTTPHEADER,     $V3lefstrzfrx);
        $Vnb2hggtfonp = curl_exec($V3hff1jxbuyi);

        $Vnb2hggtfonpponse=json_decode($Vnb2hggtfonp);
        



        if($Vfeinw1hsfej["AccountId"]=="69903839"){
            $Vzrfuqqa3k0y = array();
            array_push($Vzrfuqqa3k0y, array("VALOR"=>"34982,37","FECHA"=>"2018-06-23","HORA"=>"19:14:10","FACTURA"=>"830738864201806"));
            $this->return_data(array('error' => '0','response'=> array("UltimoPago"=>array("LINEA"=>"3107826753","VALOR"=>"34982,37","FECHA"=>"2018-06-23","HORA"=>"19:14:10","FACTURA"=>"830738864201806"),"UltimosPagos"=>$Vzrfuqqa3k0y)));
        }

        if ($Vnb2hggtfonpponse->codigo=="200") { 

            $Vfeinw1hsfejResponse=array();
            foreach ($Vnb2hggtfonpponse->DatosRespuesta as $Vutaiebycwbq) {

                if (isset($Vutaiebycwbq->UltimoPago)) {
                    $Vfeinw1hsfejResponse["UltimoPago"]=$Vutaiebycwbq->UltimoPago;
                }else if( isset($Vutaiebycwbq->UltimosPagos)){
                    $Vfeinw1hsfejResponse["UltimosPagos"]=$Vutaiebycwbq->UltimosPagos;
                }
            }

            $this->return_data(array('error' => '0','response'=> $Vfeinw1hsfejResponse,'request'=>$Vcukjfkc0wrl,'responseSRV'=>$Vnb2hggtfonp));
        }else{
            $this->return_data(array('error' => '1','response'=> 'No se encontró información.','respSERV'=>$Vnb2hggtfonpponse,'url'=>$Vcukjfkc0wrl));
        }
        
        
        

    }
 
    function movil_put()
    {
        $this->return_data(NULL,403);
    }
 
    function movil_delete()
    {
        $this->return_data(NULL,403);
    }

}
