<?php

$Vjav010uhv5a = date('c');
$Vx5bl5ubgnhj = md5($Vjav010uhv5a . md5('Soap.2013'));

?>


<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:toa:location">
   <soapenv:Header/>
   <soapenv:Body>
      <urn:get_position>
         <user>
	        <now><?=$Vqhzkfsafzrc->fecha?></now>
	        <login>soap</login>
	        <company>amx-res-co</company>
	        <auth_string><?=$Vqhzkfsafzrc->token?></auth_string>
         </user>
         <company>amx-res-co</company>
         <device><?=$Vqhzkfsafzrc->documento?></device>
      </urn:get_position>
   </soapenv:Body>
</soapenv:Envelope>