<?php
    $Veqekzxyjyqy=1;

    $Vgw2sxuuedc5 = array();
    $Vgw2sxuuedc5["id"]=-1;
    $Vgw2sxuuedc5["mensaje"]="No ha sido posible completar esta acción";

    if(isset($Vfcnqbv5mkoo)){
    	$Vgw2sxuuedc5["id"]=$Vfcnqbv5mkoo;
        $Vgw2sxuuedc5["mensaje"]="Tu proceso de selección ha finalizado con éxito. \n El valor total del equipo será incluido en tu próxima factura. \n\n Nos pondremos en contacto contigo para confirmar la entrega de tu equipo.";
        $Veqekzxyjyqy = 0;
    }
    
    $Vpa2qbhtxuyd["error"]=$Veqekzxyjyqy;
    $Vpa2qbhtxuyd["response"]=$Vgw2sxuuedc5;

    echo json_encode($Vpa2qbhtxuyd);
?>