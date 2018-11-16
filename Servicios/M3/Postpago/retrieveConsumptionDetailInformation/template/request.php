<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/ServiceManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrieveConsumptionDetailInformation>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
      </v1:retrieveConsumptionDetailInformation>
   </soapenv:Body>
</soapenv:Envelope>