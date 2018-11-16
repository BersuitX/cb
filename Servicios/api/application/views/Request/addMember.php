<?php
   $Vdwm5uhvx5n0 = (float) $Vdwm5uhvx5n0;
   $V21fh2brzmsv = str_replace("+57","",$V21fh2brzmsv);
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
            <com:community_id><?=$Vlqwafq44lzb?></com:community_id>
            <!--Optional:-->
            <com:community_type><?=$V4wtbblc1wn4?></com:community_type>
         </com:community_info>
         <com:new_subscriber>
            <com:msisdn><?=$V21fh2brzmsv?></com:msisdn>
            <com:assigned_quota><?=$Vdwm5uhvx5n0?></com:assigned_quota>
         </com:new_subscriber>
      </com:addMemberRequest>
   </soapenv:Body>
</soapenv:Envelope>