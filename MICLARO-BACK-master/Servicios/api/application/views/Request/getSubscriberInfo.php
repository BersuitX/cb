<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/service/namespace/UtilitySelfService/v1">
<soapenv:Header>
    <ServiceGatewayHeader>
        <codIdioma>EN</codIdioma>
        <systemId>SELFSERV</systemId>
        <userProfileId>nn@claro.com.co</userProfileId>
        <operationId>getSubscriberInfo</operationId>
        <IPServer>9.129.59.6</IPServer>
        <TipoCanal>FX</TipoCanal>
        <VersionServicio>1.0</VersionServicio>
        <VersionEndpoint>1.0</VersionEndpoint>
        <Notification>false</Notification>
    </ServiceGatewayHeader>
</soapenv:Header>
   <soapenv:Body>
      <v1:getSubscriberInfoRequest>
         <!--Optional:-->
         <v1:account><?=$Vwidysczfeah?></v1:account>
      </v1:getSubscriberInfoRequest>
   </soapenv:Body>
</soapenv:Envelope>