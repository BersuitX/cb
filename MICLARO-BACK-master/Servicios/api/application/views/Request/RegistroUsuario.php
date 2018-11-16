<?php
   
   

   if (isset($V52j1ve13pvd)) {
      if (intval($V52j1ve13pvd)==1) {
         $V4pnkqfeqs2m="true";
      }else{
         $V4pnkqfeqs2m="false";
      }
   }else{
      $V4pnkqfeqs2m="false";
   }

   function getFijoDocType($Vx205imkefhu){
     $Vvncjr3mb1h5=array(
         "tipo1"=>"CC",
         "tipo2"=>"CE",
         "tipo3"=>"PP",
         "tipo4"=>"CD",
         "tipo5"=>"NI"
     );

     return $Vvncjr3mb1h5["tipo".$Vx205imkefhu];
 }

   $V43zwexrlo45=substr($Vwidysczfeah, 0, 1);
   if ( strlen($Vwidysczfeah)==8 || ( strlen($Vwidysczfeah)==10 && $V43zwexrlo45==2 ) ) {
      if(is_numeric($Vsi0pnvi1q3z)) {
         $Vsi0pnvi1q3z= getFijoDocType($Vsi0pnvi1q3z);
      }
   }




?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header>
      <clar:HeaderAutenticacion>
         <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vvosfj1kohp3.$Vbroibcc3co3</clar1:contraseñaAutenticacion>
         <clar1:tipoCanalID><?=isset($Vvncjr3mb1h5CanalID)?2:1?></clar1:tipoCanalID>
         <clar1:usuarioAutenticacion>Mi$2019.$Vduuglj0unse*$1C$Vk33bzuipr3e$0</clar1:usuarioAutenticacion>
      </clar:HeaderAutenticacion>
   </soapenv:Header>
   <soapenv:Body>
      <clar:RegistroUsuarioRequest>
         <clar:registroUsuario>
            <clar1:apellidoCliente><?=$Vwutaysvhdde?></clar1:apellidoCliente>
            <clar1:codigoTipoDocumento><?=$Vsi0pnvi1q3z?></clar1:codigoTipoDocumento>
            <clar1:contraseña><?=htmlentities($Vxkzshfn23gw)?></clar1:contraseña>
            <clar1:documento><?=$Vrquejas2p0l?></clar1:documento>
            <clar1:esRegistroLegalizado><?=$V4pnkqfeqs2m?></clar1:esRegistroLegalizado>
            <?php
               if(isset($Vxixvqkuqto2) && $Vxixvqkuqto2 != ''){
            ?>
               <clar1:esSolicitarRegistro><?=$Vxixvqkuqto2?></clar1:esSolicitarRegistro>
            <?php
               }
            ?>
            <!--
            <?php
               
            ?>
               <clar1:esUsuarioInspira><?=$Vodfzbyy33h4?></clar1:esUsuarioInspira>
            <?php
               
            ?>
            -->
            <clar1:nombreCliente><?=$Vttj53a0n4kj?></clar1:nombreCliente>
            <clar1:nombreUsuario><?=$Vyvjwikpa2bp?></clar1:nombreUsuario>
            
            <?php
               if(isset($Vjhrhj0dcafu) && $Vjhrhj0dcafu != ''){
            ?>
               <clar1:nuevoNombreUsuario><?=$Vjhrhj0dcafu?></clar1:nuevoNombreUsuario>
            <?php
               }
            ?>
            <clar1:numeroCuenta><?=$Vwidysczfeah?></clar1:numeroCuenta>
            <clar1:tipoCuentaID><?=$Vvncjr3mb1h5CuentaID?></clar1:tipoCuentaID>
         </clar:registroUsuario>
      </clar:RegistroUsuarioRequest>
   </soapenv:Body>
</soapenv:Envelope>