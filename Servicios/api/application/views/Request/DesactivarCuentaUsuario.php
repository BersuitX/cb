<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header>
      <clar:HeaderAutenticacion>
         <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vvosfj1kohp3.$Vbroibcc3co3</clar1:contraseñaAutenticacion>
         <clar1:tipoCanalID><?=isset($Vj51pdqbhifj)?2:1?></clar1:tipoCanalID>
         <clar1:usuarioAutenticacion>Mi$2019.$Vduuglj0unse*$1C$Vk33bzuipr3e$0</clar1:usuarioAutenticacion>
      </clar:HeaderAutenticacion>
   </soapenv:Header>
   <soapenv:Body>
      <clar:DesactivarCuentaUsuarioRequest>
         <!--Optional:-->
         <clar:desactivacionCuenta>
            <clar1:nombreUsuario><?=$Vur1q223roby?></clar1:nombreUsuario>
            <clar1:numeroCuenta><?=$V3hbf4so4iko?></clar1:numeroCuenta>
            <clar1:tipoCuentaID><?=$Vrqs4xzp4h4g?></clar1:tipoCuentaID>
         </clar:desactivacionCuenta>
      </clar:DesactivarCuentaUsuarioRequest>
   </soapenv:Body>
</soapenv:Envelope>