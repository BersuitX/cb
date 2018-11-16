<?php
$Veqekzxyjyqy=(($Vva5dpxjdtgc)?0:1);

if (($Veqekzxyjyqy==1)){
    $Vpa2qbhtxuyd["error"]=1;
    $Vpa2qbhtxuyd["response"]="No se encontró información de esta cuenta.";
}else{
    $Vpa2qbhtxuyd["error"]=0;

	unset($Vva5dpxjdtgc["adireccionInstalacion"]);

	$Vqh13f3s4mwv["aapellidos"]=(( $Vhu2a2k1d152->esArray($Vva5dpxjdtgc["aapellidos"]) )? "": $Vva5dpxjdtgc["aapellidos"] );
	$Vqh13f3s4mwv["aesClienteAsociadoCuenta"]=(( $Vhu2a2k1d152->esArray($Vva5dpxjdtgc["aesClienteAsociadoCuenta"]) )? "": $Vva5dpxjdtgc["aesClienteAsociadoCuenta"] );
	$Vqh13f3s4mwv["aesCuentaValida"]=(( $Vhu2a2k1d152->esArray($Vva5dpxjdtgc["aesCuentaValida"]) )? "": $Vva5dpxjdtgc["aesCuentaValida"] );
	$Vqh13f3s4mwv["aestadoCuenta"]=(( $Vhu2a2k1d152->esArray($Vva5dpxjdtgc["aestadoCuenta"]) )? "": $Vva5dpxjdtgc["aestadoCuenta"] );
	$Vqh13f3s4mwv["anombre"]=(( $Vhu2a2k1d152->esArray($Vva5dpxjdtgc["anombre"]) )? "": $Vva5dpxjdtgc["anombre"] );
	$Vqh13f3s4mwv["anumeroCuenta"]=(( $Vhu2a2k1d152->esArray($Vva5dpxjdtgc["anumeroCuenta"]) )? "": $Vva5dpxjdtgc["anumeroCuenta"] );
	$Vqh13f3s4mwv["LineOfBusiness"]=(( $Vhu2a2k1d152->esArray($Vva5dpxjdtgc["atipoCuentaID"]) )? "": $Vva5dpxjdtgc["atipoCuentaID"] );

    $Vpa2qbhtxuyd["response"]=$Vqh13f3s4mwv;
}

echo json_encode($Vpa2qbhtxuyd);
?>