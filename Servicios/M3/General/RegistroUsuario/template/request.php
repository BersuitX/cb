<?php
   
   if (isset($Vs5rav4cvc3n)) {
      if (intval($Vs5rav4cvc3n)==1) {
         $Vqncgxykx5nb="true";
      }else{
         $Vqncgxykx5nb="false";
      }
   }else{
      $Vqncgxykx5nb="false";
   }
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header>
      <clar:HeaderAutenticacion>
         <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vulisw0g0y15.$Vz3iq0a20pcw</clar1:contraseñaAutenticacion>
         <clar1:tipoCanalID><?=isset($V34pc0h2hbai)?2:1?></clar1:tipoCanalID>
         <clar1:usuarioAutenticacion>Mi$2019.$Vozz1pec1mnf*$1C$Vm3szalwqx1l$0</clar1:usuarioAutenticacion>
      </clar:HeaderAutenticacion>
   </soapenv:Header>
   <soapenv:Body>
      <clar:RegistroUsuarioRequest>
         <clar:registroUsuario>
            <clar1:apellidoCliente><?=$Vqhzkfsafzrc->apellidoCliente?></clar1:apellidoCliente>
            <clar1:codigoTipoDocumento><?=$Vqhzkfsafzrc->codigoTipoDocumento?></clar1:codigoTipoDocumento>
            <clar1:contraseña><?=htmlentities($Vqhzkfsafzrc->clave)?></clar1:contraseña>
            <clar1:documento><?=$Vqhzkfsafzrc->documento?></clar1:documento>
            <clar1:esRegistroLegalizado><?=$Vqhzkfsafzrc->esRegistroLegalizado?></clar1:esRegistroLegalizado>
            <clar1:nombreCliente><?=$Vqhzkfsafzrc->nombreCliente?></clar1:nombreCliente>
            <clar1:nombreUsuario><?=$Vqhzkfsafzrc->nombreUsuario?></clar1:nombreUsuario>
            <clar1:numeroCuenta><?=$Vqhzkfsafzrc->numeroCuenta?></clar1:numeroCuenta>
            <clar1:tipoCuentaID><?=$Vqhzkfsafzrc->tipoCuentaID?></clar1:tipoCuentaID>
         </clar:registroUsuario>
      </clar:RegistroUsuarioRequest>
   </soapenv:Body>
</soapenv:Envelope>