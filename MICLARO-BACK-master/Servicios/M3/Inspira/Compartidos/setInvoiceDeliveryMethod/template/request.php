<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v2="http://www.ericsson.com/esb/data/generico/CommonTypes/v2/" xmlns:v1="http://www.ericsson.com/esb/Customer/SetInvoiceDeliveryMethodRequest/v1/">
   <soapenv:Header>
      <v2:headerRequest>
         <v2:channel>?</v2:channel>
         <v2:idApplication>?</v2:idApplication>
         <v2:userApplication>?</v2:userApplication>
         <v2:userSession>?</v2:userSession>
         <v2:idESBTransaction>?</v2:idESBTransaction>
         <v2:idBusinessTransaction>?</v2:idBusinessTransaction>
         <v2:startDate>?</v2:startDate>
         <v2:additionalNode>?</v2:additionalNode>
      </v2:headerRequest>
   </soapenv:Header>
   <soapenv:Body>
      <v1:setInvoiceDeliveryMethodRequest>
         <v1:accountNumber>57<?=$Vqhzkfsafzrc->AccountId?></v1:accountNumber>
         <v1:billMedium>3</v1:billMedium>
         <v1:email>correo@ericsson.com</v1:email>
         <v1:email1>?</v1:email1>
         <v1:email3>?</v1:email3>
         <v1:email4>?</v1:email4>
      </v1:setInvoiceDeliveryMethodRequest>
   </soapenv:Body>
</soapenv:Envelope>