<?php

if ($Voxep3jgmgpg=="ERROR"){
    $Vpa2qbhtxuyd["error"]=1;

    if (!$Vhu2a2k1d152->esArray($Vmbf2mvssbll)) {
    	$Vpa2qbhtxuyd["response"]=$Vmbf2mvssbll;
    }else{
    	$Vpa2qbhtxuyd["response"]="En este momento no se encuentra disponible tu factura eléctronica.";
    }
}else{

	if (isset($V3n2dsa5eetr)) {

		$V2oecyt4aea4='http://miclaroapp.com.co/archivos/documentos/'.md5($Vtpnxepmpisq["BillReference"]).'.pdf';
		$Vo542s0ydvwz='/var/www/miclaroapp.com.co/public_html/archivos/documentos/'.md5($Vtpnxepmpisq["BillReference"]).'.pdf';


	    if(!file_exists($Vo542s0ydvwz)){
			$Vmbcmje3chmw = fopen( $Vo542s0ydvwz, 'wb' ); 

		    
		    fwrite( $Vmbcmje3chmw, base64_decode( $V3n2dsa5eetr ) );

		    
		    fclose( $Vmbcmje3chmw ); 

		    if (file_exists($Vo542s0ydvwz)) {
		    	$Vpa2qbhtxuyd["error"]=0;
		    	$Vpa2qbhtxuyd["response"]=array("PDFStream"=>$V2oecyt4aea4);
			} else {
		    	$Vpa2qbhtxuyd["error"]=1;
    			$Vpa2qbhtxuyd["response"]="En este momento no se encuentra disponible tu factura eléctronica.";
			
			}
		}else{
	    	$Vpa2qbhtxuyd["error"]=0;
	    	$Vpa2qbhtxuyd["response"]=array("PDFStream"=>$V2oecyt4aea4);
		}

	}else{
    	$Vpa2qbhtxuyd["error"]=1;
    	$Vpa2qbhtxuyd["response"]="En este momento no se encuentra disponible tu factura eléctronica.";

	}
}
echo json_encode($Vpa2qbhtxuyd);
?>