<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DetalleVisita extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");
        
    }
    
    function index_get()
    {
		
		$Vquidihusuc4 = $this->get('orden');
		
		
		if($Vquidihusuc4 != null ){
			
			$Vgnguexdjvna = microtime(true);
			
			
			
			
			$V5rrdlhlgyk4 = array("direccion"=> "","lat"=> 0,"long"=> 0,"hora"=> "","id"=> 0);
			$V1uwjx0hqsoi = array("nombre"=> "","documento"=> 0,"telefono"=> 0,"carne"=> 0,"foto"=> "");
			
			
			$Vfeinw1hsfej = array("orden"=>$Vquidihusuc4,"fechaIni"=>date("Y-m-d"),"fechaFin"=>date("Y-m-d",strtotime("+30 days")),"canal"=>"gps");
			$Vcukjfkc0wrl = 'https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/rest/getActivities.json?data='.urlencode(json_encode($Vfeinw1hsfej));
			$Vu2hkgdae0p3=$this->curl->simple_get($Vcukjfkc0wrl);
			$Vu2hkgdae0p3=json_decode($Vu2hkgdae0p3);
			
			
			if (!(json_last_error() == JSON_ERROR_NONE)){
				$Vnb2hggtfonp=array(
					
					"visita"=>((isset($Vl1xbgsk1jh4->response))?$Vl1xbgsk1jh4->response:$V5rrdlhlgyk4 ),
					"tecnico"=>((isset($Vcp1heec1ymm->response))?$Vcp1heec1ymm->response:$V1uwjx0hqsoi)
				);
				$this->response(array("error"=>0,"response"=>$Vnb2hggtfonp));
			}
			
			
			
			if($Vu2hkgdae0p3->error == 1){
				$Vnb2hggtfonp=array(
					
					"visita"=>((isset($Vl1xbgsk1jh4->response))?$Vl1xbgsk1jh4->response:$V5rrdlhlgyk4 ),
					"tecnico"=>((isset($Vcp1heec1ymm->response))?$Vcp1heec1ymm->response:$V1uwjx0hqsoi)
				);
				$this->response(array("error"=>0,"response"=>$Vnb2hggtfonp));
				
				
			}
			
			
			if(sizeof($Vu2hkgdae0p3->response) == 0){
				
				$Vnb2hggtfonp=array(
					
					"visita"=>((isset($Vl1xbgsk1jh4->response))?$Vl1xbgsk1jh4->response:$V5rrdlhlgyk4 ),
					"tecnico"=>((isset($Vcp1heec1ymm->response))?$Vcp1heec1ymm->response:$V1uwjx0hqsoi)
				);
				$this->response(array("error"=>0,"response"=>$Vnb2hggtfonp));
			}
			
			
			$V3eaprxms50h = $Vu2hkgdae0p3->response[0];
			
			
			$Vfeinw1hsfej = array("activityId"=>$V3eaprxms50h->activityId,"canal"=>"gps");
			
			
			$Vcukjfkc0wrl = 'https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/rest/getDetalleVisita.json?data='.urlencode(json_encode($Vfeinw1hsfej));
			
			$Vl1xbgsk1jh4=$this->curl->simple_get($Vcukjfkc0wrl);
			
			
			$Vl1xbgsk1jh4=json_decode($Vl1xbgsk1jh4);
			
			
			if (!(json_last_error() == JSON_ERROR_NONE)){
				
				$Vnb2hggtfonp=array(
					
					"visita"=>((isset($Vl1xbgsk1jh4->response))?$Vl1xbgsk1jh4->response:$V5rrdlhlgyk4 ),
					"tecnico"=>((isset($Vcp1heec1ymm->response))?$Vcp1heec1ymm->response:$V1uwjx0hqsoi)
				);
				$this->response(array("error"=>0,"response"=>$Vnb2hggtfonp));
			}
			
			if(isset($Vl1xbgsk1jh4->error) && $Vl1xbgsk1jh4->error== 1){
				
				$Vnb2hggtfonp=array(
					
					"visita"=>((isset($Vl1xbgsk1jh4->response))?$Vl1xbgsk1jh4->response:$V5rrdlhlgyk4 ),
					"tecnico"=>((isset($Vcp1heec1ymm->response))?$Vcp1heec1ymm->response:$V1uwjx0hqsoi)
				);
				$this->response(array("error"=>0,"response"=>$Vnb2hggtfonp));
			}
			
			
			
			
			$Vfeinw1hsfej = array("resourceId"=>$V3eaprxms50h->resourceId,"canal"=>"gps");
			
			
			$Vcukjfkc0wrl = 'https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/rest/getDetalleTecnico.json?data='.urlencode(json_encode($Vfeinw1hsfej));
			
			$Vcp1heec1ymm=$this->curl->simple_get($Vcukjfkc0wrl);
			$Vcp1heec1ymm=json_decode($Vcp1heec1ymm);
			
			if (!(json_last_error() == JSON_ERROR_NONE)){
				
				$Vnb2hggtfonp=array(
					
					"visita"=>((isset($Vl1xbgsk1jh4->response))?$Vl1xbgsk1jh4->response:$V5rrdlhlgyk4 ),
					"tecnico"=>((isset($Vcp1heec1ymm->response))?$Vcp1heec1ymm->response:$V1uwjx0hqsoi)
				);
				$this->response(array("error"=>0,"response"=>$Vnb2hggtfonp));
			}
			

			if(isset($Vcp1heec1ymm->error) && $Vcp1heec1ymm->error== 1){
				
				$Vnb2hggtfonp=array(
					
					"visita"=>((isset($Vl1xbgsk1jh4->response))?$Vl1xbgsk1jh4->response:$V5rrdlhlgyk4 ),
					"tecnico"=>((isset($Vcp1heec1ymm->response))?$Vcp1heec1ymm->response:$V1uwjx0hqsoi)
				);
				$this->response(array("error"=>0,"response"=>$Vnb2hggtfonp));
			}
			
			$Vnb2hggtfonp=array(
				
				"visita"=>((isset($Vl1xbgsk1jh4->response))?$Vl1xbgsk1jh4->response:$V5rrdlhlgyk4 ),
				"tecnico"=>((isset($Vcp1heec1ymm->response))?$Vcp1heec1ymm->response:$V1uwjx0hqsoi)
			);

			$Vswcifil4f1s = new DateTime();
			$V0wdm0aemnf1 = microtime(true) - $Vgnguexdjvna;
			$Vspi1bqfrhmf = intval($V0wdm0aemnf1);
			$Vg5o1alqj055 = $V0wdm0aemnf1 - $Vspi1bqfrhmf;
			$Vep4ncm02uco = strftime('%T', mktime(0, 0, $Vspi1bqfrhmf)) . str_replace('0.', '.', sprintf('%.4f', $Vg5o1alqj055));
			$Vspi1bqfrhmfs = $Vep4ncm02uco;


			$this->response(array("error"=>0,"response"=>$Vnb2hggtfonp, "secs"=> $Vspi1bqfrhmfs));

		}
		else{
			$this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
		}
    }
 
    function index_post()
    {
        $this->response(NULL,403);
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
        
    	

		$this->index_get();

		
    }
 
    function movil_post()
    {
        $this->response(NULL,403);
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
