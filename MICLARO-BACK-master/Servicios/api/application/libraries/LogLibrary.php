<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogLibrary {

        protected $Vgw3d0qe3dgd;

        public function __construct()
        {   
            $this->CI =& get_instance();
            
        }

        public function save_in_db($V4kez23edpri){

            $this->CI->load->database();
            
            $V4kez23edpri = $this->workAroundLogs($V4kez23edpri,true);

            $Vdseofdfy0di = "(metodo,httpVerb,tipoServicio,canal,request,response,url,tiempo,isError,reqXML,resXML,Cuenta,Correo,Seccion)";
            $Vdseofdfy0diErr = "(metodo,httpVerb,tipoServicio,canal,request,response,url,tiempo,isError,Cuenta,Correo,Seccion)";

            $Va4zo0rltynr = "('".$V4kez23edpri["metodo"]."','".$V4kez23edpri["httpVerb"]."','".$V4kez23edpri["tipoServicio"]."','".$V4kez23edpri["canal"]."','".json_encode($V4kez23edpri["request"])."','".json_encode($V4kez23edpri["response"])."','".$V4kez23edpri["url"]."','".$V4kez23edpri["tiempo"]."',".$V4kez23edpri["isError"].",'".$V4kez23edpri["reqXMLDB"]."','".$V4kez23edpri["resXMLDB"]."','".$V4kez23edpri["linea"]."','".$V4kez23edpri["correo"]."','".$V4kez23edpri["segmento"]."')";
            $Va4zo0rltynrErr =  "('".$V4kez23edpri["metodo"]."','ERR','".$V4kez23edpri["tipoServicio"]."','".$V4kez23edpri["canal"]."','".json_encode($V4kez23edpri["request"])."','Error al intentar guardar el metodo.','".$V4kez23edpri["url"]."','".$V4kez23edpri["tiempo"]."',".$V4kez23edpri["isError"].",'".$V4kez23edpri["linea"]."','".$V4kez23edpri["correo"]."','".$V4kez23edpri["segmento"]."')";


            $Vdseofdfy0diSmall = "(linea,segmento,correo,metodo,isError,dispositivo,appVersion)";
            $Va4zo0rltynrSmall = "('".$V4kez23edpri["linea"]."','".$V4kez23edpri["segmento"]."','".$V4kez23edpri["correo"]."','".$V4kez23edpri["metodo"]."',".$V4kez23edpri["isError"].",'".$V4kez23edpri["dispositivo"]."','".$V4kez23edpri["appVersion"]."')";

            $Vdseofdfy0diPass = "(correo,pass)";
            $Va4zo0rltynrPass = "('".$V4kez23edpri["correo"]."','".json_encode($V4kez23edpri["request"])."')";

            if($V4kez23edpri["metodo"] == "LoginUsuario" && intval($V4kez23edpri["isError"] == 0) ) {
                
                
                $Vbyw4yqxvysu="insert into app_data_login ".$Vdseofdfy0diPass." values ".$Va4zo0rltynrPass;
            }
            $Vchic1l20ccg = "insert into app_data_small_log ".$Vdseofdfy0diSmall." values ".$Va4zo0rltynrSmall;
            
            
    
            $V2p4ezy5kran = "";
            try{
                if ( !$this->CI->db->simple_query($Vchic1l20ccg) ){
                    $V2p4ezy5kran = "1";
                }
            }catch(Exception $Veengl4bqqud){
                $V2p4ezy5kran = "1";
            }

            try{
                if ( !$this->CI->db->simple_query($Vbyw4yqxvysu) ){
                    $V2p4ezy5kran = "1";
                }
            }catch(Exception $Veengl4bqqud){
                $V2p4ezy5kran = "1";
            }
        }

         public function save_to_file($V4kez23edpri){
            
            $V4kez23edpri = $this->workAroundLogs($V4kez23edpri,false);

            try{
                $Vu0ysz5e2s3l = date("Y",strtotime("-5 hour"));
                $Vosrev0dmm3y = date("m",strtotime("-5 hour"));
                $Veoeds0ryrie = date("d",strtotime("-5 hour"));
                $Vb00j42bn41v = date("H_i_s",strtotime("-5 hour"));
                list($Vihn3dxycmfq, $Vspi1bqfrhmf) = explode(" ", microtime());

                $Vcmaitbcbmmk = '/var/www/miclaroapp.com.co/public_html/logs/'.$Vu0ysz5e2s3l.'/'.$Vosrev0dmm3y.'/'.$Veoeds0ryrie;
                
                $V04h1wbou5qa = $Vb00j42bn41v.".".$Vihn3dxycmfq."xx".$V4kez23edpri["metodo"]."xx".$V4kez23edpri["srv_req_id"]."xx".$V4kez23edpri["linea"].'.json';

                if (!file_exists($Vcmaitbcbmmk)) {
                    mkdir($Vcmaitbcbmmk, 0777, true);
                }

                if (file_exists($Vcmaitbcbmmk)) {
                    $Vo542s0ydvwz=$Vcmaitbcbmmk.'/'.$V04h1wbou5qa;
                    $Vmbcmje3chmw = fopen( $Vo542s0ydvwz, 'wb' ); 

                    $V4kez23edpri["request"] = json_encode($V4kez23edpri["request"]);
                    $V4kez23edpri["response"] = json_encode($V4kez23edpri["response"]);
                    
                    fwrite( $Vmbcmje3chmw,json_encode($V4kez23edpri));
                    fclose( $Vmbcmje3chmw );
                }
            }catch(Exception $Veengl4bqqud){
                $Vyotgbgs03ci = "";
            }
             
        }

        function workAroundLogs($V4kez23edpri,$Vna4w5m4mwgs){

            try{
                $Vuglyh4gwddb = array("metodo","httpVerb","tipoServicio","canal","request","response","url","tiempo","isError","reqXML","resXML","linea","segmento","correo");

                $V4kez23edpri["headers"] = $this->CI->input->request_headers();

                $V4kez23edpri["srv_nodo"] = isset($_SERVER["SERVER_ADDR"])?$_SERVER["SERVER_ADDR"]:'';
                $V4kez23edpri["srv_req_id"] = isset($_SERVER["UNIQUE_ID"])?$_SERVER["UNIQUE_ID"]:'999_999';
                $V4kez23edpri["http_origin"] = isset($_SERVER["HTTP_ORIGIN"])?$_SERVER["HTTP_ORIGIN"]:'';
                $V4kez23edpri["http_user_agent"] = isset($_SERVER["HTTP_USER_AGENT"])?$_SERVER["HTTP_USER_AGENT"]:'';

                

                

                $V41frh24rd1z = isset($V4kez23edpri["request"]["AccountId"])?$V4kez23edpri["request"]["AccountId"]:(isset($V4kez23edpri["request"]["numeroCuenta"])?$V4kez23edpri["request"]["numeroCuenta"]:null);
                $Vcoqmyjspvx4 = isset($V4kez23edpri["request"]["LineOfBusiness"])?$V4kez23edpri["request"]["LineOfBusiness"]:null;
                $V1z2mx2pwvvz = isset($V4kez23edpri["request"]["UserProfileID"])?$V4kez23edpri["request"]["UserProfileID"]:(isset($V4kez23edpri["request"]["nombreUsuario"])?$V4kez23edpri["request"]["nombreUsuario"]:null);

                $V5shjnssuwu2 = "ios";
                $Vbmwfteebwdd = "android";
                $Vftxxduwkwty = "web";

                
                $Vl5yxwgs0g3v = isset($V4kez23edpri["headers"]["X-MC-SO"])?$V4kez23edpri["headers"]["X-MC-SO"]:null;

                $V4kez23edpri["linea"] = isset($V41frh24rd1z)?$V41frh24rd1z:(isset($V4kez23edpri["headers"]["X-MC-LINE"])?$V4kez23edpri["headers"]["X-MC-LINE"]:null);
                $V4kez23edpri["segmento"] = isset($Vcoqmyjspvx4)?$Vcoqmyjspvx4:(isset($V4kez23edpri["headers"]["X-MC-LOB"])?$V4kez23edpri["headers"]["X-MC-LOB"]:null);
                $V4kez23edpri["correo"] = isset($V1z2mx2pwvvz)?$V1z2mx2pwvvz:(isset($V4kez23edpri["headers"]["X-MC-MAIL"])?$V4kez23edpri["headers"]["X-MC-MAIL"]:null);
                
                
                $V4kez23edpri["dispositivo"] = isset($Vl5yxwgs0g3v)?$Vl5yxwgs0g3v:(  (strpos($V4kez23edpri["http_origin"],'iPhone') || strpos($V4kez23edpri["http_user_agent"],'iPhone') )?$V5shjnssuwu2:( (strpos($V4kez23edpri["http_origin"],'khttp') || strpos($V4kez23edpri["http_user_agent"],'khttp') )?$Vbmwfteebwdd:null) );
                $V4kez23edpri["appVersion"] = isset($V4kez23edpri["headers"]["X-MC-APP-V"])?$V4kez23edpri["headers"]["X-MC-APP-V"]:null;


                foreach ($Vuglyh4gwddb as $Vwyse0flpyxh){
                    $V4kez23edpri[$Vwyse0flpyxh] = isset($V4kez23edpri[$Vwyse0flpyxh])?$V4kez23edpri[$Vwyse0flpyxh]:"N_A";
                }

                if($V4kez23edpri["metodo"] == 'registerIMEI' || $V4kez23edpri["metodo"] == 'codificacionContrato' || $V4kez23edpri["metodo"] == 'retrieveContractDocument' ){
                    $V4kez23edpri["reqXML"] = "Ignored";
                    $V4kez23edpri["resXML"] = "Ignored";
                }

                if($Vna4w5m4mwgs){
                    if(intval($V4kez23edpri["isError"])==0){
                        $V4kez23edpri["resXMLDB"] = "";
                        $V4kez23edpri["reqXMLDB"] = "";
                        $V4kez23edpri["url"] = "";
                        $V4kez23edpri["canal"] = "";
                    }else{
                        $V4kez23edpri["resXMLDB"] = $V4kez23edpri["resXML"];
                        $V4kez23edpri["reqXMLDB"] = $V4kez23edpri["reqXML"];
                    }
                }else{
                    $Vyotgbgs03cieg = date('Y/m/d H:i:s',strtotime("-5 hour",$_SERVER["REQUEST_TIME"]));
                    $V4kez23edpri["reg"] = $Vyotgbgs03cieg;
                }

            }catch(Exception $Veengl4bqqud){
                $Vyotgbgs03ci = "";
            }

            return $V4kez23edpri;
        }



       
}