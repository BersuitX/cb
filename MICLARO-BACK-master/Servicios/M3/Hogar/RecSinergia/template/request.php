<?php
if ($Vqhzkfsafzrc->accion == "crear") {
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sin="http://sinergia.globalhitss.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <sin:RecSinergia>
         <args>telmex</args>
         <args>telmex</args>
         <args>1</args>
         <args><?=$Vqhzkfsafzrc->lineaFija?></args>
         <args><?=$Vqhzkfsafzrc->phoneNumber?></args>
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
         <args><?=$Vqhzkfsafzrc->lineaFija?></args>
         <args><?=$Vqhzkfsafzrc->phoneNumber?></args>
         <args><?=date("Ymd")?></args>
      </sin:RecSinergia>
   </soapenv:Body>
</soapenv:Envelope>
<?php
}
?>