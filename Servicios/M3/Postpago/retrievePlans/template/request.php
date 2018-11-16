<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/BusinessAnalyticsManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrievePlans>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
         <PlanType><?=$Vqhzkfsafzrc->PlanType?></PlanType>

      </v1:retrievePlans>
   </soapenv:Body>
</soapenv:Envelope>