<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.wifi.sisges.claro.com.co">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:cmSetSsid>
         <ws:ip><?=$Vqhzkfsafzrc->ip?></ws:ip>
         <ws:model><?=$Vqhzkfsafzrc->model?></ws:model>
         <ws:ssid><?=$Vqhzkfsafzrc->ssid?></ws:ssid>
      </ws:cmSetSsid>
   </soapenv:Body>
</soapenv:Envelope>