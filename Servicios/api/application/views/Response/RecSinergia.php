<?php
   $Vpa2qbhtxuyd["error"]=1;
   $Vpa2qbhtxuyd["response"]="No ha sido posilbe agregar el elegido";
   
   if(isset($Vb5hjbk2mbwk)){
      if(sizeof($Vb5hjbk2mbwk) == 3){
         if($Vb5hjbk2mbwk[0] == "0"){
            $Vpa2qbhtxuyd["error"]=0;
         }

         $Vpa2qbhtxuyd["response"]=$Vb5hjbk2mbwk[1];
      }else{
         $Vpa2qbhtxuyd["data"] = "Falló el tamaño del atributo return";  
      }
   }else{
      $Vpa2qbhtxuyd["data"] = "No existe el atributo return";
   }

    echo json_encode($Vpa2qbhtxuyd);
?>