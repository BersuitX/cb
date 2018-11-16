<?php
   $Vtwcw3y3wu2h = isset($Vqhzkfsafzrc->quota)?(float) $Vqhzkfsafzrc->quota:0;
   $Vwygjm3q4ab4 = str_replace("+57","",$Vqhzkfsafzrc->msisdn);
?>
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
      <com:addMemberRequest>
         <com:community_info>
            <com:community_id><?=$Vqhzkfsafzrc->community_id?></com:community_id>
            <!--Optional:-->
            <com:community_type><?=$Vqhzkfsafzrc->type?></com:community_type>
         </com:community_info>
         <com:new_subscriber>
            <com:msisdn><?=$Vwygjm3q4ab4?></com:msisdn>
            <com:assigned_quota><?=$Vtwcw3y3wu2h?></com:assigned_quota>
         </com:new_subscriber>
      </com:addMemberRequest>
   </soapenv:Body>
</soapenv:Envelope>