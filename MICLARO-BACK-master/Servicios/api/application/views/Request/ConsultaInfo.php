<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:ws="http://ws.registroEquipos.claro.com/" >
   <soapenv:Header/>
   <soapenv:Body>
      <ws:consultaInformacion>
         <consultaInfoRequest>
            <min><?=$V3hbf4so4iko?></min>
            <canal>USSD</canal>
            <sessionId>1</sessionId>
            <usuario>WSRegistroEquipos</usuario>
            <password>passConsulta</password>
         </consultaInfoRequest>
      </ws:consultaInformacion>
   </soapenv:Body>
</soapenv:Envelope>


