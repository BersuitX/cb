<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header/>
   <soapenv:Body>
      <clar:RecuperarContraseñaUsuarioRequest>
         <!--Optional:-->
         <clar:solicitudRecuperarContraseña>
            <clar1:nombreUsuario><?=$Vyvjwikpa2bp?></clar1:nombreUsuario>
         </clar:solicitudRecuperarContraseña>
      </clar:RecuperarContraseñaUsuarioRequest>
   </soapenv:Body>
</soapenv:Envelope>