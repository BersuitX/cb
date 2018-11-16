 <?php
   
   $Veqekzxyjyqy=0;
   $Vnb2hggtfonp = array("asociado"=>false,"registradoCliente"=>false,"registradoUsuario"=>false,"correoAsociado"=>"");


   if(isset($Vyj0h0witytc,$Vyj0h0witytc["aesClienteAsociadoUsuario"],$Vyj0h0witytc["aesClienteRegistrado"],$Vyj0h0witytc["aesUsuarioRegistrado"],$Vyj0h0witytc["ausuarioAsociadoCliente"])){

      $Vpjz203i1xwo=($Vyj0h0witytc["aesClienteAsociadoUsuario"]=='true')?true:false;
      $Vdbr3ynirrc2=($Vyj0h0witytc["aesClienteRegistrado"]=='true')?true:false;
      $Vlgfv5i3ii41=($Vyj0h0witytc["aesUsuarioRegistrado"]=='true')?true:false;
      $Vtr4sxezx2v1=$Vhu2a2k1d152->arrayToString($Vyj0h0witytc["ausuarioAsociadoCliente"]);

      if ($Vlgfv5i3ii41 && !$Vdbr3ynirrc2) {
        $Veqekzxyjyqy=1;
        $Vnb2hggtfonp="El correo eléctronico ya se encuentra registrado";
      }else if ($Vlgfv5i3ii41 && $Vdbr3ynirrc2){
        $Veqekzxyjyqy=1;
        $Vnb2hggtfonp="El correo eléctronico ya tiene una cuenta asociada. Por favor intente ingresar o recuperar clave.";
      }else{

        $V0svbb0ekw3j=true;
        if (!$Vlgfv5i3ii41 && !$Vdbr3ynirrc2) {
          $V0svbb0ekw3j=false;
        }

        $Veqekzxyjyqy=0;
        $Vnb2hggtfonp = array(
           "asociado"=>$Vpjz203i1xwo,
           "registradoCliente"=>$Vdbr3ynirrc2,
           "registradoUsuario"=>$Vlgfv5i3ii41,
           "correoAsociado"=>$Vtr4sxezx2v1,
           "validarSeguridad"=>$V0svbb0ekw3j
        );
      }

   }

    $Vnb2hggtfonpponse["error"]=$Veqekzxyjyqy;
    $Vnb2hggtfonpponse["response"]=$Vnb2hggtfonp;

    echo json_encode($Vnb2hggtfonpponse);
?>