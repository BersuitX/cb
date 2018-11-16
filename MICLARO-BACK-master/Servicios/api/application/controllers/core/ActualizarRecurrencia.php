<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ActualizarRecurrencia extends REST_Controller {

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
 
    function movil_post()
    {
        $Vfeinw1hsfej=$this->post("data");
        $V4wm1yh1hmzr = date("Ymd");
        $Veqekzxyjyqy = 1;
        $Vptda2p4c4mk = "En este momento no podemos atender esta solicitud, intenta nuevamente.";

        $Vfvggg0pmnws='{"RecurrenciaNumero":"'.$Vfeinw1hsfej["RecurrenciaNumero"].'","NumeroIdentificacion":"'.$Vfeinw1hsfej["DocumentNumber"].'","NumeroCelular":"'.$Vfeinw1hsfej["AccountId"].'","TipoSeleccion":"'.$Vfeinw1hsfej["TipoSeleccion"].'","Fecha":"'.$V4wm1yh1hmzr.'","EstadoRecurrencia":"'.$Vfeinw1hsfej["EstadoRecurrencia"].'","DiaRecurrencia":"'.$Vfeinw1hsfej["DiaRecurrencia"].'"}';

        $V1iws3tl1n24 = hash("sha256", "consultaclaro:".$V4wm1yh1hmzr."-updarecurrencia");
        

        
        
        $Vcukjfkc0wrl='https://portalpagos.claro.com.co/phrame.php?action=tarea_programada&metodo=clienteTarea&clase=claro&empresa=claro&metodo_ejec=putActualizarRecurrencia&Datos='.urlencode($Vfvggg0pmnws);

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

        $Vnb2hggtfonpponse = json_decode($Vnb2hggtfonp);

        if(isset($Vnb2hggtfonpponse->DatosRespuesta)){
           $Vptda2p4c4mk = $Vnb2hggtfonpponse->DatosRespuesta;
        }

        if(isset($Vnb2hggtfonpponse->codigo) && $Vnb2hggtfonpponse->codigo=="200"){
           $Veqekzxyjyqy = 0;
           if(isset($Vnb2hggtfonpponse->DatosRespuesta)){
                if($Vfeinw1hsfej["EstadoRecurrencia"] == "I"){
                   $Vptda2p4c4mk = "Se ha desactivado la recurrencia programada. Este cambio se verá reflejado en el siguiente mes."; 
               }else{
                   $Vptda2p4c4mk = "Se ha actualizado exitosamente el día de la recurrencia. Este cambio se verá reflejado en el siguiente mes."; 
               }
            }
        }

        $this->return_data(array('error' => $Veqekzxyjyqy,'response'=> $Vptda2p4c4mk)); 

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
