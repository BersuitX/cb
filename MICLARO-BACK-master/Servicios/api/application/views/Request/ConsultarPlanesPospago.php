<?php
   
   $Vgn0iwn142my = array("Planes desde 0 $ hasta $ 83.000","Planes desde $ 83.001 hasta $ 147.000","Planes desde $ 147.000 en adelante");

   if(isset($Va5ifforr2qn)){
      $Vdyx5hlo0zh2 = $Vgn0iwn142my[intval($Va5ifforr2qn)];
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
      <clar:ConsultarPlanesPospagoRequest>
         <clar:numeroCuenta><?=$V3hbf4so4iko?></clar:numeroCuenta>
         <clar:tipoPlan><?=$V2ubp5rsebyv?></clar:tipoPlan>
         <clar:tipoValor><?=$Vdyx5hlo0zh2?></clar:tipoValor>
      </clar:ConsultarPlanesPospagoRequest>
   </soapenv:Body>
</soapenv:Envelope>