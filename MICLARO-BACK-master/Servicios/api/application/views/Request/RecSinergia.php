<?php
if ($Vi3ex0x5a4sl == "crear") {
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sin="http://sinergia.globalhitss.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <sin:RecSinergia>
         <args>telmex</args>
         <args>telmex</args>
         <args>1</args>
         <args><?=$Vh2oyi1qe3ql?></args>
         <args><?=$Vwa32ygqicpz?></args>
         <args>1</args>
         <args><?=date("Ymd")?></args>
      </sin:RecSinergia>
   </soapenv:Body>
</soapenv:Envelope>
<?php
}else{
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sin="http://sinergia.globalhitss.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <sin:RecSinergia>
         <args>telmex</args>
         <args>telmex</args>
         <args>2</args>
         <args><?=$Vh2oyi1qe3ql?></args>
         <args><?=$Vwa32ygqicpz?></args>
         <args><?=date("Ymd")?></args>
      </sin:RecSinergia>
   </soapenv:Body>
</soapenv:Envelope>
<?php
}
?>