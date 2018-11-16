<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/ServiceManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:registerIMEI>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
         <IMEINumber><?=$Vqhzkfsafzrc->IMEINumber?></IMEINumber>
         <PersonalId>
            <IdentificationType><?=$Vqhzkfsafzrc->IdentificationType?></IdentificationType>
            <IdentificationNumber><?=$Vqhzkfsafzrc->IdentificationNumber?></IdentificationNumber>
         </PersonalId>
         <IsInvoice>true</IsInvoice>
         <!--Optional:-->
         <InvoiceDocument><?=$Vqhzkfsafzrc->InvoiceDocument?></InvoiceDocument>
         <!--Optional:-->
         <FileExtension>jpg</FileExtension>

         <IMEIRegister>
            <Name> </Name>
            <LastName> </LastName>
            <DocumentIssuedIn> </DocumentIssuedIn>
            <Brand> </Brand>
            <Model> </Model>
            <AcquisitionDescription> </AcquisitionDescription>
            <Address> </Address>
            <PhoneNumber> </PhoneNumber>
            <City> </City>
            <StatementDate> </StatementDate>
            <StatementTime> </StatementTime>
         </IMEIRegister> 



      </v1:registerIMEI>
   </soapenv:Body>
</soapenv:Envelope>