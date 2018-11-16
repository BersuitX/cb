<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.wifi.sisges.claro.com.co">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:cmSetWpaKey>
         <ws:ip><?=$Vqhzkfsafzrc->ip?></ws:ip>
         <ws:model><?=$Vqhzkfsafzrc->model?></ws:model>
         <ws:key><?=$Vqhzkfsafzrc->key?></ws:key>
      </ws:cmSetWpaKey>
   </soapenv:Body>
</soapenv:Envelope>