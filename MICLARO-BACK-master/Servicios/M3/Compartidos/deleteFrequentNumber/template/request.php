
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/CustomerManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:deleteFrequentNumber>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
         <FrequentNumber>
            <FrequentNumberType><?=$Vqhzkfsafzrc->FrequentNumberType?></FrequentNumberType>
            <PhoneNumber><?=$Vqhzkfsafzrc->PhoneNumber?></PhoneNumber>
         </FrequentNumber>
      </v1:deleteFrequentNumber>
   </soapenv:Body>
</soapenv:Envelope>