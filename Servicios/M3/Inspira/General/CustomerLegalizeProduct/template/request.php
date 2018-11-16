<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v2="http://www.ericsson.com/esb/data/generico/CommonTypes/v2/" xmlns:v1="http://www.ericsson.com/esb/message/customer/customerLegalizeProductRequest/v1.0/">
   <soapenv:Header>
      <v2:headerRequest>
         <v2:channel>channel</v2:channel>
         <v2:idApplication>idApplication</v2:idApplication>
         <v2:userApplication>userApplication</v2:userApplication>
         <v2:userSession>userSession</v2:userSession>
         <v2:idESBTransaction>idESBTransaction</v2:idESBTransaction>
         <v2:idBusinessTransaction>idBusinessTransaction</v2:idBusinessTransaction>
         <v2:startDate>09-02-2018</v2:startDate>
         <v2:additionalNode></v2:additionalNode>
      </v2:headerRequest>
   </soapenv:Header>
   <soapenv:Body>
      <v1:customerLegalizeProductRequest>
         <subscriberNumber>57<?=$Vqhzkfsafzrc->AccountId?></subscriberNumber>
         <documentType><?=$Vqhzkfsafzrc->DocumentType?></documentType>
         <documentNumber><?=$Vqhzkfsafzrc->DocumentNumber?></documentNumber>
         <documentExpeditionDate></documentExpeditionDate>
         <firstName><?=$Vqhzkfsafzrc->nombre?></firstName>
         <lastName><?=$Vqhzkfsafzrc->apellido?></lastName>
      </v1:customerLegalizeProductRequest>
   </soapenv:Body>
</soapenv:Envelope>
