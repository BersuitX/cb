<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/BillingManagement/v1">
<soapenv:Header/>
    <soapenv:Body>
    <v1:retrievePaperlessSubscriptions>
    <LineOfBusiness><?=$Vqhzkfsafzrc->LineOfBusiness?></LineOfBusiness>
    <UserProfileId><?=$Vqhzkfsafzrc->UserProfileID?></UserProfileId>
    <AccountId><?=$Vqhzkfsafzrc->AccountId?></AccountId>
    </v1:retrievePaperlessSubscriptions>
</soapenv:Body>
</soapenv:Envelope>