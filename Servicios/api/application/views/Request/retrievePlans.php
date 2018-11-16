<?php
	
	$Vgn0iwn142my = array("Planes desde 0 $ hasta $ 83.000","Planes desde $ 83.001 hasta $ 147.000","Planes desde $ 147.000 en adelante");

	if(isset($Va5ifforr2qn)){
		$Vdyx5hlo0zh2 = $Vgn0iwn142my[intval($Va5ifforr2qn)];
	}
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/BusinessAnalyticsManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:retrievePlans>
         <LineOfBusiness><?=$Vrqs4xzp4h4g?></LineOfBusiness>
         <AccountId><?=$V3hbf4so4iko?></AccountId>
         <PlanType><?=$V2ubp5rsebyv?></PlanType>
         <CFM><?=$Vdyx5hlo0zh2?></CFM>
      </v1:retrievePlans>
   </soapenv:Body>
</soapenv:Envelope>