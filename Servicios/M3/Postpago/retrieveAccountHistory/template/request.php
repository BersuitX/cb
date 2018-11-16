<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/AccountManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrieveAccountHistory>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
         <Period>
            <StartDate><?=$Vqhzkfsafzrc->StartDate?></StartDate>
            <!--Optional:-->
            <EndDate><?=$Vqhzkfsafzrc->EndDate?></EndDate>
         </Period>
      </v1:retrieveAccountHistory>
   </soapenv:Body>
</soapenv:Envelope>