<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
  <soapenv:Header>
     <clar:HeaderAutenticacion>
        <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vulisw0g0y15.$Vz3iq0a20pcw</clar1:contraseñaAutenticacion>
        <clar1:tipoCanalID><?=isset($Vqhzkfsafzrc->tipoCanalID)?2:1?></clar1:tipoCanalID>
        <clar1:usuarioAutenticacion>Mi$2019.$Vozz1pec1mnf*$1C$Vm3szalwqx1l$0</clar1:usuarioAutenticacion>
     </clar:HeaderAutenticacion>
  </soapenv:Header>
  <soapenv:Body>
     <clar:ComprarPaquetePartidoRequest>
        <clar:paquetePartido>
           <clar1:codigoContrato><?=$Vqhzkfsafzrc->codigoContrato?></clar1:codigoContrato>
           <clar1:codigoPartido><?=$Vqhzkfsafzrc->codigoPartido?></clar1:codigoPartido>
           <clar1:customerID><?=$Vqhzkfsafzrc->customerID?></clar1:customerID>
           <clar1:fechaHoraInicio><?=$Vqhzkfsafzrc->fechaHoraInicio?></clar1:fechaHoraInicio>
           <clar1:nombreUsuario><?=$Vqhzkfsafzrc->nombreUsuario?></clar1:nombreUsuario>
           <clar1:numeroCuenta><?=$Vqhzkfsafzrc->AccountId?></clar1:numeroCuenta>
           <clar1:tipoCuentaID><?=$Vqhzkfsafzrc->LineOfBusiness?></clar1:tipoCuentaID>
        </clar:paquetePartido>
     </clar:ComprarPaquetePartidoRequest>
  </soapenv:Body>
</soapenv:Envelope>