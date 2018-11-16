<?php
   
   $Veqekzxyjyqy = 1;
   $Vonnn0nfpbux = "No se ha encontrado información para tu cuenta.";

   if(isset($Vge2g0aijcwb,$Vge2g0aijcwb["aAntiguedadLinea"],$Vge2g0aijcwb["aMonthsSinceLastRepo"],$Vge2g0aijcwb["aPaymentBehaviour"],$Vge2g0aijcwb["aHasRenovation"])){
      


      $Vwctbf111it4 = 1;

      
      if(!(intval($Vge2g0aijcwb["aAntiguedadLinea"]) > 12)) {
         $Vonnn0nfpbux = "No cuentas con la antigüedad necesaria para permitir realizar una reposición financiada.";
         $Vwctbf111it4 = 0;
      }
   	
      if($Vwctbf111it4 && !(intval($Vge2g0aijcwb["aMonthsSinceLastRepo"]) > 4)){
         $Vonnn0nfpbux = "Hace poco realizaste una reposición de equipo.";
         $Vwctbf111it4 = 0;
      }

      if($Vwctbf111it4 && !($Vge2g0aijcwb["aPaymentBehaviour"] == "MUY BUENO" || $Vge2g0aijcwb["aPaymentBehaviour"] == "BUENO")) {
         $Vonnn0nfpbux = "Tu comportamiento de pago no es óptimo para permitir realizar una reposición financiada.";
         $Vwctbf111it4 = 0;
      }

      if($Vwctbf111it4 && !($Vge2g0aijcwb["aHasRenovation"] == "false")){
         $Vonnn0nfpbux = "Actualmente tienes una renovación activa.";
         $Vwctbf111it4 = 0;
      }

      if($Vwctbf111it4){
         $Veqekzxyjyqy = 0;
         $Vonnn0nfpbux = "Has sido aprobado para financiar tu reposición";
      }
   }

   $Vonnn0nfpbuxonse["error"]=$Veqekzxyjyqy;
   $Vonnn0nfpbuxonse["response"]=$Vonnn0nfpbux;
   $Vonnn0nfpbuxonse["data"]=intval($Vge2g0aijcwb["aAntiguedadLinea"]) > 12;

    echo json_encode($Vonnn0nfpbuxonse);
?>