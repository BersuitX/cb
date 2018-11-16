<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/AccountManagement/v1">
    <soapenv:Header>
    <ServiceGatewayHeader>
    <codIdioma>EN</codIdioma>
    <systemId>SELFSERV</systemId>
    <userProfileId>PAQUITA@hotmail.com</userProfileId>
    <operationId>retrieveCustomerData</operationId>
    <IPServer>9.129.59.6</IPServer>
    <TipoCanal><?=(($Vqhzkfsafzrc->LineOfBusiness==1)?"FX":"MB")?></TipoCanal>
    <VersionServicio>1.0</VersionServicio>
    <VersionEndpoint>1.0</VersionEndpoint>
    <Notification>false</Notification>
    </ServiceGatewayHeader>
    </soapenv:Header>
   <soapenv:Body>
      <v1:legalizeAccount>
         <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
         <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
         <LegalizationData>
            <Name><?=$Vqhzkfsafzrc->nombre?></Name>
            <LastName><?=$Vqhzkfsafzrc->apellido?> <?=$Vqhzkfsafzrc->segundoApellido?></LastName>
            <DocumentType><?=$Vqhzkfsafzrc->DocumentType?></DocumentType>
            <DocumentNumber><?=$Vqhzkfsafzrc->DocumentNumber?></DocumentNumber>
            <!--Optional:-->
            <MobileNumber><?=$Vqhzkfsafzrc->AccountId?></MobileNumber>
            <!--Optional:-->
            <EmailAddress><?=(($Vqhzkfsafzrc->UserProfileID!=="")?$Vqhzkfsafzrc->UserProfileID:"_@claro.com")?></EmailAddress>
            <!--Optional:-->
            <Address>
               <Address><?=$Vqhzkfsafzrc->direccion?></Address>
            </Address>
            <!--Optional:-->
            <InstallationAddress>
               <Address><?=$Vqhzkfsafzrc->direccion?></Address>
            </InstallationAddress>
         </LegalizationData>
         <Source>BSCS</Source>
      </v1:legalizeAccount>
   </soapenv:Body>
</soapenv:Envelope>