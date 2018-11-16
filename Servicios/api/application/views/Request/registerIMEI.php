<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/ServiceManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:registerIMEI>
         <LineOfBusiness><?=$Vrqs4xzp4h4g?></LineOfBusiness>
         <AccountId><?=$V3hbf4so4iko?></AccountId>
         <IMEINumber><?=$Vbu3ssaqr3yl?></IMEINumber>
         <PersonalId>
            <IdentificationType><?=$Vhg4t1euo52i?></IdentificationType>
            <IdentificationNumber><?=$Vq0zbbqvyc2i?></IdentificationNumber>
         </PersonalId>
         <IsInvoice>true</IsInvoice>
         <!--Optional:-->
         <InvoiceDocument><?=$Vkxtz2ii0yaq?></InvoiceDocument>
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