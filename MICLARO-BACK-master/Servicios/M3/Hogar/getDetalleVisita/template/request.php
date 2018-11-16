<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.cmPoller.sisges.telmex.com.co">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:getCMDataAccount>
         <ser:account><?=$Vqhzkfsafzrc->AccountId?></ser:account>
      </ser:getCMDataAccount>
   </soapenv:Body>
</soapenv:Envelope>