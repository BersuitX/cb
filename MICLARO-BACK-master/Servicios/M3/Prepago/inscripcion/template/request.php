<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://servicios.paquetes.claro.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:inscripcion>
         <!--Optional:-->
         <PeticionInscripcion>
            <min><?=$Vqhzkfsafzrc->AccountId?></min>
            <canal>USSD</canal>
            <codPaq><?=$Vqhzkfsafzrc->codPaq?></codPaq>
            <lac>1</lac>
            <cellId>1</cellId>
            <zonaId>1</zonaId>
            <sessionId><?=rand(1000, 10000)?></sessionId>
         </PeticionInscripcion>
      </ser:inscripcion>
   </soapenv:Body>
</soapenv:Envelope>