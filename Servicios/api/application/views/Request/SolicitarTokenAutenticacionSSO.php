<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header>
      <clar:HeaderAutenticacion>
         <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vvosfj1kohp3.$Vbroibcc3co3</clar1:contraseñaAutenticacion>
         <clar1:tipoCanalID><?=isset($Vj51pdqbhifj)?2:1?></clar1:tipoCanalID>
         <clar1:usuarioAutenticacion>Mi$2019.$Vduuglj0unse*$1C$Vk33bzuipr3e$0</clar1:usuarioAutenticacion>
      </clar:HeaderAutenticacion>
   </soapenv:Header>
   <soapenv:Body>
      <clar:SolicitarTokenAutenticacionSSORequest>
         <clar:solicitudTokenAutenticacionSSO>
            <clar1:contraseña><?=htmlentities($Vxkzshfn23gw)?></clar1:contraseña>
            <clar1:nombreUsuario><?=$Vyvjwikpa2bp?></clar1:nombreUsuario>
            <clar1:tipoCanalOrigenID><?=isset($Vtkyizq1bfav)?2:4?></clar1:tipoCanalOrigenID>
         </clar:solicitudTokenAutenticacionSSO>
      </clar:SolicitarTokenAutenticacionSSORequest>
   </soapenv:Body>
</soapenv:Envelope>