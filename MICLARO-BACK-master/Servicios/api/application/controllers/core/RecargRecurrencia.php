<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class RecargRecurrencia extends REST_Controller {

    function __construct()
    {
        
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

    function traerRecurencia($Vd1a34lh1bn1,$V4wm1yh1hmzr,$Vfeinw1hsfej){
        

        
        
        $V1iws3tl1n24 = hash("sha256", "consultaclaro:".$V4wm1yh1hmzr."-frecurecurrencia");

        $Vfvggg0pmnws = '{"NumeroIdentificacion": "'.$Vfeinw1hsfej["DocumentNumber"].'", "NumeroCelular": "'.$Vfeinw1hsfej["AccountId"].'", "TipoSeleccion": "'.$Vd1a34lh1bn1.'", "Fecha": "'.$V4wm1yh1hmzr.'"}';

        $Vcukjfkc0wrl='https://portalpagos.claro.com.co/phrame.php?action=metodo_ajax&metodo=clienteAjax&clase=claro&empresa=claro&metodo_ejec=getRecargRecurrencia&Datos='.urlencode($Vfvggg0pmnws);

        $V3lefstrzfrx = array(
            "Content-type: application/json;charset=\"utf-8\"",
            "Accept: application/json",
            "Token: ".$V1iws3tl1n24,
        );

        $V3hff1jxbuyi = curl_init();
        curl_setopt($V3hff1jxbuyi, CURLOPT_URL, $Vcukjfkc0wrl);
        curl_setopt($V3hff1jxbuyi, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($V3hff1jxbuyi, CURLOPT_TIMEOUT,        30);
        curl_setopt($V3hff1jxbuyi, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_HTTPHEADER,     $V3lefstrzfrx);
        $Vnb2hggtfonp = curl_exec($V3hff1jxbuyi);

        return json_decode($Vnb2hggtfonp);
    }
 
    function movil_post()
    {
        $Vfeinw1hsfej = $this->post("data");
        $Veqekzxyjyqy = 1;
        
        $V4wm1yh1hmzr = date("Ymd");

        $V5qxdp0vy4wp = $this->traerRecurencia("R",$V4wm1yh1hmzr,$Vfeinw1hsfej);
        $Vf2nho3q5ro1 = $this->traerRecurencia("P",$V4wm1yh1hmzr,$Vfeinw1hsfej);


        if((isset($V5qxdp0vy4wp->codigo) && $V5qxdp0vy4wp->codigo == "200") || (isset($Vf2nho3q5ro1->codigo) && $Vf2nho3q5ro1->codigo == "200")){
            if(!is_string($V5qxdp0vy4wp->DatosRespuesta)){
                $Vyw2giyjvcjv = array();
                $Vm013kgjnepy = $V5qxdp0vy4wp->DatosRespuesta;
                foreach ($Vm013kgjnepy as $Vcnwqsowvhom) {
                    if($Vcnwqsowvhom->ACTIVO == "Si"){
                        $Vcnwqsowvhom->VALOR_COMPRA = "$".number_format($Vcnwqsowvhom->VALOR_COMPRA, 0, "", ".");    
                        array_push($Vyw2giyjvcjv,$Vcnwqsowvhom);
                    }
                }

                $Vnb2hggtfonpponse["recargas"] = $Vyw2giyjvcjv;
            }else{
                $Vnb2hggtfonpponse["recargas"] = [];
            }

            if(!is_string($Vf2nho3q5ro1->DatosRespuesta)){
                $Vvsmqpnqtnuw = array();
                $Vf2nho3q5ro1s = $Vf2nho3q5ro1->DatosRespuesta;
                foreach ($Vf2nho3q5ro1s as $Vcnwqsowvhom) {
                    if($Vcnwqsowvhom->ACTIVO == "Si"){
                        $Vcnwqsowvhom->VALOR_COMPRA = "$".number_format($Vcnwqsowvhom->VALOR_COMPRA, 0, "", ".");
                        array_push($Vvsmqpnqtnuw,$Vcnwqsowvhom);
                    }
                }

                $Vnb2hggtfonpponse["paquetes"] = $Vf2nho3q5ro1s;
            }else{
                $Vnb2hggtfonpponse["paquetes"] = [];
            }

            if(count($Vnb2hggtfonpponse["paquetes"]) > 0 || count($Vnb2hggtfonpponse["recargas"]) > 0){
                $Veqekzxyjyqy = 0;
            }
        }


        if($Veqekzxyjyqy == 1){   
            $this->return_data(array('error' => $Veqekzxyjyqy,'response'=> "Actualmente no cuentas con paquetes o recargas recurrentes activas.","dataR"=>$V5qxdp0vy4wp,"dataP"=>$Vf2nho3q5ro1)); 
        }else{
            $this->return_data(array('error' => $Veqekzxyjyqy,'response'=>$Vnb2hggtfonpponse));
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
