<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/ServiceManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrieveIMEI>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
         <IMEIType>1</IMEIType>
      </v1:retrieveIMEI>
   </soapenv:Body>
</soapenv:Envelope>