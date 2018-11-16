<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/BillingManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:getPaperless>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <UserProfileID><?=$Vqhzkfsafzrc->UserProfileID?></UserProfileID>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
      </v1:getPaperless>
   </soapenv:Body>
</soapenv:Envelope>