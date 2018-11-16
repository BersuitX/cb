<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://servicios.autolegalizacion.claro.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:esLegalizada>
         <!--Optional:-->
         <RequestLineaLegalizada>
            <min><?=$Vqhzkfsafzrc->AccountId?></min>
            <canal>MiClaro</canal>
            <sessionId>1</sessionId>
         </RequestLineaLegalizada>
      </ser:esLegalizada>
   </soapenv:Body>
</soapenv:Envelope>