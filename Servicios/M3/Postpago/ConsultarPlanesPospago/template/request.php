<?php
   
   $Vraawqcytrti = array("Planes desde 0 $ hasta $ 83.000","Planes desde $ 83.001 hasta $ 147.000","Planes desde $ 147.000 en adelante");

   if(isset($Vqhzkfsafzrc->tipoValor)){
      $Vmgjee5gr2ml = $Vraawqcytrti[intval($Vqhzkfsafzrc->tipoValor)];
   }
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header>
      <clar:HeaderAutenticacion>
         <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vulisw0g0y15.$Vz3iq0a20pcw</clar1:contraseñaAutenticacion>
         <clar1:tipoCanalID><?=isset($Vqhzkfsafzrc->tipoCanalID)?2:1?></clar1:tipoCanalID>
         <clar1:usuarioAutenticacion>Mi$2019.$Vozz1pec1mnf*$1C$Vm3szalwqx1l$0</clar1:usuarioAutenticacion>
      </clar:HeaderAutenticacion>
   </soapenv:Header>
   <soapenv:Body>
      <clar:ConsultarPlanesPospagoRequest>
         <clar:numeroCuenta><?=$Vqhzkfsafzrc->AccountId?></clar:numeroCuenta>
         <clar:tipoPlan><?=$Vqhzkfsafzrc->PlanType?></clar:tipoPlan>
         <clar:tipoValor><?=$Vmgjee5gr2ml?></clar:tipoValor>
      </clar:ConsultarPlanesPospagoRequest>
   </soapenv:Body>
</soapenv:Envelope>