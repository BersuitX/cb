<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Reagendar extends REST_Controller {

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

        $V3sl2sbffhfw=$this->get("ID_AGENDA");
        $Vquidihusuc4 = $this->get("ORDEN");
        $Virpl3p3ptyu = $this->get("PROGRAMACION");
        $Vpk4pecshxi2 = $this->get("TIPO_TRABAJO_ID");

        
        
        $Vntg4bz5sdqr=$this->curl->simple_get('http://192.168.18.44/WebServices/wsRest/api.php?url=ConsultaAgendaMGW/ObtenerMotivosReagenda/');

        $Vntg4bz5sdqr=json_decode($Vntg4bz5sdqr);

        $Vqgoxn4gwvmp=array();
        if ($Vntg4bz5sdqr->idError==0) {
            $Vqgoxn4gwvmp=$Vntg4bz5sdqr->data;
        }

        
        

        



        $Vwkzbyta0fty='http://192.168.18.44/WebServices/wsRest/api.php?url=ConsultaAgendaMGW/ObtenerCuposAliado/'.$Vquidihusuc4.'/'.$Virpl3p3ptyu.'/'.$Vpk4pecshxi2.'/';

        $Vntg4bz5sdqr=$this->curl->simple_get($Vwkzbyta0fty);
        $Vntg4bz5sdqr=json_decode($Vntg4bz5sdqr);

        $Ve4zxqt30ts2=array();
        if ($Vntg4bz5sdqr->idError==0) {
            $Vqiyvgf12m2o=$Vntg4bz5sdqr->data;

            foreach ($Vqiyvgf12m2o as $Vox3jtveryvj ) {
                $Vg2fuj0sn4wi=$Vox3jtveryvj->CuposAliados;
                foreach ($Vg2fuj0sn4wi as $Vmhxe0rxv250) {
                    if (!$this->existeFecha($Ve4zxqt30ts2,$Vmhxe0rxv250)) {
                        $V4wm1yh1hmzr=array();
                        $V4wm1yh1hmzr["IdFecha"]=$Vmhxe0rxv250->IdFecha;
                        $V4wm1yh1hmzr["Fecha"]=$Vmhxe0rxv250->Fecha;
                        $V4wm1yh1hmzr["AliadoId"]=$Vox3jtveryvj->AliadoId;
                        $V4wm1yh1hmzr["AliadoNombre"]=$Vox3jtveryvj->AliadoNombre;

                        $Vzrfuqqa3k0y=array();
                        foreach ($Vg2fuj0sn4wi as $Vutaiebycwbq) {
                            if ($Vutaiebycwbq->IdFecha==$Vmhxe0rxv250->IdFecha) {
                                $Vm1av2iahduc=array();

                                $Vxcbcul4sfdv=$Vutaiebycwbq->RangoHora;
                                if ($Vxcbcul4sfdv=="all-day") {
                                    $Vxcbcul4sfdv="A cualquier hora del día";
                                }else if($Vxcbcul4sfdv=="13-16"){
                                    $Vxcbcul4sfdv="De 1pm a 4pm";
                                }else if($Vxcbcul4sfdv=="07-10"){
                                    $Vxcbcul4sfdv="De 7am a 10am";
                                }else if($Vxcbcul4sfdv=="10-13"){
                                    $Vxcbcul4sfdv="De 10am a 1pm";
                                }

                                $Vm1av2iahduc["RangoHora"]=$Vxcbcul4sfdv;
                                $Vm1av2iahduc["IdRangoHora"]=$Vutaiebycwbq->IdRangoHora;
                                $Vm1av2iahduc["CuposDisponibles"]=$Vutaiebycwbq->CuposDisponibles;
                                array_push($Vzrfuqqa3k0y, $Vm1av2iahduc);
                            }
                        }

                        $V4wm1yh1hmzr["horarios"]=$Vzrfuqqa3k0y;
                        array_push($Ve4zxqt30ts2, $V4wm1yh1hmzr);
                    }
                }
            }
        }


        usort($Ve4zxqt30ts2, function($Vqtrwdgbny00, $Vwkzrpaksezs){
            return strcmp($Vqtrwdgbny00["IdFecha"], $Vwkzrpaksezs["IdFecha"]);
        });

        
        
        $Vnb2hggtfonp=array('motivosAgenda' => $Vqgoxn4gwvmp, 'cupos' => $Ve4zxqt30ts2, 'urlRequest'=>$Vwkzbyta0fty);
         

        $this->return_data(array('error' => '0','response'=>$Vnb2hggtfonp));

    }

    function return_data($Vfeinw1hsfej){

        
        header('Content-Type: application/json');
        echo json_encode($Vfeinw1hsfej);
        exit;
    }
 
    function movil_post()
    {
        $Vfeinw1hsfej=$this->post("data");
        
        $Vfeinw1hsfej["IdFecha"] =str_replace('-', '%2D', $Vfeinw1hsfej["IdFecha"]);
        $Vfeinw1hsfej["IdRangoHora"] =str_replace('-', '%2D', $Vfeinw1hsfej["IdRangoHora"]);

        $V2oecyt4aea4 = 'http://agendamiento.cable.net.co/WebServices/wsRest/api.php?url=ConsultaAgendaMGW/SolicitarReagendamiento/'.$Vfeinw1hsfej["ORDEN"].'/'.$Vfeinw1hsfej["ID_AGENDA"].'/'.$Vfeinw1hsfej["IRAZONID"].'/'.$Vfeinw1hsfej["IdRangoHora"].'/'.$Vfeinw1hsfej["IdFecha"].'/'.$Vfeinw1hsfej["AliadoId"].'/';
        $Vntg4bz5sdqr=$this->curl->simple_get($V2oecyt4aea4);
        $Vntg4bz5sdqr=json_decode($Vntg4bz5sdqr);
        

        if($Vntg4bz5sdqr->msg == "Reagenda exitosa"){
            $Vntg4bz5sdqr->msg = "Tu visita se reprogramó exitosamente";
        }


        $this->return_data(array('error' => '0','response'=>$Vntg4bz5sdqr->msg));
        
        

    }


    function existeFecha($Vzrfuqqa3k0y,$Vutaiebycwbq){
        foreach ($Vzrfuqqa3k0y as $VutaiebycwbqFecha) {
            if ($VutaiebycwbqFecha["IdFecha"]==$Vutaiebycwbq->IdFecha) {
                return true;
            }
        }
        return false;
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
