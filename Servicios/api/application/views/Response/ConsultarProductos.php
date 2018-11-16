<?php

    if ($Vnd44fhswzov=="SUCCESS"){
      $Vpa2qbhtxuyd["error"]=0;

    
      $Vzrfuqqa3k0y=explode("|", $V1ei2r1rxjvw);
  
      $V1qkdgemv3be=array();
      foreach ($Vzrfuqqa3k0y as $Vutaiebycwbq) {
         $Veb41lxqmrtr=explode(";", $Vutaiebycwbq);

         if (strpos(strtoupper( ((isset($Veb41lxqmrtr[1]))?$Veb41lxqmrtr[1]:"") ), 'BLACKBERRY') === false) {

          if (intval( ((isset($Veb41lxqmrtr[3]))?$Veb41lxqmrtr[3]:0) ) >0 ) {
             $Vm1av2iahduc["codPaq"]=((isset($Veb41lxqmrtr[0]))?$Veb41lxqmrtr[0]:"");
             $Vm1av2iahduc["nombre"]=((isset($Veb41lxqmrtr[1]))?$Veb41lxqmrtr[1]:"");
             $Vm1av2iahduc["descripcion"]=$Vm1av2iahduc["nombre"];
             $Vm1av2iahduc["valor"]=((isset($Veb41lxqmrtr[3]))?$Veb41lxqmrtr[3]:"");
             $Vm1av2iahduc["temp"]=((isset($Veb41lxqmrtr[4]))?$Veb41lxqmrtr[4]:"");

             array_push($V1qkdgemv3be, $Vm1av2iahduc);
          }

         }

      }

      $Vpa2qbhtxuyd["response"]=$V1qkdgemv3be;
    }else{
      $Vpa2qbhtxuyd["error"]=1;
      $Vpa2qbhtxuyd["response"]="No se encontraron Planes disponibles";
    }


    echo json_encode($Vpa2qbhtxuyd);
?>