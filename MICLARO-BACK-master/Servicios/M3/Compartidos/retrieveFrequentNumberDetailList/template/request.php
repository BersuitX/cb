<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/CustomerManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrieveFrequentNumberDetailList>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
      </v1:retrieveFrequentNumberDetailList>
   </soapenv:Body>
</soapenv:Envelope>