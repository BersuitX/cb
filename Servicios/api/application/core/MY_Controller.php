<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class MY_Controller extends REST_Controller {
    
    
    public $V2t22y1izg4y;
    public $Vn3vzzdr2m1a;
    public $Vvpxhbre4bm1;
    public $V3lefstrzfrx;
    
    
    public $V2djcpolmcaq = array("ConsultarCatalogoPaqueteRecarga","legalizeAccount","GenerarOTP","ValidacionRegistroUsuario","RegistroUsuario","AsociarCuentaUsuario","RegistroAliasCuenta","RedencionCupon","itel414TodoDestino","itel415CompraDatos","consultaInformacion","RegistrarImei","SolicitarCambioNombreUsuario","validateNumber","retrieveCustomerData","itel223ValidarIpoConsumo");    
    public $Vigkafm5j2zl = array();
    public $Vy4zbp54gqrq = array();

    
    public $Vvn0hhkwiitu = array("ConsultarInformacionCuentaMovil");

    
    public $Vsls0gdwtc2w = array();
    
    
    public function retornar ($V4kez23edpri,$Vd3d1txbrkol){
        
        
        $this->load->library('LogLibrary');
        $this->loglibrary->save_in_db($V4kez23edpri);
        $this->loglibrary->save_to_file($V4kez23edpri);
        
        return $Vd3d1txbrkol;
    }


    public function getTokenData($Vfeinw1hsfej){
        $Vfeinw1hsfejTemp = $this->sessionUsuario;
        if(isset($Vfeinw1hsfejTemp["cuenta"]["AccountId"])){
            $Vfeinw1hsfej["AccountId"] = $Vfeinw1hsfejTemp["cuenta"]["AccountId"];
            $Vfeinw1hsfej["numeroCuenta"] = $Vfeinw1hsfejTemp["cuenta"]["AccountId"];
        }

        if(isset($Vfeinw1hsfejTemp["cuenta"]["LineOfBusiness"])){
            $Vfeinw1hsfej["LineOfBusiness"] = $Vfeinw1hsfejTemp["cuenta"]["LineOfBusiness"];
        }

        if(isset($Vfeinw1hsfejTemp["usuario"]["UserProfileID"])){
            $Vfeinw1hsfej["UserProfileID"] = $Vfeinw1hsfejTemp["usuario"]["UserProfileID"];
            $Vfeinw1hsfej["nombreUsuario"] = $Vfeinw1hsfejTemp["usuario"]["UserProfileID"];
        }

        return $Vfeinw1hsfej;
    }

    
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
        $this->load->library('curl');
        $this->lang->load("app","spanish");
        $this->load->library('GibberishAES');
        $this->load->helper('cookie');

        $this->app=$this->config->item('app');
        $this->servicios=$this->config->item('servicios');

        $Vpzegjxygljs= $this->uri->segment(3);

        


        if(isset($Vpzegjxygljs)){
            $Vpzegjxygljs=str_replace(".json","",$Vpzegjxygljs);

            if(isset($this->servicios[$Vpzegjxygljs])){
                $this->metodo=$Vpzegjxygljs;
            }else{
                $this->return_data(array("error"=>1,"response"=>$this->lang->line("error_servicio")));
                exit;
            }
        }else{
            
            $this->return_data(array("error"=>1,"response"=>$this->lang->line("error_servicio")));
            exit;
        }
        
        

        $V3lefstrzfrxs = array_change_key_case($this->input->request_headers(), CASE_UPPER);
        if(isset($V3lefstrzfrxs["X-SESSION-ID"]) && $V3lefstrzfrxs["X-SESSION-ID"]!= "" && $this->metodo != "LoginUsuario"){

            $Vfeinw1hsfej=$this->gibberishaes->dec($V3lefstrzfrxs["X-SESSION-ID"],$this->app["AES"]);
            $Vfeinw1hsfej=json_decode($Vfeinw1hsfej, true);

            if (json_last_error()==JSON_ERROR_NONE) {
                $this->sessionUsuario=$Vfeinw1hsfej;
            }else{
                $this->response( array("error"=>1,"response"=>"Error de seguridad" ) );
            }

        }
    }

    function get_data($V4wtbblc1wn4,$Vdpwtnkqupxa){
        $Vfeinw1hsfej = $this->$V4wtbblc1wn4($Vdpwtnkqupxa);
        
        if($this->app["produccion"]){
          $Vfeinw1hsfej=$this->gibberishaes->dec($Vfeinw1hsfej,$this->app["AES"]); 
          
          if ($V4wtbblc1wn4=="post" || $V4wtbblc1wn4=="put") {
            $Vfeinw1hsfej=json_decode($Vfeinw1hsfej, true);
          }
        }
        
        return $Vfeinw1hsfej;
    }
    
    function return_data($Vfeinw1hsfej){
        
        if($this->app["produccion"]){
            if (is_array($Vfeinw1hsfej->response) || is_object($Vfeinw1hsfej->response) ) {
                $Vfeinw1hsfej->response=$this->gibberishaes->enc(json_encode($Vfeinw1hsfej->response),$this->app["AES"]);  
            }else{
                $Vfeinw1hsfej->response=$this->gibberishaes->enc($Vfeinw1hsfej->response,$this->app["AES"]); 
            }
        }
        
        

        
        header('Content-Type: application/json');
        echo json_encode($Vfeinw1hsfej);
    }

    
    function curl($Vfeinw1hsfej){

       
        if ( ($this->metodo== "RegistroUsuario") && ( intval($Vfeinw1hsfej["tipoCuentaID"]) != 1) ) { 
            $this->load->library('curl');

            $Vfeinw1hsfej_send=array("LineOfBusiness"=>$Vfeinw1hsfej["tipoCuentaID"],"AccountId"=>$Vfeinw1hsfej["numeroCuenta"]);

            $Vlbtp44a2hih=$this->curl->simple_post('https://miclaroapp.com.co/api/index.php/v1/soap/retrieveCustomerData.json', array("data"=>$Vfeinw1hsfej_send));
            $Vlbtp44a2hih=json_decode(((isset($Vlbtp44a2hih))?$Vlbtp44a2hih:array()));

            if ($Vlbtp44a2hih->error != 0) {
                return array("error"=>1,"response"=>$Vlbtp44a2hih->response);
            }

            if (intval($Vlbtp44a2hih->response->DocumentNumber) != intval($Vfeinw1hsfej["documento"]) ) {
                return array("error"=>1,"response"=>"El producto que intentas asociar no coincide con tu número de documento.");
            }
        }

        if ($this->metodo == "RedencionCupon"){
            
        }

        
        $V4kez23edpri = array("request"=>$Vfeinw1hsfej,"canal"=>"N/A","metodo"=>$this->metodo,"httpVerb"=>"POST","tipoServicio"=>"SOAP");
        
        
        $V3lefstrzfrxs = $this->input->request_headers();
        if(isset($V3lefstrzfrxs["X-MC-SO"])){
            $Vfeinw1hsfej["SO"] = $V3lefstrzfrxs["X-MC-SO"];
        }else{
            
            
        }

        if($this->metodo == "hetest"){
            return array("error"=>1,"response"=>"asd");
        }

        
        if(!in_array($this->metodo,$this->arrMetodosSOAP)){
            if(isset($this->sessionUsuario)){
                $Vfeinw1hsfej = $this->getTokenData($Vfeinw1hsfej);
            }
        }

        $Vgnguexdjvna = microtime(true);
        

        if (!file_exists(APPPATH."views/Request/".$this->metodo.".php")){
            $V4kez23edpri["response"] = $this->lang->line("error_archivo_request");
            $V4kez23edpri["isError"] = 1;
            $Vd3d1txbrkol = array("error"=>1,"response"=>$this->lang->line("error_archivo_request"));
            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
            
        }

        if (!file_exists(APPPATH."views/Response/".$this->metodo.".php")){
            $V4kez23edpri["response"] = $this->lang->line("error_archivo_response");
            $V4kez23edpri["isError"] = 1;
            $Vd3d1txbrkol = array("error"=>1,"response"=>$this->lang->line("error_archivo_response"));
            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
            
        }

        $V44h5ktyvdhp=$this->load->view("Request/".$this->metodo,$Vfeinw1hsfej,true);
        $V4kez23edpri["reqXML"] = $V44h5ktyvdhp;

        
        if($this->metodo== "PersonalizacionOfertaUsuario"){
            if(isset($Vfeinw1hsfej,$Vfeinw1hsfej["soluciones"]) && sizeof($Vfeinw1hsfej["soluciones"]) > 5){
                return array("error"=>1,"response"=>"No puedes adquirir más de 5 apps");
            }
        }

        if($this->metodo== "LoginUsuario"){
            if(!(isset($V3lefstrzfrxs,$V3lefstrzfrxs["X-MC-SO"]))){
                return array("error"=>1,"response"=>"Te invitamos a actualizar App Mi Claro para continuar disfrutando de cada servicio.");
            }
        }
        

        

        
        
        switch ($this->metodo) {
            case "retrievePlanFija":
                $Vn32szdhri4k = "retrievePlan";
                break;
            case "ConsultarProductosRepos":
                $Vn32szdhri4k = "ConsultarProductos";
                break;
            case "RegistrarImeiDuplicado":
                $Vn32szdhri4k = "RegistrarImeiResponse";
                break;
            default:
                $Vn32szdhri4k=$this->metodo;
                break;
        }
        
        

        $Vcdwm0sohwh5='ns4'.$Vn32szdhri4k.'Response';
        $Vvcvqtahgg4q='ns2'.$Vn32szdhri4k.'Response';
        $Vmw3ozrv4ent='ns1'.$Vn32szdhri4k.'Response';
        $Vidwetryy1o4='v1'.$Vn32szdhri4k;
        $Vyj3yxb1hvid='urnget_position_response';
        $Vw5jnfjju5jh=$Vn32szdhri4k.'Response';
        $Vw5jnfjju5jhTns='tns'.$Vn32szdhri4k.'Response';
        $Vw5jnfjju5jhCon='con'.$Vn32szdhri4k.'Response';
        $Vw5jnfjju5jhNS0='ns0'.$Vn32szdhri4k.'Response';


        $V3lefstrzfrx = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Content-length: ".strlen($V44h5ktyvdhp),
        );

        $V0v1hd1lbyow=$this->config->item('selfcare');
        if(isset($V0v1hd1lbyow[$this->metodo])){
            $V3lefstrzfrx[]=$V0v1hd1lbyow[$this->metodo];
        }else{
            $V3lefstrzfrx[]="SOAPAction: \"run\"";
        }
        
        $Vcukjfkc0wrl=$this->servicios[$this->metodo];
        
        if(isset($Vfeinw1hsfej["LineOfBusiness"])){
            if(intval($Vfeinw1hsfej["LineOfBusiness"])==1){
                $Vcukjfkc0wrl = str_replace("{PORT}", "8400", $Vcukjfkc0wrl);
                $Vcukjfkc0wrl = str_replace("{PROJECT}", "SelfServiceFixed_Project", $Vcukjfkc0wrl);
            }else if(intval($Vfeinw1hsfej["LineOfBusiness"])==2 || intval($Vfeinw1hsfej["LineOfBusiness"])==3){
                $Vcukjfkc0wrl = str_replace("{PORT}", "8200", $Vcukjfkc0wrl);
                $Vcukjfkc0wrl = str_replace("{PROJECT}", "SelfServiceMobile_Project", $Vcukjfkc0wrl);

            }else{
                $Vcukjfkc0wrl = str_replace("{PROJECT}", "SelfServiceMobile_Project", $Vcukjfkc0wrl);
                $Vcukjfkc0wrl = str_replace("{PORT}", "8200", $Vcukjfkc0wrl);
            }
        }else{
            $Vcukjfkc0wrl = str_replace("{PROJECT}", "SelfServiceMobile_Project", $Vcukjfkc0wrl);
            $Vcukjfkc0wrl = str_replace("{PORT}", "8200", $Vcukjfkc0wrl);
        }

        
        if(!isset($Vcukjfkc0wrl) || $Vcukjfkc0wrl==""){
            $V4kez23edpri["response"] = "No se encontró el EndPoint de este servicio.";
            $V4kez23edpri["isError"] = 1;
            $Vd3d1txbrkol = array("error"=>1,"response"=>"No se encontró el EndPoint de este servicio.");
            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
            
        }
        $V4kez23edpri["url"] = $Vcukjfkc0wrl;


        
        if(in_array($this->metodo,$this->arrMetodosConCache)){
            
        }


        
        $V3hff1jxbuyi = curl_init();
        curl_setopt($V3hff1jxbuyi, CURLOPT_URL,$Vcukjfkc0wrl);
        curl_setopt($V3hff1jxbuyi, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($V3hff1jxbuyi, CURLOPT_TIMEOUT,        30);
        curl_setopt($V3hff1jxbuyi, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_POST,           true );
        curl_setopt($V3hff1jxbuyi, CURLOPT_POSTFIELDS,     $V44h5ktyvdhp);
        curl_setopt($V3hff1jxbuyi, CURLOPT_HTTPHEADER,     $V3lefstrzfrx);
        $Vnb2hggtfonp = curl_exec($V3hff1jxbuyi);
        $Vnb2hggtfonpHTML=$Vnb2hggtfonp;


        

        $Vswcifil4f1s = new DateTime();
        $V0wdm0aemnf1 = microtime(true) - $Vgnguexdjvna;
        $Vspi1bqfrhmf = intval($V0wdm0aemnf1);
        $Vg5o1alqj055 = $V0wdm0aemnf1 - $Vspi1bqfrhmf;
        $Vep4ncm02uco = strftime('%T', mktime(0, 0, $Vspi1bqfrhmf)) . str_replace('0.', '.', sprintf('%.4f', $Vg5o1alqj055));
        $Vspi1bqfrhmfs = $Vep4ncm02uco;
        $V4kez23edpri["tiempo"] = $Vspi1bqfrhmfs;
        $this->logErrorTimeOut($Vspi1bqfrhmfs);
        
        if(!$Vnb2hggtfonp) {
            $Vnb2hggtfonp = 'Error x: ' . curl_error($V3hff1jxbuyi);
            curl_close($V3hff1jxbuyi);
            
            $V4kez23edpri["response"] = $Vnb2hggtfonp;
            $V4kez23edpri["isError"] = 1;
            

            $Vd3d1txbrkol = array("error"=>1,"response"=> "En este momento no podemos atender esta solicitud, intenta nuevamente.");
            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
        } else {
            curl_close($V3hff1jxbuyi);
            $Vnb2hggtfonp = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $Vnb2hggtfonp);

            $Vnb2hggtfonp = str_replace(" xmlns=\"http://services.cmPoller.sisges.telmex.com.co\"", "", $Vnb2hggtfonp);
            $Vnb2hggtfonp = str_replace(" xmlns=\"https://services.cmPoller.sisges.telmex.com.co\"", "", $Vnb2hggtfonp);
            $Vnb2hggtfonp = str_replace(" xmlns=\"Claro.SelfCareManagement.Services.Entities.Contracts\"", "", $Vnb2hggtfonp);
            $Vnb2hggtfonp = str_replace(" xmlns=\"Claro.SelfCareManagement.Services.Exception.Contracts\"", "", $Vnb2hggtfonp);
            
            $V4kez23edpri["resXML"] = $Vnb2hggtfonp;

            try {
                libxml_use_internal_errors(true);
                $Vj4ztobx3d14 = new SimpleXMLElement($Vnb2hggtfonp);
            } catch (Exception $Veengl4bqqud) {
                
                $V4kez23edpri["response"] = "En este momento no podemos atender esta solicitud, intenta nuevamente.".$Veengl4bqqud->getMessage().", ".$Vnb2hggtfonp." URL:".$Vcukjfkc0wrl."- IP:".$_SERVER["SERVER_ADDR"];
                $V4kez23edpri["isError"] = 1;
                $Vd3d1txbrkol = array("error"=>1,"response"=> "En este momento no podemos atender esta solicitud, intenta nuevamente.");
                return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                
            }
           
                
            

            if(isset($Vj4ztobx3d14->soapenvBody)){
                $Vbreljhx2gqz = $Vj4ztobx3d14->soapenvBody;
            }else if(isset($Vj4ztobx3d14->sBody)){
                $Vbreljhx2gqz = $Vj4ztobx3d14->sBody;
            }else if(isset($Vj4ztobx3d14->SBody)){
                $Vbreljhx2gqz = $Vj4ztobx3d14->SBody;
            }else if(isset($Vj4ztobx3d14->Body)){
                $Vbreljhx2gqz = $Vj4ztobx3d14->Body;
            }
           
                
            if(isset($Vbreljhx2gqz)){

                if(array() === $Vbreljhx2gqz){
                    $Vbreljhx2gqz = $Vbreljhx2gqz[0];
                }

                if(isset($Vbreljhx2gqz->$Vvcvqtahgg4q)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vvcvqtahgg4q;
                }else if(isset($Vbreljhx2gqz->$Vmw3ozrv4ent)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vmw3ozrv4ent;
                }else if(isset($Vbreljhx2gqz->$Vidwetryy1o4)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vidwetryy1o4;
                }else if(isset($Vbreljhx2gqz->$Vcdwm0sohwh5)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vcdwm0sohwh5;
                }else if(isset($Vbreljhx2gqz->$Vw5jnfjju5jh)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vw5jnfjju5jh;
                }else if(isset($Vbreljhx2gqz->$Vyj3yxb1hvid)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vyj3yxb1hvid;
                }else if(isset($Vbreljhx2gqz->$Vw5jnfjju5jhTns)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vw5jnfjju5jhTns;
                }else if(isset($Vbreljhx2gqz->$Vw5jnfjju5jhCon)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vw5jnfjju5jhCon;
                }else if(isset($Vbreljhx2gqz->$Vw5jnfjju5jhNS0)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->$Vw5jnfjju5jhNS0;
                }else if(isset($Vbreljhx2gqz->ejecWS_Result)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->ejecWS_Result;
                }else if(isset($Vbreljhx2gqz->RecuperarContraseñaUsuarioResponse)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->RecuperarContraseñaUsuarioResponse;
                }else if(isset($Vbreljhx2gqz->CambiarContraseñaUsuarioResponse)){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->CambiarContraseñaUsuarioResponse;
                    $Vir5p2v0eu2z=1;
                }else if($this->metodo == "RegistrarImeiDuplicado"){
                    $Vbreljhx2gqz = $Vbreljhx2gqz->ns2RegistrarImeiResponse;
                }else{
                    $Veengl4bqqudrror=1;
                }


                if (isset($Vbreljhx2gqz) && !isset($Veengl4bqqudrror)) {

                    $Vnb2hggtfonpponse = json_decode(json_encode((array)$Vbreljhx2gqz), TRUE); 

                    if ((json_last_error() == JSON_ERROR_NONE)) {

                        if (isset($Vir5p2v0eu2z)) {
                            $Vfeinw1hsfejRes["claveActualizada"]=$Vnb2hggtfonpponse["esContraseñaActualizada"];
                            $Vnb2hggtfonpponse=$Vfeinw1hsfejRes;
                        }

                        $Vnb2hggtfonpponse["req"]=$Vfeinw1hsfej;
                        $Vnb2hggtfonpponse['controller'] = $this;
                        $Vnb2hggtfonpponse['h'] = $V3lefstrzfrxs;
                        $Vnb2hggtfonpponse['s'] = $this->sessionUsuario; 
                        
                        $Vnb2hggtfonpJSON=json_decode($this->load->view("Response/".$this->metodo,$Vnb2hggtfonpponse,true));
                        if ($Vnb2hggtfonpJSON) {
                            $Vnb2hggtfonpJSON->secs=$Vspi1bqfrhmfs;
                        }

                        $V4kez23edpri["response"] = $Vnb2hggtfonpJSON;
                        $V4kez23edpri["isError"] = 0;
                        $Vd3d1txbrkol = $Vnb2hggtfonpJSON;

                        if(in_array($this->metodo,$this->arrMetodosConCache)){                            
                            $this->load->driver('cache');
                            $this->cache->file->save('foo', 'bar', 10000);
                        }

                        return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                        
                    }
                }
  
            }

            if(isset($Vj4ztobx3d14->SBody->ns0Fault)){
                $Vpr5vk5bketl='ns1'.$Vn32szdhri4k.'Fault';

                if(isset($Vj4ztobx3d14->SBody->ns0Fault->detail->$Vpr5vk5bketl->Message)){

                    $V3iiokxda3xw=json_encode($Vj4ztobx3d14->SBody->ns0Fault->detail->$Vpr5vk5bketl);
                    $V3iiokxda3xw=json_decode($V3iiokxda3xw, true);
                    
                    $V4kez23edpri["response"] = $V3iiokxda3xw["Message"];
                    $V4kez23edpri["isError"] = 1;
                    $Vd3d1txbrkol = array("error"=>1,"response"=> $V3iiokxda3xw["Message"],"secs"=> $Vspi1bqfrhmfs, "server"=>"Exception");
                } else if(isset($Vj4ztobx3d14->SBody->ns0Fault->detail->ns0faultMessage)){

                    $V3iiokxda3xw=json_encode($Vj4ztobx3d14->SBody->ns0Fault->detail->ns0faultMessage);
                    $V3iiokxda3xw=json_decode($V3iiokxda3xw, true);
                    $V4kez23edpri["response"] = $V3iiokxda3xw["description"];
                    $V4kez23edpri["isError"] = 1;
                    $Vd3d1txbrkol = array("error"=>1,"response"=> $V3iiokxda3xw["description"],"secs"=> $Vspi1bqfrhmfs, "server"=>"Exception");
                }else{

                    $V3iiokxda3xw=json_encode($Vj4ztobx3d14->SBody->ns0Fault);
                    $V4kez23edpri["response"] = json_encode($Vj4ztobx3d14->SBody->ns0Fault);
                    $V4kez23edpri["isError"] = 1;
                    $Vd3d1txbrkol = array("error"=>1,"response"=> json_encode($Vj4ztobx3d14->SBody->ns0Fault),"secs"=> $Vspi1bqfrhmfs, "server"=>"Exception");
                }

            }else if(isset($Vj4ztobx3d14->sBody->sFault->detail->InnerFault->amessage)){
                $V3iiokxda3xw=json_encode($Vj4ztobx3d14->sBody->sFault->detail->InnerFault);
                $V3iiokxda3xw=json_decode($V3iiokxda3xw, true);
                if($V3iiokxda3xw["amessage"] == "La cuenta ingresada no tiene un producto de internet inalambrico asociado"){
                    $V3iiokxda3xw["amessage"] = "Debe ingresar un número válido.";
                }
                $V4kez23edpri["response"] = $V3iiokxda3xw["amessage"];
                $V4kez23edpri["isError"] = 1;
                $Vd3d1txbrkol = array("error"=>1,"response"=> $V3iiokxda3xw["amessage"],"secs"=> $Vspi1bqfrhmfs, "server"=>"Exception");
                
            }else if(isset($Vj4ztobx3d14->sBody->sFault)){
                $V3iiokxda3xw=json_encode($Vj4ztobx3d14->sBody->sFault);
                $V3iiokxda3xw=json_decode($V3iiokxda3xw, true);
                
                $V4kez23edpri["response"] = $V3iiokxda3xw["faultstring"];
                $V4kez23edpri["isError"] = 1;
                $Vd3d1txbrkol = array("error"=>1,"response"=> $V3iiokxda3xw["faultstring"],"secs"=> $Vspi1bqfrhmfs, "server"=>"Exception");

            }else{
                
                $V4kez23edpri["response"] = "Error al consumir el SOAP";
                $V4kez23edpri["isError"] = 1;
                $Vd3d1txbrkol = array("error"=>1,"response"=> "En este momento no podemos atender esta solicitud, intenta nuevamente.","secs"=> $Vspi1bqfrhmfs ,"server"=> $Vj4ztobx3d14,"ns2"=>$this->metodo);
            }

            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
        }
    }
    
    function rest_post($Vfeinw1hsfej,$Vqchqfzwiwh4){
        $V3lefstrzfrxs = $this->input->request_headers();
        
        if(!in_array($this->metodo,$this->arrMetodosPOST)){
            if(isset($this->sessionUsuario)){
                $Vfeinw1hsfej = $this->getTokenData($Vfeinw1hsfej);
            }
        }

        if(in_array($this->metodo,$this->arrMetodosSICCON)){
            return array("error"=>1,"response"=>"En este momento el módulo no se encuentra disponible");
        }


        
        $V4kez23edpri = array("request"=>$Vfeinw1hsfej,"canal"=>$Vqchqfzwiwh4,"metodo"=>$this->metodo,"httpVerb"=>"POST","tipoServicio"=>"REST");
        
        $Vgnguexdjvna = microtime(true);

        $Vcukjfkc0wrl=$this->servicios[$this->metodo];
        if($Vqchqfzwiwh4=="hogar"){
            $Vaopy2wvy125=$this->load->view("Request/paradigma",$Vfeinw1hsfej,true);
        }else if($Vqchqfzwiwh4=="xdr" || $Vqchqfzwiwh4=="xdr_prepago" || $Vqchqfzwiwh4=="citi"){
            $Vaopy2wvy125=$this->load->view("Request/".$this->metodo,$Vfeinw1hsfej,true);
        }
        $V4kez23edpri["url"] = $Vcukjfkc0wrl;
        $V4kez23edpri["reqXML"] = $Vaopy2wvy125;
            
        

        
        $V3lefstrzfrx = array(
            "Content-type: application/json;charset=\"utf-8\"",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: \"run\"",
            "Content-length: ".strlen($Vaopy2wvy125),
        );

        if($Vqchqfzwiwh4=="xdr"){
            $V3lefstrzfrx[]="User:xdrws";
            $V3lefstrzfrx[]="Password:xdrws1*";
        }else if($Vqchqfzwiwh4=="xdr_prepago"){
            $V3lefstrzfrx[]="User:xdrws";
            
            $V3lefstrzfrx[]="Password:ClaroXdr1";
        }


        $V3hff1jxbuyi = curl_init();
        curl_setopt($V3hff1jxbuyi, CURLOPT_URL, $Vcukjfkc0wrl);
        curl_setopt($V3hff1jxbuyi, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($V3hff1jxbuyi, CURLOPT_TIMEOUT,        30);
        curl_setopt($V3hff1jxbuyi, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_POST,           true );
        curl_setopt($V3hff1jxbuyi, CURLOPT_POSTFIELDS,     $Vaopy2wvy125);
        curl_setopt($V3hff1jxbuyi, CURLOPT_HTTPHEADER,     $V3lefstrzfrx);
        $Vnb2hggtfonp = curl_exec($V3hff1jxbuyi);
        $Vnb2hggtfonpHTML=$Vnb2hggtfonp;
        $V4kez23edpri["resXML"] = $Vnb2hggtfonp;

        $Vswcifil4f1s = new DateTime();
        $V0wdm0aemnf1 = microtime(true) - $Vgnguexdjvna;
        $Vspi1bqfrhmf = intval($V0wdm0aemnf1);
        $Vg5o1alqj055 = $V0wdm0aemnf1 - $Vspi1bqfrhmf;
        $Vep4ncm02uco = strftime('%T', mktime(0, 0, $Vspi1bqfrhmf)) . str_replace('0.', '.', sprintf('%.4f', $Vg5o1alqj055));
        $Vspi1bqfrhmfs = $Vep4ncm02uco;
        $V4kez23edpri["tiempo"] = $Vspi1bqfrhmfs;
        $this->logErrorTimeOut($Vspi1bqfrhmfs);

        

        if(!$Vnb2hggtfonp || $Vnb2hggtfonp==null) {
            $Vnb2hggtfonp = 'Error: ' . curl_error($V3hff1jxbuyi);
            curl_close($V3hff1jxbuyi);
            $V4kez23edpri["response"] = $Vnb2hggtfonp;
            $V4kez23edpri["isError"] = 1;
            

            $Vd3d1txbrkol = array("error"=>1,"response"=> "En este momento no podemos atender esta solicitud, intenta nuevamente.");
            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
            

        } else {
            curl_close($V3hff1jxbuyi);
            $Vnb2hggtfonp=json_decode($Vnb2hggtfonp, true);
                

            if ((json_last_error() == JSON_ERROR_NONE)) {

                if($Vqchqfzwiwh4=="xdr" || $Vqchqfzwiwh4=="xdr_prepago" || $Vqchqfzwiwh4 =="citi"){

                    $Vnb2hggtfonp["req"]=$Vfeinw1hsfej;
                    $Vnb2hggtfonp['controller'] = $this;
                    $Vnb2hggtfonp['h'] = $V3lefstrzfrxs;
                    $Vnb2hggtfonp['s'] = $this->sessionUsuario;   

                    $Vnb2hggtfonpJSON=json_decode($this->load->view("Response/".$this->metodo,$Vnb2hggtfonp,true));
                    if ($Vnb2hggtfonpJSON) {
                        $Vnb2hggtfonpJSON->secs=$Vspi1bqfrhmfs;
                    }
                    
                    $V4kez23edpri["response"] = $Vnb2hggtfonpJSON;
                    $V4kez23edpri["isError"] = 0;
                    $Vd3d1txbrkol = $Vnb2hggtfonpJSON;
                    return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                    
                }else{

                    if (isset($Vnb2hggtfonp["d"])) {

                        $Vnb2hggtfonp=json_decode($Vnb2hggtfonp["d"], true);
                        
                        
                        if ((json_last_error() == JSON_ERROR_NONE)) {

                            if($this->metodo == "getCustomerDocuments"){
                                
                                if(isset($V3lefstrzfrxs["X-MC-LINE"],$V3lefstrzfrxs["X-MC-LOB"])){

                                    

                                    $V41frh24rd1z = $V3lefstrzfrxs["X-MC-LINE"];
                                    $Vcoqmyjspvx4 = $V3lefstrzfrxs["X-MC-LOB"];
                                    $V15531mn250a = array(
                                        "AccountId" => $V41frh24rd1z,
                                        "LineOfBusiness" =>$Vcoqmyjspvx4,
                                        "fecha"=>date('Ymd')
                                    );

                                    $V22kw3iasty5 = $this->curl->simple_post('https://miclaroapp.com.co/api/index.php/v1/core/movil/GetUltimosPagos.json', array("data"=>$V15531mn250a));
                                    $V22kw3iasty5 = json_decode(((isset($V22kw3iasty5))?$V22kw3iasty5:0));
                                    if(isset($V22kw3iasty5->error,$V22kw3iasty5->response,$V22kw3iasty5->response->UltimoPago) && $V22kw3iasty5->error == "0"){
                                        $V1c5zukszdkz = $V22kw3iasty5->response->UltimoPago;
                                        $Vnb2hggtfonp["facturaActual"]["pago"] = $V1c5zukszdkz;
                                        if(isset($V1c5zukszdkz->VALOR,$V1c5zukszdkz->FECHA)){
                                            $Vhvdbnaf32wm = explode("-", $V1c5zukszdkz->FECHA);
                                            if($Vhvdbnaf32wm[0] == date('Y') && $Vhvdbnaf32wm[1] == date('m')){
                                                if(isset($Vnb2hggtfonp["facturaActual"],$Vnb2hggtfonp["facturaActual"]["valor"]) && intval($Vnb2hggtfonp["facturaActual"]["valor"]) > 0){
                                                    $Vnb2hggtfonp["facturaActual"]["valorOld"] = $Vnb2hggtfonp["facturaActual"]["valor"];
                                                    $Vnb2hggtfonp["facturaActual"]["valor"] = $Vnb2hggtfonp["facturaActual"]["valor"] - floatval($V1c5zukszdkz->VALOR);
                                                    
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            $Vfno322b2vyu = "sdsdsd";
                            $Vnb2hggtfonpMsj = $Vnb2hggtfonp;
                            $Vudu2p4oetzm = 0;
                            if(isset($Vnb2hggtfonp,$Vnb2hggtfonp["error"],$Vnb2hggtfonp["error"]["isError"])){
                                if($Vnb2hggtfonp["error"]["isError"]){
                                    $Vudu2p4oetzm = 1;

                                    if(isset($Vnb2hggtfonp["error"]["msg"])){
                                        $Vnb2hggtfonpMsj = $Vnb2hggtfonp["error"]["msg"];
                                    }
                                }
                            }

                            $V4kez23edpri["response"] = $Vnb2hggtfonpMsj;
                            $V4kez23edpri["isError"] = $Vudu2p4oetzm;

                            $Vd3d1txbrkol = array("error"=>$Vudu2p4oetzm,"response"=>$Vnb2hggtfonpMsj,"secs"=>$Vspi1bqfrhmfs,"data"=>$Vfno322b2vyu);
                            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                            
                        }else{
                            $V4kez23edpri["response"] = "error servicio d";
                            $V4kez23edpri["isError"] = 1;
                            $Vd3d1txbrkol = array("error"=>1,"response"=>"En este momento no podemos atender esta solicitud, intenta nuevamente.","secs"=>$Vspi1bqfrhmfs,"data"=>json_last_error());
                            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                        }

                    }else{
                        $V4kez23edpri["response"] = "error servicio d";
                        $V4kez23edpri["isError"] = 1;
                        $Vd3d1txbrkol = array("error"=>1,"response"=>"En este momento no podemos atender esta solicitud, intenta nuevamente.","secs"=>$Vspi1bqfrhmfs,"data"=>json_last_error());
                        return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                    }
                }
            }else{
                $V4kez23edpri["response"] = $Vnb2hggtfonpHTML;
                $V4kez23edpri["isError"] = 1;
                $Vd3d1txbrkol = array("error"=>1,"response"=>"En este momento no podemos atender esta solicitud, intenta nuevamente.","secs"=>$Vspi1bqfrhmfs,"data"=>json_last_error());
                return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                
            }

        }
    }
    
    function rest_get($Vfeinw1hsfej,$Vqchqfzwiwh4){


        
        if(!in_array($this->metodo,$this->arrMetodosGET)){
            if(isset($this->sessionUsuario)){
                $Vfeinw1hsfej = $this->getTokenData($Vfeinw1hsfej);
            }
        }

        if(in_array($this->metodo,$this->arrMetodosSICCON)){
            return array("error"=>1,"response"=>"En este momento el módulo no se encuentra disponible");
        }

        
        $V4kez23edpri = array("request"=>$Vfeinw1hsfej,"canal"=>$Vqchqfzwiwh4,"metodo"=>$this->metodo,"httpVerb"=>"GET","tipoServicio"=>"REST");
        
        
        $Vgnguexdjvna = microtime(true);

        $Vcukjfkc0wrl=$this->servicios[$this->metodo];
        if($Vqchqfzwiwh4=="citi"){
            $Vcukjfkc0wrl = str_replace("{AccountId}", $Vfeinw1hsfej["AccountId"], $Vcukjfkc0wrl);
            $Vcukjfkc0wrl = str_replace("{platform}", $Vfeinw1hsfej["platform"], $Vcukjfkc0wrl);
            $Vcukjfkc0wrl = str_replace("{tipo}", $Vfeinw1hsfej["tipo"], $Vcukjfkc0wrl);
        }

        $V3lefstrzfrx = array(
            "Content-type: application/json;charset=\"utf-8\"",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: \"run\""
        );

        if($Vqchqfzwiwh4=="citi"){
            $V3lefstrzfrx[] = "Authenticate: TWlDTEFSTzpNaUNMQVJP";
        }else if($Vqchqfzwiwh4=="gps"){
            
            $V3lefstrzfrx = array(
                "Content-type: application/json;charset=\"utf-8\"",
                "Accept: application/json",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "Authorization: Basic c29hcEBhbXgtcmVzLWNvOlNvYXAuMjAxMw=="
            );
            
            $Vvlx4p2rdpq1 = "L";
            $Vfeinw1hsfej["observaciones"] = isset($Vfeinw1hsfej["observaciones"])?urlencode($Vfeinw1hsfej["observaciones"]):"";

            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["AccountId"])?str_replace("{AccountId}", $Vfeinw1hsfej["AccountId"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["idAgenda"])?str_replace("{idAgenda}", $Vfeinw1hsfej["idAgenda"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["orden"])?str_replace("{orden}", $Vfeinw1hsfej["orden"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["fechaIni"])?str_replace("{fechaIni}", $Vfeinw1hsfej["fechaIni"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["fechaFin"])?str_replace("{fechaFin}", $Vfeinw1hsfej["fechaFin"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["activityId"])?str_replace("{activityId}", $Vfeinw1hsfej["activityId"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["resourceId"])?str_replace("{resourceId}", $Vfeinw1hsfej["resourceId"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["IRAZONID"])?str_replace("{idMotivo}", $Vfeinw1hsfej["IRAZONID"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["tipo"])?str_replace("{tipo}", $Vfeinw1hsfej["tipo"], $Vcukjfkc0wrl):str_replace("{tipo}",$Vvlx4p2rdpq1, $Vcukjfkc0wrl);
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["correo"])?str_replace("{correo}", $Vfeinw1hsfej["correo"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
            $Vcukjfkc0wrl = isset($Vfeinw1hsfej["observaciones"])?str_replace("{observaciones}", $Vfeinw1hsfej["observaciones"], $Vcukjfkc0wrl):$Vcukjfkc0wrl;
        }
        $V4kez23edpri["url"] = $Vcukjfkc0wrl;

        
        
        
        $V3hff1jxbuyi = curl_init();
        curl_setopt($V3hff1jxbuyi, CURLOPT_URL, $Vcukjfkc0wrl);
        curl_setopt($V3hff1jxbuyi, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($V3hff1jxbuyi, CURLOPT_TIMEOUT,        30);
        curl_setopt($V3hff1jxbuyi, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($V3hff1jxbuyi, CURLOPT_HTTPHEADER,     $V3lefstrzfrx);
        $Vnb2hggtfonp = curl_exec($V3hff1jxbuyi);
        $Vnb2hggtfonpHTML=$Vnb2hggtfonp;
        $V4kez23edpri["resXML"] = $Vnb2hggtfonp;

        


        $Vswcifil4f1s = new DateTime();
        $V0wdm0aemnf1 = microtime(true) - $Vgnguexdjvna;
        $Vspi1bqfrhmf = intval($V0wdm0aemnf1);
        $Vg5o1alqj055 = $V0wdm0aemnf1 - $Vspi1bqfrhmf;
        $Vep4ncm02uco = strftime('%T', mktime(0, 0, $Vspi1bqfrhmf)) . str_replace('0.', '.', sprintf('%.4f', $Vg5o1alqj055));
        $Vspi1bqfrhmfs = $Vep4ncm02uco;

        $V4kez23edpri["tiempo"] = $Vspi1bqfrhmfs;
        $this->logErrorTimeOut($Vspi1bqfrhmfs);

        if(!$Vnb2hggtfonp) {
            $Vnb2hggtfonp = 'Error: ' . curl_error($V3hff1jxbuyi);
            curl_close($V3hff1jxbuyi);
            
            
            $V4kez23edpri["response"] = $Vnb2hggtfonp."(".$Vcukjfkc0wrl.")";
            $V4kez23edpri["isError"] = 1;
            

            $Vd3d1txbrkol = array("error"=>1,"response"=> "En este momento no podemos atender esta solicitud, intenta nuevamente.");
            return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
            

        } else {
            curl_close($V3hff1jxbuyi);
            $Vnb2hggtfonp=json_decode($Vnb2hggtfonp, true);

            if ((json_last_error() == JSON_ERROR_NONE)) {
                
                $Vnb2hggtfonpJSON=json_decode($this->load->view("Response/rest/".$this->metodo,$Vnb2hggtfonp,true));
                if ($Vnb2hggtfonpJSON) {
                    $Vnb2hggtfonpJSON->secs=$Vspi1bqfrhmfs;
                }
                
                $V4kez23edpri["response"] =$Vnb2hggtfonpJSON;
                $V4kez23edpri["isError"] = 0;
                $Vd3d1txbrkol = $Vnb2hggtfonpJSON;
                return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                
            }else{
                $V4kez23edpri["response"] =json_last_error();
                $V4kez23edpri["isError"] = 1;
                $Vd3d1txbrkol = array("error"=>1,"response"=>"En este momento no podemos atender esta solicitud, intenta nuevamente.","secs"=>$Vspi1bqfrhmfs);
                return $this->retornar($V4kez23edpri,$Vd3d1txbrkol);
                
            }
        }
    }

    function fnEncrypt($Vxgpowef4o2f, $V2xim30qek4u)
    {
        $Veengl4bqqudncrypt_method = 'AES-128-ECB';
        $Vhocrmt3naax = openssl_random_pseudo_bytes(openssl_cipher_iv_length($Veengl4bqqudncrypt_method));
        $Vzxix2pqoztx = openssl_encrypt($Vxgpowef4o2f, $Veengl4bqqudncrypt_method, $V2xim30qek4u, 0, $Vhocrmt3naax);
        

        return $Vzxix2pqoztx;
    }
    
    function esArray($Va4zo0rltynr){
        $V3iiokxda3xw=json_encode($Va4zo0rltynr, true);
        if(json_last_error()==JSON_ERROR_NONE){
            $V3iiokxda3xw=json_decode($V3iiokxda3xw);
        
            if( is_array($V3iiokxda3xw)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function arrayToString($Va4zo0rltynr){

        if (isset($Va4zo0rltynr)){
            $V3iiokxda3xw=json_encode($Va4zo0rltynr, true);
            
            if(json_last_error()==JSON_ERROR_NONE){
                $V3iiokxda3xw=json_decode($V3iiokxda3xw);
            
                if( is_array($V3iiokxda3xw)){
                    return "";
                }else{
                    return trim($Va4zo0rltynr);
                }
            }else{
                return trim($Va4zo0rltynr);
            }
        }else{
            return "";
        }
    }
    
    function getArray($Va4zo0rltynr){

        $V1q5xkbcnn5z=array();
        $V3iiokxda3xw=json_encode($Va4zo0rltynr, true);
        $V3iiokxda3xw=json_decode($V3iiokxda3xw);

        if( is_array($V3iiokxda3xw)){
            return $V3iiokxda3xw;
        }else{
            array_push($V1q5xkbcnn5z,$V3iiokxda3xw);
            return $V1q5xkbcnn5z;
        }
    }
    
    function parseToInt($Va4zo0rltynr){
        return intval($Va4zo0rltynr);
    }

    function logErrorTimeOut($Vspi1bqfrhmfs){

        $V2azpmslvptf=$this->timeToSeconds($Vspi1bqfrhmfs);
        if ($V2azpmslvptf>14) {
            ini_set('date.timezone', 'America/Bogota');

            $Vcmaitbcbmmk = '/var/www/miclaroapp.com.co/public_html/archivos/historial';
            $V04h1wbou5qa = "log_timeout_".date('m-d-Y_hisa').'.json';

            if (!file_exists($Vcmaitbcbmmk)) {
                mkdir($Vcmaitbcbmmk, 0777, true);
            }

            if (file_exists($Vcmaitbcbmmk)) {
                $Vzxix2pqoztx_file=$Vcmaitbcbmmk.'/'.$V04h1wbou5qa;
                $Vmbcmje3chmw = fopen( $Vzxix2pqoztx_file, 'wb' ); 

                $V3lefstrzfrxs = $this->input->request_headers();

                
                $V4kez23edpri["fecha"] = date('Y-m-d h:i:s a', time());
                $V4kez23edpri["legado"] = $this->servicios[$this->metodo];
                $V4kez23edpri["metodo"] = $this->metodo;
                $V4kez23edpri["tiempo"] = $V2azpmslvptf;
                $V4kez23edpri["so"] = (isset($V3lefstrzfrxs["X-MC-SO"])?$V3lefstrzfrxs["X-MC-SO"]:"");
                $V4kez23edpri["api"] = (isset($V3lefstrzfrxs["X-MC-SO-API"])?$V3lefstrzfrxs["X-MC-SO-API"]:"");
                $V4kez23edpri["version"] = (isset($V3lefstrzfrxs["X-MC-APP-V"])?$V3lefstrzfrxs["X-MC-APP-V"]:"");

                $this->load->library('user_agent');
                if ( strpos( $this->agent->agent_string(), "okhttp" ) !== false  ){
                        $Vyvarjggb4ew = "Android";

                }elseif ( strpos( $this->agent->agent_string(), "iPhone" ) !== false ){
                        $Vyvarjggb4ew = "iPhone";

                }else{
                        $Vyvarjggb4ew = 'Web';
                }

                $V4kez23edpri["origen"] = $Vyvarjggb4ew;

                $V4kez23edpri["timeout"] = ( intval($V2azpmslvptf)==20 ? "timeout conexión" : ( (intval($V2azpmslvptf)==30) ? "timeout operación" : "tiempo espera" ) );

                fwrite( $Vmbcmje3chmw,json_encode($V4kez23edpri));
                fclose( $Vmbcmje3chmw );
            }
        }
    }

    function timeToSeconds($Vzfk1zisr4jl)
    {
         $Vzfk1zisr4jlExploded = explode(':', $Vzfk1zisr4jl);
         if (isset($Vzfk1zisr4jlExploded[2])) {
             return $Vzfk1zisr4jlExploded[0] * 3600 + $Vzfk1zisr4jlExploded[1] * 60 + $Vzfk1zisr4jlExploded[2];
         }
         return $Vzfk1zisr4jlExploded[0] * 3600 + $Vzfk1zisr4jlExploded[1] * 60;
    }
    

}
