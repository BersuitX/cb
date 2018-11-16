<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v2="http://www.ericsson.com/esb/data/generico/CommonTypes/v2/" xmlns:v1="http://www.ericsson.com/esb/message/customer/getAppointmentDetailsRequest/v1.0">
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
      <v1:getAppointmentDetailsRequest>
         <_customer>
            <_party>
               <partyid><?=$Vqhzkfsafzrc->partyid?></partyid>
            </_party>
         </_customer>
      </v1:getAppointmentDetailsRequest>
   </soapenv:Body>
</soapenv:Envelope>