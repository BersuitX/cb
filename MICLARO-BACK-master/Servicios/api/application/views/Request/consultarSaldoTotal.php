<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.saldofactura.claro.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:consultarSaldoTotal>
         <solicitudConsultarSaldoTotal>
            <canal>USSD</canal>
            <min><?=$V3hbf4so4iko?></min>
         </solicitudConsultarSaldoTotal>
      </ser:consultarSaldoTotal>
   </soapenv:Body>
</soapenv:Envelope>