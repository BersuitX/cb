<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/CorpMobileService/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrieveBusinessUnit>
         <Min><?=$Vqhzkfsafzrc->AccountId?></Min>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <Channel>appempresas</Channel>
      </v1:retrieveBusinessUnit>
   </soapenv:Body>
</soapenv:Envelope>