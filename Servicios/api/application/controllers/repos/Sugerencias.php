<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
error_reporting(E_ALL);



class Sugerencias extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, X-API-KEY,  X-SESION-ID, X-SESSION-ID, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        $V5dsbozs5xhq = $_SERVER['REQUEST_METHOD'];
        if ($V5dsbozs5xhq == "OPTIONS") {
             $this->response( array("error"=>0,"response"=>"" ) );
        }
        
		$this->lang->load("app","spanish");
		
        $this->load->helper('cookie');

        $this->load->model('Sugerencias_model');

        $this->load->database();
        
    }
    
    function index_get()
    {
    	try{ 
			$V5jsofw5ibzv =  $this->Sugerencias_model
	        ->as_array()
	        ->get_all();

	        if(sizeof($V5jsofw5ibzv) > 0){
	        	$this->response(array('error' => '0','response'=> $V5jsofw5ibzv));
	        }else{
	        	$this->response(array('error' => '1','response'=>"No se encontraron datos, intentelo de nuevo más tarde"));
	        }
	    }catch(Exception $Veengl4bqqud){
          $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
        }
    }
 
    function index_post()
    {
        try{ 
            $Vfeinw1hsfej = $this->post('data');
            unset($Vfeinw1hsfej["token"]);
            unset($Vfeinw1hsfej["header"]);
            if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej != NULL){
            	
                $Vdrzyozqxvbr = $this->Sugerencias_model->insert($Vfeinw1hsfej);
                if($Vdrzyozqxvbr > 0){
                    $this->response(array('error' => '0','response'=>"Tu solicitud se ha realizado exitosamente!<br/><br/>Recuerda que  nuestros asesores confirmarán tu solicitud."));
                }else{
                    $this->response(array('error' => '1','response'=>"No ha sido posible crear el equipo."));
                }
            }else{
                $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
            }
        }catch(Exception $Veengl4bqqud){
          $this->response(array('error' => '1','response'=>"Temporalmente no está disponible, intentelo de nuevo más tarde."));
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
        

        $Vqyer42dqoug = 'Sugerencias Telefonos';
        $Veengl4bqqudxt = "csv";


        try{

            $Voziw1j4vegw = "select * from repos_sugerencias";

            
            $Vyotgbgs03ci = $this->db->query($Voziw1j4vegw);

            $Vu0ysz5e2s3l = date("Y",strtotime("-7 hour"));
            $Vosrev0dmm3y = date("m",strtotime("-7 hour"));
            $Veoeds0ryrie = date("d",strtotime("-7 hour"));
            $Vb00j42bn41v = date("H_i_s",strtotime("-7 hour"));
            list($Vihn3dxycmfq, $Vspi1bqfrhmf) = explode(" ", microtime());

            $Vb13cwxhoi04 = $Vqyer42dqoug."_".$Vu0ysz5e2s3l.$Vosrev0dmm3y.$Veoeds0ryrie.$Vb00j42bn41v.".".$Veengl4bqqudxt;

            $this->load->helper('csv');
            echo query_to_csv($Vyotgbgs03ci,TRUE,$Vb13cwxhoi04);
        }catch(Exception  $Veengl4bqqud){
            $this->response(array('error' => '1','response'=>$Veengl4bqqud->getMessage()));
        }
       
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
