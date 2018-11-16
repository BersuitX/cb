<?php

   if( $Vqjnx0lrpelw == "CODE_SUCCESS_102" ){
      $Vpa2qbhtxuyd["error"]=0;
      $Vpa2qbhtxuyd["response"]=((isset($Vqlqtlx2wcxf))?$Vqlqtlx2wcxf:array());
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
