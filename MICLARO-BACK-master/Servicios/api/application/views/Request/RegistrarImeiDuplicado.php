<?php
list($Vihn3dxycmfq, $Vspi1bqfrhmf) = explode(" ", microtime());
$V4wm1yh1hmzr = date("Y/m/d H:i:s").".".$Vihn3dxycmfq;
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.amx.com/co/schema/mobile/enterprise/aplicationIntegration/GestionImei/v1.0" xmlns:v11="http://www.amx.com/co/schema/mobile/common/aplicationIntegration/Cliente/v1.0">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:RegistrarAnexo2Request>
         <v1:registroAnexo2>
            <v11:cliente>
               <v11:nombres><?=$V4gki3bjnpnq?></v11:nombres>
               <v11:apellidos><?=$Vr2i2tqlqotl?></v11:apellidos>
               <v11:tipoDocumento><?=$Vavp2nskxxqq?></v11:tipoDocumento>
               <v11:numeroDocumento><?=$Vn50uwokkhvo?></v11:numeroDocumento>
            </v11:cliente>
            <v11:ciudad><?=$V1mccspyvfe0?></v11:ciudad>
            <v11:direccion><?=$Vtt5lms041w2?></v11:direccion>
            <v11:imei><?=$Vvw2svm1imq2?></v11:imei>
            <v11:marca><?=$Vkzc3ikgbann?></v11:marca>
            <v11:modelo><?=$Vghqtjnegprk?></v11:modelo>
            <v11:detalle><?=$Vs0rc3ntdd0m?></v11:detalle>
            <v11:min><?=$V3hbf4so4iko?></v11:min>
            <v11:fechaRegistro><?=$V4wm1yh1hmzr?></v11:fechaRegistro>
            <v11:declaracionUsoEquipo><?=$Vyq1pyzfpomm?></v11:declaracionUsoEquipo>
         </v1:registroAnexo2>
      </v1:RegistrarAnexo2Request>
   </soapenv:Body>
</soapenv:Envelope>   

