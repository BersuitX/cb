<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/" xmlns:puen="http://schemas.datacontract.org/2004/07/PuentePoliedro" xmlns:urn="urn:Comcel.Pol.Wcf.DataContracts">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:VerifyAnswer>
         <tem:REQUEST>
            <puen:SecuenciaCuestionario><?=$Vqhzkfsafzrc->SecuenciaCuestionario?></puen:SecuenciaCuestionario>
            <puen:ClientNames><?=$Vqhzkfsafzrc->ClientNames?></puen:ClientNames>
            <puen:DocumentNumber><?=$Vqhzkfsafzrc->DocumentNumber?></puen:DocumentNumber>
            <puen:DocumentTypeId><?=$Vqhzkfsafzrc->DocumentTypeId?></puen:DocumentTypeId>
            <puen:InternalProccessResult><?=$Vqhzkfsafzrc->InternalProccessResult?></puen:InternalProccessResult>
            <puen:ValidationResultMessage><?=$Vqhzkfsafzrc->ValidationResultMessage?></puen:ValidationResultMessage>
            <puen:VeryAnswersInfo>
               <puen:FormId></puen:FormId>
               <puen:Registry><?=$Vqhzkfsafzrc->Registry?></puen:Registry>
               <puen:ClientAnswer>
               
               <?php
                  foreach ($Vqhzkfsafzrc->Answers as $Virsew13xpli) {
               ?>
                  <urn:ClientAnswer>
                     <urn:QuestionId><?=$Virsew13xpli->QuestionId?></urn:QuestionId>
                     <urn:AnswerId><?=$Virsew13xpli->AnswerId?></urn:AnswerId>
                  </urn:ClientAnswer> 
               <?php
                  }
               ?>

               </puen:ClientAnswer>
               <puen:CentralRiesgo><?=$Vqhzkfsafzrc->CentralRiesgo?></puen:CentralRiesgo>
               <puen:IdCuestionario><?=$Vqhzkfsafzrc->IdCuestionario?></puen:IdCuestionario>
            </puen:VeryAnswersInfo>
         </tem:REQUEST>
      </tem:VerifyAnswer>
   </soapenv:Body>
</soapenv:Envelope>