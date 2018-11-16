<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ValidarCuenta extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        
		$this->lang->load("app","spanish");

        
        $this->load->library('GibberishAES');
        $this->app=$this->config->item('app');
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

        $V43zwexrlo45=substr($Vfeinw1hsfej["AccountId"], 0, 1);



        if ( strlen($Vfeinw1hsfej["AccountId"])==8 || ( strlen($Vfeinw1hsfej["AccountId"])==10 && $V43zwexrlo45==2 ) ) { 

            $Vcfzis3ca5nv=$this->getFijoDocType($Vfeinw1hsfej["codigoTipoDocumento"]);

            $Vntg4bz5sdqr=array(
                "codigoTipoDocumento"=>$Vcfzis3ca5nv,
                "documento"=>$Vfeinw1hsfej["DocumentNumber"],
                "numeroCuenta"=>$Vfeinw1hsfej["AccountId"]
            );
            $Vf3uhunk1bey=$this->curl->simple_post('https://www.miclaroapp.com.co/api/index.php/v1/soap/ValidarRegistroCuentaClienteFija.json', array("data"=>$Vntg4bz5sdqr));
            $Vf3uhunk1bey=json_decode(((isset($Vf3uhunk1bey))?$Vf3uhunk1bey:'{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));

            if ($Vf3uhunk1bey->error==0) {

                $Vpa2qbhtxuyd=$Vf3uhunk1bey->response;

                if ( isset($Vpa2qbhtxuyd->aesCuentaValida) && isset($Vpa2qbhtxuyd->aesClienteAsociadoCuenta) ) {
                    
                    if ( $Vpa2qbhtxuyd->aesCuentaValida=="true" && $Vpa2qbhtxuyd->aesClienteAsociadoCuenta=="true" ) {
                        
                        $Vnb2hggtfonp=array(
                            "LineOfBusiness"=>$Vpa2qbhtxuyd->LineOfBusiness,
                            "AccountId"=>$Vfeinw1hsfej["AccountId"],
                            "DocumentNumber"=>$Vfeinw1hsfej["DocumentNumber"],
                            "DocumentType"=>$this->getMovilDocType($Vfeinw1hsfej["codigoTipoDocumento"]),
                            "nombreCliente"=>trim($Vpa2qbhtxuyd->anombre),
                            "apellidoCliente"=>trim($Vpa2qbhtxuyd->aapellidos),
                            "legalizar"=>0
                        );

                        $this->return_data(array('error' => '0','response'=>$Vnb2hggtfonp));

                    }else{
                        $this->return_data(array('error' => '1','response'=>'El producto que intentas asociar no coincide con tu número de documento.'));
                    }
                }else{
                    $this->return_data(array('error' => '1','response'=>'Debes ingresar un Número de Cuenta Hogar / Movil Claro válido'));
                }
                
            }else{
                $this->return_data($Vf3uhunk1bey);
            }



        }else if( intval($this->getMovilDocType($Vfeinw1hsfej["codigoTipoDocumento"]))==5 ){
            $this->return_data(array('error' => '1','response'=>'Te informamos que tu servicio contratado no permite asociar productos móviles.'));
        }else{


            $Vcfzis3ca5nv=$this->getMovilDocType($Vfeinw1hsfej["codigoTipoDocumento"]);
            
            $Vntg4bz5sdqr=array(
                "AccountId"=>$Vfeinw1hsfej["AccountId"]
            );
            $Vegwbvwxdget=$this->curl->simple_post('https://www.miclaroapp.com.co/api/index.php/v1/soap/validateNumber.json', array("data"=>$Vntg4bz5sdqr));
            $Vegwbvwxdget=json_decode(((isset($Vegwbvwxdget))?$Vegwbvwxdget:'{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));



            if ($Vegwbvwxdget->error==0) {

                $Vpa2qbhtxuyd=$Vegwbvwxdget->response;

                if ( isset($Vpa2qbhtxuyd->IsValidFlag) && $Vpa2qbhtxuyd->IsValidFlag=="true" ) {

                    if ( isset($Vpa2qbhtxuyd->LineOfBusiness) ){

                        $Vnb2hggtfonp=array(
                            "LineOfBusiness"=>$Vpa2qbhtxuyd->LineOfBusiness,
                            "AccountId"=>$Vfeinw1hsfej["AccountId"]
                        );

                        $Vntg4bz5sdqr=array(
                            "LineOfBusiness"=>$Vnb2hggtfonp["LineOfBusiness"],
                            "AccountId"=>$Vnb2hggtfonp["AccountId"]
                        );

                        
                        $Vtupvjbdf4ip=$this->curl->simple_post('https://www.miclaroapp.com.co/api/index.php/v1/soap/retrieveCustomerData.json', array("data"=>$Vntg4bz5sdqr));
                        $Vtupvjbdf4ip=json_decode(((isset($Vtupvjbdf4ip))?$Vtupvjbdf4ip:'{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));



                        if ($Vtupvjbdf4ip->error==0) {

                            $Vpa2qbhtxuyd=$Vtupvjbdf4ip->response;

                            if ( isset($Vpa2qbhtxuyd->DocumentType) && isset($Vpa2qbhtxuyd->DocumentNumber) ) {

                                $Vpa2qbhtxuyd->DocumentType=$this->getMovilDocType($Vpa2qbhtxuyd->DocumentType);

                                $Vnb2hggtfonp["LineOfBusiness"]=$Vnb2hggtfonp["LineOfBusiness"];
                                $Vnb2hggtfonp["DocumentNumber"]=$Vfeinw1hsfej["DocumentNumber"];
                                $Vnb2hggtfonp["DocumentType"]=$Vcfzis3ca5nv;
                                $Vnb2hggtfonp["nombreCliente"]=trim($Vpa2qbhtxuyd->Name);
                                $Vnb2hggtfonp["apellidoCliente"]=trim($Vpa2qbhtxuyd->LastName);
                                $Vnb2hggtfonp["legalizar"]=0;


                                if ( intval($Vpa2qbhtxuyd->DocumentType)==intval($Vcfzis3ca5nv) && intval($Vpa2qbhtxuyd->DocumentNumber)==intval($Vfeinw1hsfej["DocumentNumber"]) ) {
                                    
                                    $this->return_data(array('error' => '0','response'=>$Vnb2hggtfonp));

                                }else if( intval($Vnb2hggtfonp["LineOfBusiness"])==2 && ( intval($Vnb2hggtfonp["DocumentType"])==1 || intval($Vnb2hggtfonp["DocumentType"])==4 ) ){


                                    $Vntg4bz5sdqr=array(
                                        "AccountId"=>$Vnb2hggtfonp["AccountId"]
                                    );

                                    $Vxcdkzxnhn5o=$this->curl->simple_post('https://miclaroapp.com.co/api/index.php/v1/soap/esLegalizada.json', array("data"=>$Vntg4bz5sdqr));
                                    $Vxcdkzxnhn5o=json_decode(((isset($Vxcdkzxnhn5o))?$Vxcdkzxnhn5o:'{"error":0,"response":"En este momento no podemos atender esta solicitud, intenta nuevamente."}'));

                                    if ($Vxcdkzxnhn5o->error==0) {
                                        $Vpa2qbhtxuyd=$Vxcdkzxnhn5o->response;

                                        if (intval($Vpa2qbhtxuyd->legalizar)==1) {
                                            $Vnb2hggtfonp["legalizar"]=1;
                                            $this->return_data(array('error' => '0','response'=>$Vnb2hggtfonp));
                                        }else{
                                            $this->return_data(array('error' => '1','response'=>'El producto que intentas asociar no coincide con tu número de documento.'));
                                        }
                                    }else{
                                        $this->return_data($Vxcdkzxnhn5o);
                                    }

                                }else{
                                    $this->return_data(array('error' => '1','response'=>'El producto que intentas asociar no coincide con tu número de documento.'));
                                }

                            }else{
                                $this->return_data(array('error' => '1','response'=>'Error al obtener la información de tu cuenta. Intentalo nuevamente.'));
                            }
                        }else{
                            $this->return_data($Vtupvjbdf4ip);
                        }

                    }else{
                        $this->return_data(array('error' => '1','response'=>'La cuenta no es válida.'));
                    }
                }else{
                    $this->return_data(array('error' => '1','response'=>'Debes ingresar un Número de Cuenta Hogar / Movil Claro válido.'));
                }

            }else{
                $this->return_data($Vegwbvwxdget);
            }
        }



        $this->return_data(array('error' => '0','response'=> $Vfeinw1hsfej));

    }

    function getFijoDocType($Vx205imkefhu){
        $Vvncjr3mb1h5=array(
            "tipo1"=>"CC",
            "tipo2"=>"CE",
            "tipo3"=>"PP",
            "tipo4"=>"CD",
            "tipo5"=>"NI"
        );

        return $Vvncjr3mb1h5["tipo".$Vx205imkefhu];
    }

    function getMovilDocType($Vx205imkefhu){

        $Vvncjr3mb1h5=array(
            "tipo1"=>"1",
            "tipo2"=>"4",
            "tipo3"=>"3",
            "tipo4"=>"-1",
            "tipo5"=>"2"
        );

        return $Vvncjr3mb1h5["tipo".$Vx205imkefhu];
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
