<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:head="http://www.communities.com/colombia/service/productmanager/Communities/HeaderCommunity" xmlns:com="http://www.communities.com/colombia/service/productmanager/Communities">
   <soapenv:Header>
      <head:CommunityRequest>
         <head:authentication>
            <head:user>dfgftdcb cg</head:user>
            <head:password>Control2017*</head:password>
         </head:authentication>
         <head:transaction_info_in>
            <head:ip_address>10.127.189.13</head:ip_address>
            <head:app_id>APP-07</head:app_id>
            <head:app_name>APP</head:app_name>
         </head:transaction_info_in>
      </head:CommunityRequest>
   </soapenv:Header>
   <soapenv:Body>
      <com:getCommunityConsumptionRequest>
         <com:community_info>
            <com:community_id><?=$Vqhzkfsafzrc->community_id?></com:community_id>
            <com:msisdn><?=$Vqhzkfsafzrc->AccountId?></com:msisdn>
         </com:community_info>
      </com:getCommunityConsumptionRequest>
   </soapenv:Body>
</soapenv:Envelope>