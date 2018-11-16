<?php

$Veqekzxyjyqy=(($Voxep3jgmgpg=="SUCCESS")?0:1);


if (($Veqekzxyjyqy==1)){

    $Vhu2a2k1d152->load->library('curl');
    $Vfeinw1hsfej=array("AccountId"=>$Vtpnxepmpisq["AccountId"],"LineOfBusiness"=>$Vtpnxepmpisq["LineOfBusiness"]);
    $Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/RegistrarConsultaContrato.json', array("data"=>$Vfeinw1hsfej));


    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="Estamos procesando tu solicitud, en 72 Horas hábiles podrás acceder a tu contrato por este medio.";
}else{
    $Vpa2qbhtxuyd["error"]=0;


        $V2oecyt4aea4='http://miclaroapp.com.co/archivos/documentos/'.$Vry4erhucjkv.$Vvsbkwciplel;
        $Vo542s0ydvwz='/var/www/miclaroapp.com.co/public_html/archivos/documentos/'.$Vry4erhucjkv.$Vvsbkwciplel;


    if(!file_exists($Vo542s0ydvwz)){
        $Vmbcmje3chmw = fopen( $Vo542s0ydvwz, 'wb' ); 

        
        fwrite( $Vmbcmje3chmw, base64_decode( $Vzpb1u41t4qx ) );

        
        fclose( $Vmbcmje3chmw ); 

        if (file_exists($Vo542s0ydvwz)) {
            $Vpa2qbhtxuyd["error"]=0;
            $Vpa2qbhtxuyd["response"]=array(
                "DocumentExtension"=>$Vvsbkwciplel,
                "DocumentStream"=>$V2oecyt4aea4
            );
        } else {

            $Vhu2a2k1d152->load->library('curl');
            $Vfeinw1hsfej=array("AccountId"=>$Vtpnxepmpisq["AccountId"],"LineOfBusiness"=>$Vtpnxepmpisq["LineOfBusiness"]);
            $Vhu2a2k1d152->curl->simple_post('https://'.$_SERVER['HTTP_HOST'].'/api/index.php/v1/soap/RegistrarConsultaContrato.json', array("data"=>$Vfeinw1hsfej));
    
            $Vpa2qbhtxuyd["error"]=1;
            $Vpa2qbhtxuyd["response"]="Estamos procesando tu solicitud, en 72 Horas hábiles podrás acceder a tu contrato por este medio..";
            $Vpa2qbhtxuyd["f"]=$Vo542s0ydvwz;
        }
    }else{
        $Vpa2qbhtxuyd["response"]=array(
            "DocumentExtension"=>$Vvsbkwciplel,
            "DocumentStream"=>$V2oecyt4aea4
        );
    }

}

    echo json_encode($Vpa2qbhtxuyd);

?>