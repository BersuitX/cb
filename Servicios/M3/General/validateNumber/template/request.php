<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/AccountManagement/v1">
<soapenv:Header>
    <ServiceGatewayHeader>
        <codIdioma>EN</codIdioma>
        <systemId>SELFSERVICE</systemId>
        <userProfileId>nn@claro.com.co</userProfileId>
        <operationId>validateNumber</operationId>
        <IPServer>9.129.59.6</IPServer>
        <TipoCanal>MB</TipoCanal>
        <VersionServicio>1.0</VersionServicio>
        <VersionEndpoint>1.0</VersionEndpoint>
        <Notification>false</Notification>
    </ServiceGatewayHeader>
</soapenv:Header>
   <soapenv:Body>
      <v1:validateNumber>
         <LineOfBusiness>0</LineOfBusiness>
         <claroNumber><?=$Vqhzkfsafzrc->AccountId?></claroNumber>
      </v1:validateNumber>
   </soapenv:Body>
</soapenv:Envelope>