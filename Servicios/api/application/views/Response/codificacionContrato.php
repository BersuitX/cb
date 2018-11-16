<?php

	if ($Votcef0eg54y["messageType"]=="I") {
		if (isset($Votcef0eg54y["coding"])) {

			$Vchdbbw3ff25=explode(".", $Vtpnxepmpisq["url"]);
			$V4ixvjm4swlr=$Vchdbbw3ff25[count($Vchdbbw3ff25)-1];

			$Vdqcqmoaxq3y=rand(10,1000000);

			$V2oecyt4aea4='http://miclaroapp.com.co/archivos/documentos/contratoHogar-'.$Vdqcqmoaxq3y.'.'.$V4ixvjm4swlr;
			$Vo542s0ydvwz='/var/www/miclaroapp.com.co/public_html/archivos/documentos/contratoHogar-'.$Vdqcqmoaxq3y.'.'.$V4ixvjm4swlr;


		    $Vmbcmje3chmw = fopen( $Vo542s0ydvwz, 'wb' ); 
		    
		    fwrite( $Vmbcmje3chmw, base64_decode( $Votcef0eg54y["coding"] ) );

		    
		    fclose( $Vmbcmje3chmw ); 

		    if (file_exists($Vo542s0ydvwz)) {
		    	$Vpa2qbhtxuyd["error"]=0;
		    	$Vpa2qbhtxuyd["response"]=$V2oecyt4aea4;
			} else {
		    	$Vpa2qbhtxuyd["error"]=1;
		    	$Vpa2qbhtxuyd["response"]="Estamos procesando tu solicitud, en 72 Horas hábiles podrás acceder a tu contrato por este medio.";
			
			}

		}else{
	    	$Vpa2qbhtxuyd["error"]=1;
	    	$Vpa2qbhtxuyd["response"]="Estamos procesando tu solicitud, en 72 Horas hábiles podrás acceder a tu contrato por este medio.";

		}
	}else{
		$Vpa2qbhtxuyd["error"]=1;
		$Vpa2qbhtxuyd["response"]="Estamos procesando tu solicitud, en 72 Horas hábiles podrás acceder a tu contrato por este medio.";
	}

    echo json_encode($Vpa2qbhtxuyd);
?>