<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/AccountManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrieveOTADevice>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
      </v1:retrieveOTADevice>
   </soapenv:Body>
</soapenv:Envelope>