<?php
   list($Vihn3dxycmfq, $Vspi1bqfrhmf) = explode(" ", microtime());
   $Vqt4zzdeb2sp = date("Y/m/d H:i:s",strtotime("-5 hour")).".".$Vihn3dxycmfq;
   $V4f2cyr2rkua = date("Y/m/d H:i:s",strtotime("-5 hour")).".".$Vihn3dxycmfq;
?>

<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.amx.com/co/schema/mobile/enterprise/aplicationIntegration/GestionImei/v1.0" xmlns:v11="http://www.amx.com/co/schema/mobile/common/aplicationIntegration/Cliente/v1.0">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:RegistrarImeiRequest>
         <v1:infoCliente>
            <v11:imei><?=$Vvw2svm1imq2?></v11:imei>
            <v11:marca><?=$Vkzc3ikgbann?></v11:marca>
            <v11:modelo><?=$Vghqtjnegprk?></v11:modelo>
            <v11:msisdn><?=$V21fh2brzmsv?></v11:msisdn>
            <v11:tipoUsuarioPropietario><?=$Vr5r5thyzntg?></v11:tipoUsuarioPropietario>
            <v11:tipoDocPropietario><?=$V10mqkyxl22j?></v11:tipoDocPropietario>
            <v11:nombrePropietario><?=$Vsbnin313glj?></v11:nombrePropietario>
            <v11:numIdPropietario><?=$V2iqaedfbe4m?></v11:numIdPropietario>
            <v11:ejecutarRegistro><?=$Vpvfavpmiizd?></v11:ejecutarRegistro>
            <v11:fechaTerminos><?=$Vqt4zzdeb2sp?></v11:fechaTerminos>
            <v11:fechaCondiciones><?=$V4f2cyr2rkua?></v11:fechaCondiciones>
         </v1:infoCliente>
      </v1:RegistrarImeiRequest>
   </soapenv:Body>
</soapenv:Envelope>
