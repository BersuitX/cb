<?php
if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );

class Emailserver
{
    
    public function send($Vfeinw1hsfej){  
        
       $Vlyhcgohgugu =& get_instance();
       
        $Vnmcm15juye5 = Array(
            'protocol' => 'sendmail',
            'smtp_host'  => 'ssl://pro.turbo-smtp.com', 
            'smtp_port'  => '25025', 
            'smtp_user'  => 'mvargas@wigilabs.com', 
            'smtp_pass'  => 'OpPbSgya', 
            'mailtype'  => 'html', 
        );
       

        
        $Vlyhcgohgugu->load->library("email"); 
        $Vlyhcgohgugu->email->initialize($Vnmcm15juye5);
        
        $V15xvmvzbb0h=str_replace('á', '&aacute;', $Vfeinw1hsfej["message"]);
        $V15xvmvzbb0h=str_replace('é', '&eacute;', $V15xvmvzbb0h);
        $V15xvmvzbb0h=str_replace('í', '&iacute;', $V15xvmvzbb0h);
        $V15xvmvzbb0h=str_replace('ó', '&oacute;', $V15xvmvzbb0h);
        $V15xvmvzbb0h=str_replace('ú', '&uacute;', $V15xvmvzbb0h);
        
        $V15xvmvzbb0h=str_replace('Á', '&Aacute;', $V15xvmvzbb0h);
        $V15xvmvzbb0h=str_replace('É', '&Eacute;', $V15xvmvzbb0h);
        $V15xvmvzbb0h=str_replace('Í', '&Iacute;', $V15xvmvzbb0h);
        $V15xvmvzbb0h=str_replace('Ó', '&Oacute;', $V15xvmvzbb0h);
        $V15xvmvzbb0h=str_replace('Ú', '&Uacute;', $V15xvmvzbb0h);
        
        
        $Vlyhcgohgugu->email->from('jgonzalez@tfcopen.com', 'Tennis For Champions Open');
        $Vlyhcgohgugu->email->to($Vfeinw1hsfej["to"]); 
        $Vlyhcgohgugu->email->subject($Vfeinw1hsfej["subject"]);
        $Vlyhcgohgugu->email->message($V15xvmvzbb0h);
        
        
        if ($Vlyhcgohgugu->email->send()){
            return "ok";
        }
        else{
            return "error";
        }
    }

}
?>