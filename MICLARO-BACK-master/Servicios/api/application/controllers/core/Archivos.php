<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Archivos extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        $V5dsbozs5xhq = $_SERVER['REQUEST_METHOD'];
    }
    
    function index_get()
    {
        
        



        $Vcm40vhd0uag = $this->get('i');
        $Vqyer42dqoug = $this->get('n');
        $Vifxhafjqvbp = "csv";

        if($Vqyer42dqoug == null){ $Vqyer42dqoug= "Reporte_miClaro"; }
        
        if($Vcm40vhd0uag == null){
            $Vcm40vhd0uag = date("Y/m/d",strtotime("-1 day"));
        }
        
        try{
            $this->load->database();

            $Voziw1j4vegw = "select * from app_data_metodos_dia where fecha = '".$Vcm40vhd0uag."';";
            $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw);

            $Vu0ysz5e2s3l = date("Y",strtotime("-5 hour"));
            $Vosrev0dmm3y = date("m",strtotime("-5 hour"));
            $Veoeds0ryrie = date("d",strtotime("-5 hour"));
            $Vb00j42bn41v = date("H_i_s",strtotime("-5 hour"));
            list($Vihn3dxycmfq, $Vspi1bqfrhmf) = explode(" ", microtime());

            $Vcm40vhd0uaglename = $Vqyer42dqoug."_".$Vu0ysz5e2s3l.$Vosrev0dmm3y.$Veoeds0ryrie.$Vb00j42bn41v.".".$Vifxhafjqvbp;

            $this->load->helper('csv');
            echo query_to_csv($Vyotgbgs03ci,TRUE,$Vcm40vhd0uaglename);
        }catch(Exception  $Veengl4bqqud){
            $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
        }
         
        
        
    }
 
    function index_post()
    {
         $this->response(NULL,403);
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
    

    function create_excel_export()
    {
        $Vyiyrqhu1rnh = array("juan","pedro","perez");
        $V3zljh1vyslw = array("Employee Name", "Employee Email", "Department");

        $Vqihmib4sqvm = "";
        $Vfeinw1hsfej = "";
        $Vcm40vhd0uaglename = 'Users';
        foreach($V3zljh1vyslw as $Vcnwqsowvhom) {
                $Vqihmib4sqvm .= $Vcnwqsowvhom . "\t";
        }
        $V3zljh1vyslw = trim($Vqihmib4sqvm). "\n";

        if (!empty($Vyiyrqhu1rnh)){
            foreach ($Vyiyrqhu1rnh as $Vyotgbgs03ciow){
                $Vcfdirgq3swa = '';
                $Veengl4bqqudmployee_name = $Vyotgbgs03ciow[0];
                $Veengl4bqqudmail = $Vyotgbgs03ciow[1];
                $Vkhadlrvs2d2 = $Vyotgbgs03ciow[2];

                $Vcfdirgq3swa .= $Veengl4bqqudmployee_name . "\t";
                $Vcfdirgq3swa .= $Veengl4bqqudmail . "\t";
                $Vcfdirgq3swa .= $Vkhadlrvs2d2 . "\t";

                $Vfeinw1hsfej .= trim($Vcfdirgq3swa). "\n";
            }
        }

        $Veengl4bqqudxport = array(
            'filename' => $Vcm40vhd0uaglename,
            'headers' => $V3zljh1vyslw,
            'data' => $Vfeinw1hsfej
        );

        return $Veengl4bqqudxport;
    } 
    

}
