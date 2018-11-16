<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/ServiceManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrievePlan>
      	<LineOfBusiness>1</LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
         <ServiceID>1</ServiceID>
         <ServiceType>1</ServiceType>
      </v1:retrievePlan>
   </soapenv:Body>
</soapenv:Envelope>