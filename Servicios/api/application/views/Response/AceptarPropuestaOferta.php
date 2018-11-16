<?php
    
    if($Vwvhbwmwa4q5=='true'){
        $Vpa2qbhtxuyd["error"]=0;
        $Vpa2qbhtxuyd["response"]="<center>¡Confirmación exitosa!<br/><br/>Tu beneficio estará en vigencia a partir de tu próxima fecha de corte.</center>";
    }else{
        $Vpa2qbhtxuyd["error"]=1;
        $Vpa2qbhtxuyd["response"]="No ha sido posible aplicar la oferta en este momento.";
    }

    

    echo json_encode($Vpa2qbhtxuyd);
?>