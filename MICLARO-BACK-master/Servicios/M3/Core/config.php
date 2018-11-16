<?php

    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    
    

    require __DIR__ . '/GibberishAES.php';

     function ConexDB($Vfbt3who3l5d){

        $Vlwkhmzr23je = new PDO('mysql:host=10.127.189.14;dbname=clarotest','clarotestusr','pQxg58*7');
        $Vlwkhmzr23je->exec("SET CHARACTER SET utf8");
        $Vlwkhmzr23je->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $Vmg1lenqx1u3 = $Vlwkhmzr23je->query($Vfbt3who3l5d)->fetchAll();

        return $Vmg1lenqx1u3;
    }

    

    function getKeyApp() {    
        $V2asby51wnpx="PUZ66Q9J";
        return $V2asby51wnpx;
    }

    function getKeyParadigma() {
    
        $V2asby51wnpx="A9b8C7d6E5f4G3h2";
        return $V2asby51wnpx;
    }

     function getFijoDocType($Vl5f0qs1nxwn){
        $Vwmgafxuvzgd=array(
            "tipo1"=>"CC",
            "tipo2"=>"CE",
            "tipo3"=>"PP",
            "tipo4"=>"CD",
            "tipo5"=>"NI"
        );

        return $Vwmgafxuvzgd["tipo".$Vl5f0qs1nxwn];
    }

    function getMovilDocType($Vl5f0qs1nxwn){

        $Vwmgafxuvzgd=array(
            "tipo1"=>"1",
            "tipo2"=>"4",
            "tipo3"=>"3",
            "tipo4"=>"-1",
            "tipo5"=>"2"
        );

        return $Vwmgafxuvzgd["tipo".$Vl5f0qs1nxwn];
    }
    
    
    function validarSeguridad($V5y2wgq24k1v){
        
        $V44bx1mr5ks1 = new GibberishAES;
        
        $V5y2wgq24k1v = array_change_key_case($V5y2wgq24k1v, CASE_UPPER);
    
        if (isset($V5y2wgq24k1v["HTTP_X_SESSION_ID"])) {
            
            $Vx5bl5ubgnhj=((count($V5y2wgq24k1v["HTTP_X_SESSION_ID"])>0)?$V5y2wgq24k1v["HTTP_X_SESSION_ID"][0]:"error");
            
                    
            try {
                
                $Vxnmbgenatsp = $V44bx1mr5ks1->dec($Vx5bl5ubgnhj,getKeyApp());
                $Vxnmbgenatsp = json_decode($Vxnmbgenatsp);
                
                
                if( json_last_error()==JSON_ERROR_NONE ){
                    
                    $Vqhzkfsafzrc=$Vxnmbgenatsp;
                    return $Vqhzkfsafzrc;
                }else{
                    $Vpsm42ro4mkq = new \stdClass;
                    $Vpsm42ro4mkq->error=1;
                    $V5y2wgq24k1v = apache_request_headers();
                    $Vpsm42ro4mkq->response="Error en la llave de aplicación (NONE)";
                    return $Vpsm42ro4mkq;
                }
            
            } catch (Exception $Vpt32vvhspnv) {
                $Vpsm42ro4mkq = new \stdClass;
                $Vpsm42ro4mkq->error=1;
                $Vpsm42ro4mkq->response="Error en la llave de aplicación (OBJECT)";
                return $Vpsm42ro4mkq;
            }
            
        }else{
            $Vpsm42ro4mkq = new \stdClass;
            $Vpsm42ro4mkq->error=1;
            $Vpsm42ro4mkq->response="No se recibió la llave de aplicación?";
            return $Vpsm42ro4mkq;
        }
    }
    
    function encrypt($Vqhzkfsafzrc,$V5slgxo0siyr = true){
        
        
        if($V5slgxo0siyr){
            $V44bx1mr5ks1 = new GibberishAES;
            $Vk2kny1ct1iz = getKeyApp();
            $Vvcjkdrakwx3 = $V44bx1mr5ks1->enc($Vqhzkfsafzrc,$Vk2kny1ct1iz);    
        }else{
            $Vk2kny1ct1iz = getKeyParadigma();
            $Vpt32vvhspnvncrypt_method = 'AES-128-ECB';
            $Vo2g4sjdrdbg = openssl_random_pseudo_bytes(openssl_cipher_iv_length($Vpt32vvhspnvncrypt_method));
            $Vvcjkdrakwx3 = openssl_encrypt($Vqhzkfsafzrc, $Vpt32vvhspnvncrypt_method, $Vk2kny1ct1iz, 0, $Vo2g4sjdrdbg);
        }


        
        return $Vvcjkdrakwx3;
    }

    function guardarSesion($Vqhzkfsafzrc,$Vrenfnepb11j){
        ini_set('date.timezone', 'America/Bogota');
        $V2bpoh5hagzp = '/var/www/miclaroapp.com.co/public_html/archivos/sesiones';
        $Vuxrjtk44md2 = $Vrenfnepb11j.'.json';

        if (!file_exists($V2bpoh5hagzp)) {
            mkdir($V2bpoh5hagzp, 0777, true);
        }

        $Vwulga4ztj2o=$V2bpoh5hagzp.'/'.$Vuxrjtk44md2;
        $Vvbknafvzgc5 = fopen( $Vwulga4ztj2o, 'wb' ); 
        fwrite( $Vvbknafvzgc5,json_encode($Vqhzkfsafzrc));
        fclose( $Vvbknafvzgc5 );
    }

    function obtenerSesion($Vrenfnepb11j){
        $V2bpoh5hagzp = 'https://www.miclaroapp.com.co/archivos/sesiones/'.$Vrenfnepb11j.'.json';
        $Vvkwvjdx1mcb = file_get_contents($V2bpoh5hagzp);
        if (isset($Vvkwvjdx1mcb)) {
            $Vqhzkfsafzrc=json_decode($Vvkwvjdx1mcb, true);
            if (json_last_error()==JSON_ERROR_NONE) {
                return $Vqhzkfsafzrc;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

?>