<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/" xmlns:puen="http://schemas.datacontract.org/2004/07/PuentePoliedro">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:ValidateClient>
         <tem:REQUEST>
            <puen:ClientInformation>
               <puen:DocumentNumber><?=$Vqhzkfsafzrc->DocumentNumber?></puen:DocumentNumber>
               <puen:DocumentTypeId><?=$Vqhzkfsafzrc->codigoTipoDocumento?></puen:DocumentTypeId>
               <puen:Names><?=$Vqhzkfsafzrc->Nombre?></puen:Names>
               <puen:FirstFamilyName><?=$Vqhzkfsafzrc->primerApellido?></puen:FirstFamilyName>
               <puen:SecondFamilyName><?=$Vqhzkfsafzrc->segundoApellido?></puen:SecondFamilyName>
               <puen:ExpeditionDate><?=$Vqhzkfsafzrc->fechaExpedicion?></puen:ExpeditionDate>
            </puen:ClientInformation>
         </tem:REQUEST>
      </tem:ValidateClient>
   </soapenv:Body>
</soapenv:Envelope>

 
