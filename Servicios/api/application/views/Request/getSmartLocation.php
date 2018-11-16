<?php

$V4wm1yh1hmzr = date('c');
$V1iws3tl1n24 = md5($V4wm1yh1hmzr . md5('Soap.2013'));

?>


<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:toa:location">
   <soapenv:Header/>
   <soapenv:Body>
      <urn:get_position>
         <user>
	        <now><?=$V4wm1yh1hmzr?></now>
	        <login>soap</login>
	        <company>amx-res-co</company>
	        <auth_string><?=$V1iws3tl1n24?></auth_string>
         </user>
         <company>amx-res-co</company>
         <device><?=$Vrquejas2p0l?></device>
      </urn:get_position>
   </soapenv:Body>
</soapenv:Envelope>