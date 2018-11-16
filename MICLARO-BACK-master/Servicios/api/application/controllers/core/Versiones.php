<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Versiones extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
        $this->lang->load("app","spanish");
        
        
        $this->load->model('Versiones_model');

        
        $this->load->library('GibberishAES');
        $this->load->helper('cookie');
        $this->app=$this->config->item('app');
    }
    
    function index_get()
    {
        $this->response(NULL,403);
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
        
        
        
        $Vfrz01we23rs = $this->get('version');
        $Vho0thcmhnzp = $this->get('plataforma');

        
        
        
        $Vwzntf5p5yah = array("name"=>"url_domicilacion_factura","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=Domicilia&empresa=claro");


        $Vkmcrzucmou3 = array("name"=>"url_pago_factura_postpago","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=4&empresa=claro&id_objeto=10002");

        $Vwcevmxgwcq0 = array("name"=>"url_pago_factura_hogar","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=4&empresa=claro&id_objeto=10001");

        

        $Vw2sq5wlzvaq = array("name"=>"url_recargas_prepago_new","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=pagoUrlPaquetesRecargas&id_objeto=10031&empresa=claro");

        $Vto5rvgzcq13 = array("name"=>"url_mis_medios_pago","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaropay&metodo=administraClaroPay&empresa=claro");

        $Vwcevmxgwcq0Publico = array("name"=>"url_pago_factura_hogar_publico","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=3&empresa=claro&id_objeto=10001");

        $Vkmcrzucmou3Publico = array("name"=>"url_pago_factura_postpago_publico","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=3&empresa=claro&id_objeto=10002");

        $Vzblvhfr2rie= array("name"=>"url_recargas_prepago_publico","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=3&empresa=claro&id_objeto=10000");

        $Vrw1smfrika5 = array("name"=>"url_ren_equi_compra_repos","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=pagoRenuevaEquipo&id_objeto=10025&VERSION_SERV=1&operacion=Adicionar&empresa=claro");

        $Vrw1smfrika52 = array("name"=>"url_equi_url_compra_repos","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=pagoRenuevaEquipo&id_objeto=10025&VERSION_SERV=1&operacion=Adicionar&empresa=claro");

        $Vajisy400hpz = array("name"=>"url_tienda_compra","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=pagoRenuevaEquipo&id_objeto=10025&VERSION_SERV=1&operacion=Adicionar&empresa=claro");


        $Vy03ybdg2vck = array("name"=>"url_portal_voz_web","url"=>"https://portalvoz.claro.com.co");
        $Vhzb0ceuj52t = array("name"=>"pack_portal_voz","url"=>"net.comtor.softphone");
        $V4cf1by30xnu = array("name"=>"url_portal_voz","url"=>"https://1drv.ms/u/s!AqEICXg_DF-Qg3KOih3ZTRfsQdGn");
        $Vzblvhfr2rieEmp= array("name"=>"url_recargas_prepago_publico_emp","url"=>"https://portalpagos.claro.com.co/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=3&empresa=claro&id_objeto=10000");

        $Vxcnqqebtkry = file_get_contents("https://www.miclaroapp.com.co/archivos/Versiones.json");
        $Vfrz01we23rsearray = json_decode($Vxcnqqebtkry, true);

        $Vgn0iwn142my = array("Esta versión no se encuentra en la base de datos","Ok","<center>Hay una nueva actualización en versión de Mi Claro App en tienda.<br /><br />¿Deseas actualizar a la última versión?</center>","<center>¡Hola!<br /><br />Hemos generado una nueva versión que mejora el funcionamiento de App Mi Claro.<br /><br />Te invitamos a actualizarla para disfrutar de una gran experiencia y de lo nuevo que creamos para ti.</center>");
        
        
        


        
        
        
        if($Vfrz01we23rs != null && $Vho0thcmhnzp != null){
            $Vnb2hggtfonp = array('estado' => 1, 'mensaje' => $Vgn0iwn142my[1]);

            
            foreach($Vfrz01we23rsearray as $V2xim30qek4u=>$Vcnwqsowvhom){
                if($V2xim30qek4u == $Vho0thcmhnzp){
                    $Viov40gxtdfq = $Vcnwqsowvhom;
                }
            }

            $Veja3wu1d4su = "";
            foreach ($Viov40gxtdfq as $Vk4rln4youry) {
                if($Vk4rln4youry["version"] == $Vfrz01we23rs){
                    $Veja3wu1d4su = $Vk4rln4youry["estado"];
                }
            }

            if($Veja3wu1d4su != ""){
                $Vnb2hggtfonp = array('estado' => intval($Veja3wu1d4su), 'mensaje' => $Vgn0iwn142my[intval($Veja3wu1d4su)]);
            }
            
            $V5sjkgyvdnsq=date("Y-m-d H:i:s");
            $V4tefnlwskas=$this->gibberishaes->enc($V5sjkgyvdnsq,$this->app["AES"]);
            $Vy3ji02idoad=array("inicio"=>$V5sjkgyvdnsq,"hash"=>$V4tefnlwskas);
            $V1iws3tl1n24=$this->gibberishaes->enc(json_encode($Vy3ji02idoad),$this->app["AES"]);

           
            $Vnb2hggtfonp["token"]=$V1iws3tl1n24;
            $Vnb2hggtfonp["pre_comprar_paquetes_mundial"]=0;
            $Vnb2hggtfonp["pos_comprar_paquetes_mundial"]=0;
            $Vnb2hggtfonp["pre_comprar_paquetes"]=1;
            $Vnb2hggtfonp["pos_comprar_paquetes"]=0;
            $Vnb2hggtfonp["hog_comprar_paquetes"]=1;


            $Veoeds0ryrie = date("d");
            $Vosrev0dmm3y = date("m");

            $Vnb2hggtfonp["mostrar_confeti"]=0;
            if ( intval($Veoeds0ryrie) == 20 && intval($Vosrev0dmm3y)==7 ){
                $Vnb2hggtfonp["mostrar_confeti"]=1;
            }


            $Vnb2hggtfonp["pos_repos"]=1;
            $Vnb2hggtfonp["pos_chatea"]=1;
            $Vnb2hggtfonp["pos_publicidad"]=1;
            $Vnb2hggtfonp["pre_mega_referido"]=1;




            $Vnb2hggtfonp["pre_chatea"]=1;
            $Vnb2hggtfonp["pre_publicidad"]=1;
            $Vnb2hggtfonp["hog_chatea"]=1;
            $Vnb2hggtfonp["hog_publicidad"]=1;
            $Vnb2hggtfonp["hog_paq_hd"]=1;
            $Vnb2hggtfonp["post_redes_sociales"]=0;
            
            $Vnb2hggtfonp["pos_tienda"]=0;
            $Vnb2hggtfonp["pre_tienda"]=0;
            $Vnb2hggtfonp["hog_tienda"]=0;

            $Vnb2hggtfonp["hog_blindaje"]=0;
            $Vnb2hggtfonp["pos_blindaje"]=0;


            if($Vfrz01we23rs == "1.2.0"){
                $Vnb2hggtfonp["hog_blindaje"]=1;
                $Vnb2hggtfonp["pos_blindaje"]=1;
            }

            if($Vfrz01we23rs == "1.31.5" ||  $Vfrz01we23rs == "4.4.1"){
                
                $Vw2sq5wlzvaq = array("name"=>"url_recargas_prepago_new","url"=>"https://pruebasclaro.maxgp.com.co:9443/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=pagoUrlPaquetesRecargas&id_objeto=10031&empresa=claro");
                $Vwcevmxgwcq0 = array("name"=>"url_pago_factura_hogar","url"=>"https://pruebasclaro.maxgp.com.co:9443/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=4&empresa=claro&id_objeto=10001");
                $Vkmcrzucmou3 = array("name"=>"url_pago_factura_postpago","url"=>"https://pruebasclaro.maxgp.com.co:9443/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=formulario&operacion=Adicionar&OrigenPago=4&empresa=claro&id_objeto=10002");
                $Vrw1smfrika5 = array("name"=>"url_ren_equi_compra_repos","url"=>"https://pruebasclaro.maxgp.com.co:9443/phrame.php?action=despliegue_personal&clase=vistasclaro&metodo=pagoRenuevaEquipo&id_objeto=10025&operacion=Adicionar&empresa=claro&tipoCanalOrigenID=4&VERSION_SERV=1");
                

            }

            if($Vfrz01we23rs == "1.32.0" || $Vfrz01we23rs == "4.4.0"){
                
                $Vnb2hggtfonp["pos_tienda"]=1;
                $Vnb2hggtfonp["pre_tienda"]=1;
                
            }

            if($Vfrz01we23rs == "1.15.0" 
                || $Vfrz01we23rs == "1.20.0" 
                || $Vfrz01we23rs == "1.20.1" 
                || $Vfrz01we23rs == "1.24.0"
                || $Vfrz01we23rs == "1.26.0"
                || $Vfrz01we23rs == "1.27.1"
                || $Vfrz01we23rs == "1.27.2"
                || $Vfrz01we23rs == "1.27.5"
                || $Vfrz01we23rs == "1.27.7"
                || $Vfrz01we23rs == "1.27.8"
                || $Vfrz01we23rs == "1.30.0"
                || $Vfrz01we23rs == "1.31.0"
                || $Vfrz01we23rs == "1.32.0"
                || $Vfrz01we23rs == "4.0.7" 
                || $Vfrz01we23rs == "4.1.0" 
                || $Vfrz01we23rs == "4.1.1" 
                || $Vfrz01we23rs == "4.1.5" 
                || $Vfrz01we23rs == "4.1.8" 
                || $Vfrz01we23rs == "4.2.0" 
                || $Vfrz01we23rs == "4.2.5" 
                || $Vfrz01we23rs == "4.2.8" 
                || $Vfrz01we23rs == "4.3.0" 
                || $Vfrz01we23rs == "4.3.5" 
                || $Vfrz01we23rs == "4.3.8"
                || $Vfrz01we23rs == "4.4.0"){

                $Vnb2hggtfonp["hog_blindaje"]=1;
                $Vnb2hggtfonp["pos_blindaje"]=1;
            }

            
            $Vysawiminch1 = array($Vwzntf5p5yah,$Vkmcrzucmou3,$Vwcevmxgwcq0,$Vw2sq5wlzvaq,$Vto5rvgzcq13,$Vwcevmxgwcq0Publico,$Vkmcrzucmou3Publico,$Vzblvhfr2rie,$Vrw1smfrika5,$Vrw1smfrika52,$Vy03ybdg2vck,$Vhzb0ceuj52t,$V4cf1by30xnu,$Vzblvhfr2rieEmp,$Vajisy400hpz);


            $Vnb2hggtfonp["urlsClaro"] = $Vysawiminch1;
            $Vnb2hggtfonp["version"]=$Vfrz01we23rs;
            $Vnb2hggtfonp["plataforma"]=$Vho0thcmhnzp;

            
            $Vyxp2dhcvnlx = $this->input->request_headers();
            if(isset($Vyxp2dhcvnlx["X-MC-ISDEBUG"])){
                $this->response(array('error' => '0','response'=> array('estado' => 1, 'mensaje' => "No se valida la versión"),'h'=>$Vyxp2dhcvnlx));
            }

            $Vnb2hggtfonp["memoria"] = memory_get_usage();
            $Vnb2hggtfonp["srv_nodo"] = isset($_SERVER["SERVER_ADDR"])?$_SERVER["SERVER_ADDR"]:'';
            $Vnb2hggtfonp["srv_init"] = php_ini_loaded_file();
            $Vnb2hggtfonp["cd_version"] = CI_VERSION;

            $this->response(array('error' => '0','response'=> $Vnb2hggtfonp));
        }
        else{
            $this->response(array('error' => '1','response'=>$this->lang->line('error_nodata')));
        }
        
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
