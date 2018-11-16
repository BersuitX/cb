<?php
   
   if ($V52j1ve13pvd) {
      if (intval($V52j1ve13pvd)==1) {
         $V4pnkqfeqs2m="true";
      }else{
         $V4pnkqfeqs2m="false";
      }
   }else{
      $V4pnkqfeqs2m="false";
   }
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header>
      <clar:HeaderAutenticacion>
         <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vvosfj1kohp3.$Vbroibcc3co3</clar1:contraseñaAutenticacion>
         <clar1:tipoCanalID><?=isset($Vj51pdqbhifj)?2:1?></clar1:tipoCanalID>
         <clar1:usuarioAutenticacion>Mi$2019.$Vduuglj0unse*$1C$Vk33bzuipr3e$0</clar1:usuarioAutenticacion>
      </clar:HeaderAutenticacion>
   </soapenv:Header>
   <soapenv:Body>
      <clar:AsociarCuentaUsuarioRequest>
         <clar:asociacioncuenta>
            <clar1:codigoTipoDocumento><?=$Vsi0pnvi1q3z?></clar1:codigoTipoDocumento>
            <clar1:documento><?=$Vrquejas2p0l?></clar1:documento>
            <clar1:esRegistroLegalizado><?=$V4pnkqfeqs2m?></clar1:esRegistroLegalizado>
            <clar1:nombreUsuario><?=$Vyvjwikpa2bp?></clar1:nombreUsuario>
            <clar1:numeroCuenta><?=$Vwidysczfeah?></clar1:numeroCuenta>
            <clar1:tipoCuentaID><?=$V3oioha3ay1e?></clar1:tipoCuentaID>
         </clar:asociacioncuenta>
      </clar:AsociarCuentaUsuarioRequest>
   </soapenv:Body>
</soapenv:Envelope>