<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.amx.com/Schema/Operation/GetAplicationsCustomer/V1.0" xmlns:v11="http://www.amx.com/CO/Schema/ClaroHeaders/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:getAplicationsCustomerRequest>
         <v1:headerRequest>
            <v11:transactionId></v11:transactionId>
            <!--Optional:-->
            <v11:system></v11:system>
            <!--Optional:-->
            <v11:user></v11:user>
            <!--Optional:-->
            <v11:password></v11:password>
            <v11:requestDate><?=date("c", strtotime(date("c"). ' - 1 day'))?></v11:requestDate>
            <!--Optional:-->
            <v11:ipApplication></v11:ipApplication>
            <!--Optional:-->
            <v11:traceabilityId></v11:traceabilityId>
         </v1:headerRequest>
         <!--Optional:-->
         <v1:typeId>MSISDN</v1:typeId>
         <!--Optional:-->
         <v1:idUser><?=$V3hbf4so4iko?></v1:idUser>
      </v1:getAplicationsCustomerRequest>
   </soapenv:Body>
</soapenv:Envelope>