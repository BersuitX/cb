<?php

   if( $Vqjnx0lrpelw == "007" ){
      $Vpa2qbhtxuyd["error"]=0;
      $Vpa2qbhtxuyd["response"]=((isset($Vqwcx0gvxqv2))?$Vqwcx0gvxqv2:"Exitoso.");
   }else{
      $Vpa2qbhtxuyd["error"]=1;
      if(isset($Vqwcx0gvxqv2)){
         $Vpa2qbhtxuyd["response"]=$Vqwcx0gvxqv2;

      }else{
         $Vpa2qbhtxuyd["response"]="No se encontró información";
      }
   }

    echo json_encode($Vpa2qbhtxuyd);
?>
