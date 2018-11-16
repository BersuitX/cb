<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/AccountManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrieveAccountHistory>
         <LineOfBusiness><?=$Vrqs4xzp4h4g?></LineOfBusiness>
         <AccountId><?=$V3hbf4so4iko?></AccountId>
         <Period>
            <StartDate><?=$V33cbrzompkj?></StartDate>
            <!--Optional:-->
            <EndDate><?=$Vnmwtpaqdyce?></EndDate>
         </Period>
      </v1:retrieveAccountHistory>
   </soapenv:Body>
</soapenv:Envelope>