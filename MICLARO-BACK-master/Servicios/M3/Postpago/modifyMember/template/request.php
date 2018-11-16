<?php

   $Vpprsh2d0t5q="";
   
   if ($Vqhzkfsafzrc->msisdn != $Vqhzkfsafzrc->new_msisdn) {
      $Vpprsh2d0t5q="<com:new_msisdn>".$Vqhzkfsafzrc->new_msisdn."</com:new_msisdn>";
   }

if(!isset($Vqhzkfsafzrc->quota_assign)){
   $Vqhzkfsafzrc->quota_assign = 0;
}
   
   
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
      <com:modifyMemberRequest>
         <com:community_info>
            <com:community_id><?=$Vqhzkfsafzrc->community_id?></com:community_id>
            <!--Optional:-->
            <com:community_type><?=$Vqhzkfsafzrc->type?></com:community_type>
         </com:community_info>
         <com:subscriber>
            <com:msisdn><?=$Vqhzkfsafzrc->msisdn?></com:msisdn>
         </com:subscriber>
         <com:newInfoSubscriber>
            <!--Optional:-->
            <?=$Vpprsh2d0t5q?>
            <!--Optional:-->
            <com:new_quota_assign><?=$Vqhzkfsafzrc->quota_assign?></com:new_quota_assign>
         </com:newInfoSubscriber>
      </com:modifyMemberRequest>
   </soapenv:Body>
</soapenv:Envelope>