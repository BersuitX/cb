<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v2="http://www.ericsson.com/esb/data/generico/CommonTypes/v2/" xmlns:v1="http://www.ericsson.com/esb/message/customer/getDataSharedConsumptionRequest/v1.0">
   <soapenv:Header>
      <v2:headerRequest>
         <v2:channel>USSD</v2:channel>
         <v2:idApplication>app12345</v2:idApplication>
         <v2:userApplication>usuario1</v2:userApplication>
         <v2:userSession/>
         <v2:idESBTransaction>111234567890</v2:idESBTransaction>
         <v2:idBusinessTransaction>1234567890</v2:idBusinessTransaction>
         <v2:startDate>20150528T10:11:21-0500</v2:startDate>
         <v2:additionalNode/>
      </v2:headerRequest>
   </soapenv:Header>
   <soapenv:Body>
      <v1:getDataSharedConsumptionRequest>
         <subscriberNumber>57<?=$Vqhzkfsafzrc->AccountId?></subscriberNumber>
      </v1:getDataSharedConsumptionRequest>
   </soapenv:Body>
</soapenv:Envelope>