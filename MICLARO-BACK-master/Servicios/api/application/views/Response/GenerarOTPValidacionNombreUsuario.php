<?php
   $Veqekzxyjyqy = ((isset($V0k4igqoecms) && intval($V0k4igqoecms)>0)?0:1);
   $Vonnn0nfpbux = "No se ha encontrado información para tu cuenta.";

   $Vonnn0nfpbuxonse["error"]=$Veqekzxyjyqy;
   $Vonnn0nfpbuxonse["response"]= ($Veqekzxyjyqy==0)?$V0k4igqoecms:"Error al enviar el PIN, inténtalo nuevamente.";

    echo json_encode($Vonnn0nfpbuxonse);
?>