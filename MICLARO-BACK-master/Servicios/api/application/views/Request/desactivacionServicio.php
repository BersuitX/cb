<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://servicios.paquetes.claro.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:desactivacionServicio>
         <!--Optional:-->
         <PeticionDesactivacion>
            <min><?=$V3hbf4so4iko?></min>
            <canal>USSD</canal>
            <session_id><?=rand(1000, 10000)?></session_id>
         </PeticionDesactivacion>
      </ser:desactivacionServicio>
   </soapenv:Body>
</soapenv:Envelope>