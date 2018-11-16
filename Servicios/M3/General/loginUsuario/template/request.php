<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header>
      <clar:HeaderAutenticacion>
         <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vulisw0g0y15.$Vz3iq0a20pcw</clar1:contraseñaAutenticacion>
         <clar1:tipoCanalID><?=isset($Vqhzkfsafzrc->tipoCanalID)?2:1?></clar1:tipoCanalID>
         <clar1:usuarioAutenticacion>Mi$2019.$Vozz1pec1mnf*$1C$Vm3szalwqx1l$0</clar1:usuarioAutenticacion>
      </clar:HeaderAutenticacion>
   </soapenv:Header>
   <soapenv:Body>
      <clar:LoginUsuarioRequest>
         <!--Optional:-->
         <clar:loginUsuario>
            <clar1:contraseña><?=htmlentities($Vqhzkfsafzrc->clave)?></clar1:contraseña>
            <clar1:nombreUsuario><?=$Vqhzkfsafzrc->nombreUsuario?></clar1:nombreUsuario>
         </clar:loginUsuario>
      </clar:LoginUsuarioRequest>
   </soapenv:Body>
</soapenv:Envelope>